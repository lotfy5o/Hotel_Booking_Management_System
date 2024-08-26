<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookingReq;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\FrontStoreBookingReq;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;

class FrontController extends Controller
{

    public function index()
    {
        $hotels = Hotel::paginate(3);
        $rooms = Room::all();
        return view('front.index', get_defined_vars());
    }

    public function about()
    {
        return view('front.about', get_defined_vars());
    }

    public function service()
    {
        return view('front.service', get_defined_vars());
    }

    public function contact()
    {
        return view('front.contact', get_defined_vars());
    }
    public function rooms()
    {
        $rooms = Room::all();
        return view('front.rooms', get_defined_vars());
    }

    public function contactStore(StoreContactRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);
        return to_route('front.contact')->with('success', 'Your Message Sent Successfully');
    }
    public function subscriberStore(StoreSubscriberRequest $request)
    {
        $data = $request->validated();
        Subscriber::create($data);

        return back()->with('success_subscriber', 'You Subscribed Successfully');
    }





    public function hotelRooms(Hotel $hotel)
    {
        $rooms = $hotel->rooms;
        return view('front.hotel-rooms', get_defined_vars());
    }



    public function roomDetails(Room $room)
    {
        return view('front.room-details', get_defined_vars());
    }


    // public function roomBooking(FrontStoreBookingReq $request, Room $room)
    // {
    //     $data = $request->validated();

    //     // Calculate the number of days between check_in and check_out
    //     $checkIn = Carbon::parse($data['check_in']);
    //     $checkOut = Carbon::parse($data['check_out']);
    //     $days = $checkIn->diffInDays($checkOut);


    //     $totalPrice = $room->price * $days;

    //     // Store the calculated price in the session
    //     Session::put('price', $totalPrice);

    //     // Retrieve the price from the session
    //     $finalPrice = Session::get('price');


    //     // Create the booking with the validated data and the final price
    //     $booking = Booking::create([

    //         "full_name" => $request->input('full_name'),
    //         "email" => $request->input('email'),
    //         "price" => $finalPrice,
    //         "days" => $days,  // Use the calculated day,
    //         "check_in" => $request->input('check_in'),
    //         "check_out" => $request->input('check_out'),
    //         "user_id" => Auth::user()->id,
    //         "room_id" => $room->id,
    //         "hotel_id" => $room->hotel->id
    //     ]);


    //     return redirect()->route('payment.show');

    //     // return to_route('payment.show', ['booking' => $booking]);
    // }

    public function roomBooking(Request $request, Room $room)
    {

        $data = $request->validate([
            // the name of the user should come from the user table, as for the email and the phone
            // so I will get them through the Auth facade
            // the disvantages of this method: if the user edited it's data, that won't reflect in the old data
            // inside the bookings table.


            // 'full_name' => 'required|string|max:255',
            // 'email' => 'required|email',
            // 'phone' => 'required|string',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        // $checkIn = Carbon::createFromFormat('m/d/Y', $data['check_in'])->format('Y-m-d');
        // $checkOut = Carbon::createFromFormat('m/d/Y', $data['check_out'])->format('Y-m-d');

        // $checkInDate = Carbon::parse($checkIn);
        // $checkOutDate = Carbon::parse($checkOut);
        // $days = $checkInDate->diffInDays($checkOutDate);

        $checkIn = Carbon::parse($data['check_in']);
        $checkOut = Carbon::parse($data['check_out']);

        $days = $checkIn->diffInDays($checkOut);

        $formattedCheckIn = $checkIn->format('Y-m-d');
        $formattedCheckOut = $checkOut->format('Y-m-d');

        $totalPrice = $room->price * $days;

        // Store the calculated price in the session
        Session::put('price', $totalPrice);

        // Retrieve the price from the session
        $finalPrice = Session::get('price');


        $booking = Booking::create([

            "full_name" => Auth::user()->name,
            "email" => Auth::user()->email,
            "price" => $finalPrice,
            "days" => $days,  // Use the calculated day,
            "check_in" => $formattedCheckIn,
            "check_out" => $formattedCheckOut,
            "status" => "booked",
            "user_id" => Auth::user()->id,
            "room_id" => $room->id,
            "hotel_id" => $room->hotel->id
        ]);

        // Store the booking ID in the session
        Session::put('booking_id', $booking->id);


        return redirect()->route('payment.show', ['booking' => $booking]);
    }

    public function bookings()
    {
        $bookings = Booking::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('front.my-bookings', get_defined_vars());
    }
}
