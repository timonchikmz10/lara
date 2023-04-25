<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'title',
        'new',
        'hit',
        'recommended',
        'category_id',
        'color_id',
        'size_id',
        'price',
        'sale_price',
        'short_description',
        'description',
        'image',
        'count',
        'weight',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class);
    }

//    public function properties()
//    {
//        return $this->belongsToMany(Property::class)
//            ->withTimestamps()
//            ->withPivot(['property_count']);
//    }

    public function isAvailable()
    {
        return !$this->trashed() && $this->count > 0;
    }

    public function priceForCount()
    {
        if ($this->sale_price == 0) {
            return $this->pivot->count * $this->price;
        } else {
            return $this->pivot->count * $this->sale_price;
        }
    }

    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeRecommended($query)
    {
        return $query->where('recommended', 1);
    }

    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendedAttribute($value)
    {
        $this->attributes['recommended'] = $value === 'on' ? 1 : 0;
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isRecommended()
    {
        return $this->recommended === 1;
    }


    use HasFactory;
}
