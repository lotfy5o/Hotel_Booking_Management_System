@extends('back.master')

@section('title', __('keywords.subscribers'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.subscribers')}}</h5>

            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.email') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subscribers as $subscriber)
                    <tr>
                        <td>{{ $subscribers->firstItem() + $loop->index }}</td>
                        <td>{{ $subscriber->subscr_email }}</td>


                        <td>

                            <x-delete-button
                                href="{{ route('back.subscribers.destroy', ['subscriber' => $subscriber]) }}"
                                id="{{ $subscriber->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $subscribers->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
