<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('./guest-assets/css/student.css') }}">

    <style>
        .active {
            background-color: #F0BD63 !important;
            color: black !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: #d49f45 !important;
            color: white
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-repeat: no-repeat;
            background-image: url({{ asset('./guest-assets/frame-6.svg') }});
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

        .text-black {
            color: black;
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

        .outline-font {
            text-shadow: -1px -1px 0 white, 1px -1px 0 white, -1px 1px 0 white, 1px 1px 0 white;
        }

        .outline {
            -webkit-text-stroke: 1.5px white;
        }
    </style>

    @stack('addons-css')
</head>

<body>

    @yield('content')


    {{-- <nav class="navbar fixed-bottom bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                &copy; {{ date('Y') }} Anggi - Universitas Negeri Yogyakarta
            </a>
        </div>
    </nav> --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (session()->has('success'))
        <script>
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
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif

    @if (session()->has('error'))
        <script>
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
                icon: 'error',
                title: '{{ session('error') }}'
            })
        </script>
    @endif

    @if (session()->has('warning'))
        <script>
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
                title: '{{ session('warning') }}'
            })
        </script>
    @endif

    @if (session()->has('notification'))
        <script>
            Swal.fire({
                text: "{{ session('notification') }}",
                icon: "success"
            });
        </script>
    @endif

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    @stack('addons-js')
</body>

</html>
