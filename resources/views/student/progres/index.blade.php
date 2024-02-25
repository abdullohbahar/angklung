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
    <div class="container-fluid mt-4">
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
                    <div class="row ms-0 mt-4">
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
                                            <h5 for="" class="mt-4"><b>Getaran</b></h5>
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
                                            <h5 for="" class="mt-4"><b>Gelombang</b></h5>
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
                                            <h5 for="" class="mt-4"><b>Gelombang Bunyi</b></h5>
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
                    <div class="row ms-0 mt-4">
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
                    <div class="row ms-0 mt-4">
                        <div class="col-12">
                            <div class="accordion accordion-flush" id="pilgan">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed text-capitalize" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-pilgan" aria-expanded="false"
                                            aria-controls="flush-pilgan">
                                            <h3><b>Penilaian Pilihan Ganda</b></h3>
                                        </button>
                                    </h2>
                                    <div id="flush-pilgan" class="accordion-collapse collapse" data-bs-parent="#pilgan">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-12">
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
                    <div class="row ms-0 mt-4 mb-5">
                        <div class="col-12">
                            <div class="accordion accordion-flush" id="essay">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed text-capitalize" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-essay" aria-expanded="false"
                                            aria-controls="flush-essay">
                                            <h3><b>Essay</b></h3>
                                        </button>
                                    </h2>
                                    <div id="flush-essay" class="accordion-collapse collapse" data-bs-parent="#essay">
                                        <div class="accordion-body">
                                            @foreach ($essays as $essay)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5>
                                                            <b> Nomor {{ $essay->hasOneSoal->nomor_soal }}
                                                            </b>
                                                        </h5>
                                                    </div>
                                                    <div class="col-12">
                                                        {!! $essay->hasOneSoal->soal !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>
                                                            <b>Jawaban</b>
                                                        </h6>
                                                        <textarea class="form-control" disabled rows="2">{{ $essay->jawaban }}</textarea>
                                                        @if ($essay->file)
                                                            <a href="{{ asset($essay->file) }}" class="btn btn-info mt-2"
                                                                target="_blank">Lihat file yang diunggah</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                            @endforeach
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
