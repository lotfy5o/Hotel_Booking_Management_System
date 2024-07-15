@extends('admin.master')

@section('title', __('keywords.hotels'))

@section('content')
<!-- simple table -->
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.hotels')}}</h5>
                <div class="page-title">
                    <a href="{{ route('admin.hotels.create') }}"
                        class="btn mb-2 btn-primary">{{__('keywords.add_new')}}</a>
                </div>
            </div>

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Location</th>
                        <th>Actions</th>
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
                            <a href="{{ route('admin.hotels.show', ['hotel' => $hotel]) }}"
                                class="btn mb-2 btn-success">Show</a>
                            <a href="{{ route('admin.hotels.edit', ['hotel' => $hotel]) }}"
                                class="btn mb-2 btn-warning">Edit</a>
                            <form action="{{ route('admin.hotels.destroy', ['hotel' => $hotel]) }}" method="post"
                                id="deleteForm-{{ $hotel->id }}" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn mb-2  btn-danger"
                                    onclick="confirmDelete({{ $hotel->id }})">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%">
                            <div class="alert alert-danger">{{ __('keywords.no_records_found') }}</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
            {{ $hotels->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div> <!-- simple table -->

@endsection
