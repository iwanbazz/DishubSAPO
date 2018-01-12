<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['save']))
{    
    
    $getId=mysqli_fetch_row(mysqli_query($con,"select max(id) from tbl_verifikasi"));
    
    
    mysqli_query($con,"insert into tbl_verifikasi values('','$no_uji','$no_kendaraan')");
    
      echo "
    <script>
    location.assign('?page=verifikasi&ps=true1');
    </script>
    ";
}
elseif(isset($_POST['update']))
{

        mysqli_query($con,"update tbl_verifikasi set no_uji='$no_uji', no_kendaraan='$no_kendaraan' where id='".$_GET['id']."'");
    
    echo "
    <script>
    location.assign('?page=verifikasi&ps=true2');
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

if(isset($_GET['id']))
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_verifikasi where id='".$_GET['id']."'"));

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
            Tambah Data
          </h1>
          <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tambah Data</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <?php
                            if(isset($_GET['id'])){
                        ?>
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Update</h3>
                        </div>
                        <?php
                            }else{
                        ?>
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Input</h3>
                        </div>
                        <?php
                            }
                        ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="id" value="<?php echo isset($_GET['id'])?$_GET['id']:''; ?>">

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">No UJi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="No Uji" name="no_uji" id="tiga" value="<?php echo isset($data[2])?$data[1]:''; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">No Kendaraan</label>
                                    <div class="col-sm-10">
                                       <input type="text" class="form-control" placeholder="No Kendaraan" name="no_kendaraan" id="tiga" value="<?php echo isset($data[1])?$data[2]:''; ?>" required>
                                    </div>
                                </div>
                                <!--input image awal-->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input onclick="change_url()" type="submit" class="btn btn-info" value="SAVE" name="<?php echo isset($_GET['id'])?'update':'save'; ?>">
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>