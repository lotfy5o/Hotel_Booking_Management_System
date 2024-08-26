@extends('back.master')

@section('title', __('keywords.edit_settings'))
@section('content')
<form action="{{ route('back.settings.update', ['setting' => $setting]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="name"></x-form-label>
                <input type="text" name="address" class="form-control" placeholder="{{__('keywords.address')}}"
                    value="{{ $setting->address }}">

                <x-validation-error field="address"></x-validation-error>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="phone"></x-form-label>
                <input type="text" name="phone" class="form-control" placeholder="{{__('keywords.phone')}}"
                    value="{{ $setting->phone }}">

                <x-validation-error field="phone"></x-validation-error>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="email"></x-form-label>
                <input type="text" name="email" class="form-control" placeholder="{{__('keywords.email')}}"
                    value="{{ $setting->email }}">

                <x-validation-error field="email"></x-validation-error>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="twitter"></x-form-label>
                <input type="url" name="twitter" class="form-control" placeholder="{{__('keywords.twitter')}}"
                    value="{{ $setting->twitter }}">

                <x-validation-error field="twitter"></x-validation-error>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="website"></x-form-label>
                <input type="url" name="website" class="form-control" placeholder="{{__('keywords.website')}}"
                    value="{{ $setting->website }}">

                <x-validation-error field="website"></x-validation-error>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="dribbble"></x-form-label>
                <input type="url" name="dribbble" class="form-control" placeholder="{{__('keywords.dribbble')}}"
                    value="{{ $setting->dribbble }}">

                <x-validation-error field="dribbble"></x-validation-error>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="instagram"></x-form-label>
                <input type="url" name="instagram" class="form-control" placeholder="{{__('keywords.instagram')}}"
                    value="{{ $setting->instagram }}">

                <x-validation-error field="instagram"></x-validation-error>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="facebook"></x-form-label>
                <input type="url" name="facebook" class="form-control" placeholder="{{__('keywords.facebook')}}"
                    value="{{ $setting->facebook }}">

                <x-validation-error field="facebook"></x-validation-error>
            </div>
        </div>



    </div>
    <button type="submit" class="btn btn-primary">{{__('keywords.submit')}}</button>
</form>
@endsection
