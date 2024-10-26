@extends('front.master')

@section('login-active', 'active')

@section('content')

@include('front.partials.hero-auth')

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-middle" style="margin-left: 397px;">


            <div class="col-md-6 mt-5">
                {{-- Session Status --}}

                <form action="{{ route('password.store') }}" class="appointment-form" style="margin-top: -568px;"
                    method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <h3 class="mb-3">Reset Password</h3>
                    <div class="mb-2">Enter Your New Password</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    value="{{ $request->email }}">
                                <x-input-error :messages=" $errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <x-input-error :messages=" $errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    name="password_confirmation">
                                <x-input-error :messages=" $errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-4">Reset Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
