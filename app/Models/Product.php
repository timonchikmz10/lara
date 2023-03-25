<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function get_category(){
//        $category = Category::find($this->category_id);
//        return $category->title;
//    }
    protected $fillable =['code', 'title', 'new', 'category_id', 'price', 'sale_price', 'short_description', 'description', 'image'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function priceForCount(){
        return $this->pivot->count * $this->price;
    }
    use HasFactory;
}
