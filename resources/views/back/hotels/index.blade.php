@extends('back.master')

@section('title', __('keywords.hotels'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.hotels')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.hotels.create') }}" type="create"></x-action-button>
                </div>
            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.name') }}</th>
                        <th>{{ __('keywords.image') }}</th>
                        <th>{{ __('keywords.location') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hotels as $hotel)
                    <tr>
                        <td>{{ $hotels->firstItem() + $loop->index }}</td>
                        <td>{{ $hotel->name }}</td>
                        <td>
                            <img src="{{ asset('storage') }}/hotels/{{ $hotel->image }}" alt="not_found" width="50px">
                        </td>
                        <td>{{ $hotel->location }}</td>
                        <td>
                            <a href="{{ route('back.hotels.show', ['hotel' => $hotel]) }}"
                                class="btn mb-2 btn-success">{{ __('keywords.show_button') }}</a>
                            <a href="{{ route('back.hotels.edit', ['hotel' => $hotel]) }}"
                                class="btn mb-2 btn-warning">{{ __('keywords.edit_button') }}</a>

                            <x-delete-button href="{{ route('back.hotels.show', ['hotel' => $hotel]) }}"
                                id="{{ $hotel->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $hotels->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
