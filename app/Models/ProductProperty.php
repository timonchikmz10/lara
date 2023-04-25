<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $table = 'product_property';
    protected $fillable = ['product_id', 'property_id', 'property_count'];
    use HasFactory;
}
