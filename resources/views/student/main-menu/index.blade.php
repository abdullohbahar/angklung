@extends('student.main-menu.layout.app')

@section('title')
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- As a link -->
    <nav class="navs">
        <h2><b>Halo {{ auth()->user()->fullname }}</b></h2>
    </nav>

    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="row text-center">
                    <div class="col-12 my-3 text-center">
                        <h2><b>Menu Utama</b></h2>
                    </div>
                    <a href="{{ route('capaian.pembelajaran') }}" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border" style="">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/capaian-pembelajaran.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Capaian Pembelajaran</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('aktivitas.belajar') }}" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/aktivitas-belajar.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Aktivitas Belajar</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('student.eksplorasi') }}" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/project.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Eksplorasi</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/progress.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Progress</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('student.penilaian', 1) }}"
                        class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/penilaian.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Penilaian</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="javascript:void(0)" id="{{ $button }}"
                        class="text-decoration-none col-6 content-center gx-3 gy-3" data-id="{{ $userID }}">
                        <div class="card card-border">
                            <div class="card-body">
                                <img src="{{ asset('./guest-assets/informasi-pengembang.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Presensi</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
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
@endpush
