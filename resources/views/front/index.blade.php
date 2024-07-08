@extends('front.master')

@section('content')
{{-- Hero 01 --}}
<div class="hero-wrap js-fullheight" style="background-image: url({{asset('assets-front')}}/images/image_2.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Welcome to Vacation Rental</h2>
                <h1 class="mb-4">Rent an appartment for your vacation</h1>
                <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact
                        us</a></p>
            </div>
        </div>
    </div>
</div>


{{-- Hotels --}}
<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{asset('assets-front')}}/images/services-1.jpg);">
                    </div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Sheraton</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                        <p>Location: Cairo.</p>
                        <p><a href="rooms.html" class="btn btn-primary">View rooms</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{asset('assets-front')}}/images/image_4.jpg);">
                    </div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">The Plaza Hote</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                        <p>Location: New york.</p>
                        <p><a href="#" class="btn btn-primary">View rooms</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{asset('assets-front')}}/images/image_4.jpg);">
                    </div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">The Ritz</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                        <p>Location: Paris.</p>
                        <p><a href="#" class="btn btn-primary">View rooms</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Rooms --}}
@include('front.partials.room-plus-index')


@include('front.partials.services-plus-recommended')

{{-- Ready section --}}
<section class="ftco-intro" style="background-image: url({{asset('assets-front')}}/images/image_2.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2>Ready to get started</h2>
                <p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line
                    with your questions.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#"
                        class="btn btn-white px-4 py-3">Contact us</a></p>
            </div>
        </div>
    </div>
</section>
@endsection