<?php
  session_start();
  extract($_POST);
  include '../koneksi.php';
  if(!isset($_GET['page']) || isset($_SESSION['c58c1d179d60e7874f8c856f833eedd3-login'])){
    header("location:../");
  }
  if(isset($_GET['user'])&&isset($_GET['page'])&&$_GET['page']=="new_password"){
    $getKode=$_GET['user'];
    if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where kode_user='$getKode'"))==0){
      echo "
        <script>
        location.assign('?page=login');
        </script>
        ";
    }
  }
  $ps="";
  if(isset($login)){
    $pass1=md5(strtolower($pass));
    $nick1=strtolower($email);
    if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where email='$nick1' and pass='$pass1'")))
      {
          $qu1=mysqli_query($con,"select * from tbl_user where email='$nick1' and pass='$pass1'");
          $has1=mysqli_fetch_row($qu1);
          $_SESSION['c58c1d179d60e7874f8c856f833eedd3-user']=$has1[0];
          $_SESSION['c58c1d179d60e7874f8c856f833eedd3-login']="1";
          header("location:../");
    }
    else{
          $ps="
              <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Wrong username or password :(
              </div>
          ";
    }
  }else if(isset($register)){
    $pass1=md5(strtolower($pass));
    $nick1=strtolower($email);
    $nameWord = ucwords ($name);
    if($pass==$re_pass && isset($accept)){
      if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where email='$email'"))==0){
        if(mysqli_query($con,"insert into tbl_user(nama, email, pass, lupass) values('$name','$nick1','$pass1','$pass')"))
        {
              $qu1=mysqli_query($con,"select * from tbl_user where email='$nick1' and pass='$pass1'");
              $has1=mysqli_fetch_row($qu1);
              $_SESSION['c58c1d179d60e7874f8c856f833eedd3-user']=$has1[0];
              $_SESSION['c58c1d179d60e7874f8c856f833eedd3-login']="1";
              header("location:../");
        }else{
              $ps="
                  <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                  <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Gagal mendaftar
                  </div>
              ";
        }
      }else{
        $ps="
                  <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                  <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Email sudah terdaftar, silahkan gunakan Email lain!
                  </div>
              ";
      }
    }else{
      if($pass!=$re_pass){
        $ps="
              <div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Password tidak sama!
              </div>
          ";
      }else{
        $ps="
              <div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Silahkan setujui persyaratan ini!
              </div>
          ";
      }
    }
  }else if(isset($request_pass)){
    if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where email='$email'"))!=0){
      $link="";
      $panjang=20;
      $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
      $string = '';
      for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
      }
      if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where kode_user='$string'"))==0){
        if(mysqli_query($con,"update tbl_user set kode_user='$string' where email='$email'")){
            $link="".$string;
        }
      }else{
          while(mysqli_num_rows(mysqli_query($con,"select * from tbl_user"))){
              $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
              $string = '';
              for ($i = 0; $i < $panjang; $i++) {
                $pos = rand(0, strlen($karakter)-1);
                $string .= $karakter{$pos};
              }
              if(!mysqli_num_rows(mysqli_query($con,"select * from tbl_user where kode_user='$string'"))){
                  if(mysqli_query($con,"update tbl_user set kode_user='$string' where email='$email'")){
                      $link="".$string;
                  }
                  break;
              }
          }
      }
      $getUser = mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where email='$email'"));
      $to = $email; 
      $from = "SAPO - Web Application"; 
      $name = "SAPO Admin"; 
      $headers = "From: $from"; 
      $subject = "Request Password - ".$email; 
   
      $fields = array(); 
      $fields{"name"} = $getUser['nama']; 
      $fields{"email"} = $email; 
      $fields{"Link New Password"} = $link;
   
      $body = "Here is what was sent:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }
   
      if($send = mail($to, $subject, $body, $headers)){
        $ps="
              <div class='alert alert-success alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Suksess !</h4> Silahkan cek email Anda :D
              </div>
          ";
      }
    }else{
      $ps="
              <div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Email tidak terdaftar!
              </div>
          ";
    }
  }else if(isset($save_pass)){
    if($pass==$re_pass){
      $pass1=md5(strtolower($pass));
      if(mysqli_query($con,"update tbl_user set pass='$pass1', lupass='$pass' where kode_user='$getKode'"))
      {
            $reUpdate= mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where kode_user='$getKode'"));
            if(mysqli_query($con,"update tbl_user set kode_user='-' where id='".$reUpdate['id']."'")){
              echo "
                <script>
                location.assign('?page=success');
                </script>
                ";
              unset($_SESSION['c58c1d179d60e7874f8c856f833eedd3-kodeUser']);
            }
      }else{
            $ps="
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Wrong username or password :(
                </div>
            ";
      }
    }else{
      $ps="
          <div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Password tidak sama!
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
      if(isset($_GET['page'])){
        switch ($_GET['page']) {
          case 'login':
            echo'<title>Login | SAPO</title>';
            break;
          case 'register':
            echo'<title>Register | SAPO</title>';
            break;
          case 'password':
            echo'<title>Forgot Password | SAPO</title>';
            break;
          case 'new_password':
            echo'<title>New Password | SAPO</title>';
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
              <li style="color:inherit;text-transform:uppercase;font-family:sans-serif;"><a href="?page=login"><i class="lnr lnr-enter"></i> <b>Masuk</b></a></li>
              <li style="color:inherit;text-transform:uppercase;font-family:sans-serif;"><a href="?page=register"><i class="lnr lnr-user"></i> <b>Daftar</b></a></li>
              <li class="postadd">
                <a class="btn btn-success btn-post" href="../"><span class="fa fa-home"></span> Home</a>
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
                if(isset($_GET['page'])){
                  switch ($_GET['page']) {
                    case 'login':
                      echo'<h2 class="page-title">Login to account</h2>';
                      break;
                    case 'register':
                      echo'<h2 class="page-title">Join Us</h2>';
                      break;
                    case 'password':
                      echo'<h2 class="page-title">Forgot Password</h2>';
                      break;
                    case 'new_password':
                      echo'<h2 class="page-title">New Password</h2>';
                      break;
                    default:
                      # code...
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
      if(isset($_GET['page'])){
        switch ($_GET['page']) {
          case 'login':
            include'../page_web/login.php';
            break;
          case 'register':
            include'../page_web/register.php';
            break;
          case 'password':
            include'../page_web/forgot_password.php';
            break;
          case 'success':
            if(empty($_SESSION['c58c1d179d60e7874f8c856f833eedd3-kodeUser'])){
              echo "
                <script>
                location.assign('?page=login');
                </script>
                ";
            }else{
              include'../page_web/success.php';
            }
            break;
          case 'new_password':
            if(isset($_GET['user'])){
              if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where kode_user='$getKode'"))!=0){
                include'../page_web/new_password.php';
                $_SESSION['c58c1d179d60e7874f8c856f833eedd3-kodeUser']=$getKode;
              }
            }
            break;
          default:
            # code...
            break;
        }
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
                      <a href="../register_trayek/?type=barang"><span style="margin-left:-25px;margin-top:-10px">Barang</span></a>
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