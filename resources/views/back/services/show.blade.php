@extends('back.master')

@section('title', __('keywords.show_service'))
@section('content')

@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="name">{{__('keywords.name')}}</label>
            <p class="form-control">{{ $service->name }}</p>

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="image">{{__('keywords.image')}}</label>
            <div>
                <img src="{{ asset('storage') }}/services/{{ $service->image }}" alt="..." width="50px">
            </div>

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="description">{{__('keywords.description')}}</label>
            <p class="form-control">{{ $service->description }}</p>

            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>



</div>
@endsection
