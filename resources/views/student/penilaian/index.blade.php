@extends('student.main-menu.layout.app')

@section('title')
    Penilaian
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

        .btn-custom-orange {
            background-color: #f18016;
            color: white;
        }

        .btn-custom-orange:hover {
            background-color: #d46905;
        }


        .btn-custom-yellow {
            background-color: #F9F597;
        }

        .btn-custom-yellow:hover {
            background-color: #e9e446;
        }

        iframe {
            width: 100% !important;
            height: 1000px !important;
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
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1><b>Penilaian</b></h1>
                    </div>
                    <form action="{{ route('student.store.penilaian', $penilaian->id) }}" method="POST">
                        @csrf
                        <div class="row ms-0">
                            <div class="col-12">
                                <div class="card card-border mb-5" style="width: 100%; background-color: antiquewhite">
                                    <div class="card-body">
                                        <h3 class="text-center mb-3">
                                            <b>
                                                Soal No. {{ $penilaian->nomor }}
                                            </b>
                                        </h3>
                                        {!! $penilaian->soal !!}
                                        <h3 class="text-center my-3"><b>Jawaban</b></h3>

                                        @include('student.penilaian.components.jawaban')

                                        <h3 class="text-center my-3"><b>Alasan</b></h3>

                                        @include('student.penilaian.components.alasan')

                                        <input type="hidden" name="no" value="{{ $penilaian->nomor }}" id="">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                @if ($penilaian->nomor != 1)
                                                    <a href="{{ route('student.penilaian', $penilaian->nomor - 1) }}"
                                                        class="btn btn-custom-orange rounded-pill" style="width: 100%"><i
                                                            class="fa-solid fa-arrow-left">
                                                        </i> Sebelumnya</a>
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-custom-orange rounded-pill"
                                                    style="width: 100%">Selanjutnya
                                                    <i class="fa-solid fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
@endpush
