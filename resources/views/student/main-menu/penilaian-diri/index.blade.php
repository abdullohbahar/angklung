@extends('student.main-menu.layout.app')

@section('title')
    Penilaian Diri
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
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('student.store.penilaian.diri') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>Pernyataan</th>
                                                <th>
                                                    Sangat Tidak Setuju
                                                </th>
                                                <th>
                                                    Tidak Setuju
                                                </th>
                                                <th>
                                                    Setuju
                                                </th>
                                                <th>Sangat Setuju</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($kuesioners as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        {{ $item->pernyataan }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban[{{ $item->id }}]"
                                                                    value="Sangat Tidak Setuju" name="{{ $item->id }}"
                                                                    id="{{ $item->id }}"
                                                                    style="width: 23px; height: 23px" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban[{{ $item->id }}]" value="Tidak Setuju"
                                                                    name="{{ $item->id }}" id="{{ $item->id }}"
                                                                    style="width: 23px; height: 23px">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban[{{ $item->id }}]" value="Setuju"
                                                                    name="{{ $item->id }}" id="{{ $item->id }}"
                                                                    style="width: 23px; height: 23px">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban[{{ $item->id }}]"
                                                                    value="Sangat Setuju" name="{{ $item->id }}"
                                                                    id="{{ $item->id }}"
                                                                    style="width: 23px; height: 23px">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Simpan</button>
                        </form>
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
