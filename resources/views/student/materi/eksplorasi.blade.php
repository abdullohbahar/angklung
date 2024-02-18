@extends('student.main-menu.layout.app')

@section('title')
    Eksplorasi
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
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-header">
                                    Eksplorasi
                                </div>
                                <div class="card-body text-center">
                                    <form
                                        action="{{ route('materi', [
                                            'title' => $title,
                                            'no' => $no + 1,
                                        ]) }}"
                                        method="GET">
                                        @csrf
                                        <input type="hidden" name="jenis" id="">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4> {!! $eksplorasi->oneEksplorasiDiMateri->embed !!}
                                                </h4>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 text-center">
                                                <a href="{{ route('materi', [
                                                    'title' => $title,
                                                    'no' => $no,
                                                ]) }}"
                                                    class="btn btn-custom-orange rounded-pill" style="width: 100%">
                                                    <i class="fa-solid fa-arrow-left"></i> Sebelumnya
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 text-center">
                                                <button type="submit" class="btn btn-custom-orange rounded-pill"
                                                    style="width: 100%">
                                                    Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
