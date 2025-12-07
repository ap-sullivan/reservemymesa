<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $primaryKey = 'reservation_id';


    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'restaurant_id',
        'customer_id',
        'reservation_date',
        'reservation_time',
        'pax_count',
        'requests',
    ];

    protected $casts = [
        'reservation_date' => 'date',
        'reservation_time' => 'datetime:H:i',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // A reservation belongs to a restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    // A reservation belongs to a customer
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
