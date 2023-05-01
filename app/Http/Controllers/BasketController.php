<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Property;
use Daaner\NovaPoshta\Models\Address;
use Illuminate\Http\Request;
use Daaner\NovaPoshta\Models\Common;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        $properties = Property::get();
        return view('basket', compact('order', 'properties'));
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
        if (!$basket->countAvailable()) {
            session()->flash('warning', 'Нажаль товар:  в такій кількості недоступний.');
            return redirect()->route('basket');
        }
        return view('order', compact('order',));
    }

    public function basketAdd(Product $product, Request $request)
    {
        $property_id = $request->property_id;
        $product = Product::with('productProperties')->where('id', $product->id)->first();
        $result = (new Basket(true))->addProduct($product, $request->count != null  ? $request->count : 1 , $property_id);
        if ($result) {
            session()->flash('success', 'Додано товар: ' . $product->title . '.');
        } else {
            session()->flash('warning', 'Нажаль товар: ' . $product->title . ' в більшій кількості недоступний.');
        }
        return redirect()->route('basket');
    }

    public function orderCity(Request $request)
    {
        $adr = new Address;
        $cities = $adr->getSettlements($request->city);
        return view('city', compact('cities'));
    }

    public function orderWarehouse($city)
    {
        $adr = new Address;
        $warehouses = $adr->getWarehouseSettlements($city);
        return view('warehouse', compact('warehouses'));
    }

    public function orderInfo($warehouse)
    {
        $basket = new Basket();
        $order = $basket->getOrder();
        $adr = new Address;
        $test = $adr->getCities($warehouse, false);
        return view('order_confirm', compact('test', 'order'));
    }


    public function basketRemove(Product $product, Request $request)
    {
        $property_id = $request->property_id;
        (new Basket())->removeProduct($product, $property_id);
        session()->flash('warning', 'Товар ' . $product->title . ' вилучено з кошика.');
        return redirect()->route('basket');
    }
}
