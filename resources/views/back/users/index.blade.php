@extends('back.master')

@section('title', __('keywords.users'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.users')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.users.create') }}" type="create"></x-action-button>
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
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>


                        <td>

                            <x-delete-button href="{{ route('back.users.destroy', ['user' => $user]) }}"
                                id="{{ $user->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $users->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
