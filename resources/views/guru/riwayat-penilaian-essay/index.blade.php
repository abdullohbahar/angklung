@extends('guru.layout.app')

@section('title')
    Penilaian Siswa
@endsection

@push('addons-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Penilaian Siswa - {{ $user->fullname }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Penilaian Siswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            <div class="container-fluid mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    <b>Penilaian Siswa</b>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionPilihan">
                            <div class="card">
                                <div class="card-header" id="headingPilihan">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapsePilihan" aria-expanded="true"
                                            aria-controls="collapsePilihan">
                                            <h4>
                                                <b>
                                                    Pilihan Ganda
                                                </b>
                                            </h4>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapsePilihan" class="collapse" aria-labelledby="headingPilihan"
                                    data-parent="#accordionPilihan">
                                    <div class="card-body">
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
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionEssay">
                            <div class="card">
                                <div class="card-header" id="headingEssay">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseEssay" aria-expanded="true"
                                            aria-controls="collapseEssay">
                                            <h4>
                                                <b>
                                                    Essay
                                                </b>
                                            </h4>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseEssay" class="collapse" aria-labelledby="headingEssay"
                                    data-parent="#accordionEssay">
                                    <div class="card-body">
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
            <!-- /.content -->
        </div>
    </div>
@endsection
