<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreSubscriberRequest $request)
    {
        $data = $request->validated();

        $record = Subscriber::create($data);

        if ($record) {
            return ApiResponse::sendResponse(200, "You Subscribed Successfully", []);
        }
    }
}
