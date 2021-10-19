<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <title> Susy | Online Shop </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('css/dashboard/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/dashboard/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('css/dashboard/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
  <link href="{{ asset('css/dashboard/material-icons.css') }}" rel="stylesheet">
  <script src="{{ asset('js/dashboard/plugins/sweetalert.min.js') }}"></script>
</head>
<body class="g-sidenav-show  bg-gray-100">
  @include('components.dashboard.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    @include('components.dashboard.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @yield('content')
        @include('components.dashboard.footer')
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/dashboard/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/dashboard/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/dashboard/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/dashboard/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/dashboard/plugins/chartjs.min.js') }}"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/dashboard/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>

  @yield('footer-scripts')
</body>
</html>