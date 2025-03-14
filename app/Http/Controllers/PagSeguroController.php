<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
//use Http;

class PagSeguroController extends Controller
{
    public function createCheckout(Request $request)
    {
        $user = User::find(Auth::id());
        $url = config('services.pagseguro.checkout_url');
        $token = config('services.pagseguro.token');

        $newQuantity = $request->input('quantity_input');

        $products = json_decode($request->product, true);


        if (!is_array($products)) {
            return redirect()->route('paymentError');
        }

        if (!isset($products[0])) {
            $products = [$products];
        }

        $items = array_map(function ($product) use ($newQuantity) {
            return [
                'name' => $product['name'],
                'quantity' => $newQuantity,
                'unit_amount' => $product['price'] * 100,
            ];
        }, $products);

        if ($user->balance < $products[0]['price'] * $newQuantity || $user->id == $products[0]['user_id']) {
            return redirect()->route('paymentError')->with('error', 'Saldo insuficiente ou compra inválida.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->withoutVerifying()->post($url, [
            'reference_id' => uniqid(),
            'items' => $items,
        ]);

        if ($response->successful()) {
    
            Transaction::create([
                'quantity' => $newQuantity,
                'date' => now(),
                'price' => $products[0]['price'],
                'product_id' => $products[0]['id'],
                'buyer_id' => $user->id,
            ]);

            $seller = User::find($products[0]['user_id']);
            $product = Product::find($products[0]['id']);

            $user->balance -= $products[0]['price'] * $newQuantity;
            $products[0]['quantity'] -= $newQuantity;
            $seller->balance += $products[0]['price'] * $newQuantity;
            $product->quantity -= $newQuantity;
            $user->save();
            $seller->save();
            $product->save();

            $pay_link = data_get($response->json(), 'links.1.href');
            return redirect()->away($pay_link);
        }

        return redirect()->route('paymentError');
    }
}
