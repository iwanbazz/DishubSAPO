<?php
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['save']))
{    
    
    $getId=mysqli_fetch_row(mysqli_query($con,"select max(id) from tbl_side"));
    
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
        move_uploaded_file($_FILES['file']['tmp_name'], "./img_slide/" . basename(($getId[0]+1).$ext));
    }
    
    mysqli_query($con,"insert into tbl_slide values('','$deskripsi','".($getId[0]+1).$ext."','$link')");
    
      echo "
    <script>
    location.assign('?page=add_info&ps=true1');
    </script>
    ";
}
elseif(isset($_POST['update']))
{
    if(!empty($_FILES['file']['tmp_name']))
    { 
        unlink("./img_slide/$gambar");
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
        move_uploaded_file($_FILES['file']['tmp_name'], "./img_slide/" . basename(($_GET['id']).$ext));
        
        mysqli_query($con,"update tbl_slide set deskripsi='$deskripsi', url='$link', img='".$_GET['id'].$ext."' where id='".$_GET['id']."'");
    }
    else
        mysqli_query($con,"update tbl_slide set deskripsi='$deskripsi', url='$link' where id='".$_GET['id']."'");
    
    echo "
    <script>
    location.assign('?page=add_info&ps=true2');
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
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_slide where id='".$_GET['id']."'"));

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
            Tambah Info
          </h1>
          <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tambah Info</li>
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
                            <h3 class="box-title">Form Update Posting</h3>
                        </div>
                        <?php
                            }else{
                        ?>
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Input Posting</h3>
                        </div>
                        <?php
                            }
                        ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="id" value="<?php echo isset($_GET['id'])?$_GET['id']:''; ?>">
                           <input type="hidden" name="gambar" value="<?php echo isset($data[2])?$data[2]:''; ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Link" name="link" id="tiga" value="<?php echo isset($data[3])?$data[3]:''; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea id="compose-textarea" class="form-control" rows="5" placeholder="Isi Berita" name="deskripsi"><?php echo isset($data[1])?$data[1]:''; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept="image/*" name="file" class="form-control" id="foto">
                                        <div id="image-holder">
                                           <?php
                                            if(isset($_GET['id']))
                                                echo "<img src='./img_slide/".$data[2]."'?rand='".rand()."' alt=''>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!--input image awal-->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input onclick="change_url()" type="submit" class="btn btn-info" value="Post" name="<?php echo isset($_GET['id'])?'update':'save'; ?>">
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>