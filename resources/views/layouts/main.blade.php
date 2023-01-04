<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    @stack('prepend-style')


    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('/') }}vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('/') }}vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('/') }}css/volt.css" rel="stylesheet">

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

    @stack('addon-style')
</head>

<body>

    {{-- Sidebar --}}
    @include('includes.sidebar')

    {{-- navbar --}}
    @include('includes.navbar-admin')


    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('includes.footer-admin')
    @stack('prepend-script')

    {{-- data table --}}
    
    <!-- Vendor JS -->
    <script src="{{ asset('/') }}vendor/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="{{ asset('/') }}vendor/nouislider/distribute/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="{{ asset('/') }}vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="{{ asset('/') }}vendor/chartist/dist/chartist.min.js"></script>
    <script src="{{ asset('/') }}vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Core -->
    <script src="{{ asset('/') }}vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Datepicker -->
    <script src="{{ asset('/') }}vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('/') }}vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <!-- Vanilla JS Datepicker -->
    <script src="{{ asset('/') }}vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <!-- Notyf -->
    <script src="{{ asset('/') }}vendor/notyf/notyf.min.js"></script>

    <!-- Volt JS -->
    <script src="{{ asset('/') }}assets/js/volt.js"></script>

    <!-- Simplebar -->
    <script src="{{ asset('/') }}vendor/simplebar/dist/simplebar.min.js"></script>
    @stack('addon-script')
</body>

</html>
