<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/plugins/soft-ui/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/plugins/soft-ui/img/favicon.png') }}" />
    <title>
        CRUD Features
    </title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/plugins/soft-ui/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/soft-ui/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/plugins/soft-ui/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/plugins/soft-ui/css/soft-ui-dashboard.css?v=1.0.3') }}"
        rel="stylesheet" />
    <style>
        body {
            background-color: #F5F5F5;
            /* Light grey */
        }
    </style>
    @stack('style')
</head>

<body>
    @guest
    @include('layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-">
        @include('layouts.nav')
        @yield('content')
        @include('layouts.footer')
    </main>
    @endguest

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/plugins/soft-ui/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/soft-ui/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/soft-ui/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/soft-ui/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/soft-ui/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/soft-ui/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    @stack('scripts')
    @include('sweetalert::alert')
</body>

</html>