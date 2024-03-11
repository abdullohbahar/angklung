@extends('student.main-menu.layout.app')

@section('title')
    Materi Getaran
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

        .btn-custom-orange {
            background-color: #f18016;
            color: white;
        }

        .btn-custom-orange:hover {
            background-color: #d46905;
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

        .outline {
            -webkit-text-stroke: 1px white;
        }

        iframe {
            width: 100% !important;
            height: 500px !important;
        }
    </style>
@endpush


@section('content')
    <!-- As a link -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="{{ route('main.menu') }}">
                    <i class="fa-solid fa-arrow-left fa-2x text-black"></i>
                </a>
            </div>
            <div class="col-4 text-end">
                <i class="fa-regular fa-circle-question fa-2x text-black"></i>
            </div>
        </div>

    </div>

    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1 class="outline"><b>Getaran</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h4>
                                                <b>Mari Kita Belajar Getaran</b>
                                            </h4>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <a href="{{ route('materi.getaran.orientasi') }}" class="btn btn-warning"
                                                style="width: 100%;">
                                                <h5 class="mt-2">
                                                    <b>
                                                        Mulai
                                                    </b>
                                                </h5>
                                            </a>
                                        </div>
                                        {{-- <div class="col-12 mt-3">
                                            <a href="{{ route('materi.getaran.eksperimen') }}" class="btn btn-danger"
                                                style="width: 100%">
                                                <h5 class="mt-2">
                                                    <b>
                                                        Eksperimen
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
@endsection

@push('addons-js')
    @if (session()->has('experiment_notification'))
        <script>
            Swal.fire({
                title: "Selamat!",
                text: "{{ session('experiment_notification') }}",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Experimen!",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/siswa/materi/getaran/eksperimen"
                }
            });
        </script>
    @endif

    @if (session()->has('notif'))
        <script>
            Swal.fire({
                title: "Selamat!",
                text: "{{ session('notif') }}",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "OK",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/siswa"
                }
            });
        </script>
    @endif
@endpush
