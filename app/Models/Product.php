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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    use HasFactory;
}
