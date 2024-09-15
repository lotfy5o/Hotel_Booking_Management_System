<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index(Request $request)
    {

        $bookings = Booking::paginate(1);

        if (count($bookings) > 0) {
            if ($bookings->total() > $bookings->perPage()) {
                $data = [
                    'record' => BookingResource::collection($bookings),

                    'pagination links' => [
                        'total' => $bookings->total(),
                        'per page' => $bookings->perPage(),
                        'current page' => $bookings->currentPage(),
                        'links' => [
                            'prev' => $bookings->previousPageUrl(),
                            'first' => $bookings->url(1),
                            'second' => $bookings->url(2),
                            'third' => $bookings->url(3),
                            'next' => $bookings->nextPageUrl(),
                            'last' => $bookings->url($bookings->lastPage()),
                        ],
                    ],
                ];
            } else {
                $data = BookingResource::collection($bookings);
            }
            return ApiResponse::sendResponse(200, 'bookings Retrieved Successfully', $data);
        }
        return ApiResponse::sendResponse(200, 'No bookings Available', []);
    }


    public function create(Request $request, $room_id)
    {

        $validator = Validator::make($request->all(), [
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ], [], [
            'check_in' => __('keywords.check_in'),
            'check_out' => __('keywords.check_out'),
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Validation Error', $validator->errors());
        }

        $checkIn = Carbon::parse($request->input('check_in'));
        $checkOut = Carbon::parse($request->input('check_out'));

        $days = $checkIn->diffInDays($checkOut);

        $formattedCheckIn = $checkIn->format('Y-m-d');
        $formattedCheckOut = $checkOut->format('Y-m-d');

        // if I got the price through the id of the room not the Room model.
        // I tested that with postman it didn't work with Room Model.
        $roomPrice = Room::where('id', $room_id)->value('price');
        $totalPrice = $roomPrice * $days;

        $hotel_id = Room::where('id', $room_id)->value('hotel_id');

        // $totalPrice = $room->price * $days;





        $booking = Booking::create([

            "full_name" => $request->user()->name,
            "email" => $request->user()->email,
            "price" => $totalPrice,
            "days" => $days,
            "check_in" => $formattedCheckIn,
            "check_out" => $formattedCheckOut,
            "status" => "booked",
            "user_id" => $request->user()->id,
            // I can't use $room object, I must use a variable user_id
            // "room_id" => $room->id,
            "room_id" => $room_id,

            "hotel_id" => $hotel_id

        ]);

        if ($booking) {
            return ApiResponse::sendResponse(200, 'You Booked the Room Successfully', new BookingResource($booking));
        }
    }

    public function delete(Request $request, $booking_id)
    {
        $booking = Booking::findOrFail($booking_id);

        if ($booking->user_id != $request->user()->id) {
            return ApiResponse::sendResponse(403, 'You Don\'t have Authorization for this Action', []);
        }

        $success = $booking->delete();
        return ApiResponse::sendResponse(200, 'Your Booking Deleted Successfully', []);
    }
}
