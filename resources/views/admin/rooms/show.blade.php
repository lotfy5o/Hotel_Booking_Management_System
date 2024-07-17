@extends('admin.master')

@section('title', __('keywords.show_room'))

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">

            <x-form-label title="name"></x-form-label>

            <p class="form-control">{{ $room->name }}</p>

            <x-validation-error field="name"></x-validation-error>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <x-form-label title="view"></x-form-label>
            <p class="form-control">{{ $room->view }}</p>

            <x-validation-error field="view"></x-validation-error>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <x-form-label title="price"></x-form-label>
            <p class="form-control">$ {{ $room->price }}</p>

            <x-validation-error field="price"></x-validation-error>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <x-form-label title="num_persons"></x-form-label>
            <p class="form-control">{{ $room->num_persons }}</p>

            <x-validation-error field="num_persons"></x-validation-error>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <x-form-label title="num_beds"></x-form-label>
            <p class="form-control">{{ $room->num_beds }}</p>

            <x-validation-error field="num_beds"></x-validation-error>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <x-form-label title="size"></x-form-label>
            <p class="form-control">{{ $room->size }} m<sup>2</sup></p>

            <x-validation-error field="size"></x-validation-error>
        </div>
    </div>

    <div class="col-md-4">
        <x-form-label title="hotel_id"></x-form-label>
        <p class="form-control">{{ $room->hotel->name }}</p>

        <x-validation-error field="hotel_id"></x-validation-error>
    </div>

    <div class="col-md-8">
        <div class="form-group mb-3">
            <x-form-label title="image"></x-form-label>
            <div>
                <img src="{{ asset('storage') }}/rooms/{{ $room->image }}" alt="..." width="300px">
            </div>

            <x-validation-error field="image"></x-validation-error>
        </div>
    </div>





</div>
@endsection
