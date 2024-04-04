@extends('guru.layout.app')

@section('title')
    Capaian Pembelajaran
@endsection

@push('addons-css')
    <style>
        .ck-restricted-editing_mode_standard {
            height: 300px !important;
        }

        .ck-content {
            height: 300px !important;
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
                        <h1 class="m-0">Capaian Pembelajaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Capaian Pembelajaran</li>
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
                    <div class="card-body">
                        <form action="{{ route('guru.update.capaian.pembelajaran', $capaianPembelajaran->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                    <label for="">Judul</label>
                                    <input type="text" name="title"
                                        value="{{ old('title', $capaianPembelajaran->title) }}"
                                        class="form-control @error('title') is-invalid @enderror" id="title">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                    <label for="">Isi</label>
                                    <textarea name="body" class="editor" style="width: 100%;">{!! old('body', $capaianPembelajaran->body) !!}</textarea>
                                    @error('body')
                                        <small style="color: red;">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-brown" style="width: 100%">Ubah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
@endsection

@push('addons-js')
    <script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor5/initiate-ckeditor.js') }}"></script>
@endpush
