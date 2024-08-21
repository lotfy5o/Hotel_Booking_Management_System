@extends('back.master')

@section('title', __('keywords.change_status'))

@section('content')
<form action="{{ route('back.bookings.update', ['booking' => $booking]) }}" method="post" enctype="multipart/form-data">
    <h5 class="h5-page-title mb-4">{{__('keywords.change_status')}}</h5>
    <h6 class="h6-page-title">Current Status: {{ $booking->status }}</h6>


    @method('PUT')
    @csrf
    <div class="row">


        <div class="col-md-4">
            <select name="status" id="" class="form-control">
                <option value="" disabled selected>
                    Select Status....
                </option>

                <option value="Available" style="color: rgb(18, 215, 18)">Available</option>
                <option value="Booked" style="color: red">Booked</option>


            </select>

            <x-validation-error field="status"></x-validation-error>
        </div>





    </div>
    <button type="submit" class="btn btn-primary mt-2">{{__('keywords.submit')}}</button>
</form>
@endsection
