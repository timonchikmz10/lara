<?php

namespace App\Models;

use App\Http\Middleware\TrustHosts;
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
        'size',
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function thumbnails()
    {
        return $this->hasMany(Thumbnails::class);
    }

    public function rating()
    {
        $count = 0;
        $result = 0;
        foreach ($this->comments()->get() as $comment) {
            $result += $comment->mark;
            $count++;
        }
        if ($count != 0) {
            return round($result / $count, 1);
        } else {
            return 0;
        }
    }

    public function percentRating($value)
    {
        $count = $this->comments()->where('mark', $value)->count();
        if ($count != 0) {
            return round(100 / ($this->comments()->count() / $count), 0);
        } else {
            return 0;
        }
    }

    public function isAvailable()
    {
        return !$this->trashed() && $this->count > 0;
    }

    public function priceForCount()
    {
        if ($this->sale_price == 0) {
            return $this->pivot->counter * $this->price;
        } else {
            return $this->pivot->counter * $this->sale_price;
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
