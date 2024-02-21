@extends('student.main-menu.layout.app')

@section('title')
    Forum
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

        .btn-custom-orange {
            background-color: #f18016;
            color: white;
        }

        .btn-custom-orange:hover {
            background-color: #d46905;
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

        .outline {
            -webkit-text-stroke: 1px white;
        }
    </style>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        .font-weight-600 {
            font-weight: 600;
        }

        .outline-font {
            text-shadow: -1px -1px 0 white, 1px -1px 0 white, -1px 1px 0 white, 1px 1px 0 white;
        }

        body {
            font-family: Roboto, sans-serif;
            font-size: 13px;
            line-height: 1.42857143;
            color: #767676;
            background-color: #edecec;
        }

        #messages-main {
            position: relative;
            margin: 0 auto;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }

        #messages-main:after,
        #messages-main:before {
            content: " ";
            display: table;
        }

        #messages-main .ms-menu {
            position: absolute;
            left: 0;
            top: 0;
            border-right: 1px solid #eee;
            padding-bottom: 50px;
            height: 100%;
            width: 240px;
            background: #fff;
        }

        @media (max-width:767px) {
            #messages-main .ms-menu {
                height: calc(100% - 58px);
                display: none;
                z-index: 1;
                top: 58px;
            }

            #messages-main .ms-menu.toggled {
                display: block;
            }

            #messages-main .ms-body {
                overflow: hidden;
            }
        }

        #messages-main .ms-user {
            padding: 15px;
            background: #f8f8f8;
        }

        #messages-main .ms-user>div {
            overflow: hidden;
            padding: 3px 5px 0 15px;
            font-size: 11px;
        }

        #messages-main #ms-compose {
            position: fixed;
            bottom: 120px;
            z-index: 1;
            right: 30px;
            box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
        }

        #ms-menu-trigger {
            user-select: none;
            position: absolute;
            left: 0;
            top: 0;
            width: 50px;
            height: 100%;
            padding-right: 10px;
            padding-top: 19px;
        }

        #ms-menu-trigger i {
            font-size: 21px;
        }

        #ms-menu-trigger.toggled i:before {
            content: '\f2ea'
        }

        .fc-toolbar:before,
        .login-content:after {
            content: ""
        }

        .message-feed {
            padding: 20px;
        }

        #footer,
        .fc-toolbar .ui-button,
        .fileinput .thumbnail,
        .four-zero,
        .four-zero footer>a,
        .ie-warning,
        .login-content,
        .login-navigation,
        .pt-inner,
        .pt-inner .pti-footer>a {
            text-align: center;
        }

        .message-feed.right>.pull-right {
            margin-left: 15px;
        }

        .message-feed:not(.right) .mf-content {
            background: #eee;
            color: black;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }

        .message-feed.right .mf-content {
            background: #03a9f4;
            color: white;
        }

        .mf-content {
            padding: 10px 10px 10px;
            display: inline-block;
            width: 91%;
            border-radius: 10px;
        }

        .mf-date {
            display: block;
            color: #B3B3B3;
            margin-top: 7px;
        }

        .mf-date>i {
            font-size: 14px;
            line-height: 100%;
            position: relative;
            top: 1px;
        }

        .msb-reply {
            box-shadow: 0 -20px 20px -5px #fff;
            position: fixed;
            /* change position to fixed */
            bottom: 0;
            /* stick to the bottom */
            left: 0;
            /* extend to the left edge */
            right: 0;
            /* extend to the right edge */
            width: 100%;
            /* make it full-width */
            border-top: 1px solid #eee;
            background: #f8f8f8;
        }

        .four-zero,
        .lc-block {
            box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
        }

        .msb-reply textarea {
            width: 100%;
            font-size: 13px;
            border: 0;
            padding: 10px 15px;
            resize: none;
            height: 80px;
            background: 0 0;
        }

        .msb-reply button {
            position: absolute;
            top: 0;
            right: 0;
            border: 0;
            height: 100%;
            width: 60px;
            font-size: 25px;
            color: #2196f3;
            background: 0 0;
        }

        .msb-reply button:hover {
            background: #f2f2f2;
        }

        .img-avatar {
            height: 37px;
            border-radius: 2px;
            width: 37px;
        }

        .list-group.lg-alt .list-group-item {
            border: 0;
        }

        .p-15 {
            padding: 15px !important;
        }

        .btn:not(.btn-alt) {
            border: 0;
        }

        .action-header {
            position: relative;
            background: #f8f8f8;
            padding: 15px 13px 15px 17px;
        }

        .ah-actions {
            z-index: 3;
            float: right;
            margin-top: 7px;
            position: relative;
        }

        .actions {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .actions>li {
            display: inline-block;
        }

        .actions:not(.a-alt)>li>a>i {
            color: #939393;
        }

        .actions>li>a>i {
            font-size: 20px;
        }

        .actions>li>a {
            display: block;
            padding: 0 10px;
        }

        .ms-body {
            background: #fff;
        }

        #ms-menu-trigger {
            user-select: none;
            position: absolute;
            left: 0;
            top: 0;
            width: 50px;
            height: 100%;
            padding-right: 10px;
            padding-top: 19px;
            cursor: pointer;
        }

        #ms-menu-trigger,
        .message-feed.right {
            text-align: right;
        }

        #ms-menu-trigger,
        .toggle-switch {
            -webkit-user-select: none;
            -moz-user-select: none;
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

    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="row ms-0">
                        <div class="col-12">
                            <div class="card card-border" style="width: 100%; margin-bottom: 100px !important">
                                <div class="card-header text-center">

                                    <h1 class="mr-5">Forum</h1>
                                    <h5>
                                        <b>Tuliskan resume hasil diskusi yang telah kalian lakukan dikelas !</b>
                                    </h5>
                                    <a href="{{ route('materi.gelombang.orientasi2') }}"
                                        class="btn btn-custom-orange rounded-pill" style="width: 20%; float: right;">
                                        Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    {{-- forum --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="container bootstrap snippets bootdey" style="min-height: 200px;">
                                                <div class="tile tile-alt" id="messages-main">
                                                    <div class="ms-body">
                                                        @foreach ($forum as $content)
                                                            @if ($content->user_id == $userID)
                                                                <div class="message-feed right">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span
                                                                            class="direct-chat-name float-right">{{ $content->user->fullname }}</span>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <img src="{{ asset($content->user->foto) }}"
                                                                            alt="" class="img-avatar">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="mf-content">
                                                                            {!! $content->body !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="message-feed media" style="text-align: left;">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span
                                                                            class="direct-chat-name float-left">{{ $content->user->fullname }}</span>
                                                                    </div>
                                                                    <div class="pull-left">
                                                                        <img src="{{ asset($content->user->foto) }}"
                                                                            alt="" class="img-avatar">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="mf-content" style="margin-left: 10px;">
                                                                            {!! $content->body !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                        <form action="{{ route('materi.gelombang.store.forum') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="msb-reply">
                                                                <textarea name="body" placeholder="Ketikan pendapat anda disini"></textarea>
                                                                <button type="submit"><i
                                                                        class="fa fa-paper-plane-o"></i></button>
                                                            </div>
                                                        </form>
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
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
    <script>
        $(function() {
            if ($('#ms-menu-trigger')[0]) {
                $('body').on('click', '#ms-menu-trigger', function() {
                    $('.ms-menu').toggleClass('toggled');
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Tuliskan Disini',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                ]
            });
        });
    </script>
@endpush
