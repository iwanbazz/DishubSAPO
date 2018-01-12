<?php
    define('_DOC_ROOT',dirname(__FILE__).'/');
    include '../koneksi.php';
    if(isset($_GET['idBerkas'])){
        $idDir=$_GET['idBerkas'];
        if(mysqli_num_rows(mysqli_query($con,"select * from tbl_berkas where id='$idDir'"))!=0){
            $new_dir = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['idBerkas']);
            //menaruh fungsi mkdir kedalam sebuah handle  
            $handle = mkdir ($new_dir);
            //mengecek proses handle fungsi mkdir   
            if ($handle) {   
                header("location:../mobile/upload_berkas/?idBerkas=".$_GET['id']);
            }   
            else {   
               header("location:../defew");
            }
        }else{
            header("location:../fwefwef");
        }
    }else{
        header("location:../fwefwefwef");
    }
?>