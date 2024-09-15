@extends('back.master')

@section('title', __('keywords.show_message'))
@section('content')

@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="name">{{__('keywords.name')}}</label>
            <p class="form-control">{{ $message->name }}</p>

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>



    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="subject">{{__('keywords.subject')}}</label>
            <p class="form-control">{{ $message->subject }}</p>

            @error('subject')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="email">{{__('keywords.email')}}</label>
            <p class="form-control">{{ $message->email }}</p>

            @error('email')
            <span class="text-danger">{{ $email }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="message">{{__('keywords.message')}}</label>
            <p class="form-control">{{ $message->message }}</p>

            @error('message')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>





</div>


@endsection