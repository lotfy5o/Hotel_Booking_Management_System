<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreContactRequest $request)
    {
        $data = $request->validated();
        $record = Contact::create($data);

        if ($record) {
            return ApiResponse::sendResponse(200, 'Your Data Sent Successfully', []);
        }
    }
}
