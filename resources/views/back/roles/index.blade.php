@extends('back.master')
@section('title', __('keywords.roles'))
@section('roles_active', 'active bg-light')
@includeIf("$directory.pushStyles")

@section('content')
<div class="col-md-12 my-4">
    <div class="card shadow">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="h5-page-title">{{__('keywords.roles')}}</h5>
                <div class="page-title">
                    <x-action-button href="{{ route('back.roles.create') }}" type="create"></x-action-button>
                </div>
            </div>

            <x-success-alert></x-success-alert>

            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th class="" width="5%">ID</th>
                        <th class="">{{ __('keywords.name') }}</th>
                        <th class="" width="">{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($data['data']) > 0)
                    @foreach ($data['data'] as $key => $item)
                    <tr>
                        <td>{{ $data['data']->firstItem() + $loop->index }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            {{-- I removed the dropdown button and did serparate buttons on actions --}}

                            {{-- <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('keywords.actions') }} <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu"> --}}

                                    <a href="{{ route('back.roles.show', ['role' => $item]) }}"
                                        class="btn mb-2 btn-success">
                                        <span class="bx bx-show-alt"></span>
                                        {{ __('keywords.show_button') }}
                                    </a>

                                    {{-- @if (permission(['edit_roles'])) --}}
                                    <a href="{{ route('back.roles.edit', ['role' => $item]) }}"
                                        class="btn mb-2 btn-warning">
                                        <span class="bx bx-edit-alt"></span>
                                        {{ __('keywords.edit_button') }}
                                    </a>
                                    {{-- @endif --}}

                                    {{-- @if (permission(['delete_roles'])) --}}
                                    <x-delete-button href="{{ route('back.roles.destroy', ['role' => $item]) }}"
                                        id="{{ $item->id }}"></x-delete-button>

                                    {{-- I used the x-delete component cuz the bottom code was directing me to
                                    the back.roles.show, I don't know why. --}}

                                    {{-- <a class="btn mb-2  btn-danger deleteClass"
                                        href="{{ route('back.roles.destroy', ['role' => $item]) }}"
                                        data-title="{{ __('keywords.delete_role') }}" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        <span class="bx bx-trash-alt"></span>
                                        {{ __('keywords.delete_button') }}
                                    </a> --}}
                                    {{-- @endif --}}

                                    {{--
                                </div> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <x-empty-alert></x-empty-alert>
                    @endif
                </tbody>
            </table>
            {{ $data['data']->appends(request()->query())->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div>


@endsection

@includeIf("$directory.scripts")
@includeIf("$directory.pushScripts")
