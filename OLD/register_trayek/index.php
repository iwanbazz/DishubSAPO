<?php
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  extract($_POST);
  include '../koneksi.php';
  if(!isset($_GET['type']) || empty($_SESSION['c58c1d179d60e7874f8c856f833eedd3-login'])){
    header("location:../");
  }else{
    $idUser=$_SESSION['c58c1d179d60e7874f8c856f833eedd3-user'];
    $user = mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where id='$idUser'"));
    $type=$_GET['type'];
    if($user['jabatan']==""||$user['alamat']==""||$user['badan_usaha']==""||$user['phone']==""||$user['lokasi_usaha']==""||$user['kelurahan']==""||$user['kecamatan']==""||$user['status_tanah']==""||$user['luas']==""){
      header("location:../profile/");
    }
  }
  $ps="";
  if(isset($daftar_trayek)){
    if(mysqli_num_rows(mysqli_query($con,"select * from tbl_berkas where no_polisi='$no_poll' or no_stnk='$no_stnk'"))==0)
    {
        switch ($type) {
          case 'taxi':
            $izin="1";
            break;
          case 'oplet':
            $izin="2";
            break;
          case 'bus_kota':
            $izin="3";
            break;
          case 'akap':
            $izin="4";
            break;
          case 'ajap':
            $izin="5";
            break;
          case 'Karyawan':
            $izin="6";
            break;
          case 'barang':
            $izin="7";
            break;
        }
        if(mysqli_query($con,"insert into tbl_berkas(izin, idUser, no_polisi, no_stnk, tanggal_masuk, terkait) values('$izin','$idUser','$no_poll','$no_stnk','".date('Y-m-d')."', '$kategori')")){
          $getId=mysqli_fetch_row(mysqli_query($con,"select max(id) from tbl_berkas"));
          $ps="
              <div class='alert alert-success alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Pedaftaran Sukses !</h4> Tunggu 5 detik untuk upload berkas, jika tidak merespon silahkan <a href='./file_berkas/?idBerkas=".$getId[0]."'>Kilik di sini</a>.
              </div>
          ";
          $sec = "4";
          header("Refresh: $sec; url=../berkas_user/?idBerkas=".$getId[0]);
        }
    }else{
        $ps="
            <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon glyphicon glyphicon-remove'></i> Gagal !</h4> Kendaraan Anda sudah terdaftar/sedang dalam masa proses perizinan. Silahkan cek kembali data Anda.
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
          case 'taxi':
            echo'<title>Izin Tayek TAXI | SAPO</title>';
            break;
          case 'oplet':
            echo'<title>Izin Tayek OPLET | SAPO</title>';
            break;
          case 'bus_kota':
            echo'<title>Izin Tayek Bus Kota | SAPO</title>';
            break;
          case 'akap':
            echo'<title>Izin Tayek AKAP | SAPO</title>';
            break;
          case 'ajap':
            echo'<title>Izin Tayek AJAP | SAPO</title>';
            break;
          case 'Karyawan':
            echo'<title>Izin Tayek Angkutan Karyawan | SAPO</title>';
            break;
          case 'barang':
            echo'<title>Izin Tayek Angkutan Barang/Orang | SAPO</title>';
            break;
          
          default:
            # code...
            break;
        }
      }
    ?>

     <!-- Favicon -->
    <link rel="shortcut icon" href="../page2/assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../page2/assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="../page2/assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../page2/assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="../page2/assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../page2/assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../page2/assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../page2/assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="../page2/assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../page2/assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../page2/assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="../page2/assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="../page2/assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="../page2/assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="../page2/assets/css/bootstrap-select.min.css">
  </head>

  <body>  
    <!-- Header Section Start -->
    <div class="header">    
      <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand logo" href="../" style="width:110%; padding-bottom:0px;padding-top:15px;color:inherit;text-transform:uppercase;font-family:sans-serif;font-size:17.5px;"><b>Sistem Aplikasi Perizinan Online</b> <span class="lighter">(SAPO)</span></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li style="color:inherit;text-transform:uppercase;font-family:sans-serif;"><a href="../"><i class="lnr lnr-enter"></i> <b>Home</b></a></li>
              <li style="color:inherit;text-transform:uppercase;font-family:sans-serif;"><a href="../profile/?page=change_password"><i class="lnr lnr-enter"></i> <b>Password</b></a></li>
              <li style="color:inherit;text-transform:uppercase;font-family:sans-serif;"><a href="../profile/"><i class="lnr lnr-enter"></i> <b>Profile</b></a></li>
              <li style="color:inherit;text-transform:uppercase;font-family:sans-serif;"><a href="../profile/?page=data_trayek"><i class="lnr lnr-enter"></i> <b>Trayek Saya</b></a></li>
              <li class="postadd">
                <a class="btn btn-success btn-post" href="../logout.php"><span class="fa fa-sign-out"></span> Logout</a>
              </li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      <!-- Off Canvas Navigation -->
    </div>
    <!-- Header Section End -->

    <!-- Page Header Start -->
    <div class="page-header" style="background: url(../page2/assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <?php
                if(isset($_GET['type'])){
                  switch ($_GET['type']) {
                    case 'taxi':
                      echo'<h2 class="page-title">Izin Trayek Taxi</h2>';
                      break;
                    case 'oplet':
                      echo'<h2 class="page-title">Izin Trayek Oplet</h2>';
                      break;
                    case 'bus_kota':
                      echo'<h2 class="page-title">Izin Trayek Bus Kota</h2>';
                      break;
                    case 'akap':
                      echo'<h2 class="page-title">Izin Trayek Akap</h2>';
                      break;
                    case 'ajap':
                      echo'<h2 class="page-title">Izin Trayek Ajap</h2>';
                      break;
                    case 'Karyawan':
                      echo'<h2 class="page-title">Izin Trayek Angkutan Karyawan</h2>';
                      break;
                    case 'barang':
                      echo'<h2 class="page-title">Izin Trayek Angkutan Barang/Orang</h2>';
                      break;
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
    <?php
      if(isset($_GET['type'])){
        include'../page_web/reg_trayek.php';
      }
    ?>
    <!-- Content section End --> 
    
   <!-- Footer Section Start -->
    <footer>
    	<!-- Footer Area Start -->
    	<section class="footer-Content">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="widget">
                <h3 class="block-title">Tentang</h3>
                <div class="textwidget">
                  <p>-</p>
                </div>
              </div>
            </div>
    				<div class="col-md-3 col-sm-6 col-xs-12">
    					<div class="widget">
    						<h3 class="block-title">Links</h3>
  							<ul class="menu">
                  <li><a href="../">Home</a></li>
                  <li><a href="../#izin">Izin Trayek</a></li>
                  <li><a href="../#slider">Info</a></li>
                  <li><a href="../#faq">FAQ</a></li>
                  <li><a href="../#contactarea">Kontak</a></li>
                </ul>
    					</div>
    				</div>
    				<div class="col-md-3 col-sm-6 col-xs-12">
    					<div class="widget">
                <h3 class="block-title">Berita Baru</h3>
                <div class="twitter-content clearfix" style="max-height:250px;overflow-y:scroll;">
                  <ul class="twitter-list">
                    <?php
                        $resultSlide=mysqli_query($con,"select * from tbl_slide order by id desc");
                        while($rowSlide=mysqli_fetch_array($resultSlide)){
                            echo'<li class="clearfix">
                                  <span>
                                    '.$rowSlide['deskripsi'].'
                                    </br>
                                    <a href="'.$rowSlide['url'].'">Link</a>
                                  </span>
                                </li>';
                        }
                    ?>
                  </ul>
                </div>
              </div>
    				</div>
    				<div class="col-md-3 col-sm-6 col-xs-12">
    					<div class="widget">
    						<h3 class="block-title">Izin Trayek</h3>
                <ul class="featured-list">
                  <li style="background:#09be00">
                    <img alt="" src="../icon/taxi.png" style="margin-top:20px;filter: invert(190%);">
                    <div class="hover">
                      <a href="../register_trayek/?type=taxi"><span>Taxi</span></a>
                    </div>
                  </li>
                  <li style="background:#006bc2">
                    <img alt="" src="../icon/angkot.png" style="margin-top:23px;filter: invert(190%);padding-left:5px;padding-right:5px">
                    <div class="hover">
                      <a href="../register_trayek/?type=oplet"><span>Oplet</span></a>
                    </div>
                  </li>
                  <li style="background:#ff9600">
                    <img alt="" src="../icon/bus.png" alt="" style="margin-top:20px;filter: invert(100%);">
                    <div class="hover">
                      <a href="../register_trayek/?type=bus_kota"><span style="margin-left:-30px">Bus Kota</span></a>
                    </div>
                  </li>
                  <li style="background:#0022ba">
                    <img alt="" src="../icon/mini_bus.png" alt="" style="margin-top:20px;filter: invert(100%);">
                    <div class="hover">
                      <a href="../register_trayek/?type=akap"><span>Akap</span></a>
                    </div>
                  </li>
                  <li style="background:#d70600">
                    <img alt="" src="../icon/mini_bus.png" alt="" style="margin-top:20px;filter: invert(100%);">
                    <div class="hover">
                      <a href="../register_trayek/?type=ajap"><span>Ajap</span></a>
                    </div>
                  </li>
                  <li style="background:#b4b4b4">
                    <img alt="" src="../icon/mobil.png" alt="" style="margin-top:15px;filter: invert(100%);">
                    <div class="hover">
                      <a href="../register_trayek/?type=karyawan"><span style="margin-left:-31px">Karyawan</span></a>
                    </div>
                  </li>
                  <li style="background:#ffc400">
                    <img alt="" src="../icon/truck.png" alt="" style="margin-top:15px;filter: invert(100%);padding-left:5px;padding-right:5px">
                    <div class="hover">
                      <a href="../register_trayek/?type=barang"><span style="margin-left:-25px;margin-top:-10px">Orang/</br>Barang</span></a>
                    </div>
                  </li>
                </ul> 							
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>
    	<!-- Footer area End -->
    	
    	<!-- Copyright Start  -->
    	<div id="copyright" style="background:white;">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">
              <div class="site-info pull-left" style="color:#444">
                <p>Copyrights &copy; <a href="#" style="color:#444">SAPO</a> </p>
              </div>    					
              <div class="bottom-social-icons social-icon pull-right">  
                <a class="facebook" target="_blank" href="https://web.facebook.com/GrayGrids"><i class="fa fa-facebook"></i></a> 
                <a class="twitter" target="_blank" href="https://twitter.com/GrayGrids"><i class="fa fa-twitter"></i></a>
                <a class="dribble" target="_blank" href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a>
                <a class="flickr" target="_blank" href="https://www.flickr.com/"><i class="fa fa-flickr"></i></a>
                <a class="youtube" target="_blank" href="https://youtube.com"><i class="fa fa-youtube"></i></a>
                <a class="google-plus" target="_blank" href="https://plus.google.com"><i class="fa fa-google-plus"></i></a>
                <a class="linkedin" target="_blank" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
              </div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- Copyright End -->

    </footer>
    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a>  
      
    <!-- Main JS  -->
    <script type="text/javascript" src="../page2/assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="../page2/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../page2/assets/js/material.min.js"></script>
    <script type="text/javascript" src="../page2/assets/js/material-kit.js"></script>
    <script type="text/javascript" src="../page2/assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="../page2/assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../page2/assets/js/wow.js"></script>
    <script type="text/javascript" src="../page2/assets/js/main.js"></script>
    <script type="text/javascript" src="../page2/assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../page2/assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="../page2/assets/js/jasny-bootstrap.min.js"></script>
    
  </body>
</html>