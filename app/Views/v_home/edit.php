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
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Daftar Produk</a></li>
                            <li class="breadcrumb-item active">Edit Produk</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content mt-2">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-8">

                        <?= form_open('produk/update/' . $produk['id'], ['enctype' => 'multipart/form-data']); ?>
                        <label for="kategori">Kategori</label>
                        <div class="form-group">
                            <select class="form-control" name="kategori" id="kategori">
                                <option value="" disabled>Pilih Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id']; ?>" <?= $produk['kategori_id'] == $k['id'] ? 'selected' : '' ?>>
                                        <?= $k['nama_kategori']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <small id="kategori_error" class="form-text text-danger mb-3"></small>
                        </div>

                        <label for="barang">Nama Barang</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan nama barang" value="<?= $produk['nama_produk']; ?>" autofocus />
                        </div>
                        <small id="nama_produk_error" class="form-text text-danger mb-3"></small>

                        <label for="beli">Harga Beli</label>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Masukkan harga beli" value="<?= $produk['harga_beli']; ?>" autofocus />
                        </div>
                        <small id="harga_beli_error" class="form-text text-danger mb-3"></small>

                        <label for="jual">Harga Jual</label>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan harga jual" value="<?= $produk['harga_jual']; ?>" readonly />
                        </div>
                        <small id="harga_jual_error" class="form-text text-danger mb-3"></small>


                    </div>
                    <div class="col-md-4">
                        <label for="stok">Stok Barang</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan jumlah stok barang" value="<?= $produk['stok']; ?>" />
                        </div>
                        <small id="stok_error" class="form-text text-danger mb-3"></small>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Photo Ukuran Max. 100Kb Dengan Format .jpg/.png<span style="color:red"> *</span></label>
                            <input class="form-control" type="file" name="image" id="image">
                            <small id="image_error" class="form-text text-danger mb-3"></small>
                        </div>
                        <?php if (!empty($produk['image'])) : ?>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar Saat Ini</label><br>
                                <img src="<?= base_url('produk_picture/' . $produk['image']) ?>" alt="Current Image" width="150">
                            </div>
                        <?php endif; ?>


                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-outline-primary">Batalkan</button>
                        <button type="submit" class="btn btn-primary" id="btn-tambah">Simpan</button>
                    </div>
                    <?= form_close(); ?>
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

    <script>
        document.getElementById('harga_beli').addEventListener('input', function() {
            var hargaBeli = parseFloat(this.value) || 0;
            var hargaJual = hargaBeli + (hargaBeli * 0.30);
            document.getElementById('harga_jual').value = hargaJual.toFixed(2);
        });
    </script>

</body>

</html>