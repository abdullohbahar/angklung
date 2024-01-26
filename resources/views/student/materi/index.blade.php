@extends('student.main-menu.layout.app')

@section('title')
    {{ $aktivitasBelajar->title }} - Materi
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

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1 class="outline"><b>Materi</b></h1>
                        <h1 class="outline"><b>{{ $aktivitasBelajar->title }}</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            {!! $aktivitasBelajar->materiHasOne->video !!}
                                        </div>
                                        <div class="col-12 mt-3">
                                            {!! $aktivitasBelajar->materiHasOne->deskripsi !!}
                                        </div>
                                        <form
                                            action="{{ route('store.materi', [
                                                'materiID' => $aktivitasBelajar->materiHasOne->id,
                                                'no' => $aktivitasBelajar->materiHasOne->no,
                                                'aktivitasBelajarID' => $aktivitasBelajar->id,
                                            ]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <textarea name="jawaban" required placeholder="Tulis Jawaban Anda Disini" class="form-control"
                                                    style="width: 100%; height; 200px;"></textarea>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <button type="submit" class="btn btn-custom-orange rounded-pill"
                                                    style="width: 50%">
                                                    Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                                                </button>
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
    </div>
@endsection

@push('addons-js')
@endpush
