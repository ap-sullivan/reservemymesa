<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

     public function store(Request $request)
    {
    $validated = $request->validate([
            'restaurant_id'     => 'required|exists:restaurants,restaurant_id',
            'reservation_date'  => 'required|date',
            'reservation_time'  => 'required',
            'pax_count'         => 'required|integer|min:1|max:10',
            'requests'          => 'nullable|string',
        ]);

        Reservation::create([
            'restaurant_id'    => $validated['restaurant_id'],
            'customer_id'      => Auth::id(),
            'reservation_date' => $validated['reservation_date'],
            'reservation_time' => $validated['reservation_time'],
            'pax_count'        => $validated['pax_count'],
            'requests'         => $validated['requests'] ?? null,
        ]);

     return redirect()
    ->route('reservations.confirmation')
    ->with('success', 'Your reservation has been confirmed!');
}


}
