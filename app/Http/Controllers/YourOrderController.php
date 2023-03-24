<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YourOrderController extends Controller
{
    public function index(){
        if(Auth::user()) {
            $order_list = Order::where('user_id', Auth::id())->where('status', 1)->get();
            return view('orders', compact('order_list'));
        }else{
            return redirect()->route('login');
        }
    }
}
