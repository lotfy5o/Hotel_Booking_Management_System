@extends('back.master')

@section('title', __('keywords.add_new'))

@section('content')
<form action="{{ route('back.admins.store') }}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="form-group mb-3">

                <x-form-label title="name"></x-form-label>

                <input type="text" name="name" class="form-control" placeholder="{{__('keywords.name')}}">

                <x-validation-error field="name"></x-validation-error>
            </div>
        </div>
        <div class="w-100"></div> <!-- Break the row -->

        <div class="col-md-4">
            <div class="form-group mb-3">

                <x-form-label title="email"></x-form-label>

                <input type="text" name="email" class="form-control" placeholder="{{__('keywords.email')}}">

                <x-validation-error field="email"></x-validation-error>
            </div>
        </div>
        <div class="w-100"></div> <!-- Break the row -->
        <div class="col-md-4">
            <div class="form-group mb-3">

                <x-form-label title="password"></x-form-label>

                <input type="password" name="password" class="form-control" placeholder="{{__('keywords.password')}}">

                <x-validation-error field="password"></x-validation-error>
            </div>
        </div>






    </div>
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary">{{__('keywords.submit')}}</button>
    </div>
</form>
@endsection
