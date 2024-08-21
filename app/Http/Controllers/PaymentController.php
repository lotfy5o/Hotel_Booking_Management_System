<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function show()
    {
        return view('front.pay-pal');
    }

    public function success(Request $request)
    {

        return view('front.pay-pal-success');
    }

    public function cancel(Request $request)
    {
        // Handle canceled payment
        // You might want to show a message or revert changes
        return view('payment_cancel');
    }
}
