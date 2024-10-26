@extends('front.master')

@section('login-active', 'active')

@section('content')

@include('front.partials.hero-auth')

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-middle" style="margin-left: 397px;">


            <div class="col-md-6 mt-5">
                <div class="appointment-form">


                    @csrf
                    <h3 class="mb-3">Verify Your Email</h3>
                    @if (session('success'))
                    <div class="mb-4 text-success">
                        {{ __('A verification link has been sent.') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">

                            @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 text-success">
                                {{ __('A new verification link has been sent to the email address you provided during
                                registration.') }}
                            </div>
                            @endif

                            <div class="form-group">
                                <form action="{{ route('verification.send') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary py-3 px-4">Resend Verification
                                                Email</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-12">

                            <div class="form-group">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary py-3 px-4">Logout</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</section>
@endsection
