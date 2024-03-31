@extends('guru.layout.app')

@section('title')
    Tambah Soal
@endsection

@push('addons-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .custom-radio {
            margin-left: 2% !important;
        }

        .ck-content {
            height: 300px !important;
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
                        <h1 class="m-0">Tambah Soal</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Soal</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('guru.store.penilaian') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Tambah Soal Versi Indonesia</b></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                    <h3>
                                        <b>Soal</b>
                                    </h3>
                                    <textarea name="body" class="editor" style="width: 100%;">{{ old('body') }}</textarea>
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
                                                        <textarea name="jawabanA" class="jawabanA">{{ old('jawabanA') }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioA" name="jawabanSoal"
                                                                value="A"
                                                                {{ old('jawabanSoal') == 'A' ? 'checked' : '' }}>
                                                            <label for="customRadioA" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>B</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="jawabanB" class="jawabanB mt-3">{{ old('jawabanB') }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioB" name="jawabanSoal"
                                                                value="B"
                                                                {{ old('jawabanSoal') == 'B' ? 'checked' : '' }}>
                                                            <label for="customRadioB" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>C</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="jawabanC" class="jawabanC mt-3">{{ old('jawabanC') }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioC" name="jawabanSoal"
                                                                value="C"
                                                                {{ old('jawabanSoal') == 'C' ? 'checked' : '' }}>
                                                            <label for="customRadioC" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1%">
                                                        <b>D</b>
                                                    </td>
                                                    <td>
                                                        <textarea name="jawabanD" class="jawabanD mt-3">{{ old('jawabanD') }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanSoal') is-invalid @enderror"
                                                                type="radio" id="customRadioD" name="jawabanSoal"
                                                                value="D"
                                                                {{ old('jawabanSoal') == 'D' ? 'checked' : '' }}>
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
                                                        <textarea name="alasanA" class="alasanA mt-3">{{ old('alasanA') }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanA" name="jawabanAlasan"
                                                                value="A"
                                                                {{ old('jawabanAlasan') == 'A' ? 'checked' : '' }}>
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
                                                        <textarea name="alasanB" class="alasanB mt-3">{{ old('alasanB') }}</textarea>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanB"
                                                                name="jawabanAlasan" value="B"
                                                                {{ old('jawabanAlasan') == 'B' ? 'checked' : '' }}>
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
                                                        <textarea name="alasanC" class="alasanC mt-3">{{ old('alasanC') }}</textarea>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanC"
                                                                {{ old('jawabanAlasan') == 'C' ? 'checked' : '' }}
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
                                                        <textarea name="alasanD" class="alasanD mt-3">{{ old('alasanD') }}</textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                                class="custom-control-input @error('jawabanAlasan') is-invalid @enderror"
                                                                type="radio" id="customRadioAlasanD"
                                                                name="jawabanAlasan" value="D"
                                                                {{ old('jawabanAlasan') == 'D' ? 'checked' : '' }}>
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

                    <div class="card mt-5">
                        <div class="card-header">
                            <h4><b>Tambah Soal Versi Bahasa Inggris</b></h4>
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
                                        <textarea name="bodyEnglish" class="editorEnglish" style="width: 100%;">{{ old('bodyEnglish') }}</textarea>
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
                                                            <textarea name="jawabanAEnglish" class="jawabanAEnglish">{{ old('jawabanAEnglish') }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>B</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="jawabanBEnglish" class="jawabanBEnglish mt-3">{{ old('jawabanBEnglish') }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>C</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="jawabanCEnglish" class="jawabanCEnglish mt-3">{{ old('jawabanCEnglish') }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>D</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="jawabanDEnglish" class="jawabanDEnglish mt-3">{{ old('jawabanDEnglish') }}</textarea>
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
                                                            <textarea name="alasanAEnglish" class="alasanAEnglish mt-3">{{ old('alasanAEnglish') }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>B</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="alasanBEnglish" class="alasanBEnglish mt-3">{{ old('alasanBEnglish') }}</textarea>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>C</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="alasanCEnglish" class="alasanCEnglish mt-3">{{ old('alasanCEnglish') }}</textarea>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 1%">
                                                            <b>D</b>
                                                        </td>
                                                        <td>
                                                            <textarea name="alasanDEnglish" class="alasanDEnglish mt-3">{{ old('alasanDEnglish') }}</textarea>
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
