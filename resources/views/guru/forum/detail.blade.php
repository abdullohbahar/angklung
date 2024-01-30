@extends('guru.layout.app')

@section('title')
    Forum - {{ $forum->judul }}
@endsection

@push('addons-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .note-editable {
            height: 200px !important;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Forum - {{ $forum->judul }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Forum - {{ $forum->judul }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card direct-chat direct-chat-primary"
                    style="position: relative; left: 0px; top: 0px; height: 500px">

                    <div class="card-header">
                        <div class="card-tools">
                            <button class="btn btn-danger" id="removeForum" data-id="{{ $forum->id }}">Bersihkan
                                Forum</button>
                        </div>
                    </div>

                    <div class="card-body" style="display: block;">

                        <div class="direct-chat-messages" style="height: 100%">

                            @foreach ($forum->forumContent as $content)
                                @if ($content->user->id == $userID)
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">{{ $content->user->fullname }}</span>
                                        </div>

                                        <img class="direct-chat-img" src="{{ asset($content->user->foto) }}"
                                            alt="message user image">

                                        <div class="direct-chat-text">
                                            {!! $content->body !!}
                                        </div>

                                    </div>
                                @else
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">{{ $content->user->fullname }}</span>
                                        </div>

                                        <img class="direct-chat-img" src="{{ asset($content->user->foto) }}"
                                            alt="message user image">

                                        <div class="direct-chat-text">
                                            {!! $content->body !!}
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('store.message.forum', $forum->id) }}" method="post">
                            @csrf
                            <textarea name="body" id="summernote"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
@endsection

@push('addons-js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Tuliskan Disini',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                ]
            });
        });
    </script>

    <script>
        var token = $('meta[name="csrf-token"]').attr('content');


        // destroy anak asuh
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        $("body").on("click", "#removeForum", function() {
            var id = $(this).data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Seluruh isi forum akan terhapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/guru/forum/clear/' + id,
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
@endpush
