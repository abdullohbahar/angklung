@extends('guru.layout.app')

@section('title')
    Materi {{ $aktivitasBelajar->title }}
@endsection

@push('addons-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .ck-content {
            height: 300px !important;
        }

        .remove {
            float: right;
        }

        iframe {
            width: 100%;
            height: 100%;
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
                        <h1 class="m-0">Materi {{ $aktivitasBelajar->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Materi {{ $aktivitasBelajar->title }}</li>
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
                        <h4><b>Tambah Materi</b></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('guru.store.materi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- <div class="col-12">
                                    <label for="">Nomor</label>
                                    <input type="text" name="no"
                                        class="form-control @error('no') is-invalid @enderror" id="" required>
                                    @error('no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                    <label for="">Embed Youtube</label>
                                    <textarea name="video" class="form-control @error('video') is-invalid @enderror" id="" rows="10"></textarea>
                                    @error('video')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="editor" style="width: 100%;">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <small style="color: red;">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <input type="hidden" name="idAktivitasBelajar" value="{{ $aktivitasBelajar->id }}">
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <div class="questions-container">
                                        <!-- Pertanyaan 1 -->
                                        <div class="question" data-question-number="1">
                                            <label for="">Pertanyaan 1</label>
                                            <textarea name="pertanyaan[]" class="form-control" style="width: 100%;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="button" class="btn btn-success add mt-3">Tambah
                                        Pertanyaan</button>
                                </div>
                                <div class="col-12 mt-3">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <label for="">Keterangan tentang materi yang ditampilkan - <small
                                            style="color: red">
                                            Biarkan kosong jika tidak ada
                                        </small></label>

                                    <textarea name="keterangan_materi" class="form-control" style="width:100%; height: 200px"></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <label for="">Eksplorasi - <small style="color: red">
                                            Biarkan kosong jika tidak ada
                                        </small></label>

                                    <textarea name="eksplorasi" class="form-control" style="width:100%; height: 200px"></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <label for="">Refleksi - <small style="color: red">
                                            Biarkan kosong jika tidak ada
                                        </small></label>

                                    <textarea name="refleksi" class="form-control" style="width:100%; height: 200px"></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="is_discussion" class="form-check-input"
                                            id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Tambahkan diskusi di materi ini
                                            - <small style="color: red">
                                                Biarkan kosong jika tidak ada</small></label>
                                    </div>
                                </div>
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
                                List Materi</b></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Video</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($aktivitasBelajar->materi as $materi)
                                    <tr>
                                        <td>{{ $materi->no }}</td>
                                        <td>
                                            {!! $materi->video !!}
                                        </td>
                                        <td>{!! $materi->deskripsi !!}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('guru.materi.forum', $materi->id) }}" type="button"
                                                    class="btn btn-info"
                                                    {{ $materi->is_discussion == true ? '' : 'hidden' }}>Forum</a>
                                                <a href="{{ route('guru.edit.materi', $materi->id) }}" type="button"
                                                    class="btn btn-warning">Ubah</a>
                                                <button type="button" class="btn btn-danger" id="removeBtn"
                                                    data-id="{{ $materi->id }}">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
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

    <script>
        $(document).ready(function() {
            // Menambah pertanyaan baru
            $(".add").click(function() {
                var lastQuestionNumber = $(".questions-container .question").last().data(
                    "question-number") || 0;
                var newQuestionNumber = lastQuestionNumber + 1;

                var newQuestion = '<div class="question" data-question-number="' + newQuestionNumber +
                    '">' +
                    '<label for="">Pertanyaan ' + newQuestionNumber + '</label>' +
                    '<textarea name="pertanyaan[]" class="form-control" style="width: 100%;"></textarea>' +
                    '<button type="button" class="btn btn-sm mt-1 btn-danger remove">Hapus Pertanyaan</button>' +
                    '</div>';

                $(".questions-container").append(newQuestion);
            });

            // Menghapus pertanyaan
            $(".questions-container").on("click", ".remove", function() {
                $(this).closest(".question").remove();
                // Update question numbers
                $(".questions-container .question").each(function(index) {
                    $(this).attr("data-question-number", index + 1);
                    $(this).find("label").text("Pertanyaan " + (index + 1));
                });
            });
        });
    </script>
@endpush
