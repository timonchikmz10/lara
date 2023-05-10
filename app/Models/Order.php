<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('counter', 'color_id')
            ->withTimestamps();
    }

//    public function properties()
//    {
//        return $this->hasManyThrough(Product::class)->withTimeStamps();
//    }
    public function orderWeight(){
        $weight = 0;
        foreach ($this->products as $orderProduct){
            $weight += $orderProduct->weight * $orderProduct->pivot->counter;
        }
        return $weight / 1000;
    }
    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->priceForCount();
        }
        return $sum;
    }

    public static function eraseOrderSum()
    {
        session()->forget('full_order_sum');
    }

    public function basketCount()
    {
        $count = 0;
        foreach ($this->products()->get() as $product) {
            $count += $product->pivot->counter;
        }
        return $count;
    }

    public static function changeFullSum(Product $product, bool $add = true, int $count = 1) : void
    {
        if ($product->sale_price != 0) {
            $value = $product->sale_price;
        } else {
            $value = $product->price;
        }
        if ($add) {
            $sum = self::fullSum() + $value * $count;
        } else {
            $sum = self::fullSum() - $value;
        }
        session(['full_order_sum' => $sum]);
    }

    public static function fullSum()
    {
        return session('full_order_sum', 0);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    public function saveOrder($r, $params)
    {
        if ($this->status == 0) {
            $this->name = $r->name;
            $this->second_name = $r->second_name;
            $this->last_name = $r->last_name;
            $this->zip_code = $r->zip_code;
            $this->weight = $this->orderWeight();
            $this->warehouse = $params['warehouse'];
            $this->delivery_cost = $params['delivery_cost'];
            $this->phone = $r->phone;
            $this->address = $r->address;
            $this->city = $params['city'];
            $this->email = Auth::user()->email;
            $this->notes = $r->notes;
//            $this->order_number = $r->order_number;
            $this->status = 1;
            if (Auth::check()) {
                $this->user_id = Auth::id();
            }
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }
}
