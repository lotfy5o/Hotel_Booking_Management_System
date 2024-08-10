@extends('front.master')


@section('content')

@include('front.partials.hero-single-room')

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <form action="#" class="appointment-form" style="margin-top: -568px;">
                    <h3 class="mb-3">Book this room</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date-check-in"
                                        placeholder="Check-In">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" class="form-control appointment_date-check-out"
                                    placeholder="Check-Out">
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Book and Pay Now" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
