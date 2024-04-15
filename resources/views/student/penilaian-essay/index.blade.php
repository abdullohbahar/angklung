@extends('student.main-menu.layout.app')

@section('title')
    Penilaian
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

        .btn-custom-red {
            background-color: #F8B7A3;
        }

        .btn-custom-red:hover {
            background-color: #f79578;
        }

        .btn-custom-orange {
            background-color: #f18016;
            color: white;
        }

        .btn-custom-orange:hover {
            background-color: #d46905;
        }


        .btn-custom-yellow {
            background-color: #F9F597;
        }

        .btn-custom-yellow:hover {
            background-color: #e9e446;
        }

        iframe {
            width: 100% !important;
            height: 1000px !important;
        }

        .ck-table-resized {
            width: 100% !important;
        }

        .nomor {
            margin-right: 5px;
            margin-top: 5px;
            display: block;
            width: 45px;
            height: 45px;
            font-size: 16pt;
            line-height: 40px;
            text-align: center;
            color: black;
            padding: 0px;
        }

        .answered {
            background-color: rgb(76, 192, 255);
            color: black
        }

        .current {
            background-color: #F0BD63;
            color: white
        }

        img {
            width: 100% !important;
            height: 100% !important;
            text-align: center !important;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section('content')
    <!-- As a link -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="javascript:void(0);" onclick="goBack()">
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
            <div class="col-12 my-3 text-center">
                <h1><b>Penilaian</b></h1>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <form action="{{ route('student.store.penilaian.essay', $penilaian->id) }}" method="POST"
                        enctype="multipart/form-data" id="{{ $no == $jumlahEssay ? 'approve' : '' }}">
                        @csrf
                        <div class="row ms-0">
                            <div class="col-12">
                                <div class="card card-border mb-5" style="width: 100%; background-color: antiquewhite">
                                    <div class="card-body">
                                        <div style="float: right">
                                            <select name="language" id="switch">
                                                <option value="id"
                                                    {{ session()->get('bahasa') == 'id' ? 'selected' : '' }}>Indonesia
                                                </option>
                                                <option value="en"
                                                    {{ session()->get('bahasa') == 'en' ? 'selected' : '' }}>English
                                                </option>
                                            </select>
                                        </div>
                                        <h3 class="text-center mb-3">
                                            <b>
                                                Soal No. {{ $penilaian->nomor_soal }}
                                            </b>
                                        </h3>
                                        @if (session('bahasa') == 'en')
                                            {!! $penilaian->soal_english !!}
                                        @else
                                            {!! $penilaian->soal !!}
                                        @endif
                                        <h4 class="my-3"><b>Jawaban</b></h4>
                                        <textarea name="jawaban" placeholder="Tuliskan Jawaban Anda Disini" class="form-control" required rows="10">{{ $jawabanSoal }}</textarea>
                                        <input type="hidden" name="no" value="{{ $penilaian->nomor_soal }}"
                                            id="">

                                        <h4 class="my-3">
                                            <b>Upload File</b>
                                        </h4>
                                        <input type="file" name="file" class="form-control" id="">
                                        @if ($file)
                                            <a href="{{ asset($file) }}" target="_blank">Anda sudah melakukan upload file,
                                                klik disini untuk melihat
                                                file yang diupload.</a>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                @if ($penilaian->nomor_soal != 1)
                                                    <a href="{{ route('student.penilaian', $penilaian->nomor_soal - 1) }}"
                                                        class="btn btn-custom-orange rounded-pill" style="width: 100%"><i
                                                            class="fa-solid fa-arrow-left">
                                                        </i> Sebelumnya</a>
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-custom-orange rounded-pill"
                                                    style="width: 100%">
                                                    @if ($no == $jumlahEssay)
                                                        Selesai
                                                    @else
                                                        Selanjutnya
                                                    @endif
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('student.penilaian.components.monitor')

        </div>
    </div>
@endsection

@push('addons-js')
    <script>
        var token = $('meta[name="csrf-token"]').attr('content');


        // destroy anak asuh
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });

        $("#switch").on("change", function() {
            var bahasa = $(this).val()

            window.location = '/siswa/ubah-bahasa/' + bahasa
        })
    </script>

    <script>
        function startCountdown(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(minutes + ":" + seconds);

                if (--timer < 0) {
                    timer = duration;
                }

                // Panggil endpoint API untuk mengupdate timer di database
                $.ajax({
                    type: "PUT",
                    url: "/timer",
                    success: function(response) {
                        // Jika sukses, lakukan sesuatu jika diperlukan
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }, 1000);
        }

        $(document).ready(function() {
            var countdownDisplay = $('#countdown');
            var countdownDuration = {{ $timer }}; // 60 minutes

            startCountdown(countdownDuration, countdownDisplay);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menangkap formulir saat di-submit
            var form = document.getElementById(
                'approve'); // Ganti 'tinjauanLapangan' dengan ID formulir Anda

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah formulir untuk langsung di-submit

                // Menampilkan konfirmasi SweetAlert
                Swal.fire({
                    title: 'Apakah anda yakin? Anda tidak bisa kembali ke halaman penilaian',
                    text: 'Klik "Ya" untuk konfirmasi.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengklik "Ya", formulir akan di-submit
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
