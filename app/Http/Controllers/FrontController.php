<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Hotel;

class FrontController extends Controller
{

    public function index()
    {
        $hotels = Hotel::paginate(config('pagination.count'));
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
        return view('front.rooms', get_defined_vars());
    }

    public function roomDetails(Room $room)
    {

        return view('front.room-details', get_defined_vars());
    }


    public function contactStore(StoreContactRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);
        return to_route('front.contact')->with('success', 'Your Message Sent Successfully');
    }
}
