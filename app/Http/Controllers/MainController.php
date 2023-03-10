<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function shop()
    {
        return view('shop');
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

    public function product($product = null)
    {
        return view('product', ['product' => $product]);
    }

    public function checkout()
    {
        return view('checkout');
    }
}
