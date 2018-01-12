I<?php
  date_default_timezone_set('Asia/Jakarta');
  extract($_POST);
  include'../../koneksi.php';
  if(!isset($_GET['type']) || !isset($_GET['idUser'])){
    header("location:../../hsuahudahu");
  }else{
    $idUser=$_GET['idUser'];
    $user = mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where id='$idUser'"));
    $type=$_GET['type'];
    if($user['jabatan']==""||$user['alamat']==""||$user['badan_usaha']==""||$user['phone']==""||$user['lokasi_usaha']==""||$user['kelurahan']==""||$user['kecamatan']==""||$user['status_tanah']==""||$user['luas']==""){
      header("location:../error_register");
    }
  }
  $ps="";
  if(isset($daftar_trayek)){
    if(mysqli_num_rows(mysqli_query($con2,"select * from data_uji where no_kbm='$no_poll' and no_uji='$no_stnk' "))!=0){
        if(mysqli_num_rows(mysqli_query($con,"select * from tbl_berkas where no_polisi='$no_poll' or no_stnk='$no_stnk' and acc='0' "))==0)
        {
            $izin=$type;
            if(mysqli_query($con,"insert into tbl_berkas(izin, idUser, no_polisi, no_stnk, tanggal_masuk, terkait) values('$izin','$idUser','$no_poll','$no_stnk','".date('Y-m-d')."', '$kategori')")){
              $getId=mysqli_fetch_row(mysqli_query($con,"select max(id) from tbl_berkas"));
              $ps="
                  <div class='alert alert-success alert-dismissable' style='margin-top:20px'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                  <h4><i class='icon glyphicon glyphicon-remove'></i> Pedaftaran Sukses !</h4> Tunggu 5 detik untuk upload berkas, jika tidak merespon silahkan <a href='../../berkas_user/index_mobile.php?idBerkas=".$getId[0]."'>Kilik di sini</a>.
                  </div>
              ";
              $sec = "4";
              header("Refresh: $sec; url=../../berkas_user/index_mobile.php?idBerkas=".$getId[0]);
            }
        }else{
            $ps="
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon glyphicon glyphicon-remove'></i> Gagal !</h4> Kendaraan Anda sudah terdaftar/sedang dalam masa proses perizinan. Silahkan cek kembali data Anda.
                </div>
            ";
        }
    }else{
        $ps="
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon glyphicon glyphicon-remove'></i> Gagal !</h4> Kendaraan Anda Belum Melakukan Uji KIR, Silahkan Melakukan Uji KIR Terlebih Dahulu
                </div>
            ";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Clasified">
    <meta name="generator" content="Wordpress! - Open Source Content Management">
    <?php
      if(isset($_GET['type'])){
        switch ($_GET['type']) {
          case '1':
            echo'<title>Izin Tayek TAXI | SAPO</title>';
            break;
          case '2':
            echo'<title>Izin Tayek OPLET | SAPO</title>';
            break;
          case '3':
            echo'<title>Izin Tayek Bus Kota | SAPO</title>';
            break;
          case '4':
            echo'<title>Izin Tayek AKAP | SAPO</title>';
            break;
          case '5':
            echo'<title>Izin Tayek AJAP | SAPO</title>';
            break;
          case '6':
            echo'<title>Izin Tayek Angkutan Karyawan | SAPO</title>';
            break;
          case '7':
            echo'<title>Izin Tayek Angkutan Barang/Orang | SAPO</title>';
            break;
          
          default:
            # code...
            break;
        }
      }
    ?>

     <!-- Favicon -->
    <link rel="shortcut icon" href="../../page2/assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../page2/assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="../../page2/assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../page2/assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="../../page2/assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../../page2/assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../../page2/assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../../page2/assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="../../page2/assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../../page2/assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../../page2/assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="../../page2/assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="../../page2/assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="../../page2/assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="../../page2/assets/css/bootstrap-select.min.css">
  </head>

  <body>  

    <!-- Content section Start --> 
    <?php
      if(isset($_GET['type'])){
        include'../../page_web/reg_trayek.php';
      }
    ?>
    <!-- Content section End --> 
      
    <!-- Main JS  -->
    <script type="text/javascript" src="../../page2/assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="../../page2/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/material.min.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/material-kit.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/wow.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/main.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="../../page2/assets/js/jasny-bootstrap.min.js"></script>
    
  </body>
</html>