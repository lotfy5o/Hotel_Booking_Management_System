@extends('front.master')

@section('pageName', 'About Us')

@section('about-active', 'active')

@section('content')

@include('front.partials.hero')

@include('front.partials.services')

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
                    @forelse ($testimonials as $testimonial )
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img"
                                style="background-image: url({{ asset('storage') }}/testimonials/{{ $testimonial->image }})">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>{{$testimonial->description}}</p>
                                <p class="name">{{ $testimonial->name }}</p>
                                <span class="position">{{ $testimonial->position }}</span>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse


                </div>
            </div>
        </div>
    </div>
</section>

@include('front.partials.services-plus-recommended')

@endsection
