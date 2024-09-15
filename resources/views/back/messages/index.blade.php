@extends('back.master')

@section('title', __('keywords.messages'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.messages')}}</h5>

            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.email') }}</th>
                        <th>{{ __('keywords.subject') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                    <tr>
                        <td>{{ $messages->firstItem() + $loop->index }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>


                        <td>
                            <a href="{{ route('back.messages.show', ['message' => $message]) }}"
                                class="btn mb-2 btn-success">{{
                                __('keywords.show_button') }}</a>

                            <x-delete-button href="{{ route('back.messages.destroy', ['message' => $message]) }}"
                                id="{{ $message->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $messages->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection