<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('./guest-assets/angklung.svg') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-repeat: no-repeat;
            background-image: url('../guest-assets/frame-3.svg');
            background-size: cover;
            width: 100%;
        }

        .input-group-text {
            cursor: pointer;
        }

        .form-label {
            font-weight: bold;
        }

        .nav-link {
            color: white !important;
            font-weight: 700;
        }

        .center-div {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .btn-brown {
            background-color: #F18016;
            color: white;
            font-weight: bolder;
        }

        .btn-brown:hover {
            background-color: #b66921;
            color: white;
            font-weight: bolder;
        }
    </style>


    @stack('addons-css')
</head>

<body style="background-color:rgb(243, 243, 243)">
    <section class="mb-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1><b>Login Admin</b></h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.auth') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @if (session()->has('successDaftar'))
                                        <div class="col-12">
                                            <div class="alert alert-success" role="alert">
                                                Berhasil Melakukan Pendaftaran. Harap Melakukan Login
                                            </div>
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                Username atau Password Salah
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="username" class="form-control" name="username"
                                                value="{{ old('username') }}" placeholder="username" id="username"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password" id="password" required>
                                                <div class="input-group-text" id="view-password">
                                                    <i class="fa-regular fa-eye" id="icon-password"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-brown mt-3"
                                            style="width: 100%">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/htmx.org@1.9.9"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


    @stack('addons-js')

    <script>
        $('#view-password').on('click', function() {
            let input = $(this).parent().find("#password");
            input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            $("#icon-password").attr('class', input.attr('type') === 'password' ? 'fas fa-eye' : "fas fa-eye-slash")
        });
    </script>

</body>

</html>
