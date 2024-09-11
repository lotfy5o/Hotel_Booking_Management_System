<?php

use App\Http\Controllers\Api\AmenityController;
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
Route::get('/rooms/{hotel_id}', RoomController::class);

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
