<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
//use App\Models\Category;
//use App\Models\Product;
//use Illuminate\Http\Request;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function orders()
    {
            $orders = Order::where('status', 1)->get();
            return view('dashboard', compact('orders'));

    }
}
