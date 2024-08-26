@extends('back.master')

@section('title', __('keywords.testimonials'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.testimonials')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.testimonials.create') }}" type="create"></x-action-button>
                </div>
            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('keywords.id') }}</th>
                        <th>{{ __('keywords.name') }}</th>
                        <th>{{ __('keywords.position') }}</th>
                        <th>{{ __('keywords.image') }}</th>
                        <th>{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonials->firstItem() + $loop->index }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->position }}</td>
                        <td>
                            <img src="{{ asset('storage') }}/testimonials/{{ $testimonial->image }}" alt="not_found"
                                width="50px">
                        </td>
                        <td>
                            <a href="{{ route('back.testimonials.show', ['testimonial' => $testimonial]) }}"
                                class="btn mb-2 btn-success">{{ __('keywords.show_button') }}</a>
                            <a href="{{ route('back.testimonials.edit', ['testimonial' => $testimonial]) }}"
                                class="btn mb-2 btn-warning">{{ __('keywords.edit_button') }}</a>

                            <x-delete-button
                                href="{{ route('back.testimonials.show', ['testimonial' => $testimonial]) }}"
                                id="{{ $testimonial->id }}"></x-delete-button>
                        </td>
                    </tr>

                    @empty

                    <x-empty-alert></x-empty-alert>

                    @endforelse

                </tbody>

            </table>
            {{ $testimonials->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
