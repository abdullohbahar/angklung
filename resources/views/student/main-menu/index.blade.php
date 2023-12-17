<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-repeat: no-repeat;
            background-image: url('./guest-assets/frame-3.svg');
            background-size: cover;
            width: 100%;
        }

        .margin-top {
            margin-top: 50px;
        }

        .login-wave {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url('./guest-assets/wave.svg');
        }

        .background-white {
            background-color: white;
            padding: 0;
            margin: 0;
        }

        .people-angklung {
            display: block;
            justify-content: center;
            margin-top: 10%;
            z-index: 9999;
            position: relative;
        }

        .button-masuk {
            background-color: #F18016;
            width: 40% !important;
        }

        .button-masuk:hover {
            background-color: #a36302 !important;
        }

        .text-brown {
            color: #ab6a09;
        }

        @media screen and (min-width: 0px) {
            .angklung-man {
                width: 35%;
            }

            .angklung-girl {
                width: 35%;
            }

            .login {
                margin-top: -35% !important;
                width: 100%;
            }

            .login-text {
                color: #754600;
                padding-top: 100px;
            }
        }

        @media screen and (min-width: 576px) {
            .angklung-man {
                width: 35%;
            }

            .angklung-girl {
                width: 35%;
            }

            .login {
                margin-top: -30% !important;
                width: 100%;

            }

            .login-text {
                color: #754600;
                padding-top: 100px;
            }
        }

        @media screen and (min-width: 768px) {
            .angklung-man {
                width: 25%;
            }

            .angklung-girl {
                width: 25%;
            }

            .login {
                margin-top: -30% !important;
                width: 100%;

            }

            .login-text {
                color: #754600;
                padding-top: 100px;
            }
        }

        @media screen and (min-width: 992px) {
            .angklung-man {
                width: 20%;
            }

            .angklung-girl {
                width: 20%;
            }

            .login {
                margin-top: -25% !important;
                width: 100%;

            }

            .login-text {
                color: #754600;
                padding-top: 100px;
            }
        }

        @media screen and (min-width: 1200px) {
            .angklung-man {
                width: 23%;
            }

            .angklung-girl {
                width: 23%;
            }

            .login {
                margin-top: -20% !important;
                width: 100%;

            }

            .login-text {
                color: #754600;
                padding-top: 100px;
            }
        }

        @media screen and (min-width: 1400px) {
            .angklung-man {
                width: 20%;
            }

            .angklung-girl {
                width: 20%;
            }

            .login {
                margin-top: -15% !important;
                width: 100%;

            }

            .login-text {
                color: #754600;
                padding-top: 100px;
            }
        }

        .card-border {
            border-radius: 25px;
            width: 90%;
            height: 180px;
        }

        .content-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navs {
            display: flex;
            justify-content: center;
            /* Meng-centerkan teks secara horizontal */
            align-items: center;
            /* Meng-centerkan teks secara vertikal */
            height: 70px;
            /* Sesuaikan tinggi navbar sesuai kebutuhan */
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- As a link -->
    <nav class="navs">
        <h2><b>Halo Siswa 1</b></h2>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="row text-center">
                    <div class="col-12 my-3 text-center">
                        <h2><b>Menu Utama</b></h2>
                    </div>
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border" style="">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/capaian-pembelajaran.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Capaian Pembelajaran</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/aktivitas-belajar.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Aktivitas Belajar</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/project.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Project</b></p>
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
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body text-center">
                                <img src="{{ asset('./guest-assets/penilaian.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Penilaian</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="text-decoration-none col-6 content-center gx-3 gy-3">
                        <div class="card card-border">
                            <div class="card-body">
                                <img src="{{ asset('./guest-assets/informasi-pengembang.svg') }}" alt="">
                                <div class="mt-3">
                                    <p><b>Informasi Pengembang</b></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
