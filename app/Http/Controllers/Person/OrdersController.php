<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function orders()
    {
        $orders = Auth::user()->orders()->active()->paginate(10);
        return view('auth.orders.dashboard', compact('orders'));
    }

    public function show(Order $order)
    {
        if (Auth::user()->orders->contains($order)) {
            $products = $order->products()->withTrashed()->get();
            return view('auth.orders.show', compact('order', 'products'));
        } else {
            return redirect()->back();
        }

    }

}
