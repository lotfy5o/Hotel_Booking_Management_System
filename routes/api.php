<?php

use App\Http\Controllers\Api\AmenityController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
##---------------------------SETTINGS MODULE---------------------##
Route::get('/settings', SettingController::class);

##---------------------------HOTELS MODULE---------------------##
Route::get('/hotels', HotelController::class);

##---------------------------ROOMS MODULE---------------------##
Route::controller(RoomController::class)->group(function () {

    Route::get('/rooms/{hotel_id}', 'index');
    Route::get('/room/{room_id}', 'roomDetails')->middleware('auth:sanctum');
});

##---------------------------MESSAGE  MODULE---------------------##
Route::post('/message', MessageController::class);

##---------------------------SUBSCRIBER  MODULE---------------------##
Route::post('/subscribe', SubscriberController::class);

##---------------------------TESTIMONIAL  MODULE---------------------##
Route::get('/testimonial', TestimonialController::class);

##---------------------------AMENTITY  MODULE---------------------##
Route::get('/amenity', AmenityController::class);

##---------------------------SERVICE  MODULE---------------------##
Route::get('/service', ServiceController::class);

##---------------------------AUTH  MODULE---------------------##
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'destroy')->middleware('auth:sanctum');
});

##---------------------------BOOKING  MODULE---------------------##
Route::prefix('bookings')->controller(BookingController::class)->group(function () {

    Route::get('/', 'index')->middleware('auth:sanctum');

    Route::post('/create/{room_id}', 'create')->middleware('auth:sanctum');

    Route::post('/delete/{booking_id}', 'delete')->middleware('auth:sanctum');
});
