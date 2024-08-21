@extends('back.master')

@section('title', __('keywords.edit_room'))

@section('content')
<form action="{{ route('back.rooms.update', ['room' => $room]) }}" method="post" enctype="multipart/form-data">

    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">

                <x-form-label title="name"></x-form-label>

                <input type="text" name="name" class="form-control" placeholder="{{__('keywords.name')}}"
                    value="{{ $room->name }}">

                <x-validation-error field="name"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="image"></x-form-label>
                <input type="file" name="image" class="form-control-file" value="{{ $room->image }}">

                <x-validation-error field="image"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="view"></x-form-label>
                <input type="text" name="view" class="form-control" placeholder="{{__('keywords.view')}}"
                    value="{{ $room->view }}">

                <x-validation-error field="view"></x-validation-error>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="price"></x-form-label>
                <input type="number" name="price" class="form-control" placeholder="{{__('keywords.price')}}"
                    value="{{ $room->price }}">

                <x-validation-error field="price"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="num_persons"></x-form-label>
                <input type="number" name="num_persons" class="form-control" value="{{ $room->num_persons }}"
                    placeholder="{{__('keywords.num_persons')}}">

                <x-validation-error field="num_persons"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="num_beds"></x-form-label>
                <input type="number" name="num_beds" class="form-control" placeholder="{{__('keywords.num_beds')}}"
                    value="{{ $room->num_beds }}">

                <x-validation-error field="num_beds"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="size"></x-form-label>
                <input type="number" name="size" class="form-control" placeholder="{{__('keywords.size')}}"
                    value="{{ $room->size }}">

                <x-validation-error field="size"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <x-form-label title="hotel_id"></x-form-label>
            <select name="hotel_id" id="" class="form-control">
                <option value="">
                    Select Hotel....
                </option>

                @forelse ($hotels as $hotel )
                <option value="{{ $hotel->id }}">

                    {{ $hotel->name }}
                </option>

                @empty

                @endforelse
            </select>

            <x-validation-error field="hotel_id"></x-validation-error>
        </div>





    </div>
    <button type="submit" class="btn btn-primary">{{__('keywords.submit')}}</button>
</form>
@endsection
