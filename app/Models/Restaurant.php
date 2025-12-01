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
        'name', 'slug', 'cuisine_type', 'house_number', 'address_line_1', 'address_line_2', 'city', 'postcode', 'description', 'email', 'phone', 'main_contact', 'trading'
    ];

    // reference to cuisine type
     public function cuisine()
    {
        return $this->belongsTo(Cuisine::class, 'cuisine_id', 'id');
    }

    // refercne images table
     public function images()
    {
        return $this->hasMany(ImageUpload::class, 'restaurant_id', 'restaurant_id');
    }

    // reference to customer
    public function customer()
{
    return $this->belongsTo(User::class, 'customer_id');
}
}
