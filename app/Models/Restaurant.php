<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;

    protected $primaryKey = 'restaurant_id';

    protected $fillable = [
        'name', 'slug', 'house_number', 'address_line_1', 'address_line_2', 'city', 'postcode', 'description', 'email', 'phone', 'main_contact', 'trading'
    ];

    // create slug automaticaly
     protected static function booted()
    {
        static::creating(function ($restaurant) {
            $restaurant->slug = Str::slug($restaurant->name);
        });
    }

}
