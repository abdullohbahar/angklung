@extends('student.main-menu.layout.app')

@section('title')
    Progress
@endsection

@push('addons-css')
    <style>
        .font-weight-600 {
            font-weight: 600;
        }

        .outline-font {
            text-shadow: -1px -1px 0 white, 1px -1px 0 white, -1px 1px 0 white, 1px 1px 0 white;
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
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1><b class="outline-font">Progres</b></h1>
                    </div>
                    <div class="row ms-0 mt-3">
                        <div class="col-12">
                            <div class="accordion accordion-flush" id="aktivitas">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed text-capitalize" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-aktivitas"
                                            aria-expanded="false" aria-controls="flush-aktivitas">
                                            <h3><b>Progress Aktivitas Belajar Anda</b></h3>
                                        </button>
                                    </h2>
                                    <div id="flush-aktivitas" class="accordion-collapse collapse"
                                        data-bs-parent="#aktivitas">
                                        <div class="accordion-body">
                                            @php
                                                if ($progressGetaran <= 25) {
                                                    $color = 'bg-danger';
                                                } elseif ($progressGetaran <= 50) {
                                                    $color = 'bg-warning';
                                                } elseif ($progressGetaran <= 75) {
                                                    $color = 'bg-info';
                                                } elseif ($progressGetaran <= 100) {
                                                    $color = 'bg-success';
                                                }
                                            @endphp
                                            <h5 for="" class="mt-3"><b>Getaran</b></h5>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped {{ $color }}"
                                                    role="progressbar" style="width: {{ $progressGetaran }}%;"
                                                    aria-valuenow="{{ $progressGetaran }}" aria-valuemin="0"
                                                    aria-valuemax="100"><b>{{ $progressGetaran }}%</b></div>
                                            </div>
                                            @php
                                                if ($progressGelombang <= 25) {
                                                    $color = 'bg-danger';
                                                } elseif ($progressGelombang <= 50) {
                                                    $color = 'bg-warning';
                                                } elseif ($progressGelombang <= 75) {
                                                    $color = 'bg-info';
                                                } elseif ($progressGelombang <= 100) {
                                                    $color = 'bg-success';
                                                }
                                            @endphp
                                            <h5 for="" class="mt-3"><b>Gelombang</b></h5>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped {{ $color }}"
                                                    role="progressbar" style="width: {{ $progressGelombang }}%;"
                                                    aria-valuenow="{{ $progressGelombang }}" aria-valuemin="0"
                                                    aria-valuemax="100"><b>{{ $progressGelombang }}%</b></div>
                                            </div>
                                            @php
                                                if ($progressGelombangBunyi <= 25) {
                                                    $color = 'bg-danger';
                                                } elseif ($progressGelombangBunyi <= 50) {
                                                    $color = 'bg-warning';
                                                } elseif ($progressGelombangBunyi <= 75) {
                                                    $color = 'bg-info';
                                                } elseif ($progressGelombangBunyi <= 100) {
                                                    $color = 'bg-success';
                                                }
                                            @endphp
                                            <h5 for="" class="mt-3"><b>Gelombang Bunyi</b></h5>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped {{ $color }}"
                                                    role="progressbar" style="width: {{ $progressGelombangBunyi }}%;"
                                                    aria-valuenow="{{ $progressGelombangBunyi }}" aria-valuemin="0"
                                                    aria-valuemax="100"><b>{{ $progressGelombangBunyi }}%</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ms-0 mt-5 mb-5">
                        <div class="col-12">
                            <div class="accordion accordion-flush" id="presensi">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed text-capitalize" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-presensi" aria-expanded="false"
                                            aria-controls="flush-presensi">
                                            <h3><b>Riwayat Presensi Anda</b></h3>
                                        </button>
                                    </h2>
                                    <div id="flush-presensi" class="accordion-collapse collapse" data-bs-parent="#presensi">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-bolder">
                                                        <td><b>No</b></td>
                                                        <td><b>Tanggal</b></td>
                                                        <td><b>Keterangan</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @forelse ($presensis as $presensi)
                                                        <tr>
                                                            <td>
                                                                {{ $no++ }}
                                                            </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($presensi->tanggal)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-capitalize">
                                                                {{ $presensi->status }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3">Belum ada riwayat presensi</td>
                                                        </tr>
                                                    @endforelse
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
