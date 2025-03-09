<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function view;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::paginate(8);
    
         if (Auth::guard('admin')->check()) {
             return view('admin.productTable', compact('products'));
         }
        
        return view('user.landingPage', compact('products'));
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


public function show(Product $product){ 

    return view('user.productView', compact('product'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
