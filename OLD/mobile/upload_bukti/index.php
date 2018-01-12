<?php
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  extract($_POST);
  include '../../koneksi.php';
  if(!isset($_GET['idBerkas'])){
    header("location:../../dqwdqwd");
  }else{
    $idBerkas=$_GET['idBerkas'];
  }
  $ps="";
  if(isset($upload_data)){
    if(isset($bank)){
        if(!empty($_FILES['file']['tmp_name']))
        { 
            $nameFile=$_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'], "../../berkas_pembayaran/".$idBerkas."/". basename($nameFile))){
              if(mysqli_query($con,"update tbl_berkas set pembayaran='$nameFile', bank='$bank' where id='$idBerkas'")){
                echo "
                  <script>
                  location.assign('./?idBerkas=".$idBerkas."&ps=success');
                  </script>
                ";
              }
            }
        }else{
            echo "
              <script>
              location.assign('./?idBerkas=".$idBerkas."&ps=failed');
              </script>
            ";
        }
    }else{
        echo "
              <script>
              location.assign('./?idBerkas=".$idBerkas."&ps=failed2');
              </script>
            ";
    }
  }
  if(isset($_GET['ps'])){
      switch ($_GET['ps']) {
        case 'success':
          $ps="
              <div class='alert alert-success alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Uploaded !</h4> Berkas berhasil diUpload.
              </div>
            ";
          break;
        case 'failed':
          $ps="
            <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon glyphicon glyphicon-remove'></i> Gagal !</h4> Harap masukan berkas bukti pembayaran Anda.
            </div>
        ";
          break;
        case 'failed2':
          $ps="
            <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon glyphicon glyphicon-remove'></i> Gagal !</h4> Pilih jenis Bank Anda.
            </div>
        ";
          break;
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
    <title>Upload Pembayaran | SAPO</title>

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
    <link rel="stylesheet" href="..././page2/assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="../../page2/assets/css/bootstrap-select.min.css">
    <style>
        .paymentWrap {
        	padding: 50px;
        }
        
        .paymentWrap .paymentBtnGroup {
        	max-width: 200px;
        	margin: auto;
        }
        
        .paymentWrap .paymentBtnGroup .paymentMethod {
        	padding: 40px;
        	box-shadow: none;
        	position: relative;
        }
        
        .paymentWrap .paymentBtnGroup .paymentMethod.active {
        	outline: none !important;
        }
        
        .paymentWrap .paymentBtnGroup .paymentMethod.active .method {
        	border-color: #4cd264;
        	outline: none !important;
        	box-shadow: 0px 3px 22px 0px #7b7b7b;
        }
        
        .paymentWrap .paymentBtnGroup .paymentMethod .method {
        	position: absolute;
        	right: 3px;
        	top: 3px;
        	bottom: 3px;
        	left: 3px;
        	background-size: contain;
        	background-position: center;
        	background-repeat: no-repeat;
        	border: 2px solid transparent;
        	transition: all 0.5s;
        }
        
        .paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
        	background-image: url("../iconBank/BNI.png");
        }
        
        .paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
        	background-image: url("../iconBank/BRI.png");
        }
        
        
        .paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
        	border-color: #4cd264;
        	outline: none !important;
        }
    </style>
  </head>

  <body>  

    <!-- Content section Start --> 
    <?php
        if(isset($_GET['ps'])){
            echo $ps;   
        }else{
    ?>
    <div class="page-login-form box">
      <h3>
        Bukti Pembayaran
        </h3>
        <form role="form" class="login-form" method="post" enctype="multipart/form-data">
            <span>Silahkan Pilih Bank Transfer Anda : </span>
        <div class="paymentWrap">
			<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
	            <label class="btn paymentMethod">
	            	<div class="method master-card"></div>
	                <input type="radio" name="bank" value="1"> 
	            </label>
	            <label class="btn paymentMethod">
	            	<div class="method visa"></div>
	                <input type="radio" name="bank" value"2"> 
	            </label>
	        </div>        
		</div>
		<div class="form-group" style="text-align:left">
		    <h4>Bank BNI</h4>
		    1. Transfer biaya ke rek. xxxxxxxxxxx.
		    </br>
		    2. Foto bukti transfer dan upload bukti disini.
		    </br></br>
		    <h4>Bank BRI</h4>
		    1. Transfer biaya ke rek. xxxxxxxxxxx.
		    </br>
		    2. Foto bukti transfer dan upload bukti disini.
		</div>
        <div class="form-group" style="text-align:center">
          <div class="input-group file-caption-main">
             <div class="input-group-btn">
                 <div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse …</span><input class="file" id="featured-file" name="file" type="file"></div>
             </div>
          </div>
          <span>Jika file lebih dari 1 (satu), silahkan diCompress kedalam ".ZIP",".rar", atau ".tar"</span>
        </div>
        <input class="btn btn-common log-btn" name="upload_data" type="submit" value="Submite">
      </form>
    </div>
    <!-- Content section End -->
    
    <?php
        }
    ?>
      
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