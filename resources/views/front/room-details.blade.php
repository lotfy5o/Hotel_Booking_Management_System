@extends('front.master')


@section('content')

@include('front.partials.hero-single-room')

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <form action="{{ route('front.roomBooking', ['room' => $room]) }}" class="appointment-form"
                    style="margin-top: -568px;" method="POST">
                    @csrf
                    <h3 class="mb-1">Book this room</h3>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- <p>{{ Auth::user()->email }}</p> --}}
                                <x-form-label title="email"></x-form-label>
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    value="{{ Auth::user()->email }}" disabled>
                                {{-- <x-validation-error field="email"></x-validation-error> --}}
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- <p>{{ Auth::user()->name }}</p> --}}
                                <x-form-label title="room_name"></x-form-label>
                                <input type="text" class="form-control" placeholder="Full Name" name="room_name"
                                    value="{{ $room->name }}" disabled>

                                {{-- <x-validation-error field="full_name"></x-validation-error> --}}

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- <p>{{ Auth::user()->name }}</p> --}}
                                <x-form-label title="hotel_name"></x-form-label>
                                <input type="text" class="form-control" placeholder="Full Name" name="hotel_name"
                                    value="{{ $room->hotel->name }}" disabled>

                                {{-- <x-validation-error field="full_name"></x-validation-error> --}}

                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date-check-in"
                                        placeholder="Check-In" name="check_in">
                                    <x-validation-error field="check_in"></x-validation-error>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" class="form-control appointment_date-check-out"
                                    placeholder="Check-Out" name="check_out">
                                <x-validation-error field="check_out"></x-validation-error>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                {{-- <p>{{ Auth::user()->name }}</p> --}}
                                <input type="hidden" class="form-control" placeholder="Full Name" name="full_name"
                                    value="{{ Auth::user()->name }}" disabled>

                                {{-- <x-validation-error field="full_name"></x-validation-error> --}}

                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-4">Book
                                    and Pay Now</button>


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
