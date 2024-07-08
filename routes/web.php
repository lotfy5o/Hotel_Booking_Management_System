<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::view('/registerAuth', 'front.register')->name('registerAuth');
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::view('/login', 'admin.auth.login')->name('login');
});


require __DIR__ . '/auth.php';
