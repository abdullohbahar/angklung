@extends('student.main-menu.layout.app')

@section('title')
@endsection

@push('addons-css')
    <style>
        .font-weight-600 {
            font-weight: 600;
        }

        .card-border {
            border-radius: 25px;
            width: 100%;
            height: auto;
        }

        .btn-custom-red {
            background-color: #F8B7A3;
        }

        .btn-custom-red:hover {
            background-color: #f79578;
        }

        .btn-custom-yellow {
            background-color: #F9F597;
        }

        .btn-custom-yellow:hover {
            background-color: #e9e446;
        }
    </style>
@endpush


@section('content')
    <!-- As a link -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="javascript:void(0);" onclick="goBack()">
                    <i class="fa-solid fa-arrow-left fa-2x text-black"></i>
                </a>
            </div>
            <div class="col-4 text-end">
                <i class="fa-regular fa-circle-question fa-2x text-black"></i>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1><b>Aktivitas Belajar</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3 text-center">
                                            <img src="asdf" class="w-75 mt-2 img-circle" alt="">
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2><b>Getaran</b></h2>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <a href="{{ route('materi.getaran') }}"
                                                                class="btn btn-lg btn-custom-yellow font-aktivitas"
                                                                id="materi" style="width: 100%;">
                                                                <b>
                                                                    <h5 class="mt-2">
                                                                        <b>Materi</b>
                                                                    </h5>
                                                                </b>
                                                            </a>
                                                        </div>
                                                        {{-- <div class="col-6">
                                                            <a href="{{ route('aktivitas', $activity->id) }}"
                                                                class="btn btn-lg btn-custom-red font-aktivitas"
                                                                style="width: 100%;">
                                                                <h5 class="mt-2">
                                                                    <b>
                                                                        <b>Aktivitas {{ $key += 1 }}</b>
                                                                    </b>
                                                                </h5>
                                                            </a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-3 text-center">
                                            <img src="asdf" class="w-75 mt-2 img-circle" alt="">
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2><b>Gelombang</b></h2>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <a href="{{ route('materi.gelombang') }}"
                                                                class="btn btn-lg btn-custom-yellow font-aktivitas"
                                                                id="materi" style="width: 100%;">
                                                                <b>
                                                                    <h5 class="mt-2">
                                                                        <b>Materi</b>
                                                                    </h5>
                                                                </b>
                                                            </a>
                                                        </div>
                                                        {{-- <div class="col-6">
                                                            <a href="{{ route('aktivitas', $activity->id) }}"
                                                                class="btn btn-lg btn-custom-red font-aktivitas"
                                                                style="width: 100%;">
                                                                <h5 class="mt-2">
                                                                    <b>
                                                                        <b>Aktivitas {{ $key += 1 }}</b>
                                                                    </b>
                                                                </h5>
                                                            </a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-3 text-center">
                                            <img src="asdf" class="w-75 mt-2 img-circle" alt="">
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2><b>Gelombang Bunyi</b></h2>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <a href="{{ route('materi.gelombang.bunyi') }}"
                                                                class="btn btn-lg btn-custom-yellow font-aktivitas"
                                                                id="materi" style="width: 100%;">
                                                                <b>
                                                                    <h5 class="mt-2">
                                                                        <b>Materi</b>
                                                                    </h5>
                                                                </b>
                                                            </a>
                                                        </div>
                                                        {{-- <div class="col-6">
                                                            <a href="{{ route('aktivitas', $activity->id) }}"
                                                                class="btn btn-lg btn-custom-red font-aktivitas"
                                                                style="width: 100%;">
                                                                <h5 class="mt-2">
                                                                    <b>
                                                                        <b>Aktivitas {{ $key += 1 }}</b>
                                                                    </b>
                                                                </h5>
                                                            </a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

@push('addons-js')
@endpush
