<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Descripcion -->        
        <meta name="description" content="Aplicación desarrollada por Grafitex">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css')}}">

        <!-- particular style -->
        @yield('styles')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            @include('_partials._navbar')
            <!-- Main Sidebar Container -->            
            @include('_partials._sidebar')
            <!-- Content Wrapper. Contains page content -->
            {{-- @include('_partials._content') --}}
            @yield('content')
            <!-- Footer -->
            @include('_partials._footer')
  
            <!-- Control Sidebar -->
            @include('_partials._controlsidebar')
         </div>
        <!-- ./wrapper -->

        <!-- scripts -->
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.js')}}"></script>

        @yield('script')
        @stack('scriptchosen')
    </body>
</html>
