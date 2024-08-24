@extends('back.master')

@section('title', __('keywords.show_admin'))
@section('content')

@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="name">{{__('keywords.name')}}</label>
            <p class="form-control">{{ $admin->name }}</p>

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="location">{{__('keywords.location')}}</label>
            <p class="form-control">{{ $admin->email }}</p>

            @error('location')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    {{-- <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image">{{__('keywords.image')}}</label>
            <div>
                <img src="{{ asset('storage') }}/admins/{{ $admin->image }}" alt="..." width="50px">
            </div>

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div> --}}





</div>
@endsection
