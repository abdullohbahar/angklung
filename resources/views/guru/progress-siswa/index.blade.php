@extends('guru.layout.app')

@section('title')
    Progress Siswa
@endsection

@push('addons-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Progress Siswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Progress Siswa</li>
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
                    <div class="card-header">
                        <h3>
                            <b>Progress Aktivitas Belajar</b>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @php
                                    if ($progressGetaran <= 25) {
                                        $color = 'bg-danger';
                                    } elseif ($progressGetaran <= 50) {
                                        $color = 'bg-warning';
                                    } elseif ($progressGetaran <= 75) {
                                        $color = 'bg-info';
                                    } elseif ($progressGetaran <= 100) {
                                        $color = 'bg-success';
                                    }
                                @endphp
                                <h5 for="" class="mt-3"><b>Getaran</b></h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped {{ $color }}" role="progressbar"
                                        style="width: {{ $progressGetaran }}%;" aria-valuenow="{{ $progressGetaran }}"
                                        aria-valuemin="0" aria-valuemax="100"><b>{{ $progressGetaran }}%</b></div>
                                </div>
                                @php
                                    if ($progressGelombang <= 25) {
                                        $color = 'bg-danger';
                                    } elseif ($progressGelombang <= 50) {
                                        $color = 'bg-warning';
                                    } elseif ($progressGelombang <= 75) {
                                        $color = 'bg-info';
                                    } elseif ($progressGelombang <= 100) {
                                        $color = 'bg-success';
                                    }
                                @endphp
                                <h5 for="" class="mt-3"><b>Gelombang</b></h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped {{ $color }}" role="progressbar"
                                        style="width: {{ $progressGelombang }}%;" aria-valuenow="{{ $progressGelombang }}"
                                        aria-valuemin="0" aria-valuemax="100"><b>{{ $progressGelombang }}%</b></div>
                                </div>
                                @php
                                    if ($progressGelombangBunyi <= 25) {
                                        $color = 'bg-danger';
                                    } elseif ($progressGelombangBunyi <= 50) {
                                        $color = 'bg-warning';
                                    } elseif ($progressGelombangBunyi <= 75) {
                                        $color = 'bg-info';
                                    } elseif ($progressGelombangBunyi <= 100) {
                                        $color = 'bg-success';
                                    }
                                @endphp
                                <h5 for="" class="mt-3"><b>Gelombang Bunyi</b></h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped {{ $color }}" role="progressbar"
                                        style="width: {{ $progressGelombangBunyi }}%;"
                                        aria-valuenow="{{ $progressGelombangBunyi }}" aria-valuemin="0"
                                        aria-valuemax="100"><b>{{ $progressGelombangBunyi }}%</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <b>Riwayat Presensi</b>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-bolder">
                                            <td><b>No</b></td>
                                            <td><b>Tanggal</b></td>
                                            <td><b>Keterangan</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($presensis as $presensi)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($presensi->tanggal)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-capitalize">
                                                    {{ $presensi->status }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Belum ada riwayat presensi</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    <b>Jawaban Aktivitas Belajar</b>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionGetaran">
                            <div class="card">
                                <div class="card-header" id="headingGetaran">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseGetaran" aria-expanded="true"
                                            aria-controls="collapseGetaran">
                                            <h4>
                                                <b>
                                                    Getaran
                                                </b>
                                            </h4>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseGetaran" class="collapse" aria-labelledby="headingGetaran"
                                    data-parent="#accordionGetaran">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/ttgLyWFINJI?si=d6D2SdrQK7RLEwGJ"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 mt-3">
                                                        <b>
                                                            Pernahkah kalian melihat atau merasakan secara langsung
                                                            peristiwa
                                                            tersebut?
                                                        </b>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <textarea name="jawaban1" readonly class="form-control" style="height: 100px" id="">{{ $jawabanGetaran1 ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-3">
                                                        <b>
                                                            Apa yang menyebabkan senar berbunyi?
                                                        </b>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <textarea name="jawaban2" readonly class="form-control" style="height: 100px" id="">{{ $jawabanGetaran2 ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <iframe width="560" height="315"
                                                            src="https://www.youtube.com/embed/kx1LVu8MobQ?si=oWOIybaa3oZlK4KJ"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <b>
                                                            Apa yang dimaksud getaran?
                                                        </b>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <textarea name="jawaban3" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                            style="height: 100px" id="">{{ $jawabanGetaran3 }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-3">
                                                        <b>
                                                            Apa saja bentuk-bentuk getaran dalam kehidupan sehari-hari?
                                                        </b>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <textarea name="jawaban4" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                            style="height: 100px" id="">{{ $jawabanGetaran4 }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="accordion" id="accordionGelombang">
                            <div class="card">
                                <div class="card-header" id="headingGelombang">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseGelombang" aria-expanded="true"
                                            aria-controls="collapseGelombang">
                                            <h4>
                                                <b>
                                                    Gelombang
                                                </b>
                                            </h4>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseGelombang" class="collapse" aria-labelledby="headingGelombang"
                                    data-parent="#accordionGelombang">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <iframe width="560" height="315"
                                                        src="https://www.youtube.com/embed/thbfMutWkEU?si=FT2jS1-gF5QBHmQW"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <b>Fenomena apa yang terjadi ?</b>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <textarea name="jawaban1" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                        style="height: 100px" id="">{{ $jawabanGelombang1 }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr> <br>
                                                <h6>
                                                    <b>Eksplorasi</b>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <iframe
                                                    src="https://phet.colorado.edu/sims/html/waves-intro/latest/waves-intro_en.html"
                                                    width="600" height="400" allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="col-12 mt-3">
                                                    <b>Pertanyaan setelah melakukan eksplorasi, apa yang kalian ketahui
                                                        tentang
                                                        gelombang ?</b>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <textarea name="jawaban1" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                        style="height: 100px" id="">{{ $jawabanEksplorasiGelombang }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>
                                                    <b>Untuk menambah wawasan, silakan tonton video berikut ini !</b>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/lVdQ8JMcmYY?si=jauCEcy6RXgG_wA8"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                1. Bagaimana perbedaan gelombang transversal dan gelombang longitudinal !
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban2" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                    style="height: 100px" id="">{{ $jawabanGelombang2 ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                2. Sebutkan contoh gelombang transversal dan gelombang longitudinal
                                                (masing-masing 2)
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban3" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                    style="height: 100px" id="">{{ $jawabanGelombang3 ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionGelombangBunyi">
                            <div class="card">
                                <div class="card-header" id="headingGelombangBunyi">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseGelombangBunyi"
                                            aria-expanded="true" aria-controls="collapseGelombangBunyi">
                                            <h4>
                                                <b>
                                                    Gelombang Bunyi
                                                </b>
                                            </h4>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseGelombangBunyi" class="collapse" aria-labelledby="headingGelombangBunyi"
                                    data-parent="#accordionGelombangBunyi">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <h5>
                                                    <p style="text-align: justify;">
                                                        Setiap alat music memiliki keunikan tersendiri dari bunyi yang
                                                        dihasilkannya. Angklung merupakan alat musik tradisional yang
                                                        terbuat
                                                        dari
                                                        bambu. Cara memainkan Angklung terbilang unik yaitu dengan cara
                                                        digoyangkan
                                                        sehingga menimbulkan getaran.
                                                    </p>
                                                </h5>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/WcIghfnVzyM?si=99afym3cjj2ZxVfe"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <h6>
                                                    <p style="text-align: justify;">
                                                        Angklung seringkali dimainkan sebagai pengiring lagu ataupun
                                                        tarian-tarian
                                                        pada acara tertentu oleh masyarakat Jawa Barat. Sebagian besar
                                                        masyarakat
                                                        menganggap music sebagai seni, padahal konsep mengandung banyak
                                                        konsep
                                                        dasar
                                                        fisika khususnya konsep gelombang bunyi. Parameter dasar yang biasa
                                                        digunakan pada music yaitu Pitch, Timbre, Loudness (kenyaringan) dan
                                                        Timbre
                                                        (Warna Bunyi).
                                                    </p>
                                                </h6>
                                                <img src="{{ asset('./img/timbre.png') }}" style="width: 100%"
                                                    alt="" srcset="">
                                            </div>
                                            <div class="col-12 mt-3">
                                                <h5>
                                                    <b>Carilah keterkaitan masing-masing parameter music dengan konsep
                                                        sains!</b>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    1. Pitch
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban1" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                    style="height: 150px" id="">{{ $jawabanGelombangBunyi1 ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    2. Timbre
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban2" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                    style="height: 150px" id="">{{ $jawabanGelombangBunyi2 ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    3. Rhythm
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban3" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                    style="height: 150px" id="">{{ $jawabanGelombangBunyi3 ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <b>
                                                    4. Loudness
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban4" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                    style="height: 150px" id="">{{ $jawabanGelombangBunyi4 ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <b>
                                                    Berdasarkan studi literatur terkait parameter musik dan konsep sains
                                                    yang telah dilakukan, cobalah buatkan gambar/skema yang menjelaskan
                                                    variabel fisis dengan parameter musik.
                                                </b>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <textarea name="jawaban5" readonly class="form-control" placeholder="Tuliskan Jawaban Anda Disini"
                                                    style="height: 150px" id="">{{ $jawabanGelombangBunyi5 ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
@endsection

@push('addons-js')
    <script>
        var token = $('meta[name="csrf-token"]').attr('content');


        // destroy anak asuh
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        $("body").on("click", "#removeBtn", function() {
            var id = $(this).data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data materi dan aktivitas yang berhubungan akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/guru/forum/destroy/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.code == 200) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location
                                        .reload(); // Refresh halaman setelah mengklik OK
                                });
                            } else if (response.code == 500) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message,
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
@endpush
