@extends('admin.layout.app')

@section('title')
    Data Guru
@endsection

@push('addons-css')
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Guru</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Guru</li>
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
                        <form action="{{ route('admin.update.data.guru', $teacher->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Preview Foto</label> <br>
                                    <img src="{{ asset($teacher->foto) }}" class="w-25" alt="" id="imagePreview">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Foto <small>Kosongkan Jika Tidak Ingin Mengubah
                                            Foto</small></label>
                                    <input type="file" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror" id="imageUpload">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="fullname" value="{{ old('fullname', $teacher->fullname) }}"
                                        class="form-control @error('fullname') is-invalid @enderror" id="fullname">
                                    @error('fullname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="{{ old('username', $teacher->username) }}"
                                        class="form-control @error('username') is-invalid @enderror" id="username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Password <small>Kosongkan jika tidak ingin mengubah
                                            password</small></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" id="password"
                                            value="{{ old('password') }}" autocomplete="new-password">
                                        <div class="input-group-text" id="view-password">
                                            <i class="fas fa-eye" id="icon-password"></i>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
@endpush
