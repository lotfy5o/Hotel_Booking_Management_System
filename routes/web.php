<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\BackHomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
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

    //=========================SUBSCIBER_Footer PAGE
    Route::post('subscriber/store', 'subscriberStore')->name('subscriber.store');

    //=========================ROOMS PAGE
    Route::get('/rooms', 'rooms')->name('rooms');

    Route::get('/rooms/{room}', 'roomDetails')->name('roomDetail')->middleware('auth');
    Route::post('/rooms/{room}/book', 'roomBooking')->name('roomBooking')->middleware('auth');
    Route::get('/{hotel}/rooms', 'hotelRooms')->name('hotelRooms');

    Route::get('/bookings', 'bookings')->name('bookings')->middleware('auth');
});
require __DIR__ . '/auth.php';

Route::middleware('check.price')->group(function () {
    Route::get('/payment/', [PaymentController::class, 'show'])->name('payment.show');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
});



Route::name('back.')->prefix(LaravelLocalization::setLocale() . '/back')->middleware([
    'localeSessionRedirect',
    'localizationRedirect',
    'localeViewPath'

])->group(function () {

    Route::middleware('admin')->group(function () {

        Route::get('/', BackHomeController::class)->name('index');

        /// Admins///
        Route::resource('admins', AdminController::class);

        /// Users///
        Route::resource('users', UserController::class)->except('edit', 'update');

        /// Roles///
        Route::resource('roles', RoleController::class);

        /// Hotels///
        Route::resource('hotels', HotelController::class);

        /// Rooms ///
        Route::resource('rooms', RoomController::class);

        /// Bookings ///
        Route::resource('bookings', BookingController::class);

        /// Services ///
        Route::resource('services', ServiceController::class);

        /// Amenities ///
        Route::resource('amenities', AmenityController::class);

        /// testimonials ///
        Route::resource('testimonials', TestimonialController::class);

        /// subscribers ///
        Route::resource('subscribers', SubscriberController::class);

        /// Contact Us ///
        Route::resource('messages', ContactController::class);

        /// Settings ///
        Route::resource('settings', SettingController::class)->only('index', 'update');
    });

    require __DIR__ . '/adminAuth.php';
});
