@extends('back.master')

@section('title', __('keywords.show_amenity'))
@section('content')

@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="name">{{__('keywords.name')}}</label>
            <p class="form-control">{{ $amenity->name }}</p>

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="location">{{__('keywords.icon')}}</label>
            <p class="form-control">{{ $amenity->icon }}</p>

            @error('icon')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="description">{{__('keywords.description')}}</label>
            <p class="form-control">{{ $amenity->description }}</p>

            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>



</div>
@endsection
