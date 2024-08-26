@extends('back.master')

@section('title', __('keywords.services'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.services')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.services.create') }}" type="create"></x-action-button>
                </div>
            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.name') }}</th>
                        <th>{{ __('keywords.image') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                    <tr>
                        <td>{{ $services->firstItem() + $loop->index }}</td>
                        <td>{{ $service->name }}</td>
                        <td>
                            <img src="{{ asset('storage') }}/services/{{ $service->image }}" alt="not_found"
                                width="50px">
                        </td>
                        <td>
                            <a href="{{ route('back.services.show', ['service' => $service]) }}"
                                class="btn mb-2 btn-success">{{ __('keywords.show_button') }}</a>
                            <a href="{{ route('back.services.edit', ['service' => $service]) }}"
                                class="btn mb-2 btn-warning">{{ __('keywords.edit_button') }}</a>

                            <x-delete-button href="{{ route('back.services.show', ['service' => $service]) }}"
                                id="{{ $service->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $services->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
