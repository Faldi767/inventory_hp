<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gudang HP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap-4.min.css') }}">
  <!-- pace-progress -->
  <link rel="stylesheet" href="{{ asset('/css/pace-theme-minimal.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/select2-bootstrap4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('/css/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/css/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('/css/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span>{{ Session::get('user_nama') }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <a href="{{url('login/logout')}}" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <span class="brand-text font-weight-light">Gudang HP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Session::get('nama_role') == "Admin")
              <li class="nav-item">
                <a href="/role" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/client" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Client</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="/supplier" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/brand" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/smartphone" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Smartphone</p>
                </a>
              </li>
              @if(Session::get('nama_role') == "Admin")
              <li class="nav-item">
                <a href="/toko" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Toko</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @if(Session::get('nama_toko') != "Erafone Pusat")
          <li class="nav-item">
            <a href="/transaksi/tambah" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Request Pesanan
              </p>
            </a>
          </li>
          @endif
          @if(Session::get('nama_toko') == "Erafone Pusat")
          <li class="nav-item">
            <a href="/barangmasuk" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Barang Masuk
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="/transaksi" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Data Transaksi
              </p>
            </a>
          </li>
          <li class="nav-header">USER</li>
          <li class="nav-item">
            <a href="/login/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://github.com/Faldi767">Muhammad Rifaldi Akbar</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('/js/select2.full.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('/js/sweetalert2.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/js/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/js/jquery.knob.min.js') }}"></script>

<script src="{{ asset('/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('/js/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- pace-progress -->
<script src="{{ asset('/js/pace.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/js/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/js/demo.js') }}"></script>
@yield('pagescript')
</body>
</html>
