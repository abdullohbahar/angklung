@extends('student.main-menu.layout.app')

@section('title')
    Quiz
@endsection

@push('addons-css')
    <style>
        .card-hover:hover {
            background-color: #FDDEAE
        }
    </style>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2><b>Mari Kita Mengerjakan Quiz</b></h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <a href="{{ route('student.quiz.getaran') }}"
                                        class="text-decoration-none col-12 content-center gx-3 gy-3">
                                        <div class="card card-border card-hover" style="height: 100%">
                                            <div class="card-body text-center">
                                                <h3><b>Getaran</b></h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('materi.gelombang.quiz') }}"
                                        class="text-decoration-none col-12 content-center gx-3 gy-3">
                                        <div class="card card-border card-hover" style="height: 100%">
                                            <div class="card-body text-center">
                                                <h3><b>Gelombang</b></h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('student.quiz.sistem.pendengaran') }}"
                                        class="text-decoration-none col-12 content-center gx-3 gy-3">
                                        <div class="card card-border card-hover" style="height: 100%">
                                            <div class="card-body text-center">
                                                <h3><b>Sistem Pendengaran</b></h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('student.quiz.mekanisme.pendengaran') }}"
                                        class="text-decoration-none col-12 content-center gx-3 gy-3">
                                        <div class="card card-border card-hover" style="height: 100%">
                                            <div class="card-body text-center">
                                                <h3><b>Mekanisme Pendengaran</b></h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
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
