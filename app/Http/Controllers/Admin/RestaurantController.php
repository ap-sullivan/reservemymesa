<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller {


    // controller for creating a new restaurant as admin
        public function create()
    {
        return view('admin.addRestaurant');
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:128',
            'house_number' => 'nullable|string|max:16',
            'address_line_1' => 'required|string|max:128',
            'address_line_2' => 'nullable|string|max:128',
            'city' => 'required|string|max:64',
            'postcode' => 'required|string|max:16',
            'description' => 'required|string|max:1000',
            'email' => 'required|email|unique:restaurants,email',
            'phone' => 'nullable|string|max:20',
            'main_contact' => 'nullable|string|max:128',
        ]);

        Restaurant::create($validated);

        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant added!');
    }


}
