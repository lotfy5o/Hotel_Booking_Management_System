@extends('admin.master')

@section('title', __('keywords.edit_hotel'))
@section('content')
<form action="{{ route('admin.hotels.update', ['hotel' => $hotel]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="name">{{__('keywords.name')}}</label>
                <input type="text" name="name" class="form-control" placeholder="{{__('keywords.name')}}"
                    value="{{ $hotel->name }}">

                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="location">{{__('keywords.location')}}</label>
                <input type="text" name="location" class="form-control" placeholder="{{__('keywords.location')}}"
                    value="{{ $hotel->location }}">

                @error('location')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="image">{{__('keywords.image')}}</label>
                <input type="file" name="image" class="form-control-file" value="{{ $hotel->image }}">

                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group mb-3">
                <label for="description">{{__('keywords.description')}}</label>
                <textarea type="text" name="description" class="form-control"
                    placeholder="{{__('keywords.description')}}">{{ $hotel->description }}</textarea>

                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>



    </div>
    <button type="submit" class="btn btn-primary">{{__('keywords.submit')}}</button>
</form>
@endsection
