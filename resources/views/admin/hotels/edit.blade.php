@extends('admin.master')

@section('title', __('keywords.edit_hotel'))
@section('content')
<form action="{{ route('admin.hotels.update', ['hotel' => $hotel]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="name"></x-form-label>
                <input type="text" name="name" class="form-control" placeholder="{{__('keywords.name')}}"
                    value="{{ $hotel->name }}">

                <x-validation-error field="name"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="location"></x-form-label>
                <input type="text" name="location" class="form-control" placeholder="{{__('keywords.location')}}"
                    value="{{ $hotel->location }}">

                <x-validation-error field="location"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="image"></x-form-label>
                <input type="file" name="image" class="form-control-file" value="{{ $hotel->image }}">

                <x-validation-error field="image"></x-validation-error>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group mb-3">
                <x-form-label title="description"></x-form-label>
                <textarea type="text" name="description" class="form-control"
                    placeholder="{{__('keywords.description')}}">{{ $hotel->description }}</textarea>

                <x-validation-error field="description"></x-validation-error>
            </div>
        </div>



    </div>
    <button type="submit" class="btn btn-primary">{{__('keywords.submit')}}</button>
</form>
@endsection
