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
                <h1><b>Menu Utama</b></h2>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-6">
                <div class="card">
                    @include('student.main-menu.tabs')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="{{ asset($user->foto) }}" class="rounded-circle" style="width: 15%" alt=""
                                    srcset="">
                            </div>
                            <div class="col-12 mt-5">
                                <center>
                                    <h4>
                                        {{ $user->fullname }}
                                    </h4>
                                    <h5>
                                        <b>
                                            {{ $user->username }}
                                        </b>
                                    </h5>
                                </center>
                            </div>
                            <div class="col-12 mt-3">
                                <button href="javascript:void(0)" id="{{ $button }}" class="btn btn-info"
                                    data-id="{{ $userID }}" class="btn btn-success" style="width: 100%">
                                    <b>
                                        Presensi
                                    </b>
                                </button>
                                <button id="logoutBtn" class="mt-3 btn btn-danger" style="width: 100%">
                                    <b>
                                        Keluar Dari Website
                                    </b>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPresensi" tabindex="-1" aria-labelledby="modalPresensiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalPresensiLabel">Masukkan Kode Agar Bisa Presensi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student.presensi') }}" method="POST">
                        @csrf
                        <input type="hidden" name="presensi_id" value="{{ $presensi != null ? $presensi->id : '' }}"
                            id="">
                        <input type="text" name="kode" class="form-control" placeholder="Masukkan Kode"
                            id="">
                        <button type="submit" class="btn btn-primary mt-3" style="width: 100%">Presensi</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

    <script>
        $("#logoutBtn").on("click", function() {
            Swal.fire({
                title: "Apakah anda benar ingin keluar?",
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: "Ya",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = '/siswa/logout'
                }
            });
        })
    </script>
@endpush
