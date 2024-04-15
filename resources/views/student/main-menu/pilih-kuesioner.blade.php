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
                            <div class="col-sm-12 col-md-6 mt-3">
                                <a class="btn btn-light text-center" href="{{ route('student.penilaian.diri') }}"
                                    style="width: 100%">
                                    <h4 class="mt-2"><b>Self Assesment</b></h6>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-3">
                                <a href="{{ route('student.peer.assesment') }}" class="btn btn-light text-center"
                                    style="width: 100%">
                                    <h4 class="mt-2"><b>Peer Assesment</b></h4>
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
