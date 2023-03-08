<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function shop(){
        return view('shop');
    }

    public function product($product = null){
        return view('product', ['product'=>$product]);
    }
    public function test($category, $product = 0){
        if($product == 0){
            return view('categories');
        }else{
            return view('product', ['product'=>$product]);
        }
}
}
