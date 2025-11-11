<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $primaryKey = 'restaurant_id';

    protected $fillable = [
        'name', 'house_number', 'address_line_1', 'address_line_2', 'city', 'postcode', 'description', 'email', 'phone', 'main_contact', 'trading'
    ];
}
