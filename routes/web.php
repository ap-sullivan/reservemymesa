<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ReservationController;



//? route to home page

Route::get('/', [HomeController::class, 'index'])->name('home');


//?  route for restuarnat slug names

Route::get('/restaurants/{slug}', [RestaurantController::class, 'show'])
    ->name('restaurants.reservation');


//? admin route for adding and storing a new restaurant page

Route::get('admin/create', [RestaurantController::class, 'create'])
    ->name('admin.restaurants.create')
    ->middleware(['auth', AdminMiddleware::class]);


Route::post('admin/create', [RestaurantController::class, 'store'])
    ->name('admin.restaurants.store')
    ->middleware(['auth', AdminMiddleware::class]);


//? admin route for editing and updating a restaurant page

Route::get('/admin/restaurants', [RestaurantController::class, 'index'])
    ->name('admin.restaurants.index')
    ->middleware(['auth', AdminMiddleware::class]);

Route::get('/admin/restaurants/{id}/edit', [RestaurantController::class, 'edit'])
    ->name('admin.restaurants.edit')
    ->middleware(['auth', AdminMiddleware::class]);

Route::put('/admin/restaurants/{id}', [RestaurantController::class, 'update'])
    ->name('admin.restaurants.update')
    ->middleware(['auth', AdminMiddleware::class]);

// ? admin route for deleting a restuarant
Route::delete('/admin/restaurants/{id}', [RestaurantController::class, 'destroy'])
    ->name('admin.restaurants.destroy')
    ->middleware(['auth', AdminMiddleware::class]);


// ? Reservations route

Route::middleware('auth', 'verified')->post('/reservations', [ReservationController::class, 'store'])
    ->name('reservations.store');

// ? reservation confirmation route
Route::get('/reservation/confirmation', function () {
    return view('restaurant.confirmation');
})->name('reservations.confirmation');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/test', function () {
    return view('test');
});
