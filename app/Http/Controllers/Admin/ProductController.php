<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('auth.products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        if($request->has('image')) {
            $path = $request->file('image')->store('products');
            $params = $request->all();
            $params['image'] = $path;
            Product::create($params);
        }else{
            Product::create($request->all());
        }
        session()->flash('success', 'Товар ' . $request->title . ' було створено');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('auth.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('auth.products.form', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        if($request->has('image')){
            if($product->image) {
                Storage::delete($product->image);
            }
            $path = $request->file('image')->store('products');
            $params = $request->all();
            $params['image'] = $path;
            $product->update($params);

        }else {
            $product->update($request->all());
        }
        session()->flash('success', 'Товар ' . $request->title . ' було змінено');
        return redirect()->route('products.index');
    }

    /**
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        session()->flash('success', 'Товар ' . $product->title . ' був видален.');
        return redirect()->route('products.index');
    }
}
