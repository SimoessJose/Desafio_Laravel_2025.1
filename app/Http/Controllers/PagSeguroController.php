<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use Http;

class PagSeguroController extends Controller
{
    public function createCheckout(Request $request)
    {
        $url = config('services.pagseguro.checkout_url');
        $token = config('services.pagseguro.token');

        $products = json_decode($request->product, true);

        if (!isset($products[0])) {
            $products = [$products];
        }


        $items = array_map(fn($product) => [
            'name' => $product['name'],
            'quantity' => $product['quantity'],
            'unit_amount' => $product['price'],
        ], $products);

        

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->withoutVerifying()->post($url, [
            'reference_id' => uniqid(),
            'items' => $items,
        ]);

        

        if ($response->successful()) {
            Transaction::create([
                'quantity' => $products[0]['quantity'],
                'date' => now(),
                'price' => $products[0]['price'],
                'product_id' => $products[0]['id'],
                'buyer_id' => logged_user()->id,
            ]); 
            
            
            $pay_link = data_get($response->json(),'links.1.href');
            return redirect()->away($pay_link);
        }

        return redirect()->route('paymentError');
    }
}
