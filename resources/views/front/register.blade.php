@extends('front.master')

@section('content')

<div class="col-lg-8">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-2 d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-m-5 p-4">
                    <h3 class="mb-4">Register</h3>
                    <div id="form-message-warning" class="mb-4"></div>

                    <form action="{{ route('register') }}" method="POST" id="registerForm" name="contactForm"
                        class="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" ">
                                    <x-input-error :messages=" $errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label class="label" for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email">
                                    <x-input-error :messages=" $errors->get('email')" class="mt-2" />

                                </div>
                            </div>

                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password">
                                    <x-input-error :messages=" $errors->get('password')" class="mt-2" />

                                </div>
                            </div>

                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label class="label" for="password_confirmation">Confirm Password
                                    </label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" placeholder="Confirm Password">
                                    <x-input-error :messages=" $errors->get('password_confirmation')" class="mt-2" />

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <a class="mx-3 text-primary" href="{{ route('login')}}">Already Registered?</a>
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection