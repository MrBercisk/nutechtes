<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/assets/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="daftar" id="daftar">
        <div class="container-fluid">
            <div class="row align-items-center evenly">
                <div class="col-lg-6 p-5">
                    <div class="form-title mb-3 text-center">
                        <h4><i class="fas fa-shopping-bag align-self-center text-danger me-2"></i><span>SIMS Web App</span></h4>
                        <h3>Daftar Akun</h3>
                    </div>

                    <form id="formDaftar" method="post" role="form" class="php-email-form" enctype="multipart/form-data">

                        <div class="form-group mt-3 mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap anda" autofocus />
                            </div>
                            <small id="nama_error" class="form-text text-danger mb-3"></small>
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="Masukkan email anda" />
                            </div>
                            <small id="email_error" class="form-text text-danger mb-3"></small>

                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="position" placeholder="Posisi Kandidat (Web Programmer,System Analyst,PHP Developer)" />
                            </div>
                            <small id="position_error" class="form-text text-danger mb-3"></small>

                        </div>

                        <div class="form-group mb-3">
                            <label for="tahun">Photo Ukuran Max. 100Kb Dengan Format .jpg/.png<span style="color:red"> *</span></label>
                            <div class="input-group">
                                <input class="form-control" type="file" name="image" id="image">
                            </div>
                            <small id="image_error" class="form-text text-danger mb-3"></small>
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password anda (minimal 8 karakter)" />
                            </div>
                            <small id="password_error" class="form-text text-danger mb-3"></small>
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Masukkan konfirmasi password" />
                            </div>
                            <small id="confirm_password_error" class="form-text text-danger mb-3"></small>
                        </div>

                        <div class="d-grid gap-2 mt-5 text-center">
                            <button class="btn col-lg text-white" type="submit" id="btn-daftar" style="background-color: red;">Daftar</button>
                            <p class="mb-2 text-center">
                                <a href="<?php echo base_url('/'); ?>">Sudah punya akun? Silahkan Login!</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <img src="/assets/img/Frame 98699.png" class="img-fluid" alt="">

                </div>
            </div>
        </div>
    </section>


    <!-- Vendor JS Files -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="/assets/adminlte3/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/adminlte3/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/adminlte3/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/assets/adminlte3/vendor/php-email-form/validate.js"></script>
    <script src="/assets/adminlte3/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="/assets/adminlte3/vendor/counterup/counterup.min.js"></script>
    <script src="/assets/adminlte3/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/adminlte3/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/adminlte3/vendor/venobox/venobox.min.js"></script>
    <script src="/assets/adminlte3/vendor/aos/aos.js"></script>

    <!-- bs-custom-file-input -->
    <script src="/assets/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- InputMask -->
    <script src="/assets/adminlte3/plugins/moment/moment.min.js"></script>
    <script src="/assets/adminlte3/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="/assets/adminlte3/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Main JS File -->
    <script src="/assets/adminlte3/js/main.js"></script>
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
        $(document).ready(function() {

            //-------------------------------------------------------------------
            $('#formDaftar').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "<?php echo base_url('daftar/create') ?>",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // Data Error
                        if (data.error) {

                            if (data.daftar_akun_error['nama'] != '') $('#nama_error').html(data.daftar_akun_error['nama']);
                            else $('#nama_error').html('');

                            if (data.daftar_akun_error['email'] != '') $('#email_error').html(data.daftar_akun_error['email']);
                            else $('#email_error').html('');

                            if (data.daftar_akun_error['image'] != '') $('#image_error').html(data.daftar_akun_error['image']);
                            else $('#image_error').html('');

                            if (data.daftar_akun_error['position'] != '') $('#position_error').html(data.daftar_akun_error['position']);
                            else $('#position_error').html('');

                            if (data.daftar_akun_error['password'] != '') $('#password_error').html(data.daftar_akun_error['password']);
                            else $('#password_error').html('');

                            if (data.daftar_akun_error['confirm_password'] != '') $('#confirm_password_error').html(data.daftar_akun_error['confirm_password']);
                            else $('#confirm_password_error').html('');


                        } else {

                            Swal.fire({
                                icon: 'success',
                                title: 'Pendaftaran Berhasil',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.replace(data.link);
                        }
                    }
                });
            })
        });
    </script>
</body>

</html>