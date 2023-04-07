<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }

    public function orderConfirm(Request $request)
    {
        if ((new Basket())->saveOrder($request)) {
            session()->flash('success', 'Ваше замовлення чекає підтвердження.');
            Order::eraseOrderSum();
        } else {
            session()->flash('warning', 'Помилка.');
            return redirect()->route('order');
        }
        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $basket = new Basket();
        $order = $basket->getOrder();
        if(!$basket->countAvailable()){
            session()-> flash('warning', 'Нажаль товар:  в такій кількості недоступний.' );
            return redirect()->route('basket');
        }
        return view('order', compact('order'));
    }

    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);
        if($result){
            session()->flash('success', 'Додано товар: ' . $product->title . '.');
        }else{
            session()->flash('warning', 'Нажаль товар: ' . $product->title . ' в більшій кількості недоступний.' );
        }
        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);
        session()->flash('warning', 'Товар ' . $product->title . ' вилучено з кошика.');
        return redirect()->route('basket');
    }
}
