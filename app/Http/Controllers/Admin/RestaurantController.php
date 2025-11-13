<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{


    // controller for creating a new restaurant as admin
    public function create()
    {
        return view('admin.addRestaurant');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:128',
            'slug' => 'required|string|max:64',
            'house_number' => 'nullable|string|max:16',
            'address_line_1' => 'required|string|max:128',
            'address_line_2' => 'nullable|string|max:128',
            'city' => 'required|string|max:64',
            'postcode' => 'required|string|max:16',
            'description' => 'required|string|max:1000',
            'cuisine_type' => 'required|string|max:128',
            'email' => 'required|email|unique:restaurants,email',
            'phone' => 'nullable|string|max:20',
            'main_contact' => 'nullable|string|max:128',
        ]);

     $restaurant = Restaurant::create($validated);



        if ($request->hasFile('path')) {
            $file = $request->file('path');

            $upload = new ImageUpload;
            $upload->mime_type= $file->getMimeType();
            $upload->original_name = $file->getClientOriginalName();
            $upload->path = $file->store('uploads');
            $upload->restaurant_id = $restaurant->restaurant_id; // link to restaurant
            $upload->save();
        }
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant added!');
    }
}
