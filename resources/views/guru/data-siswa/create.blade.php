@extends('guru.layout.app')

@section('title')
    Data Siswa
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
                        <h1 class="m-0">Data Siswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Siswa</li>
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
                        <form action="{{ route('guru.store.data.siswa') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Preview Foto</label> <br>
                                    <img class="w-25" alt="" id="imagePreview">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Foto <small>Kosongkan Jika Tidak Memiliki Foto</small></label>
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
                                    <input type="text" name="fullname" value="{{ old('fullname') }}"
                                        class="form-control @error('fullname') is-invalid @enderror" id="fullname">
                                    @error('fullname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">NIS</label>
                                    <input type="text" name="username" value="{{ old('username') }}"
                                        class="form-control @error('username') is-invalid @enderror" id="username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror" required
                                        id="">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}
                                            value="Laki-Laki">Laki-Laki</option>
                                        <option {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
                                            value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" id="password"
                                            value="{{ old('password') }}" autocomplete="new-password">
                                        <div class="input-group-append" id="view-password">
                                            <div class="input-group-text">
                                                <i class="fas fa-eye" id="icon-password"></i>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-brown" style="width: 100%">Tambah</button>
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
