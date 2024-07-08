@extends('front.master')

@section('pageName', 'About Us')

@section('about-active', 'active')

@section('content')

@include('front.partials.hero')

@include('front.partials.features')

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Happy Clients &amp; Feedbacks</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img"
                                style="background-image: url({{ asset('assets-front') }}/images/person_1.jpg)">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Racky Henderson</p>
                                <span class="position">Father</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img"
                                style="background-image: url({{ asset('assets-front') }}/images/person_2.jpg)">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Henry Dee</p>
                                <span class="position">Businesswoman</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img"
                                style="background-image: url({{ asset('assets-front') }}/images/person_3.jpg)">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Mark Huff</p>
                                <span class="position">Businesswoman</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img"
                                style="background-image: url({{ asset('assets-front') }}/images/person_4.jpg)">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Rodel Golez</p>
                                <span class="position">Businesswoman</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img"
                                style="background-image: url({{ asset('assets-front') }}/images/person_1.jpg)">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Ken Bosh</p>
                                <span class="position">Businesswoman</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('front.partials.services-plus-recommended')

@endsection