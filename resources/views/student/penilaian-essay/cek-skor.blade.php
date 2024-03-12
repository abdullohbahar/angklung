@extends('student.main-menu.layout.app')

@section('title')
    Cek Skor
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
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="text-center">
                                                <b>Perolehan Score</b>
                                            </h1>
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Jawaban Soal</th>
                                                        <th>Jawaban Alasan</th>
                                                        <th>Score</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                        $totalScore = 0;
                                                    @endphp
                                                    @foreach ($pilgans as $pilgan)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $pilgan->jawaban_soal }}</td>
                                                            <td>{{ $pilgan->jawaban_alasan }}</td>
                                                            <td>{{ $pilgan->score }}</td>
                                                        </tr>
                                                        @php
                                                            $totalScore += $pilgan->score;
                                                        @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td style="text-align: right" colspan="3">
                                                            <b>Total Score</b>
                                                        </td>
                                                        <td>
                                                            {{ $totalScore }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
