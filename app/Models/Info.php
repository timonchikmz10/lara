<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = "info";

    protected $fillable = [
        'email',
        'second_email',
        'phone',
        'second_phone',
        'address',
        'short_description',
        'description',
        'privacy_policy',
        'instagram',
        'twitter',
        'facebook',
        'image'
    ];
    use HasFactory;
}
