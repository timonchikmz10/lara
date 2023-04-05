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
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
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

    public static function changeFullSum($product, $character)
    {
        if ($product->sale_price != 0) {
            $value = $product->sale_price;
        } else {
            $value = $product->price;
        }
        if ($character == '+') {
            $sum = self::fullSum() + $value;
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

    public function saveOrder($r)
    {
        if ($this->status == 0) {
            $this->name = $r->name;
            $this->last_name = $r->last_name;
            $this->zip_code = $r->zip_code;
            $this->phone = $r->phone;
            $this->address = $r->address;
            $this->city = $r->city;
            $this->email = Auth::user()->email;
            $this->notes = $r->notes;
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
