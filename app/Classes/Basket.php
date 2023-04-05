<?php

namespace App\Classes;
use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    }
    protected function getPivot($product){
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    }
    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }
    public function countAvailable($updateCount = false){
        foreach ($this->order->products as $product){
            if ($product->count < $this->getPivot($product)->count) {
                return false;
            }
            if($updateCount){
                $product->count -= $this->getPivot($product)->count;
            }
        }
        if($updateCount){
            $this->order->products->map->save();
        }
        return true;
    }
    public function saveOrder($request){
        if(!$this->countAvailable(true)){
            return false;
        }
        Mail::to(Auth::user()->email)->send(new OrderCreated($request->name, $this->getOrder()));
        $this->order->saveOrder($request);
        return true;
    }
    public function removeProduct(Product $product){
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivot($product);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
                session()->flash('warning', 'Товар ' . $product->title . ' вилучено з кошика. Додайте нові товари.');
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        Order::changeFullSum($product, '-');
    }
    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivot($product);
            $pivotRow->count++;
            if($pivotRow->count > $product->count){
                return false;
            }
            $pivotRow->update();
        } else {
            if($product->count == 0){
                return false;
            }
            $this->order->products()->attach($product->id);
        }
        Order::changeFullSum($product, '+');
        return true;
    }
}
