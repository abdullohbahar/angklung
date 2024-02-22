@extends('student.main-menu.layout.app')

@section('title')
    Orientasi - Materi Gelombang Bunyi
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
                        <h1 class="outline"><b>Orientasi</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <h5 style="text-indent:30px">
                                                <p style="text-align: justify; line-height:1.5">
                                                    Setiap alat music memiliki keunikan tersendiri dari bunyi yang
                                                    dihasilkannya. Angklung merupakan alat musik tradisional yang terbuat
                                                    dari
                                                    bambu. Cara memainkan Angklung terbilang unik yaitu dengan cara
                                                    digoyangkan
                                                    sehingga menimbulkan getaran.
                                                </p>
                                            </h5>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <iframe width="560" height="315"
                                                src="https://www.youtube.com/embed/WcIghfnVzyM?si=99afym3cjj2ZxVfe"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <h6>
                                                <p style="text-align: justify; text-indent:30px; line-height:1.5">
                                                    Angklung seringkali dimainkan sebagai pengiring lagu ataupun
                                                    tarian-tarian
                                                    pada acara tertentu oleh masyarakat Jawa Barat. Sebagian besar
                                                    masyarakat
                                                    menganggap music sebagai seni, padahal konsep mengandung banyak
                                                    konsep
                                                    dasar
                                                    fisika khususnya konsep gelombang bunyi. Parameter dasar yang biasa
                                                    digunakan pada music yaitu Pitch, Timbre, Loudness (kenyaringan) dan
                                                    Timbre
                                                    (Warna Bunyi).
                                                </p>
                                            </h6>
                                            <img src="{{ asset('./img/timbre.png') }}" style="width: 100%" alt=""
                                                srcset="">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <h5>
                                                <b>Carilah keterkaitan masing-masing parameter music dengan konsep
                                                    sains!</b>
                                            </h5>
                                        </div>
                                    </div>
                                    <form action="{{ route('materi.gelombang.bunyi.store.orientasi') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="materi" value="getaran" id="">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    1. Pitch
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban1" required class="form-control" placeholder="Tuliskan Jawaban Anda Disini" style="height: 150px"
                                                    id="">{{ $jawaban1 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    2. Timbre
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban2" required class="form-control" placeholder="Tuliskan Jawaban Anda Disini" style="height: 150px"
                                                    id="">{{ $jawaban2 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    3. Rhythm
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban3" required class="form-control" placeholder="Tuliskan Jawaban Anda Disini" style="height: 150px"
                                                    id="">{{ $jawaban3 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    4. Loudness
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban4" required class="form-control" placeholder="Tuliskan Jawaban Anda Disini" style="height: 150px"
                                                    id="">{{ $jawaban4 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <b>
                                                    Berdasarkan studi literatur terkait parameter musik dan konsep sains
                                                    yang telah dilakukan, cobalah buatkan gambar/skema yang menjelaskan
                                                    variabel fisis dengan parameter musik.
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban5" required class="form-control" placeholder="Tuliskan Jawaban Anda Disini" style="height: 150px"
                                                    id="">{{ $jawaban5 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 text-center">
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 text-center">
                                                <button type="submit" class="btn btn-custom-orange rounded-pill"
                                                    style="width: 100%">
                                                    Simpan Jawaban <i class="fa-solid fa-arrow-right"></i>
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
