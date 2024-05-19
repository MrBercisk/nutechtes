<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/adminlte3/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->
    <aside class="main-sidebar elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link d-flex justify-content-center">
            <i class="fas fa-shopping-bag align-self-center"></i>
            <span class="brand-text align-self-center">SIMS Web App</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar mt-3">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item mt-2">
                        <a href="<?= base_url('home'); ?>" class="nav-link <?php if ($page == 'home') echo " active";  ?>">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="<?= base_url('profil'); ?>" class="nav-link <?php if ($page == 'profil') echo " active";  ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="<?= base_url('home/logout'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-3">

        <!-- Main content -->
        <div class="content mt-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <img src="<?= base_url('profile_picture/' . $user['image']) ?>" alt="Profil Image" style="max-width: 186px; max-height: 186px;">
                        <h3 class="mb-3"><?= $nama; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" >Nama Kandidat</label>
                                <input type="text" name="nama_peserta" value="<?= $nama; ?>" class="form-control" id="exampleFormControlInput1" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">

                        <form>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Posisi Kandidat</label>
                                <input type="email" name="position" value="<?= $user['position']; ?>" class="form-control" id="exampleFormControlInput1" readonly>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/assets/adminlte3/dist/js/adminlte.js"></script>
    <!-- jQuery -->
    <script src="/assets/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/assets/adminlte3/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/assets/adminlte3/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/assets/adminlte3/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/assets/adminlte3/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/adminlte3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/assets/adminlte3/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/assets/adminlte3/plugins/moment/moment.min.js"></script>
    <script src="/assets/adminlte3/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/assets/adminlte3/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/assets/adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="/assets/adminlte3/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/adminlte3/dist/js/demo.js"></script>


</body>

</html>