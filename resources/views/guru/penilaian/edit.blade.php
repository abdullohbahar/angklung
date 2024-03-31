@extends('guru.layout.app')

@section('title')
    Edit Soal Nomor {{ $penilaian->nomor }}
@endsection

@push('addons-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .custom-radio {
            margin-left: 2% !important;
        }

        .ck-content {
            height: 500px !important;
        }

        .ck.ck-editor {
            margin-top: 30px !important;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Soal Nomor {{ $penilaian->nomor }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Soal Nomor {{ $penilaian->nomor }}. Versi Bahasa
                                Indonesia</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('guru.update.penilaian', $penilaian->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Edit Soal Nomor {{ $penilaian->nomor }}</b></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                    <h3>
                                        <b>Soal</b>
                                    </h3>
                                    <textarea name="body" class="editor" style="width: 100%;">{{ old('body', $penilaian->soal) }}</textarea>
                                    @error('body')
                                        <small style="color: red;">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <h3>
                                            <b>Jawaban Soal</b>
                                        </h3>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Jawaban Soal</th>
                                                    <th>Kunci Jawaban Soal <small style="color: red">Pilih Salah Satu
                                                            Sebagai
                                                            Kunci Jawaban Soal</small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>A</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="jawabanA" class="jawabanA">{{ old('jawabanA', $penilaian->pilihanJawaban->a) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioA" name="jawabanSoal"
                                                                value="A"
                                                                {{ old('jawabanSoal', $penilaian->kunci_jawaban) == 'A' ? 'checked' : '' }}>
                                                            <label for="customRadioA" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>B</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="jawabanB" class="jawabanB">{{ old('jawabanB', $penilaian->pilihanJawaban->b) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioB" name="jawabanSoal"
                                                                value="B"
                                                                {{ old('jawabanSoal', $penilaian->kunci_jawaban) == 'B' ? 'checked' : '' }}>
                                                            <label for="customRadioB" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>C</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="jawabanC" class="jawabanC">{{ old('jawabanC', $penilaian->pilihanJawaban->c) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioC" name="jawabanSoal"
                                                                value="C"
                                                                {{ old('jawabanSoal', $penilaian->kunci_jawaban) == 'C' ? 'checked' : '' }}>
                                                            <label for="customRadioC" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>D</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="jawabanD" class="jawabanD">{{ old('jawabanD', $penilaian->pilihanJawaban->d) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioD" name="jawabanSoal"
                                                                value="D"
                                                                {{ old('jawabanSoal', $penilaian->kunci_jawaban) == 'D' ? 'checked' : '' }}>
                                                            <label for="customRadioD" class="custom-control-label"></label>
                                                            <br>
                                                            @error('jawabanSoal')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <h3>
                                            <b>Alasan</b>
                                        </h3>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Alasan</th>
                                                    <th>Kunci Jawaban Alasan <small style="color: red">Pilih Salah Satu
                                                            Sebagai
                                                            Kunci Jawaban Alasan</small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>A</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="alasanA" class="alasanA mt-3">{{ old('alasanA', $penilaian->alasan->a) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanA" name="jawabanAlasan"
                                                                value="A"
                                                                {{ old('jawabanAlasan', $penilaian->kunci_alasan) == 'A' ? 'checked' : '' }}>
                                                            <label for="customRadioAlasanA"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>B</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="alasanB" class="alasanB mt-3">{{ old('alasanB', $penilaian->alasan->b) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanB"
                                                                name="jawabanAlasan" value="B"
                                                                {{ old('jawabanAlasan', $penilaian->kunci_alasan) == 'B' ? 'checked' : '' }}>
                                                            <label for="customRadioAlasanB"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>C</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="alasanC" class="alasanC mt-3">{{ old('alasanC', $penilaian->alasan->c) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanC"
                                                                {{ old('jawabanAlasan', $penilaian->kunci_alasan) == 'C' ? 'checked' : '' }}
                                                                name="jawabanAlasan" value="C">
                                                            <label for="customRadioAlasanC"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>D</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="alasanD" class="alasanD mt-3">{{ old('alasanD', $penilaian->alasan->d) }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanD"
                                                                name="jawabanAlasan" value="D"
                                                                {{ old('jawabanAlasan', $penilaian->kunci_alasan) == 'D' ? 'checked' : '' }}>
                                                            <label for="customRadioAlasanD"
                                                                class="custom-control-label"></label>
                                                            <br>
                                                            @error('jawabanAlasan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4><b>Edit Soal Nomor {{ $penilaian->nomor }} Versi Bahasa Inggris</b></h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('guru.store.penilaian') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                        <h3>
                                            <b>Soal</b>
                                        </h3>
                                        <textarea name="bodyEnglish" class="editorEnglish" style="width: 100%;">{{ old('bodyEnglish', $penilaian->englsih_soal) }}</textarea>
                                        @error('bodyEnglish')
                                            <small style="color: red;">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <h3>
                                                <b>Jawaban Soal</b>
                                            </h3>
                                            <table style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Jawaban Soal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>A</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="jawabanAEnglish" class="jawabanAEnglish">{{ old('jawabanAEnglish', $penilaian->pilihanJawabanEnglish->a) }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>B</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="jawabanBEnglish" class="jawabanBEnglish mt-3">{{ old('jawabanBEnglish', $penilaian->pilihanJawabanEnglish->b) }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>C</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="jawabanCEnglish" class="jawabanCEnglish mt-3">{{ old('jawabanCEnglish', $penilaian->pilihanJawabanEnglish->c) }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>D</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="jawabanDEnglish" class="jawabanDEnglish mt-3">{{ old('jawabanDEnglish', $penilaian->pilihanJawabanEnglish->d) }}</textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <h3>
                                                <b>Alasan</b>
                                            </h3>
                                            <table style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Alasan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>A</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="alasanAEnglish" class="alasanAEnglish mt-3">{{ old('alasanA', $penilaian->alasanEnglish->a) }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>B</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="alasanBEnglish" class="alasanBEnglish mt-3">{{ old('alasanB', $penilaian->alasanEnglish->b) }}</textarea>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>C</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="alasanCEnglish" class="alasanCEnglish mt-3">{{ old('alasanC', $penilaian->alasanEnglish->c) }}</textarea>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>D</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="alasanDEnglish" class="alasanDEnglish mt-3">{{ old('alasanD', $penilaian->alasanEnglish->d) }}</textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-brown" id="btnSave"
                                                style="width: 100%">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </form>
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
        $("body").on("click", "#removeBtn", function() {
            var id = $(this).data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/guru/aktivitas-belajar/materi/destroy/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.code == 200) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location
                                        .reload(); // Refresh halaman setelah mengklik OK
                                });
                            } else if (response.code == 500) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message,
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>

    <script>
        fileUpload.onchange = (evt) => {
            const [file] = fileUpload.files;
            if (file) {
                // Batasan ukuran file (10MB)
                const maxSizeInBytes = 10 * 1024 * 1024; // 10MB
                if (file.size <= maxSizeInBytes) {
                    // Batasan jenis file (PNG, JPG, JPEG)
                    const allowedExtensions = ["PDF", "pdf"];
                    const fileExtension = file.name.split(".").pop().toLowerCase();
                    if (allowedExtensions.includes(fileExtension)) {} else {
                        alert(
                            "Jenis file yang diunggah tidak diizinkan. Harap pilih file dengan format PDF."
                        );
                        fileUpload.value = null; // Menghapus file yang dipilih
                    }
                } else {
                    alert("Ukuran file terlalu besar. Harap pilih file dengan ukuran maksimal 10MB.");
                    fileUpload.value = null; // Menghapus file yang dipilih
                }
            }
        };
    </script>
@endpush
