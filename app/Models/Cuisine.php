<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'cuisine',
        'slug',
    ];


    // A cuisine can have many restaurants
    public function restaurants()
    {
         return $this->hasMany(Restaurant::class, 'cuisine_id', 'id');
    }
}
