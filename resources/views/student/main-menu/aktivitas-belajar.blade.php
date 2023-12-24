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

        .btn-custom-yellow {
            background-color: #F9F597;
        }
    </style>
@endpush


@section('content')
    <!-- As a link -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="">
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
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1><b>Aktivitas Belajar</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body">
                                    <div class="row g-1">
                                        <div class="col-3">
                                            <img src="{{ asset('./guest-assets/getaran.svg') }}"
                                                class="img-fluid w-100 mt-2" alt="">
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3><b>Getaran</b></h3>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <button class="btn btn-custom-yellow font-aktivitas"
                                                                style="width: 100%;">
                                                                <b>Materi</b>
                                                            </button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button class="btn btn-custom-red font-aktivitas"
                                                                style="width: 100%;">
                                                                <b>Aktivitas 1</b>
                                                            </button>
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
    </div>
@endsection

@push('addons-js')
@endpush
