@extends('back.master')

@section('title', __('keywords.index'))

@section('content')



<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">

                <div class="col-md-8 col-xl-3 mb-6">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                        <i class="fe fe-16 fe-user text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="small text-muted mb-0">Admins</p>
                                    <span class="h3 mb-0">{{ count($admins) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xl-3 mb-6">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                        <i class="fe fe-16 fe-database text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="small text-muted mb-0">Hotels</p>
                                    <span class="h3 mb-0">{{ count($hotels) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xl-3 mb-6">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                        <i class="fe fe-16 fe-key text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="small text-muted mb-0">Rooms</p>
                                    <span class="h3 mb-0">{{ count($rooms) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
