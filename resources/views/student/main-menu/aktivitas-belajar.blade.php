@extends('student.main-menu.layout.app')

@section('title')
@endsection

@push('addons-css')
    <style>
        .font-weight-600 {
            font-weight: 600;
        }

        .card-border {
            border-radius: 25px;
            width: 100%;
            height: auto;
        }

        .btn-custom-red {
            background-color: #F8B7A3;
        }

        .btn-custom-red:hover {
            background-color: #f79578;
        }

        .btn-custom-yellow {
            background-color: #F9F597;
        }

        .btn-custom-yellow:hover {
            background-color: #e9e446;
        }
    </style>
@endpush


@section('content')
    <!-- As a link -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="{{ route('main.menu') }}">
                    <i class="fa-solid fa-arrow-left fa-2x text-black"></i>
                </a>
            </div>
            <div class="col-4 text-end">
                <i class="fa-regular fa-circle-question fa-2x text-black"></i>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1><b>Aktivitas Belajar</b></h1>
                    </div>
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%">
                                <div class="card-body">
                                    @foreach ($activities as $key => $activity)
                                        <div class="row">
                                            <div class="col-3 text-center">
                                                <img src="{{ asset($activity->thumbnail) }}" class="w-75 mt-2 img-circle"
                                                    alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h2><b>{{ $activity->title }}</b></h2>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row mt-4">
                                                            <div class="col-6">
                                                                <button {{-- href="{{ route('materi', [
                                                                        'title' => $activity->title,
                                                                        'no' => 1,
                                                                    ]) }}" --}} data-bs-toggle="modal"
                                                                    data-bs-target="#codeModal{{ $activity->id }}"
                                                                    class="btn btn-lg btn-custom-yellow font-aktivitas"
                                                                    data-title="{{ $activity->title }}" data-no="1"
                                                                    id="materi" style="width: 100%;">
                                                                    <b>
                                                                        <h5 class="mt-2">
                                                                            <b>Materi</b>
                                                                        </h5>
                                                                    </b>
                                                                </button>
                                                            </div>
                                                            <div class="col-6">
                                                                <button class="btn btn-lg btn-custom-red font-aktivitas"
                                                                    style="width: 100%;">
                                                                    <h5 class="mt-2">
                                                                        <b>
                                                                            <b>Aktivitas {{ $key += 1 }}</b>
                                                                        </b>
                                                                    </h5>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($activities as $activity)
        <!-- Modal -->
        <div class="modal fade" id="codeModal{{ $activity->id }}" tabindex="-1" aria-labelledby="codeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="codeModalLabel">Masukkan Kode</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('aktivitas.belajar.cek.kode') }}" method="POST">
                            @csrf
                            <input type="text" name="code" placeholder="Masukkan Kode" class="form-control"
                                id="">
                            <input type="hidden" name="title" value="{{ $activity->title }}" id="">
                            <input type="hidden" name="no" value="1" id="">
                            <button class="mt-3 btn btn-primary" style="width: 100%" type="submit">Masuk</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('addons-js')
@endpush
