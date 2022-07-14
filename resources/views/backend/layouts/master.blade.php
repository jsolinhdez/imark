<!DOCTYPE html>

<!-- Head -->
<head>
@include('backend.layouts.head')
<!-- Head -->
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="/backend/assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
             width="60">
    </div>

    <!-- Navbar -->
@include('backend.layouts.nav')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('backend.layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Main Footer -->
@include('backend.layouts.footer')
<!-- End Footer -->


</body>
</html>
