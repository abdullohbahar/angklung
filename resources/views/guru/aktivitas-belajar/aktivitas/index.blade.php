@extends('guru.layout.app')

@section('title')
    Aktivitas | {{ $aktivitasBelajar->title }}
@endsection

@push('addons-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .ck-content {
            height: 300px !important;
        }

        iframe {
            width: 100% !important;
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
                        <h1 class="m-0">Aktivitas | {{ $aktivitasBelajar->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Aktivitas | {{ $aktivitasBelajar->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4><b>Aktivitas</b></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('guru.update.aktivitas') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $aktivitasBelajar->aktivitas?->id ?? '' }}"
                                    id="">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                    <label for="">Isi</label>
                                    <textarea name="body" class="f" style="width: 100%; height: 200px">{{ old('body', $aktivitasBelajar->aktivitas?->body) }}</textarea>
                                    @error('body')
                                        <small style="color: red;">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <input type="hidden" name="idAktivitasBelajar" value="{{ $aktivitasBelajar->id }}">
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-brown" style="width: 100%">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4><b>
                                Preview</b></h4>
                    </div>
                    <div class="card-body">
                        {!! $aktivitasBelajar->aktivitas->body !!}
                    </div>
                </div>
            </div>
            <!-- /.content -->
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
