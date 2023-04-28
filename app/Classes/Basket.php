<?php

namespace App\Classes;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
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

    protected function getPivot($product, $property_id)
    {
//        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
        return $this->order->products()->wherePivot('color_id', '=', $property_id)->first()->pivot;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function countAvailable($updateCount = false)
    {
        foreach ($this->order->products as $product) {
            if ($product->count < $this->getPivot($product)->count) {
                return false;
            }
            if ($updateCount) {
                $product->count -= $this->getPivot($product)->count;
            }
        }
        if ($updateCount) {
            $this->order->products->map->save();
        }
        return true;
    }

    public function saveOrder($request)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }
        Mail::to(Auth::user()->email)->send(new OrderCreated($request->name, $this->getOrder()));
        $this->order->saveOrder($request);
        return true;
    }

    public function removeProduct(Product $product)
    {
        $sess = session('count');
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivot($product);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
                if ($sess == 1) {
                    session(['count' => 0]);
                }
                session()->flash('warning', 'Товар ' . $product->title . ' вилучено з кошика. Додайте нові товари.');
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        Order::changeFullSum($product, false);
    }

    public function addProduct(Product $product, int $count = 1, int $property_id)
    {
        if ($this->order->products()->wherePivot('color_id', '=', $property_id)->exists()) {
            $counter = OrderProduct::where('order_id', $this->order->id)->where('product_id', $product->id)->where('color_id', $property_id)->first();
            if ($counter->counter > $product->productProperties()->where('property_id',
                    $property_id)->first()->property_count) {
                return false;
            }
            $counter->counter += $count;
            $counter->update();
        } else {
            if ($product->count == 0 || $count > $product->count) {
                return false;
            }
            $this->order->products()->attach($product->id, ['color_id' => $property_id, 'counter' => $count]);
        }
        Order::changeFullSum($product, true, $count);
        return true;
    }
}
