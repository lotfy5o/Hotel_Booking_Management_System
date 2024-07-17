@extends('admin.master')

@section('title', __('keywords.add_room'))

@section('content')
<form action="{{ route('admin.rooms.store') }}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">

                <x-form-label title="name"></x-form-label>

                <input type="text" name="name" class="form-control" placeholder="{{__('keywords.name')}}">

                <x-validation-error field="name"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="image"></x-form-label>
                <input type="file" name="image" class="form-control-file">

                <x-validation-error field="image"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="view"></x-form-label>
                <input type="text" name="view" class="form-control" placeholder="{{__('keywords.view')}}">

                <x-validation-error field="view"></x-validation-error>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="price"></x-form-label>
                <input type="number" name="price" class="form-control" placeholder="{{__('keywords.price')}}">

                <x-validation-error field="price"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="num_persons"></x-form-label>
                <input type="number" name="num_persons" class="form-control"
                    placeholder="{{__('keywords.num_persons')}}">

                <x-validation-error field="num_persons"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="num_beds"></x-form-label>
                <input type="number" name="num_beds" class="form-control" placeholder="{{__('keywords.num_beds')}}">

                <x-validation-error field="num_beds"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="size"></x-form-label>
                <input type="number" name="size" class="form-control" placeholder="{{__('keywords.size')}}">

                <x-validation-error field="size"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
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
