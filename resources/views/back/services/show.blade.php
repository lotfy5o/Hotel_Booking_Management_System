@extends('back.master')

@section('title', __('keywords.show_service'))
@section('content')

@csrf
<div class="row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="name">{{__('keywords.name')}}</label>
            <p class="form-control">{{ $service->name }}</p>

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image">{{__('keywords.image')}}</label>
            <div>
                <img src="{{ asset('storage') }}/services/{{ $service->image }}" alt="..." width="350px">
            </div>

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<div class="row d-flex justify-content-center">
    <div class="col-md-8">

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
