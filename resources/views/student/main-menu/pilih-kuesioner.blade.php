@extends('student.main-menu.layout.app')

@section('title')
@endsection

@push('addons-css')
    <style>
        .fa-5xl {
            font-size: 5em;
            line-height: .03125em;
        }

        .card-bg-coklat {
            background-color: #f3b87c;
        }

        .active {
            background-color: #F0BD63 !important;
            color: black !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-12 my-4 text-center outline">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="card">
                    @include('student.main-menu.tabs')
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('student.penilaian.diri') }}"
                                class="text-decoration-none col-6 content-center gx-3 gy-3">
                                <div class="card card-border" style="">
                                    <div class="card-body text-center">
                                        <div class="mt-3">
                                            <h1><b>Self <br> Assesment</b></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                                <div class="card card-border">
                                    <div class="card-body text-center">
                                        <div class="mt-3">
                                            <h1><b>Peer <br> Assesment</b></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
