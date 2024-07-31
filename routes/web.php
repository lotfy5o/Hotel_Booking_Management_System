<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
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
/* Front Routes */

Route::name('front.')->controller(FrontController::class)->group(function () {
    //=========================HOME PAGE
    // Route::post('subscriber/store', 'subscriberStore')->name('subscriber.store');
    Route::get('/', 'index')->name('index');

    //=========================ABOUT PAGE
    Route::get('/about', 'about')->name('about');

    //=========================SERVICE PAGE
    Route::get('/service', 'service')->name('service');

    //=========================CONTACT PAGE
    Route::post('contact/store', 'contactStore')->name('contact.store');
    Route::get('/contact', 'contact')->name('contact');

    //=========================ROOMS PAGE
    Route::get('/rooms', 'rooms')->name('rooms');
});
require __DIR__ . '/auth.php';



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
