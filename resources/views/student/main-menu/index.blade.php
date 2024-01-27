@extends('student.main-menu.layout.app')

@section('title')
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- As a link -->
    <nav class="navs">
        <h2><b>Halo {{ auth()->user()->fullname }}</b></h2>
    </nav>

    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="row text-center">
                    <div class="col-12 my-3 text-center">
                        <h2><b>Menu Utama</b></h2>
                    </div>
                    <a href="{{ route('capaian.pembelajaran') }}" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border" style="">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/capaian-pembelajaran.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Capaian Pembelajaran</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('aktivitas.belajar') }}" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/aktivitas-belajar.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Aktivitas Belajar</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('student.eksplorasi') }}" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/project.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Eksplorasi</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/progress.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Progress</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('student.penilaian', 1) }}"
                        class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/penilaian.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Penilaian</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body">
                                <img src="{{ asset('./guest-assets/informasi-pengembang.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Presensi</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
@endpush
