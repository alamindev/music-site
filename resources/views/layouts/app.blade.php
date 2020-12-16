<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>  

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
</head>
<body>
    <div id="app">
          @include('layouts.header')
        <main class="py-4">
            @yield('content')
        </main>
          @include('layouts.footer')
    </div>
        <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>   
    <script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/odometer.min.js') }}"></script>
    <script src="{{ asset('js/form-validator.min.js') }}"></script>
    <script src="{{ asset('js/contact-form-script.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
