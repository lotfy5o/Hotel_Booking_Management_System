@extends('back.master')

@section('title', __('keywords.show_hotel'))
@section('content')

@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="name">{{__('keywords.name')}}</label>
            <p class="form-control">{{ $hotel->name }}</p>

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="location">{{__('keywords.location')}}</label>
            <p class="form-control">{{ $hotel->location }}</p>

            @error('location')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image">{{__('keywords.image')}}</label>
            <div>
                <img src="{{ asset('storage') }}/hotels/{{ $hotel->image }}" alt="..." width="50px">
            </div>

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="description">{{__('keywords.description')}}</label>
            <p class="form-control">{{ $hotel->description }}</p>

            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>



</div>
@endsection
