@extends('student.main-menu.layout.app')

@section('title')
@endsection

@push('addons-css')
    <style>
        .font-weight-600 {
            font-weight: 600;
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
                        <h1><b>Capaian Pembelajaran</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="accordion accordion-flush" id="capaian-pembelajaran">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-capaian-pembelajaran" aria-expanded="false"
                                            aria-controls="flush-capaian-pembelajaran">
                                            Capaian Pembelajaran
                                        </button>
                                    </h2>
                                    <div id="flush-capaian-pembelajaran" class="accordion-collapse collapse"
                                        data-bs-parent="#capaian-pembelajaran">
                                        <div class="accordion-body">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                            first item's accordion body.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="accordion accordion-flush" id="alur-tujuan-pembelajaran">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-alur-tujuan-pembelajaran" aria-expanded="false"
                                            aria-controls="flush-alur-tujuan-pembelajaran">
                                            Alur Tujuan Pembelajaran
                                        </button>
                                    </h2>
                                    <div id="flush-alur-tujuan-pembelajaran" class="accordion-collapse collapse"
                                        data-bs-parent="#alur-tujuan-pembelajaran">
                                        <div class="accordion-body">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                            first item's accordion body.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="accordion accordion-flush" id="modul">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-modul" aria-expanded="false" aria-controls="flush-modul">
                                            Modul
                                        </button>
                                    </h2>
                                    <div id="flush-modul" class="accordion-collapse collapse" data-bs-parent="#modul">
                                        <div class="accordion-body">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                            first item's accordion body.</div>
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
