<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Admin | Dashboard DaiLy Shop</title>
      <base href="{{asset('')}}">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="admin_assets/plugins/fontawesome-free/css/all.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- pages css -->
      @yield('css')
      <!-- end pages css -->
      <!-- Theme style -->
      <link rel="stylesheet" href="admin_assets/dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   </head>
   <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         @include('admin.layouts.header')
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         @include('admin.layouts.sidebar')
         <!-- Content Wrapper. Contains page content -->
         @yield('content')
         
         <!-- /.content-wrapper -->
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->
         <!-- Main Footer -->
         @include('admin.layouts.footer')
      </div>
      <!-- ./wrapper -->
      <!-- REQUIRED SCRIPTS -->
      <!-- jQuery -->
      <script src="admin_assets/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="admin_assets/dist/js/adminlte.js"></script>
      <!-- OPTIONAL SCRIPTS -->
      <script src="admin_assets/dist/js/demo.js"></script>
      <!-- PAGE admin_assets/plugins -->
      <!-- jQuery Mapael -->
      <script src="admin_assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
      <script src="admin_assets/plugins/raphael/raphael.min.js"></script>
      <script src="admin_assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
      <script src="admin_assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
      <!-- page script -->
      <!-- end page script -->
      <!-- ChartJS -->
      <script src="admin_assets/plugins/chart.js/Chart.min.js"></script>
      <!-- PAGE SCRIPTS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
      <script src="admin_assets/dist/js/pages/dashboard2.js"></script>
      @yield('script')
   </body>
</html>