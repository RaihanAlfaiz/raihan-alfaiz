<?php
session_start();
if(isset($_POST['pengguna_baru'])) {
    error_reporting(0);
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    $data = file("config.txt", FILE_IGNORE_NEW_LINES);
    foreach($data as $value){
        $pecah = explode("|",$value);
        if($nik==$pecah['0']){
            $cek = true;
        }
    }

    if($cek){//jika nik sudah terdaftar ?>
    <script type="text/javascript">
        alert('!! Maaaf NIK yang anda gunakan sudah terdaftar');
        window.location.assign('index.php');
    </script>
  <?php  }else{
      $format = "\n$nik|$nama";
      $file = fopen('config.txt','a');
      fwrite($file, $format);
      fclose($file);
      ?>
     <script type="text/javascript">
        alert('Pendaftaran Berhasil Di lakukan');
        window.location.assign('index.php');
    </script>
    
      <?php }
} elseif(isset($_POST['masuk'])) {
    $nik        = $_POST['nik'];
    $nama = $_POST['nama'];

    $format = "$nik|$nama";
    $file = file('config.txt',FILE_IGNORE_NEW_LINES);
    if(in_array($format, $file)){ //jika data ditemukan
        session_start();
        $_SESSION['nik'] = $nik;
        $_SESSION['nama'] = $nama;

        header("Location:user.php");
        
    }else{ //jika data tidak ditemukan ?>
        <script type="text/javascript">window
            alert('!!! Maaf Kombinasi NIK dan Nama Lengkap Salah.');
            window.location.assign('index.php');
        </script>
<?php }} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">

  <title>
   Aplikasi Pencatatan Depok Trip- Login
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient text-center">Selamat Datang</h3>
                 
                  <p class="mb-0 text-center">Masukan Data Sebelum Login !</p>
                </div>
                <div class="card-body">
                  <form role="form" method="post" >
                    <label>NIK</label>
                    <div class="mb-3">
                      <input name="nik" required type="text" class="form-control" placeholder="NIK" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Nama Lengkap</label>
                    <div class="mb-3">
                      <input name="nama" required type="text" class="form-control" placeholder="Nama Lengkap" aria-label="Password" aria-describedby="password-addon">
                    </div>
                   
                    <div class="text-center">
                      <button type="submit" name="pengguna_baru" class="btn bg-gradient-info w-100 mt-4 mb-0" >
                        Pengguna Baru
                      </button>
                      <button type="submit" name="masuk" class="btn bg-gradient-info w-100 mt-4 mb-0" >
                         Login
                      </button>
                     
                    </div>
                  </form>
                </div>
               
              </div>
            </div>
       
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by Creative Tim and Muhammad Raihan Alfaiz.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>