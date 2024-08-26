@extends('back.master')

@section('title', __('keywords.amenities'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.amenities')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.amenities.create') }}" type="create"></x-action-button>
                </div>
            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.name') }}</th>
                        <th>{{ __('keywords.icon') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($amenities as $amenity)
                    <tr>
                        <td>{{ $amenities->firstItem() + $loop->index }}</td>
                        <td>{{ $amenity->name }}</td>
                        <td>{{ $amenity->icon }}</td>

                        <td>
                            <a href="{{ route('back.amenities.show', ['amenity' => $amenity]) }}"
                                class="btn mb-2 btn-success">{{ __('keywords.show_button') }}</a>
                            <a href="{{ route('back.amenities.edit', ['amenity' => $amenity]) }}"
                                class="btn mb-2 btn-warning">{{ __('keywords.edit_button') }}</a>

                            <x-delete-button href="{{ route('back.amenities.show', ['amenity' => $amenity]) }}"
                                id="{{ $amenity->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $amenities->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
