@extends('back.master')

@section('title', __('keywords.add_testimonial'))

@section('content')
<form action="{{ route('back.testimonials.store') }}" method="post" enctype="multipart/form-data">

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
                <x-form-label title="position"></x-form-label>
                <input type="text" name="position" class="form-control" placeholder="{{__('keywords.position')}}">

                <x-validation-error field="position"></x-validation-error>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <x-form-label title="image"></x-form-label>
                <input type="file" name="image" class="form-control-file">

                <x-validation-error field="image"></x-validation-error>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group mb-3">
                <x-form-label title="description"></x-form-label>
                <textarea type="text" name="description" class="form-control"
                    placeholder="{{__('keywords.description')}}"></textarea>

                <x-validation-error field="description"></x-validation-error>
            </div>
        </div>



    </div>
    <button type="submit" class="btn btn-primary">{{__('keywords.submit')}}</button>
</form>
@endsection
