@extends('front.master')

@section('pageName', 'Services')

@section('service-active', 'active')

@section('content')

@include('front.partials.hero')

@include('front.partials.services')

<section class="ftco-section bg-light ftco-no-pt">
    <div class="container">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Amenities</h2>
            </div>
        </div>
        <div class="row">
            @forelse ($amenities as $amenity )
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-{{ $amenity->icon }}"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">{{ $amenity->name }}</h3>
                    <p>{{ $amenity->description }}</p>
                </div>
            </div>
            @empty

            @endforelse


        </div>
    </div>
</section>
@endsection
