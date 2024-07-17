<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::name('front.')->group(function () {
    Route::view('/', 'front.index')->name('index');
    Route::view('/about', 'front.about')->name('about');
    Route::view('/contact', 'front.contact')->name('contact');
    Route::view('/service', 'front.service')->name('service');
    Route::view('/rooms', 'front.rooms')->name('rooms');
});

Route::name('admin.')->prefix(LaravelLocalization::setLocale() . '/admin')->middleware([
    'localeSessionRedirect',
    'localizationRedirect',
    'localeViewPath'

])->group(function () {

    Route::middleware('auth')->group(function () {
        Route::view('/', 'admin.index')->name('index');

        /// Hotels///
        Route::resource('hotels', HotelController::class);

        /// Rooms ///
        Route::resource('rooms', RoomController::class);
    });

    require __DIR__ . '/auth.php';
});
