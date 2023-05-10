<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Property;
use Daaner\NovaPoshta\Models\Address;
use Daaner\NovaPoshta\Models\InternetDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        $properties = Property::get();
        return view('basket', compact('order', 'properties'));
    }

    public function orderConfirm(String $cityTitle, String $warehouseTitle, String $cost,  Request $request)
    {
        $params = ['delivery_cost' => intval($cost), 'city' => $cityTitle, 'warehouse' => $warehouseTitle];
//        $params['city'] =
        if ((new Basket())->saveOrder($request, $params)) {
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
            session()->flash('warning',  config('constants.CountUnavailable'));
            return redirect()->route('basket');
        }
        return view('order', compact('order',));
    }

    public function basketAdd(Product $product, Request $request)
    {
        $property_id = $request->property_id;
        $product = Product::with('productProperties')->where('id', $product->id)->first();
        $result = (new Basket(true))->addProduct($product, $request->count != null ? $request->count : 1, $property_id);
        if ($result) {
            session()->flash('success', $product->title . config('constants.BasketAdd.success'));
            return redirect()->route('basket');
        } else {
            session()->flash('warning', $product->title . config('constants.BasketAdd.warning'));
            return redirect()->back();
        }
    }

    public function orderCity(Request $request)
    {
        $adr = new Address;
        $cities = $adr->getSettlements($request->city);
        return view('city', compact('cities'));
    }

    public function orderWarehouse(String $city, String $cityTitle)
    {
        $adr = new Address;
//        $adr->filterBicycleParking();
        $adr->filterPostFinance();
        $adr->setLimit(12);
        $warehouses = $adr->getWarehouseSettlements($city);
        return view('warehouse', compact('warehouses', 'city' ,'cityTitle'));
    }

    public function orderInfo(String $city, String $cityTitle , String $warehouseTitle)
    {
        $intDoc = new InternetDocument;
        $CityRecipient = $city;
        $basket = new Basket();
        $order = $basket->getOrder();
        $intDoc->setWeight($order->orderWeight());
        $intDoc->setCost($order->calculateFullSum());
        $forecast = $intDoc->getDocumentPrice(config('constants.CitySender'), $CityRecipient);
        return view('order_confirm', compact('order', 'forecast', 'cityTitle', 'warehouseTitle'));
    }


    public function basketRemove(Product $product, Request $request)
    {
        $property_id = $request->property_id;
        (new Basket())->removeProduct($product, $property_id);
        session()->flash('warning', $product->title . config('constants.BasketRemove'));
        return redirect()->route('basket');
    }
}
