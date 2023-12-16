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
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center text-center margin-top">
            <div class="col-sm-12 col-md-12 col-lg-7">
                <h1><b>Selamat Datang</b></h1>
                <div class="people-angklung">
                    <img src="{{ asset('./guest-assets/angklung-man.svg') }}" class="angklung-man">
                    <img src="{{ asset('./guest-assets/angklung-girl.svg') }}" class="angklung-girl">
                </div>
            </div>
        </div>
    </div>

    {{-- wave --}}
    <div class="login row g-0 justify-content-center">
        <div class="col-sm-12 col-md-9 col-lg-7">
            <img src="{{ asset('./guest-assets/wave.svg') }}">
            <div class="background-white text-center p-5" style="margin-top: -10px;">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <h1 class="login-text"><b>Login</b></h1>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 mx-5">
                        <input type="text" name="nis5" class="form-control form-control-lg rounded-pill my-3"
                            id="nis" placeholder="NIS">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 mx-5">
                        <input type="password" name="password" class="form-control form-control-lg rounded-pill"
                            id="password" placeholder="Password">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 mx-5 mt-5">
                        <button type="submit" class="btn button-masuk btn-lg rounded-pill text-white">Masuk</button>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-6">
                        <a href="" class="text-decoration-none text-brown">Lupa Password</a>
                    </div>
                    <div class="col-6">
                        <a href="" class="text-decoration-none text-brown">Reset</a>
                    </div>
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
