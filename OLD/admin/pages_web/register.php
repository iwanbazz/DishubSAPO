<?php
session_start();
extract($_POST);
include '../koneksi.php';

$qu=mysqli_query($con,"select * from tbl_admin");
if(mysqli_fetch_row($qu)){
    header("location:../");
}
if(isset($_GET['qwi'])=="r")
{
$ps="
            <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon glyphicon glyphicon-ok'></i> Please Check Email !</h4> Username and Password have been sent
            </div>
        ";
		echo $ps; 
}
if(isset($_POST['reg']))
{

  $pass1=md5(strtolower($pass));
  $nick1=strtolower($user);
  $nameWord = ucwords ($name);

  $ryRandom = rand(1,5);
  $pathAwal = "../default/avatar".$ryRandom.".png";
  $pathTujuan = "../image/avatar".$ryRandom.".png";
  copy($pathAwal, $pathTujuan);   
  if(mysqli_num_rows(mysqli_query($con,"select * from tbl_admin where username='$nick1'"))){
     $ps="
          <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Gagal membuat user Admin
          </div>
      ";
    echo $ps;
  }else{
    if(mysqli_query($con,"insert into tbl_admin values('','$nameWord','$nick1','$pass1','$pass','')")){
      $result=mysqli_query($con,"select * from tbl_admin where username='$nick1'");
      $roq=mysqli_fetch_array($result);
      $fileAwal = $pathTujuan;
      $fileBaru = "../image/".$roq['id'].".png";
      if(rename($pathTujuan, $fileBaru)){
        if(mysqli_query($con,"update tbl_admin set img='".$roq['id'].".png' where id='".$roq['id']."'")){
          $_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-admin']=$roq['id'];
          header("location:../");
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administrator Konsultasi</title>
	<link rel="shortcut icon" href="../img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page" style="background:#00aeff">
    <div class="login-box">
      <div class="login-logo">
          <a href="#" style="color:white"><b>Register Admin</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Register to frist start your session</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="user" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama" name="name" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="pass" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-block btn-flat pull-right" value="Register" name="reg"/>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
     
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>