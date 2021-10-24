<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Susy Online Shop | Beranda</title>

    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/web/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web/themify-icons.css') }}">

    @yield('css')
</head>

<body>
    <div id="wrapper">
        @yield('content')
    </div>

    <script src="{{ asset('js/web/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/web/popper.min.js') }}"></script>
    <script src="{{ asset('js/web/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/web/plugins.js') }}"></script>
    <script src="{{ asset('js/web/active.js') }}"></script>
    @yield('footer-scripts')
</body>
</html>