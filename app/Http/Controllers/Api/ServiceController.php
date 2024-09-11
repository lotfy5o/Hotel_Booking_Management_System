<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $services = Service::paginate(1);

        if (count($services) > 0) {
            if ($services->total() > $services->perPage()) {
                $data = [
                    'record' => ServiceResource::collection($services),

                    'pagination links' => [
                        'total' => $services->total(),
                        'per page' => $services->perPage(),
                        'current page' => $services->currentPage(),
                        'links' => [
                            'prev' => $services->previousPageUrl(),
                            'first' => $services->url(1),
                            'second' => $services->url(2),
                            'third' => $services->url(3),
                            'next' => $services->nextPageUrl(),
                            'last' => $services->url($services->lastPage()),
                        ],
                    ],
                ];
            } else {
                $data = ServiceResource::collection($services);
            }
            return ApiResponse::sendResponse(200, 'services Retrieved Successfully', $data);
        }
        return ApiResponse::sendResponse(200, 'No services Available', []);
    }
}
