@extends('back.master')

@section('title', __('keywords.bookings'))

@section('content')
<!-- simple table -->
<div class="col-sm-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.bookings')}}</h5>

            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.check_in') }}</th>
                        <th>{{ __('keywords.check_out') }}</th>
                        {{-- <th>{{ __('keywords.email') }}</th> --}}
                        <th>{{ __('keywords.name') }}</th>
                        <th>{{ __('keywords.hotel_name') }}</th>
                        <th>{{ __('keywords.room_name') }}</th>
                        {{-- <th>{{ __('keywords.price') }}</th> --}}
                        <th>{{ __('keywords.payment') }}</th>
                        <th>{{ __('keywords.status') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                    <tr>
                        <td>{{ $bookings->firstItem() + $loop->index }}</td>
                        <td>{{ $booking->check_in }}</td>
                        <td>{{ $booking->check_out }}</td>

                        {{-- <td>{{ $booking->email }}</td> --}}
                        <td>{{ $booking->full_name}}</td>
                        <td>{{ $booking->hotel->name }}</td>
                        <td>{{ $booking->room->name }}</td>
                        <td>${{ $booking->room->price }}</td>
                        {{-- <td>{{ $booking->price }}</td> --}}
                        @if ($booking->status == 'Available')
                        <td style="color: rgb(18, 215, 18)">{{ $booking->status }}</td>

                        @else
                        <td style="color: red">{{ $booking->status }}</td>

                        @endif

                        <td>

                            <a href="{{ route('back.bookings.edit', ['booking' => $booking]) }}"
                                class="btn mb-2 btn-warning w-100">{{
                                __('keywords.change_status') }}</a>

                            <form action="{{ route('back.bookings.show', ['booking' => $booking]) }}" method="post"
                                id="deleteForm-{{ $booking->id }}" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn mb-2  btn-danger w-100"
                                    onclick="confirmDelete({{ $booking->id }})">
                                    {{ __('keywords.delete_button') }}
                                </button>
                            </form>


                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $bookings->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
