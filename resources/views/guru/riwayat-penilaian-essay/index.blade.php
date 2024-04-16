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

                                <div id="collapseEssay" class="collapse show" aria-labelledby="headingEssay"
                                    data-parent="#accordionEssay">
                                    <div class="card-body">
                                        @php
                                            $totalScore = 0;
                                        @endphp
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
                                                    <h6 class="mt-2">
                                                        <b>Score : {{ $essay?->score }}</b>
                                                        @php
                                                            $totalScore += $essay?->score;
                                                        @endphp
                                                    </h6>
                                                    @if ($essay->file)
                                                        <a href="{{ asset($essay->file) }}" class="btn btn-info mt-2"
                                                            target="_blank">Lihat file yang diunggah</a>
                                                    @endif
                                                    <button class="btn btn-warning mt-2" id="addScore"
                                                        data-id="{{ $essay->id }}"
                                                        data-nomor="{{ $essay->hasOneSoal->nomor_soal }}">Beri
                                                        Score</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <h4>
                                                    <b>
                                                        Total Score : {{ $totalScore }}
                                                    </b>
                                                </h4>
                                            </div>
                                        </div>
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

    <!-- Modal -->
    <div class="modal fade" id="addScoreModal" tabindex="-1" aria-labelledby="addScoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addScoreModalLabel">Tambahkan Nilai Nomor <span id="nomor"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guru.add.score.essay') }}" method="POST">
                        @csrf
                        <input type="text" name="essay_id" hidden id="essay_id">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Score</label>
                                <input type="number" required name="score" class="form-control"
                                    placeholder="Masukkan Score" id="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Beri Score</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
    <script>
        $("body").on("click", "#addScore", function() {
            $("#addScoreModal").modal("show")

            var nomor = $(this).data("nomor")
            var id = $(this).data("id")

            $("#nomor").text(nomor)
            $("#essay_id").val(id)
        })
    </script>
@endpush
