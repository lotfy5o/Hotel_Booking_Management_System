<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AmenityResource;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $amenities = Amenity::paginate(1);

        if (count($amenities) > 0) {
            if ($amenities->total() > $amenities->perPage()) {
                $data = [
                    'record' => AmenityResource::collection($amenities),

                    'pagination links' => [
                        'total' => $amenities->total(),
                        'per page' => $amenities->perPage(),
                        'current page' => $amenities->currentPage(),
                        'links' => [
                            'prev' => $amenities->previousPageUrl(),
                            'first' => $amenities->url(1),
                            'second' => $amenities->url(2),
                            'third' => $amenities->url(3),
                            'next' => $amenities->nextPageUrl(),
                            'last' => $amenities->url($amenities->lastPage()),
                        ],
                    ],
                ];
            } else {
                $data = AmenityResource::collection($amenities);
            }
            return ApiResponse::sendResponse(200, 'Amenities Retrieved Successfully', $data);
        }
        return ApiResponse::sendResponse(200, 'No Amenities Available', []);
    }
}
