@extends('student.main-menu.layout.app')

@section('title')
@endsection

@push('addons-css')
@endpush

@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="{{ route('main.menu') }}">
                    <i class="fa-solid fa-arrow-left fa-2x text-black"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="row text-center">
                    <div class="col-12 my-3 text-center">
                    </div>
                    {{-- <a href="{{ route('student.penilaian', 1) }}" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border" style="">
                            <div class="card-body text-center">
                                <div class="mt-5">
                                    <h1><b>Pilihan Ganda</b></h1>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('student.penilaian.essay', 1) }}"
                        class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <div class="mt-5">
                                    <h1><b>Essay</b></h1>
                                </div>
                            </div>
                        </div>
                    </a> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2><b>Mari Kita Mengerjakan Penilaian</b></h2>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('student.penilaian', 1) }}" style="width: 100%" class="btn btn-warning">
                                    <b>Mulai</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
    <script>
        $("#btnExist").on("click", function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'warning',
                title: 'Anda hari ini telah melakukan presensi!'
            })
        })
    </script>
    <script>
        $("#btnNotReady").on("click", function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'warning',
                title: 'Guru belum membuka presensi!'
            })
        })
    </script>

    <script>
        $("#btnNotExist").on("click", function() {
            var myModal = new bootstrap.Modal(document.getElementById("modalPresensi"), {});
            myModal.show()
        })
    </script>
@endpush
