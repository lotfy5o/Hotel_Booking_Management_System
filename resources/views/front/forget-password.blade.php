@extends('front.master')

@section('login-active', 'active')

@section('content')

@include('front.partials.hero-auth')

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-middle" style="margin-left: 397px;">


            <div class="col-md-6 mt-5">
                <form action="{{ route('password.email') }}" class="appointment-form" style="margin-top: -568px;"
                    method="post">
                    @csrf
                    <h3 class="mb-3">Forgot Password?</h3>
                    <div class="mb-2">Enter Your Email and we will send you a reset link</div>
                    <div class="row">
                        <div class="col-md-12">

                            {{-- Email Address --}}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <x-input-error :messages=" $errors->get('email')" class="mt-2" />
                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-4">Send Reset Link</button>
                            </div>
                        </div>
                    </div>

                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                </form>
            </div>
        </div>
    </div>
</section>
@endsection
