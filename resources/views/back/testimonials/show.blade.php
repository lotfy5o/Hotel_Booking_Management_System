@extends('back.master')

@section('title', __('keywords.show_testimonial'))
@section('content')

@csrf
<div class="row">
    <div class="col-md-12 d-flex justify-content-center">

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="name">{{__('keywords.name')}}</label>
                <p class="form-control">{{ $testimonial->name }}</p>

                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="position">{{__('keywords.position')}}</label>
                <p class="form-control">{{ $testimonial->position }}</p>

                @error('position')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>

</div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="image">{{__('keywords.image')}}</label>
                <div>
                    <img src="{{ asset('storage') }}/testimonials/{{ $testimonial->image }}" alt="..." width="250px">
                </div>

                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">

        <div class="col-md-8">
            <div class="form-group mb-3">
                <label for="description">{{__('keywords.description')}}</label>
                <p class="form-control">{{ $testimonial->description }}</p>

                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>


@endsection
