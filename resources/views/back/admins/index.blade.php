@extends('back.master')

@section('title', __('keywords.admins'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.admins')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.admins.create') }}" type="create"></x-action-button>
                </div>
            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.name') }}</th>
                        <th>{{ __('keywords.email') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                    <tr>
                        <td>{{ $admins->firstItem() + $loop->index }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>

                        <td>
                            <a href="{{ route('back.admins.show', ['admin' => $admin]) }}"
                                class="btn mb-2 btn-success">{{ __('keywords.show_button') }}</a>
                            <a href="{{ route('back.admins.edit', ['admin' => $admin]) }}"
                                class="btn mb-2 btn-warning">{{ __('keywords.edit_button') }}</a>

                            <x-delete-button href="{{ route('back.admins.destroy', ['admin' => $admin]) }}"
                                id="{{ $admin->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $admins->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
