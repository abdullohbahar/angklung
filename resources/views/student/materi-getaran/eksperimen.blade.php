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

        /* iframe {
                                                                                                                                                                                            width: 100% !important;
                                                                                                                                                                                            height: 500px !important;
                                                                                                                                                                                        } */
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
                        <h1 class="outline"><b>Eksperimen</b></h1>
                        <h1 class="outline"><b>Getaran</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-12 text-end">
                                            <button class="btn rounded-circle" data-bs-toggle="modal"
                                                data-bs-target="#instruksiModal">
                                                <i class="fa-regular fa-circle-question fa-2x text-black"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="liveworksheet7536954" style="width:100%; z-index:-9999 !important;">
                                                <span id="lwslink7536954"><a
                                                        href="https://www.liveworksheets.com/w/id/ilmu-pengetahuan-alam-ipa/7536954">Getaran
                                                    </a>, an interactive worksheet by <a
                                                        href="https://www.liveworksheets.com/u/anggirahmat">Anggi Datiatur
                                                        Rahmat</a>
                                                    <br><a
                                                        href="https://www.liveworksheets.com">live<b>worksheets.com</b></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('materi.getaran.eksperimen.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 mt-3 text-center">
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

    @include('student.materi-getaran.instruksi')
@endsection

@push('addons-js')
    <script src="https://www.liveworksheets.com/embed/embed.js?v=1"></script>
    <script>
        loadliveworksheet(7536954, '5dcf', 9220, 'www', 'new');
    </script>
@endpush
