<?php
  date_default_timezone_set('Asia/Jakarta');
  extract($_POST);
  include'../../koneksi.php';
  if(!isset($_GET['idUser']) || !isset($_GET['type'])){
    header("location:../../hsuahudahu");
  }else{
    $idUser=$_GET['idUser'];
    $user = mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where id='$idUser'"));
    $type=$_GET['type'];
  }
  $ps="";
  $cari="-";
  if(isset($cari_data)){
    $cari=$nomor;
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
    <div class="box">
            <div class="box-header" style="margin-bottom:10px;">
                <form class="login-form" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-icon">
                                    <i class="icon fa fa-search"></i>
                                    <input type="text" class="form-control" name="nomor" placeholder="Masukan nomor polisi/STNK..." autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input class="btn btn-info log-btn" name="cari_data" style="padding-top:12px;padding-bottom:12px;" type="submit" value="Cari">
                                <?php echo '<a href="./?idUser='.$idUser.'&type='.$type.'" class="btn btn-danger log-btn" style="padding-top:12px;padding-bottom:12px;">Semua</a>';?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-height:500px;overflow-y: auto;">
                <table id="example1" class="table table-bordered table-striped;margin-top:0px">
                    <thead>
                        <tr>
                            <th>No Polisi</th>
                            <th>Keterangan</th>
                            <th>Berkas</th>
                            <th>Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            if($cari=="-"){
                                $qu=mysqli_query($con,"select * from tbl_berkas where idUser='$idUser' and izin='$type' order by id desc");
                            }else{
                                $qu=mysqli_query($con,"select * from tbl_berkas where idUser='$idUser' and (no_polisi like '%".$cari."%' or no_stnk like '%".$cari."%') and izin='$type'  order by id desc");
                            }
                            while($has=mysqli_fetch_row($qu))
                            {
                                $ket="";
                                $tglTerima="-";
                                $file="-";
                                $status="Proses";
                                if($has[3]=="1"){
                                    $ket="Baru";
                                }else{
                                    $ket="Perpanjang";
                                }
                                if($has[10]=="" && $has[6]!=""){
                                    $file="<a class='btn btn-info log-btn' href='../upload_bukti/?idBerkas=".$has[0]."' style='font-size:12px;padding:8px;'><i class='fa fa-folder'></i>Upload</a>";
                                }else{
                                    $file="Lengkapi berkas";
                                } 
                                if($has[6]==""){
                                    $berkas="<a class='btn btn-info log-btn' href='../upload_berkas/?idBerkas=".$has[0]."' style='font-size:12px;padding:8px;'><i class='fa fa-folder'></i>Upload</a>";   
                                }else{
                                    $berkas="Sudah dikirim";
                                }
                                echo "
                                <tr>
                                    <td>$has[4]</td>
                                    <td>".$ket."</td>
                                    <td>".$berkas."</td>
                                    <td>".$file."</td>
                                ";
                            }
                       ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
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