@extends('back.master')

@section('title', __('keywords.edit_admin'))
@section('content')
<form action="{{ route('back.admins.update', ['admin' => $admin]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="name"></x-form-label>
                <input type="text" name="name" class="form-control" placeholder="{{__('keywords.name')}}"
                    value="{{ $admin->name }}">

                <x-validation-error field="name"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="email"></x-form-label>
                <input type="text" name="email" class="form-control" placeholder="{{__('keywords.email')}}"
                    value="{{ $admin->email }}">

                <x-validation-error field="email"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="password"></x-form-label>
                <input type="password" name="password" class="form-control" placeholder="{{__('keywords.password')}}">

                <x-validation-error field="password"></x-validation-error>
            </div>
        </div>



        {{-- <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="image"></x-form-label>
                <input type="file" name="image" class="form-control-file" value="{{ $admin->image }}">

                <x-validation-error field="image"></x-validation-error>
            </div>
        </div> --}}





    </div>
    <button type="submit" class="btn btn-primary">{{__('keywords.submit')}}</button>
</form>
@endsection
