@extends('guru.layout.app')

@section('title')
    Ubah Aktivitas Belajar
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
                        <h1 class="m-0">Ubah Aktivitas Belajar</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Ubah Aktivitas Belajar</li>
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
                        <form action="{{ route('guru.update.aktivitas.belajar.siswa', $aktivitasBelajar->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Judul</label>
                                    <input type="text" name="title"
                                        value="{{ old('title', $aktivitasBelajar->title) }}"
                                        class="form-control @error('title') is-invalid @enderror" id="title" required>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                    <label for="">Thumbnail</label>
                                    <input type="file" name="thumbnail" value="{{ old('thumbnail') }}"
                                        class="form-control @error('thumbnail') is-invalid @enderror" id="imageUpload"
                                        required>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6 mt-3">
                                </div>
                                <div class="col-sm-12 col-md-6 mt-3">
                                    <img src="{{ asset($aktivitasBelajar->thumbnail) }}" id="imagePreview"
                                        class="img-fluid rounded-circle w-25" alt="">
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
    <script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>

    <script>
        const watchdog = new CKSource.EditorWatchdog();

        window.watchdog = watchdog;

        watchdog.setCreator((element, config) => {
            return CKSource.Editor
                .create(element, config)
                .then(editor => {
                    return editor;
                });
        });

        watchdog.setDestructor(editor => {
            return editor.destroy();
        });

        watchdog.on('error', handleSampleError);

        watchdog
            .create(document.querySelector('.editor'), {
                // Editor configuration.
                height: '1000px'
            })
            .catch(handleSampleError);

        function handleSampleError(error) {
            const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

            const message = [
                'Oops, something went wrong!',
                `Please, report the following error on ${ issueUrl } with the build id "r26qun9n2brm-3je2fuyiqsvl" and the error stack trace:`
            ].join('\n');

            console.error(message);
            console.error(error);
        }
    </script>
@endpush
