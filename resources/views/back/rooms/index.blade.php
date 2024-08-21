@extends('back.master')

@section('title', __('keywords.rooms'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.rooms')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.rooms.create') }}" type="create"></x-action-button>
                </div>
            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.name') }}</th>
                        {{-- <th>{{ __('keywords.image') }}</th> --}}
                        <th>{{ __('keywords.view') }}</th>
                        <th>{{ __('keywords.price') }} / per night</th>
                        <th>{{ __('keywords.num_beds') }}</th>
                        <th>{{ __('keywords.size') }}</th>
                        <th>{{ __('keywords.hotel_id') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $room)
                    <tr>
                        <td>{{ $rooms->firstItem() + $loop->index }}</td>
                        <td>{{ $room->name }}</td>
                        {{-- <td>
                            <img src="{{ asset('storage') }}/rooms/{{ $room->image }}" alt="not_found" width="50px">
                        </td> --}}
                        <td>{{ $room->view }}</td>
                        <td width="8%">$ {{ $room->price }}</td>
                        <td width="5%">{{ $room->num_beds }}</td>
                        <td width="10%">{{ $room->size }} m<sup>2</sup></td>
                        <td>{{ $room->hotel->name }}</td>
                        <td>
                            <a href="{{ route('back.rooms.show', ['room' => $room]) }}" class="btn mb-2 btn-success">{{
                                __('keywords.show_button') }}</a>
                            <a href="{{ route('back.rooms.edit', ['room' => $room]) }}" class="btn mb-2 btn-warning">{{
                                __('keywords.edit_button') }}</a>

                            <x-delete-button href="{{ route('back.rooms.show', ['room' => $room]) }}"
                                id="{{ $room->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $rooms->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
