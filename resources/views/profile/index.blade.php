@extends('guru.layout.app')

@section('title')
    Profil
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
                        <h1 class="m-0">Profil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset(auth()->user()->foto ?? '../guest-assets/dummy-profile.jpg') }}"
                                        alt="User profile picture" id="imagePreview">
                                </div>

                                <h3 class="profile-username text-center">{{ auth()->user()->fullname ?? '' }}</h3>

                                <p class="text-muted text-center">{{ auth()->user()->username ?? '' }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('update.profile', auth()->user()->id ?? '') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <label for="">Foto <small>Kosongkan Jika Tidak Memiliki
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
                                            <label for="">Username</label>
                                            <input type="text" name="username"
                                                value="{{ old('username', auth()->user()->username ?? '') }}"
                                                class="form-control @error('username') is-invalid @enderror" id=""
                                                required>
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="fullname"
                                                value="{{ old('fullname', auth()->user()->fullname ?? '') }}"
                                                class="form-control @error('fullname') is-invalid @enderror" id=""
                                                required>
                                            @error('fullname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <label for="">Password</label>
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
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
                                            <button type="submit" class="btn btn-brown" style="width: 100%">Ubah
                                                Profil</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('addons-js')
@endpush
