<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // it will give one record per page. If I have 4 records in my database the total = 4 pages.
        $testimonials = Testimonial::paginate(1);

        if (count($testimonials) > 0) {
            if ($testimonials->total() > $testimonials->perPage()) {
                $data = [
                    'record' => TestimonialResource::collection($testimonials),

                    'pageination links' => [
                        'current page' => $testimonials->currentPage(),
                        'per page' => $testimonials->perPage(),
                        'total' => $testimonials->total(),
                        'links' => [
                            'prev' => $testimonials->previousPageUrl(),
                            'first' => $testimonials->url(1),
                            'second' => $testimonials->url(2),
                            'third' => $testimonials->url(3),
                            'next' => $testimonials->nextPageUrl(),
                            'last' => $testimonials->url($testimonials->lastPage()),
                        ],
                    ],
                ];
            } else {
                $data = TestimonialResource::collection($testimonials);
            }

            return ApiResponse::sendResponse(200, "Testimonials Retrieved Successfully", $data);
        }

        return ApiResponse::sendResponse(200, 'No Testimonials Available', []);
    }
}
