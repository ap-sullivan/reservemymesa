<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::where('trading', true)->get();
        $restaurants = Restaurant::all();
        return view('welcome', compact('restaurants'));
    }

}
