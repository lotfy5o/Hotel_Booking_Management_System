<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;

class HotelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $hotesls = Hotel::all();
        if (count($hotesls) > 0) {
            return ApiResponse::sendResponse(200, 'Your Hotels Retreived Successfully', HotelResource::collection($hotesls));
        }

        return ApiResponse::sendResponse(200, 'No Data Found', []);
    }
}
