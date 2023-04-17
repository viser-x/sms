<!doctype html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('loginAsset/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('loginAsset/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('loginAsset/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('loginAsset/css/style.css') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <!-- Master File Link -->
    <link href="{{ asset('adminAsset') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('adminAsset') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('adminAsset') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>@yield('title')</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.include.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.include.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')

                <style>
                    .toast {
                        background-color: #030303;
                    }

                    .toast-success {
                        background-color: #4172ce;
                    }

                    .toast-error {
                        background-color: #BD362F;
                    }

                    .toast-info {
                        background-color: #2F96B4;
                    }

                    .toast-warning {
                        background-color: #F89406;
                    }

                    .toast-progress {
                        position: absolute;
                        left: 0;
                        bottom: 0;
                        height: 4px;
                        background-color: #000000;
                        opacity: 0.4;
                        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
                        filter: alpha(opacity=40);
                    }
                </style>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.include.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('login') }}">Logout</a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- End Master File Body -->

    <script src="{{ asset('adminAsset') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('adminAsset') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminAsset') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('adminAsset') }}/js/sb-admin-2.min.js"></script>
    <script src="{{ asset('adminAsset') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('adminAsset') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('adminAsset') }}/js/demo/chart-pie-demo.js"></script>


    <script src="{{ asset('loginAsset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('loginAsset/js/popper.min.js') }}"></script>
    <script src="{{ asset('loginAsset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loginAsset/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @stack('js')

</body>

</html>
