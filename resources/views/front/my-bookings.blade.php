@extends('front.master')

@section('content')
<table class="table table-hover">
    <h2 class="mx-2 text-center">My Bookings</h2>
    <!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
    <thead>
        <tr>
            <th>{{ __('keywords.id') }}</th>
            <th>{{ __('keywords.email') }}</th>
            <th>{{ __('keywords.name') }}</th>
            <th>{{ __('keywords.check_in') }}</th>
            <th>{{ __('keywords.check_out') }}</th>
            <th>{{ __('keywords.days') }}</th>
            <th>{{ __('keywords.price') }}</th>
            <th>{{ __('keywords.room_name') }}</th>
            <th>{{ __('keywords.hotel_name') }}</th>
            {{-- <th>{{ __('keywords.actions') }}</th> --}}
        </tr>
    </thead>
    <tbody>
        @forelse ($bookings as $booking)
        <tr>
            <td>{{ $bookings->firstItem() + $loop->index }}</td>
            <td>{{ $booking->email }}</td>

            <td>{{ $booking->full_name }}</td>
            <td>{{ $booking->check_in }}</td>
            <td>{{ $booking->check_out }}</td>
            <td>{{ $booking->days }}</td>
            <td>{{ $booking->price }}</td>
            <td>{{ $booking->room->name }}</td>
            <td>{{ $booking->hotel->name }}</td>
            {{-- <td>
                <a href="{{ route('admin.bookings.show', ['booking' => $booking]) }}" class="btn mb-2 btn-success">{{
                    __('keywords.show_button') }}</a>
                <a href="{{ route('admin.bookings.edit', ['booking' => $booking]) }}" class="btn mb-2 btn-warning">{{
                    __('keywords.edit_button') }}</a>

                <x-delete-button href="{{ route('admin.bookings.show', ['booking' => $booking]) }}"
                    id="{{ $booking->id }}">
                </x-delete-button>
            </td> --}}
        </tr>

        @empty

        <x-empty-alert></x-empty-alert>

        @endforelse

    </tbody>

</table>
@endsection
