<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'rgb_code',
        'count'
    ];

    public function products()
    {
        $this->belongsTo(Product::class);
    }

}
