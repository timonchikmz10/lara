<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('basket', compact('order'));
        }
//        else {
//            session()->flash('warning', 'Спочатку додайте товары до кошика');
//            return redirect()->route('shop');
//        }

    }

    public function orderConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            session()->flash('warning', 'Спочатку додайте товары до кошика.');
            return redirect()->route('shop');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request);
        if ($success) {
            session()->flash('success', 'Ваше замовлення чекає підтвердження.');
        } else {
            session()->flash('warning', 'Помилка');
            return redirect()->route('basket/order');
        }
        return redirect()->route('index');

    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            session()->flash('warning', 'Спочатку додайте товары до кошика.');
            return redirect()->route('shop');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }
        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }
        $product = Product::find($productId);
        session()->flash('success', 'Додано товар: ' . $product->title . '.');
        return redirect()->route('basket');
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        $order = Order::find($orderId);
        $product = Product::find($productId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
                    session()->flash('warning', 'Товар ' . $product->title .  ' вилучено з кошика. Додайте нові товари.');
                    return redirect()->route('shop');
            } else {
                $pivotRow->count--;
                $pivotRow->update();
                session()->flash('warning', 'Товар ' . $product->title .' вилучено з кошика.');
            }
        }
        return redirect()->route('basket');

    }
}
