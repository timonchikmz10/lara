<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::get();
        $categories = Category::get();
        return view('auth.products.form', compact('categories', 'properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $sumCount = 0;
        if($request->has('image')) {
            $params = $request->all();
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }else{
            $params = $request->all();
        }
        if($request->sale_price == null) {
            $params['sale_price'] = 0;
        }
        $product = Product::create($params);
        if($request->properties){
            foreach ($request->properties as $key => $property){
                $sumCount += $request->quantity[$key];
                $product->productProperties()->create([
                    'product_id' => $product->id,
                    'property_id' => $property,
                    'property_count' => $request->quantity[$key] ?? 0
                ]);
            }
        }
        $product->update(['count' => $sumCount]);
        if($files = $request->file('thumbnails')){
            foreach($files as $file){
                $path = $file->store('products');
                $product->thumbnails()->create(['image' => $path]);
            }
        }
        session()->flash('success', config('constants.ProductCreate') . $request->title);
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
        $product = Product::with('productProperties')->where('id', $product->id)->first();
        $properties = Property::get();
        return view('auth.products.form', compact('categories', 'product', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $sumCount = 0;
        $params = $request->all();
        if($request->has('image')){
            if($product->image) {
                Storage::delete($product->image);
            }
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }
        foreach (['hit', 'recommended', 'new'] as $fieldName) {
            if (!isset($params[$fieldName])) {
                $params[$fieldName] = 0;
            }
        }
        foreach ($request->properties as $key => $property){
            $sumCount += $request->quantity[$key];
            if($product->productProperties()->where('property_id', $property)->first()){
                $product->productProperties()->where('property_id', $property)->update([
                    'property_count' => $request->quantity[$key] ?? 0]);
            }else{
                $product->productProperties()->create([
                    'product_id' => $product->id,
                    'property_id' => $property,
                    'property_count' => $request->quantity[$key] ?? 0
                ]);
            }
            foreach($product->productProperties()->get() as $productProperty){
                if(!in_array( $productProperty->property_id, $request->properties)){
                    $product->productProperties()->where('property_id', $productProperty->property_id)->delete();
                }
            }
        }
        $params['count'] = $sumCount;
        $product->update($params);

        if($files = $request->file('thumbnails')){
            foreach($product->thumbnails()->get() as $thumbnail){
                Storage::delete($thumbnail->image);
            }
            $product->thumbnails()->delete();
            foreach($files as $file){
                $path = $file->store('products');
                $product->thumbnails()->create(['image' => $path]);
            }
        }
        session()->flash('success', config('constants.ProductEdit') . $request->title);
        return redirect()->route('products.index');
    }

    /**
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', config('constants.ProductDelete') . $request->title);
        return redirect()->route('products.index');
    }
}
