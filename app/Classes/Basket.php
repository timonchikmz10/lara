<?php

namespace App\Classes;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductProperty;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Type\Integer;

class Basket
{
    protected $order;

    public function __construct($createOrder = false)
    {
        $orderId = session('orderId');
        if (is_null($orderId) && $createOrder) {
            $data = [];
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }
            $this->order = Order::create($data);
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::findOrFail($orderId);
        }
        $count = $this->order->basketCount();
        session(['count' => $count]);
    }

    protected function getPivot($product, Int $property_id)
    {
//        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
//        return $this->order->products()->wherePivot('color_id', '=', $property_id)->first()->pivot;
        return OrderProduct::where('order_id', $this->order->id)->where('product_id', $product->id)->where('color_id',
            $property_id)->first();
    }


    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function countAvailable(Bool $updateCount = false)
    {
        foreach ($this->order->products as $product) {
            $productMain = Product::where('id', $product->pivot->product_id )->first();
            $productPropertyCount = ProductProperty::where('product_id', $product->pivot->product_id)->where('property_id', $product->pivot->color_id )->first()->property_count;
            if ($product->pivot->counter > $productPropertyCount) {
                return false;
            }
            if ($updateCount) {
                $productMain->update(['count' => $productMain->count - $product->pivot->counter ]);
                $productMain->productProperties()
                    ->where('property_id', $product->pivot->color_id)
                    ->update(['property_count' => $productPropertyCount - $product->pivot->counter]);
            }
        }
        if ($updateCount) {
            $this->order->products->map->save();
        }
        return true;
    }

    public function saveOrder($request, Array $params)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }
        Mail::to(Auth::user()->email)->send(new OrderCreated($request->name, $this->getOrder()));
        $this->order->saveOrder($request, $params);
        return true;
    }

    public function removeProduct(Product $product, int $property_id)
    {
        $sess = session('count');
        $pivotRow = $this->getPivot($product, $property_id);
        if ($pivotRow->counter == 1) {
            $pivotRow->delete();
            if ($sess == 1) {
                session(['count' => 0]);
            }
            session()->flash('warning', 'Товар ' . $product->title . ' вилучено з кошика. Додайте нові товари.');
        } else {
            $pivotRow->counter--;
            $pivotRow->update();
        }
        Order::changeFullSum($product, false);
    }

    public function addProduct(Product $product, int $count = 1, int $property_id)
    {
        if ($this->order->products()->wherePivot('color_id', '=', $property_id)->exists()) {
            $counter = OrderProduct::where('order_id', $this->order->id)
                ->where('product_id', $product->id)
                ->where('color_id', $property_id)->first();
            if ($counter->counter > $product->productProperties()->where('property_id',
                    $property_id)->first()->property_count) {
                return false;
            }
            $counter->counter += $count;
            $counter->update();
        } else {
            if ($product->count == 0 || $count > ProductProperty::where('property_id', $property_id)->where('product_id', $product->id)->first()->property_count) {
                return false;
            }
            $this->order->products()->attach($product->id, ['color_id' => $property_id, 'counter' => $count]);
        }
        Order::changeFullSum($product, true, $count);
        return true;
    }
}
