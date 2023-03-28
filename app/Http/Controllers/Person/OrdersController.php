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
        $orders = Auth::user()->orders()->where('status', 1)->get();
        return view('auth.orders.dashboard', compact('orders'));
    }

    public function show(Order $order)
    {
        if (Auth::user()->orders->contains($order)) {
            return view('auth.orders.show', compact('order'));
        } else {
            return redirect()->back();
        }

    }

}
