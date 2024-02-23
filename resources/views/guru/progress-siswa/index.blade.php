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
