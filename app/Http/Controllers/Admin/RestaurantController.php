<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use App\Models\Cuisine;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{


    // ? passing slugs to URL to view reservation page
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();

        return view('restaurant.reservation', compact('restaurant'));
    }


    //? controller for creating a new restaurant as admin

    public function create()
{
    $cuisines = Cuisine::all();
    return view('admin.addRestaurant', compact('cuisines'));
}




    //? validating form data on submit/store to db
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:128',
            'slug' => ['required', 'string', 'max:64', 'regex:/^[a-z0-9-]+$/'],
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

        // ? create variable to link to restaurant id
        $restaurant = Restaurant::create($validated);


        //?  then store image and reference path, names, type and and restaurant id as fk in db
        if ($request->hasFile('path')) {
            $file = $request->file('path');

            // dd($request->file('path'));

            $upload = new ImageUpload;
            $upload->mime_type = $file->getMimeType();
            $upload->original_name = $file->getClientOriginalName();
           $upload->path = $file->store('uploads', 'public');
            $upload->restaurant_id = $restaurant->restaurant_id;
            $upload->save();
        }
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant added!');
    }

    // !!!  EDITING

        //? show all on page
    public function index()
    {
       $restaurants = Restaurant::all();

    return view('admin.viewRestaurants', compact('restaurants'));

    }

         //? controller for editing a restaurant as admin

    public function edit($id)
{
    $restaurant = Restaurant::findOrFail($id);
    $cuisines = Cuisine::all();
    return view('admin.editRestaurant', compact('restaurant', 'cuisines'));
}


//  ? Updating/submitting the updated restauarnt
public function update(Request $request, $id)
{
    $restaurant = Restaurant::findOrFail($id);

    // Validate incoming form data
    $validated = $request->validate([
        'name' => 'required|string|max:128',
        'slug' => ['required', 'string', 'max:64', 'regex:/^[a-z0-9-]+$/'],
        'house_number' => 'nullable|string|max:16',
        'address_line_1' => 'required|string|max:128',
        'address_line_2' => 'nullable|string|max:128',
        'city' => 'required|string|max:64',
        'postcode' => 'required|string|max:16',
        'description' => 'required|string|max:1000',
        'cuisine_type' => 'required|string|max:128',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'main_contact' => 'nullable|string|max:128',
    ]);


    $restaurant->update($validated);

    // update image if new one added
    if ($request->hasFile('path')) {
        $file = $request->file('path');

        $upload = new ImageUpload;
        $upload->mime_type = $file->getMimeType();
        $upload->original_name = $file->getClientOriginalName();
        $upload->path = $file->store('uploads', 'public');
        $upload->restaurant_id = $restaurant->restaurant_id;
        $upload->save();
    }

    return redirect()
        ->route('admin.restaurants.index')
        ->with('success', 'Restaurant updated successfully.');
}



}
