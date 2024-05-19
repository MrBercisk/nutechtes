<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="/assets/adminlte3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/public/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <section class="login" id="login">
    <div class="container-fluid">
      <div class="row align-items-center evenly">
        <div class="col-lg-6 p-5">
          <div class="form-title text-center">
            <h4><i class="fas fa-shopping-bag align-self-center text-danger me-2"></i><span>SIMS Web App</span></h4>
            <h3>Masuk atau buat akun untuk memulai</h3>
          </div>

          <form id="formLogin" method="post" role="form" class="php-email-form">
            <div class="form-group mt-3">
              <div class="input-group">
                <input type="text" class="form-control" name="email" placeholder="Masukkan email anda" />
              </div>
              <small id="email_error" class="form-text text-danger mb-3"></small>
            </div>

            <div class="form-group mt-3">
              <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password anda" />
              </div>
              <small id="password_error" class="form-text text-danger mb-3"></small>
            </div>

            <div class="d-grid gap-2 mt-5 text-center">
              <button class="btn btn-block text-white" type="submit" id="btn-login" style="background-color: red;">Masuk</button>
              <p class="mb-2 text-center">
                <a href="<?php echo base_url('daftar'); ?>" class="custom-link">Belum punya akun?</a>
              </p>
            </div>

          </form>
        </div>
        <div class="col-lg-6 text-center">
          <img src="/assets/img/Frame 98699.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
  <style>



  </style>


</body>
<!-- Vendor JS Files -->
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

    $('#btn-login').on('click', function(e) {
      e.preventDefault(); // Menghentikan aksi default tombol submit

      const formLogin = $('#formLogin');

      $.ajax({
        url: "<?= base_url('login/create') ?>",
        method: "POST",
        data: formLogin.serialize(),
        dataType: "JSON",
        success: function(data) {
          // Data Error
          if (data.error) {

            if (data.login_error['email'] != '') $('#email_error').html(data.login_error['email']);
            else $('#email_error').html('');

            if (data.login_error['password'] != '') $('#password_error').html(data.login_error['password']);
            else $('#password_error').html('');

          } else {
            // Pendaftaran Sukses
            formLogin.trigger('reset');
            $('#email_error').html('');
            $('#password_error').html('');
            Swal.fire({
              icon: 'success',
              title: 'Login Berhasil',
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>