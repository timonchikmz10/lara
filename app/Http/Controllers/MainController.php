<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $data[] = ['categories'];
        $newProducts = Product::where('new', 1)->get();
        $recommendedProducts = Product::where('recommended', 1)->get();
        $hitProducts = Product::where('hit', 1)->get();
        if (count($recommendedProducts) > 0) {
            $data[] = ['recommendedProducts'];
        }
        if (count($newProducts) > 0) {
            $data[] = ['newProducts'];
        }
        if (count($hitProducts) > 0) {
            $data[] = ['hitProducts'];
        }
        return view('index', compact($data));
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
        foreach ($categories as $category) {
            if ($request->has($category->code)) {
                $bl = true;
            }
        }
        if ($bl) {
            foreach ($categories as $category) {
                if (!$request->has($category->code)) {
                    $productsQuery->where('category_id', '!=', $category->id);
                }
            }
        }
        $productsQuery->where('title', 'LIKE', "%{$request->search}%");
        $products = $productsQuery->Paginate(6)->withPath("?" . $request->getQueryString());
        session()->flashInput($request->input());
        return view('shop', compact('products', 'categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category, $productCode)
    {
        $product = Product::withTrashed('category')->where('code', $productCode)->firstOrFail();
        $products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
        return view('product', compact('product', 'products'));
    }

    public function subscribe(Request $request, Product $product)
    {
        $email = Auth::user()->email;
        Subscription::create([
            'email' => $email,
            'product_id' => $product->id,
        ]);
        session()->flash('success',
            'Дякуємо за очікування, ми зробимо все можливе, щоб цей товар повернувся на полиці нашого магазину, очікуйте повідомлення на ' . $email);
        return redirect()->back();
    }


}
