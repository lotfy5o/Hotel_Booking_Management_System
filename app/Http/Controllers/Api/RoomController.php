<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResrouce;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request, $hotel_id)
    {
        $rooms = Room::where('hotel_id', $hotel_id)->get();

        if (count($rooms) > 0) {
            return ApiResponse::sendResponse(200, 'Your Rooms Retrieved Successfully', RoomResrouce::collection($rooms));
        }

        return ApiResponse::sendResponse(200, 'No Rooms for this Hotel', []);
    }

    public function roomDetails($room_id)
    {

        $room = Room::where('id', $room_id)->get();

        if (count($room) > 0) {
            return ApiResponse::sendResponse(200, 'Your Room Retrived Successfully', RoomResrouce::collection($room));
        }

        return ApiResponse::sendResponse(200, 'No Room Found', []);
    }
}
