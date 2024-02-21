@extends('student.main-menu.layout.app')

@section('title')
    Orientasi - Materi Gelombang
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <h5>
                                                <b>
                                                    Untuk menambah wawasan, silakan tonton video berikut ini !
                                                </b>
                                            </h5>
                                        </div>
                                        <div class="col-12">
                                            <iframe width="560" height="315"
                                                src="https://www.youtube.com/embed/lVdQ8JMcmYY?si=jauCEcy6RXgG_wA8"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <h5>
                                                <b>Pertanyaan:</b>
                                            </h5>
                                        </div>
                                    </div>
                                    <form action="{{ route('materi.gelombang.store.orientasi2') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="materi" value="getaran" id="">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                1. Bagaimana perbedaan gelombang transversal dan gelombang longitudinal !
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban2" required class="form-control" placeholder="Tuliskan Jawaban Anda Disini" style="height: 150px"
                                                    id="">{{ $jawaban2 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                2. Sebutkan contoh gelombang transversal dan gelombang longitudinal
                                                (masing-masing 2)
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban3" required class="form-control" placeholder="Tuliskan Jawaban Anda Disini" style="height: 150px"
                                                    id="">{{ $jawaban3 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 text-center">
                                                <a href="{{ route('materi.gelombang.forum') }}"
                                                    class="btn btn-custom-orange rounded-pill" style="width: 100%"><i
                                                        class="fa-solid fa-arrow-left"></i>
                                                    Kembali
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
