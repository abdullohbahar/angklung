<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Guru</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('./dashboard-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('./dashboard-assets/dist/css/adminlte.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('./guest-assets/angklung.svg') }}" type="image/x-icon">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    @stack('addons-css')

    <style>
        .nav-link.active {
            background-color: #F18016 !important;
        }

        .white-nav {
            color: white !important;
        }

        .btn-brown {
            background-color: #F18016;
            color: white;
            font-weight: bolder;
        }

        .ck-restricted-editing_mode_standard {
            height: 300px !important;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ route('profile') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('guru.logout') }}" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #c68447;">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link text-center">
                <img src="{{ asset('./guest-assets/angklung.svg') }}" style="width: 15%">
                <span class="brand-text font-weight-bold font-white" style="color: white">Guru</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('guru.dashboard') }}"
                                class="nav-link white-nav {{ $active == 'dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    <b>Dashboard</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.data.siswa') }}"
                                class="nav-link white-nav {{ $active == 'data-siswa' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    <b>Data Siswa</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.capaian.pembelajaran') }}"
                                class="nav-link white-nav {{ $active == 'capaian-pembelajaran' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Capaian Pembelajaran</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.forum') }}"
                                class="nav-link white-nav {{ $active == 'aktivitas-belajar' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Forum</b>
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('guru.project') }}"
                                class="nav-link white-nav {{ $active == 'project' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Eksplorasi</b>
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('guru.penilaian') }}"
                                class="nav-link white-nav {{ $active == 'penilaian' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Penilaian Pilihan Ganda</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.penilaian.essay') }}"
                                class="nav-link white-nav {{ $active == 'penilaian-essay' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Penilaian Essay</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.presensi') }}"
                                class="nav-link white-nav {{ $active == 'presensi' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Presensi</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.kuesioner') }}"
                                class="nav-link white-nav {{ $active == 'kuesioner' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Self Assesment</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.peer.assesment') }}"
                                class="nav-link white-nav {{ $active == 'peer' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Peer Assesment</b>
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('guru.forum') }}"
                                class="nav-link white-nav {{ $active == 'forum' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    <b>Forum</b>
                                </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.member') }}"
                                class="nav-link {{ $active == 'member' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Data Member
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.history') }}"
                                class="nav-link {{ $active == 'riwayat' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Riwayat Transaksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('member.profile') }}"
                                class="nav-link {{ $active == 'profile' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profil
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ $active == 'pengaturan-langganan' ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Pengaturan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item">
                                    <a href="{{ route('pengaturan.langganan') }}"
                                        class="nav-link {{ $active == 'pengaturan-langganan' ? 'active' : '' }}">
                                        <i class="nav-icon far fa-dot-circle"></i>
                                        <p>
                                            Langganan
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <hr>
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link white-nav">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    <b>Profile</b>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.logout') }}" class="nav-link white-nav">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    <b>Logout</b>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('./dashboard-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('./dashboard-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('./dashboard-assets/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/htmx.org@1.9.9"></script>

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

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('dashboard-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor5/initiate-ckeditor.js') }}"></script>

    <script>
        $("#table1").DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
        });
    </script>

    <script>
        imageUpload.onchange = (evt) => {
            const [file] = imageUpload.files;
            if (file) {
                // Batasan ukuran file (2MB)
                const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
                if (file.size <= maxSizeInBytes) {
                    // Batasan jenis file (PNG, JPG, JPEG)
                    const allowedExtensions = ["png", "jpg", "jpeg", "webp", "svg"];
                    const fileExtension = file.name.split(".").pop().toLowerCase();
                    if (allowedExtensions.includes(fileExtension)) {
                        imagePreview.src = URL.createObjectURL(file);
                    } else {
                        alert(
                            "Jenis file yang diunggah tidak diizinkan. Harap pilih file dengan format SVG, PNG, JPG, atau JPEG."
                        );
                        imageUpload.value = null; // Menghapus file yang dipilih
                    }
                } else {
                    alert("Ukuran file terlalu besar. Harap pilih file dengan ukuran maksimal 2MB.");
                    imageUpload.value = null; // Menghapus file yang dipilih
                }
            }
        };

        $('#view-password').on('click', function() {
            let input = $(this).parent().find("#password");
            input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            $("#icon-password").attr('class', input.attr('type') === 'password' ? 'fas fa-eye' : "fas fa-eye-slash")
        });
    </script>

    @stack('addons-js')
</body>

</html>
