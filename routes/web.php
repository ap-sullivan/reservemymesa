<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RestaurantController;


//? route to home page

Route::get('/', [HomeController::class, 'index'])->name('home');


//?  route for restuarnat slug names

Route::get('/restaurants/{slug}', [RestaurantController::class, 'show'])
    ->name('restaurants.reservation');


//? admin route for adding and storing a new restaurant page

Route::get('admin/create', [RestaurantController::class, 'create'])
    ->name('admin.restaurants.create');

    Route::post('admin/create', [RestaurantController::class, 'store'])
    ->name('admin.restaurants.store');


//? admin route for editing a restaurant page

Route::get('/admin/restaurants', [RestaurantController::class, 'index'])
    ->name('admin.restaurants.index');


Route::get('/admin/restaurants/{id}/edit', [RestaurantController::class, 'edit'])
    ->name('admin.restaurants.edit');


    // Route::post('admin/edit', [RestaurantController::class, 'store'])
    // ->name('admin.restaurants.store');


//? admin route for dashbord when logged in

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
