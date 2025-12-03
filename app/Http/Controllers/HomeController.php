<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // check restaurants that are trading == truie
        $query = Restaurant::where('trading', true);

        // cuisine filter
        if ($request->filled('cuisine')) {
            $query->where('cuisine_type', $request->cuisine);
        }

        //  city filter
        if ($request->filled('city')) {
            $query->Where('city', $request->city);
        }

        // Fetch all restaurants
        $restaurants = $query->get();

        // Dropdown lists (distinct values)
        $cuisines = Restaurant::where('trading', true)
            ->select('cuisine_type')
            ->distinct()
            ->pluck('cuisine_type');

        $cities = Restaurant::where('trading', true)
            ->select('city')
            ->distinct()
            ->pluck('city');

        return view('welcome', compact('restaurants', 'cuisines', 'cities'));
    }
}
