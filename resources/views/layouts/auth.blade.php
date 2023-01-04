<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    {{-- csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('/') }}main.css" rel="stylesheet" />
    <!--toastr-->

    @stack('addon-style')

</head>

<body>
    {{-- Navbar --}}
            
    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}

    {{-- Script --}}
    @stack('prepend-script')
    <script src="{{ asset('/') }}vendor/jquery/jquery.slim.min.js"></script>
    {{-- <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('/') }}js/instascan.min.js"></script>
    <script src="{{ asset('/') }}navbar-scroll.js"></script>
    <script src="{{ asset('/') }}js/app.js"></script>
    <script src="{{ asset('/') }}js/jquery-3.6.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @stack('addon-script')
</body>

</html>
