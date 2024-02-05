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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @foreach ($summary as $aktivitas)
                                    @foreach ($aktivitas as $summary)
                                        @php
                                            if ($summary['presentase'] <= 25) {
                                                $color = 'bg-danger';
                                            } elseif ($summary['presentase'] <= 50) {
                                                $color = 'bg-warning';
                                            } elseif ($summary['presentase'] <= 75) {
                                                $color = 'bg-info';
                                            } elseif ($summary['presentase'] <= 100) {
                                                $color = 'bg-success';
                                            }
                                        @endphp
                                        <h5 for="" class="mt-3"><b>{{ $summary['title'] }}</b></h5>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped {{ $color }}"
                                                role="progressbar" style="width: {{ $summary['presentase'] }}%;"
                                                aria-valuenow="{{ $summary['presentase'] }}" aria-valuemin="0"
                                                aria-valuemax="100"><b>{{ $summary['presentase'] }}%</b></div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card">
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
