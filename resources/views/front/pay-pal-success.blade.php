@extends('front.master')


@section('content')

<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('assets-front') }}/images/room-1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate">
                <h2 class="text-white">You Booked This Room Successfully</h2>
                <a href="{{ route('front.index') }}" class="btn btn-primary">Home</a>
            </div>
        </div>
    </div>
</div>

@endsection

@php
// I destroyed the session here cause I couldn't do it in the success()
// or the middleware will unauthorize me.
Illuminate\Support\Facades\Session::forget('price');
Illuminate\Support\Facades\Session::forget('booking_id');
@endphp
