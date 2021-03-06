<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title','ATC')
    </title>
    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet" />

</head>

<body class="">
    @include('layout.sidebar')
    <div class="main-content">
        <!-- Navbar -->
        @include('layout.nav')
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
        <div class="container-fluid mt--9">
            @yield('konten')
        </div>
    </div>
    <!--   Core   -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--   Argon JS   -->
    @yield('script')
    <script src="{{ asset('assets/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
</body>

</html>