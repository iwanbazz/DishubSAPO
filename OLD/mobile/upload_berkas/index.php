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
    if(!empty($_FILES['file']['tmp_name']))
    { 
        $nameFile=$_FILES['file']['name'];
        if(move_uploaded_file($_FILES['file']['tmp_name'], "../../berkas_user/".$idBerkas."/". basename($nameFile))){
          if(mysqli_query($con,"update tbl_berkas set file='$nameFile' where id='$idBerkas'")){
            echo "
              <script>
              location.assign('../upload_bukti/?idBerkas=".$idBerkas."');
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
            <h4><i class='icon glyphicon glyphicon-remove'></i> Gagal !</h4> Berkas gagal diKirim.
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
    <title>Upload Berkas | SAPO</title>

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
  </head>

  <body>  

    <!-- Content section Start --> 
    <?php
      if(isset($_GET['idBerkas'])){
        if(isset($_GET['ps'])){
            echo $ps;
        }else{
            include'../../page_web/upload.php';
        }
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