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
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2><b>Mari Kita Mengerjakan Penilaian</b></h2>
                            </div>
                            <div class="card-body">
                                <h6>
                                    Waktu pengerjaan yaitu 60 menit terhitung saat tombol mulai diklik. Selamat mengerjakan
                                    !
                                </h6>
                                <div class="row">
                                    <div class="col-12">
                                        <h5>
                                            <b>Instruksi Pengerjaan</b>
                                        </h5>
                                        <ol>
                                            <li>Berdoalah sebelum mulai mengerjakan penilaian.</li>
                                            <li>Penilaian ini terdiri dari 20 pilihan ganda beralasan dan 4 essay. </li>
                                            <li>
                                                Kriteria penilaian untuk PG beralasan
                                                <br>
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td><b>Pertanyaan</b></td>
                                                        <td><b>Alasan</b></td>
                                                        <td><b>Skor</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Benar</td>
                                                        <td>Benar</td>
                                                        <td>4</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Benar</td>
                                                        <td>Salah</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Salah</td>
                                                        <td>Benar</td>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Salah</td>
                                                        <td>Salah</td>
                                                        <td>1</td>
                                                    </tr>
                                                </table>
                                            </li>
                                            <li>
                                                Pilihlah opsi jawaban dan alasan secara tepat
                                            </li>
                                        </ol>
                                    </div>
                                </div>
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
