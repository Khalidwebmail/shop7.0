
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/img/logo/logo.png') }}" rel="icon">
    <title>RuangAdmin - Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="app">
        <div id="wrapper">
            <!-- Sidebar -->
            @include('partial.sidebar')
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- TopBar -->
                    @include('partial.navbar')
                    <!-- Topbar -->

                    <!-- Container Fluid-->
                    <main-app></main-app>
                    <!---Container Fluid-->
                </div>
                <!-- Footer -->
                @include('partial.footer')
                <!-- Footer -->
            </div>
        </div>
    </div>
  <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script> --}}
</body>

</html>
