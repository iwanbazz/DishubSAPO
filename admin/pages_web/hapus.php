<?php
include '../koneksi.php';

if(isset($_GET['del']))
$id=$_GET['del'];

if(isset($_GET['idUser']))
$idUser=$_GET['idUser'];

if(isset($_GET['data']))
{
switch($_GET['data'])
{
    case 'user_list':
    mysqli_query($con,"delete from tbl_berkas where id='$id'");
    $_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success']=1;
    header("location:../?page=user");
    break;

    case 'info':
    $_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success']=1;
    mysqli_query($con,"delete from tbl_slide where id='$id'");
    header("location:../?page=info");
    break;
    
    case 'verifikasi':
    $_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success']=1;
    mysqli_query($con,"delete from tbl_verifikasi where id='$id'");
    header("location:../?page=verifikasi");
    break;
}
}
?>