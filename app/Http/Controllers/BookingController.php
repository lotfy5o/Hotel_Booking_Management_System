<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::paginate(config('pagination.count'));
        return view('back.bookings.index', get_defined_vars());
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('back.bookings.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $data = $request->validated();


        $booking->update($data);
        return to_route('back.bookings.index')->with('success', __('keywords.booking_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return to_route('back.bookings.index')->with('success', __('keywords.booking_deleted_successfully'));
    }
}
