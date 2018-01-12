<?php
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  extract($_POST);
  include '../koneksi.php';
  if(!isset($_GET['page']) || !isset($_GET['idBerkas']) || empty($_SESSION['c58c1d179d60e7874f8c856f833eedd3-login'])){
    header("location:../");
  }else{
    $idUser=$_SESSION['c58c1d179d60e7874f8c856f833eedd3-user'];
    $user = mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where id='$idUser'"));
    $idBerkas=$_GET['idBerkas'];
  }
  $ps="";
  if(isset($upload_data)){
    if(!empty($_FILES['file']['tmp_name']))
    { 
        $nameFile=$_FILES['file']['name'];
        if(move_uploaded_file($_FILES['file']['tmp_name'], "../berkas_user/".$idBerkas."/". basename($nameFile))){
          if(mysqli_query($con,"update tbl_berkas set file='$nameFile' where id='$idBerkas'")){
            $ps="
              <div class='alert alert-success alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Uploaded !</h4> Berkas berhasil diUpload.
              </div>
            ";
          }
        }
    }else{
        $ps="
            <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon glyphicon glyphicon-remove'></i> Gagal !</h4> Berkas Anda gagal diUpload.
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
    <title>Upload Berkas | SAPO</title>

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
              <h2 class="page-title">Upload Berkas Trayek</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
    <?php
      if(isset($_GET['page'])){
        include'../page_web/upload.php';
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