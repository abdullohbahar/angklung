@extends('student.main-menu.layout.app')

@section('title')
    Forum
@endsection

@push('addons-css')
    <style>
        .font-weight-600 {
            font-weight: 600;
        }

        .outline-font {
            text-shadow: -1px -1px 0 white, 1px -1px 0 white, -1px 1px 0 white, 1px 1px 0 white;
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
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <h1><b class="outline-font">Pilih Forum</b></h1>
                    </div>
                    <div class="row ms-0">
                        @foreach ($forums as $forum)
                            <div class="col-12">
                                <a href="{{ route('student.detail.forum', $forum->id) }}" class="card">
                                    <div class="card-body">
                                        <h3>
                                            <b>{{ $forum->judul }}</b>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
@endpush
