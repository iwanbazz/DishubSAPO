<?php
  include'../../koneksi.php';
  extract($_POST);
  if(isset($_GET['idUser'])){
    $idUser=$_GET['idUser'];
    $user=mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where id='$idUser'"));
  }else{
    header("location:../../sfgsayhfgaufhasfh");
  }
  $ps="";
  if(isset($_POST['save'])){
    if(mysqli_query($con,"update tbl_user set nama='$name', jabatan='$jabatan', alamat='$alamat', badan_usaha='$badan_usaha', phone='$phone', lokasi_usaha='$lokasi_usaha', kelurahan='$kelurahan', kecamatan='$kecamatan', status_tanah='$status_tanah', luas='$luas' where id='".$user['id']."'"))
      {
        echo "
        <script>
        location.assign('../success/?idUser=".$idUser."');
        </script>
        ";
          $ps="
              <div class='alert alert-success alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Sukses !</h4> Data berhasil disimpan :D
              </div>
          ";

          echo $ps;
    }
    else{
          $ps="
              <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Silahkan cek kembali data Anda :(
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
    <title>Profile | SAPO</title>

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

    <?php
      echo $ps;
    ?>

    <!-- Content section Start -->
   <div class="page-login-form box">
      <h3>
        Update Profile
      </h3>
      <form role="form" class="login-form" method="post">
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-user"></i>
            <input type="text" id="sender-email" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo isset($user['nama'])?$user['nama']:''; ?>" required>
          </div>
        </div> 
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-envelope"></i>
            <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email Address" value="<?php echo isset($user['email'])?$user['email']:''; ?>" disabled>
          </div>
        </div> 
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-briefcase"></i>
            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" value="<?php echo isset($user['jabatan'])?$user['jabatan']:''; ?>" required>
          </div>
        </div>  
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-map"></i>
            <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?php echo isset($user['alamat'])?$user['alamat']:''; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-flag"></i>
            <input type="text" class="form-control" placeholder="Nama Badan Usaha" name="badan_usaha" value="<?php echo isset($user['badan_usaha'])?$user['badan_usaha']:''; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-phone"></i>
            <input type="tel" class="form-control" placeholder="No.Telp./HP" name="phone" value="<?php echo isset($user['phone'])?$user['phone']:''; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-map-marker"></i>
            <input type="text" class="form-control" placeholder="Lokasi Tempat Usaha" name="lokasi_usaha" value="<?php echo isset($user['lokasi_usaha'])?$user['lokasi_usaha']:''; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-map-pin"></i>
            <input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan" value="<?php echo isset($user['kelurahan'])?$user['kelurahan']:''; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-map-pin"></i>
            <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" value="<?php echo isset($user['kecamatan'])?$user['kecamatan']:''; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-file"></i> 
            <input type="text" class="form-control" placeholder="Status Tanah" name="status_tanah" value="<?php echo isset($user['status_tanah'])?$user['status_tanah']:''; ?>"required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="icon fa fa-exchange"></i>
            <input type="number" class="form-control" placeholder="Luas Tanah(m2)" name="luas" value="<?php echo isset($user['luas'])?$user['luas']:''; ?>" required>
          </div>
        </div>
        <input class="btn btn-common log-btn" name="save" type="submit" value="Save">
      </form>
    </div>
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