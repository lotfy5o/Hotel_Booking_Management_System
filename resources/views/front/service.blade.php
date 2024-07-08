@extends('front.master')

@section('pageName', 'Services')

@section('service-active', 'active')

@section('content')

@include('front.partials.hero')

@include('front.partials.features')

<section class="ftco-section bg-light ftco-no-pt">
    <div class="container">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Amenities</h2>
            </div>
        </div>
        <div class="row">
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-diet"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Tea Coffee</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-workout"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Hot Showers</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-diet-1"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Laundry</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Air Conditioning</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Free Wifi</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Kitchen</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Ironing</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Lovkers</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection