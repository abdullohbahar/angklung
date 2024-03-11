@extends('student.main-menu.layout.app')

@section('title')
    Materi Gelombang
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
                                        <div class="col-12 text-center">
                                            <h4>
                                                <i class="fa-regular fa-circle-question text-black"></i>
                                                <b>Penjelasan</b>
                                            </h4>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <h6>
                                                <b style="text-align: justify;">
                                                    <p>
                                                        Fenomena perambatan getaran dapat terjadi apabila suatu dijatuhkan
                                                        ke
                                                        dalam permukaan air yang akan menimbulkan pola lingkaran sehingga
                                                        gelombang riak air terbentuk. Jika melihat gelombang tersebut,
                                                        tampak
                                                        suatu titik di permukaan air bergerak bersama gelombang, dari pusat
                                                        pola
                                                        lingkaran menyebar ke segala arah.
                                                    </p>
                                                    <p class="mt-2">
                                                        Meskipun demikian, sebenarnya suatu titik di permukaan air tersebut
                                                        tidak bergerak bersama riak gelombang.
                                                    </p>
                                                </b>
                                            </h6>
                                        </div>
                                        <div class="col-12">
                                            <form action="{{ route('materi.gelombang.store.pernyataan1') }}" method="POST">
                                                @csrf
                                                <button type="submit" style="width: 100%"
                                                    class="btn btn-custom-orange rounded-pill mt-3">
                                                    Selanjutnya
                                                </button>
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
    </div>
@endsection

@push('addons-js')
@endpush
