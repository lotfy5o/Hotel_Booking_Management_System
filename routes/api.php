<?php

use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\SettingController;
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
