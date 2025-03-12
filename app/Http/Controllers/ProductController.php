<?php

namespace App\Http\Controllers;

use App\Http\Middleware\auth_admin;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use function view;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (logged_admin()) {
            $products = Product::paginate(10); 
        } else {
            $products = Product::where('user_id', logged_user()->id)->paginate(10); 
        }

            return view('admin.productTable', compact('products'));
    }


    public function search(Request $request)
    {
        $search = $request->input('query');
        $categoryId = $request->input('category');

        $query = Product::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        if (!empty($categoryId)) {
            $query->where('category', $categoryId);
        }

        $products = $query->paginate(8);

        $categories = Product::select('category')->distinct()->pluck('category');


        return view('user.landingPage', compact('products', 'categories'));
    }


    public function show(Product $product)
    {

        return view('user.productView', compact('product'));
    }

    public function paymentError()
    {
        return view('user.paymentError');
    }


    public function edit(Product $product)
    {
        return view('admin.updateProduct', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->except('image');


        $product->update($data);

        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('profiles', 'public');

            $product->image = $imagePath;
            $product->save();
        }

        return redirect()->route('editProductProfile', $product->id);
    }

    public function viewCreateProfile()
    {
        return view('admin.createProduct');
    }

    public function store(Request $request) 
{
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profiles', 'public');
    } else {
        $imagePath = null;
    }
    
    Product::create([
        'name'       => $request->name,
        'image'      => $imagePath,
        'description'=> $request->description,
        'price'      => $request->price,
        'quantity'   => $request->quantity,
        'category'   => $request->category,
        'user_id'    => logged_user() || logged_admin(),
    ]);
    
    return redirect()->route('productIndex');
}

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

}
