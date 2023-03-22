<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    public function fullPrice(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->priceForCount();
        }
        return $sum;
    }
    public function allCount(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->pivot->count;
        }
        return $sum;
    }
    public function saveOrder($r){
        if($this->status == 0) {
            $this->name = $r->first_name;
            $this->last_name = $r->last_name;
            $this->zip_code = $r->zip_code;
            $this->phone = $r->phone;
            $this->address = $r->address;
            $this->country = $r->country;
            $this->city = $r->city;
            $this->email = $r->email;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }else{
            return false;
        }
    }
}
