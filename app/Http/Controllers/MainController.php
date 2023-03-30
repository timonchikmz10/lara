<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('index', compact('categories'));
    }

    public function shop(Request $request)
    {
        $categories = Category::get();
        $productsQuery = Product::with('category');
        if ($request->filled('price_min')) {
            $productsQuery->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $productsQuery->where('price', '<=', $request->price_max);
        }
        foreach (['hit', 'recommended', 'new'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field();
            }
        }
        $bl = false;
        foreach ($categories as $category){
            if ($request->has($category->code)){
                $bl = true;
            }
        }
        if($bl) {
            foreach ($categories as $category) {
                if (!$request->has($category->code)) {
                    $productsQuery->where('category_id', '!=', $category->id);
                }
            }
        }
        $products = $productsQuery->Paginate(6)->withPath("?" . $request->getQueryString());
        return view('shop', compact('products', 'categories'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category, $product = null)
    {
        return view('product', ['product' => $product]);
    }


}
