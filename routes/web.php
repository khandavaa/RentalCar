<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
|
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect to login if not authenticated
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/check', function () {
    dd(auth()->user());
});

// Frontend routes (public routes)
Route::get('daftar-mobil', [\App\Http\Controllers\Frontend\CarController::class, 'show'])->name('car.show');
Route::post('daftar-mobil', [\App\Http\Controllers\Frontend\CarController::class, 'store'])->name('car.store');
Route::get('blog', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{blog:slug}', [\App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');
Route::get('tentang-kami', [\App\Http\Controllers\Frontend\AboutController::class, 'index']);
Route::get('kontak', [\App\Http\Controllers\Frontend\ContactController::class, 'index']);
Route::post('kontak', [\App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('contact.store');

// User profile and update routes
Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// Home route after login
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
Route::group(['middleware' => ['auth', 'is_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Define the profile show route for admin
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::resource('types', \App\Http\Controllers\Admin\TypeController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)->only(['index', 'store', 'update']);
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index', 'destroy']);
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index', 'destroy']);
    Route::post('bookings/{booking}/checklist', [\App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('bookings.checklist');
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
});

// User routes
Route::group(['middleware' => ['auth', 'is_user'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // Bookings route for users
    Route::get('bookings', [\App\Http\Controllers\Admin\BookingController::class, 'index'])->name('user.bookings.index');

    

    // Other user routes
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
});

// Register the default authentication routes
Auth::routes();
