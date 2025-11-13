<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()

    // ? get all restaurant details if trading == true
    {
        $restaurants = Restaurant::where('trading', true)->get();
        return view('welcome', compact('restaurants'));
    }

}
