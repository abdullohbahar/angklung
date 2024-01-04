@extends('admin.layout.app')

@section('title')
    Profil Pengembang
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
                        <h1 class="m-0">Profil Pengembang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profil Pengembang</li>
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
                        <form action="{{ route('store.profil.pengembang') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $profil->id ?? 0 }}" id="">
                            <div class="row">
                                <div class="col-12">
                                    <img class="w-25" id="imagePreview" alt="" srcset="">
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="">Foto</label>
                                    <input type="file" name="foto" id="imageUpload"
                                        class="form-control @error('foto') is-invalid @enderror" id="">
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="">Deskripsi</label>
                                    <textarea name="body" class="editor" style="width: 100%;">{{ old('body', $profil->body ?? '') }}</textarea>
                                    @error('body')
                                        <small style="color: red;">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-brown mt-3" style="width: 100%">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4><b>Profil Pengembang</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="sm-12 col-lg-4 col-md-4">
                                <img src="{{ asset($profil->foto ?? '') }}" class="img-fluid w-100" alt=""
                                    srcset="">
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                {!! $profil->body ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
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
