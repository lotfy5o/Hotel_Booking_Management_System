@extends('front.master')

@section('login-active', 'active')

@section('content')

@include('front.partials.hero-auth')

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-middle" style="margin-left: 397px;">
            <div class="col-md-6 mt-5">
                <form action="{{ route('login') }}" class="appointment-form" style="margin-top: -568px;" method="post">
                    @csrf
                    <h3 class="mb-3">Login</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <x-input-error :messages=" $errors->get('email')" class="mt-2" />
                            </div>
                        </div>


                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            <a href="{{ route('password.request') }}">
                                <small>Forgot Password?</small>
                            </a>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <x-input-error :messages=" $errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-4">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
