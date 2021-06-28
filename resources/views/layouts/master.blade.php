<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
@if (Auth::check() && Auth::user()->role == 'admin')
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <span class="brand-text font-weight-light">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Dashboard Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">DATA</li>
          <li class="nav-item">
            <a href="{{ route('barang') }}" class="nav-link">
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user') }}" class="nav-link">
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('usertrx') }}" class="nav-link">
              <p>
                Transaksi User
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <a class="brand-link"></a>
      <!-- /.sidebar-menu -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library --> 
          <li class="nav-header">EKSPORT</li>
          {{-- <li class="nav-item">
            <a href="{{ route('cetakPdfbarang') }}" class="nav-link">
              <p>
                Barang PDF
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('excel') }}" class="nav-link">
              <p>
                Barang EXCEL
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cetakPdfUser') }}" class="nav-link">
              <p>
                User PDF
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('excelUser') }}" class="nav-link">
              <p>
                User Excel
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('cetakPdfUsertrx') }}" class="nav-link">
              <p>
                Transaksi PDF
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('excelUsertrx') }}" class="nav-link">
              <p>
                Transaksi Excel
              </p>
            </a>
          </li> --}}
          <a class="brand-link"></a><br>
          <center>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">@csrf
              <button type="submit" class="btn btn-danger btn-block">Logout</button>
            </form>
          </li>
        </center>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/js/demo.js"></script>
@endif
</body>
</html>
