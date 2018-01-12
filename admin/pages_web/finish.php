<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['save']))
{    
    
    $getId=mysqli_fetch_row(mysqli_query($con,"select max(id) from tbl_berkas"));
    
    if(!empty($_FILES['file']['tmp_name']))
    { 
        $namaFile=$_FILES['file']['name'];
        $ext=strtolower(substr($_FILES['file']['name'],-3));
        $ext2=strtolower(substr($_FILES['file']['name'],-4));
        if($ext=='gif'){
            $ext=".gif";
        } else if ($ext=='jpg') {
            $ext=".jpg";
        } else if($ext=='png'){
            $ext=".png";
        } else{
            if($ext2=='jpeg'){
                $ext=".jpeg";
            }
        }
        move_uploaded_file($_FILES['file']['tmp_name'], "./hasil/" . basename(($getId[0]+1).$ext));
    }
    
    mysqli_query($con,"update tbl_berkas set acc='3', hasil='".$_GET['kode_user'].$ext."' where id='".$_GET['kode_user']."'");
    
    
    echo "
    <script>
    location.assign('?page=user&ps=true2');
    </script>
    ";
}
elseif(isset($_POST['update']))
{
    if(!empty($_FILES['file']['tmp_name']))
    { 
        unlink("./hasil/$gambar");
        $ext=strtolower(substr($_FILES['file']['name'],-3));
        $ext2=strtolower(substr($_FILES['file']['name'],-4));
        if($ext=='gif'){
            $ext=".gif";
        } else if ($ext=='jpg') {
            $ext=".jpg";
        } else if($ext=='png'){
            $ext=".png";
        } else{
            if($ext2=='jpeg'){
                $ext=".jpeg";
            }
        }
        move_uploaded_file($_FILES['file']['tmp_name'], "./hasil/" . basename(($_GET['kode_user']).$ext));
        
        mysqli_query($con,"update tbl_berkas set acc='3', hasil='".$_GET['kode_user'].$ext."' where id='".$_GET['kode_user']."'");
    }
    
    echo "
    <script>
    location.assign('?page=user&ps=true2');
    </script>
    ";
}

/*pesan berhasil update*/
if(isset($_GET['ps'])&&$_GET['ps']=='true2')
    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button></div>";
elseif(isset($_GET['ps'])&&$_GET['ps']=='true1')
    echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button></div>";
elseif(isset($_GET['ps'])&&$_GET['ps']=='true3')
    echo "<div class='alert alert-warning' role='alert'>Kategori sudah ada. <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button></div>";

if(isset($_GET['kode_user']))
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_berkas where id='".$_GET['kode_user']."'"));

?>
    <style>
        #image-holder {
            margin-top: 8px;
        }
        
        #image-holder img {
            border: 8px solid #DDD;
            max-width:100%;
        }
    </style>
    <section class="content-header">
          <h1>
            Hasil
          </h1>
          <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Hasil</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <?php
                            if(isset($_GET['kode_user'])){
                        ?>
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Input Hasil</h3>
                        </div>
                        <?php
                            }else{
                        ?>
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Input Hasil</h3>
                        </div>
                        <?php
                            }
                        ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="id" value="<?php echo isset($_GET['id'])?$_GET['']:''; ?>">
                           <input type="hidden" name="gambar" value="<?php echo isset($data[2])?$data[2]:''; ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept="image/*" name="file" class="form-control" id="foto">
                                        </div>
                                    </div>
                                </div>
                                <!--input image awal-->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input onclick="change_url()" type="submit" class="btn btn-info" value="Post" name="<?php echo isset($_GET['kode_user'])?'update':'save'; ?>">
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>