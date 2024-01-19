<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        .input-rounded-right {
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            border-left: none;
        }

        .border-left-none {
            border-left: none;
        }

        .border-right-none {
            border-right: none;
        }

        .addon-rounded-right {
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            background-color: white !important;
            border-right: none;
        }

        .addon-rounded-left {
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            background-color: white !important;
            border-left: none;
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
        <div class="col-sm-12 col-md-12 col-lg-12">
            <img src="{{ asset('./guest-assets/wave.svg') }}">
            <div class="background-white text-center p-5" style="margin-top: -10px;">
                <form action="{{ route('siswa.auth') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <h1 class="login-text"><b>Login</b></h1>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 mx-5 mb-3">
                            <div class="input-group">
                                <span class="input-group-text addon-rounded-right" for="nis">
                                    <i class="fa-regular fa-circle-user fa-xl" style="color: #985b00;"></i>
                                </span>
                                <input type="text" name="username"
                                    class="form-control form-control-lg input-rounded-right" id="nis"
                                    placeholder="NIS" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 mx-5">
                            <div class="input-group">
                                <span class="input-group-text addon-rounded-right" for="password">
                                    <i class="fa-solid fa-circle-user fa-xl" style="color: #985b00;"></i>
                                </span>
                                <input type="password" name="password"
                                    class="form-control form-control-lg border-left-none border-right-none"
                                    id="password" placeholder="Password" required>
                                <span class="input-group-text addon-rounded-left" id="view-password">
                                    <i id="icon-password" class="fa-regular fa-eye-slash fa-xl"
                                        style="color: #985b00;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 mx-5 mt-5">
                            <button type="submit"
                                class="btn button-masuk btn-lg rounded-pill text-white">Masuk</button>
                        </div>
                    </div>
                </form>
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

    <script src="{{ asset('./dashboard-assets/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $('#view-password').on('click', function() {
            let input = $(this).parent().find("#password");
            input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            $("#icon-password").attr('class', input.attr('type') === 'password' ? 'fa-regular fa-eye fa-xl' :
                "fa-regular fa-eye-slash fa-xl")
        });
    </script>
</body>

</html>
