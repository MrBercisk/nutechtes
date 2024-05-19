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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Produk</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content mt-2">
            <div class="container-fluid">
                <div class="button mb-3">
                    <button class="btn btn-sm btn-success" onclick="window.location.href='<?= base_url('produk/export'); ?>'"><i class="fas fa-file-excel"></i> Export Excel</button>
                    <a class="btn btn-sm btn-danger" href="<?= base_url('produk') ?>"><i class="fas fa-plus"></i> Tambah Produk</a>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-light">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori Produk</th>
                                            <th>Harga Beli (Rp)</th>
                                            <th>Harga Jual (Rp)</th>
                                            <th>Stok Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if (session()->has('sweet_alert')) : ?>
            var sweetAlertData = <?= session('sweet_alert') ?>;

            // Menampilkan Sweet Alert
            Swal.fire({
                icon: sweetAlertData.success ? 'success' : 'error',
                title: sweetAlertData.message,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        <?php endif; ?>
    </script>
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
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/assets/adminlte3/dist/js/pages/dashboard3.js"></script>
    <script src="/assets/adminlte3/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
        

            $('#example1').DataTable({
                "responsive": false,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "order": [],

                "ajax": {
                    "url": "produk/ajaxDataProduk",
                    "type": "POST"
                },

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "info": "_START_ sampai _END_ dari _MAX_ entri",
                    "infoEmpty": "Data tidak tersedia",
                    "search": "Cari:",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    }
                },

            });

            $('body').on('click', '.btn-deleteProduk', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');

                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Anda ingin menghapus data produk ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Hapus Data!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: url,
                            method: "POST",
                            success: function(response) {
                                $('#example1').DataTable().ajax.reload()
                                toastr.info('Data Produk berhasil dihapus.');
                            }
                        });
                    }
                });

            });

        });
    </script>

</body>

</html>