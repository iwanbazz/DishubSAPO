              <?php
                date_default_timezone_set('Asia/Jakarta');
                if(isset($_POST['save']))
                {    
                    
                    $getId=mysqli_fetch_row(mysqli_query($con,"select max(id) from tbl_info"));
                    
                    if(!empty($_FILES['file']['tmp_name']))
                    { 
                        $namaFile=$_FILES['file']['name'];
                        $ext=strtolower(substr($_FILES['file']['name'],-3));
                        $ext2=strtolower(substr($_FILES['file']['name'],-4));
                        if($ext=='gif'){
                            $ext=".gif";
                        } else if ($ext=='jpg') {
                            $ext=".jpg";
                        } else if($ext2=='jpeg'){
                            $ext=".jpeg";
                        } else if($ext=='png'){
                            $ext=".png";
                        } else if($ext=='zip'){
                            $ext=".zip";
                        } else if($ext=='rar'){
                            $ext=".rar";
                        } else if($ext=='tar'){
                            $ext=".tar";
                        } else if($ext=='txt'){
                            $ext=".txt";
                        } else if($ext=='doc'){
                            $ext=".doc";
                        } else if($ext=='xls'){
                            $ext=".xls";
                        } else if($ext=='ppt'){
                            $ext=".ppt";
                        } else if($ext2=='docx'){
                            $ext=".docx";
                        }
                        move_uploaded_file($_FILES['file']['tmp_name'], "../file/" . basename(($getId[0]+1).$ext));
                    }
                    
                    mysqli_query($con,"insert into tbl_info values('','$judul','$isi','$namaFile','".($getId[0]+1).$ext."','".date('Y-m-d')."','$idUser')");
                    
                      echo "
                    <script>
                    location.assign('?page=add_informasi&ps=true1');
                    </script>
                    ";
                }
                elseif(isset($_POST['update']))
                {
                    if(!empty($_FILES['file']['tmp_name']))
                    { 
                        unlink("../file/$gambar");
                        $ext=strtolower(substr($_FILES['file']['name'],-3));
                        $ext2=strtolower(substr($_FILES['file']['name'],-4));
                        if($ext=='gif'){
                            $ext=".gif";
                        } else if ($ext=='jpg') {
                            $ext=".jpg";
                        } else if($ext2=='jpeg'){
                            $ext=".jpeg";
                        } else if($ext=='png'){
                            $ext=".png";
                        } else if($ext=='zip'){
                            $ext=".zip";
                        } else if($ext=='rar'){
                            $ext=".rar";
                        } else if($ext=='tar'){
                            $ext=".tar";
                        } else if($ext=='txt'){
                            $ext=".txt";
                        } else if($ext=='doc'){
                            $ext=".doc";
                        } else if($ext=='xls'){
                            $ext=".xls";
                        } else if($ext=='ppt'){
                            $ext=".ppt";
                        } else if($ext2=='docx'){
                            $ext=".docx";
                        } else if($ext=='pdf'){
                            $ext=".pdf";
                        }
                        move_uploaded_file($_FILES['file']['tmp_name'], "../file/" . basename(($_GET['id']).$ext));
                        
                        mysqli_query($con,"update tbl_info set judul='$judul',file='".$_GET['id'].$ext."',isi='$isi',id_User='$idUser' where id='".$_GET['id']."'");
                    }
                    else
                        mysqli_query($con,"update tbl_info set judul='$judul',isi='$isi',id_User='$idUser' where id='".$_GET['id']."'");
                    
                    echo "
                    <script>
                    location.assign('?page=add_informasi&ps=true2');
                    </script>
                    ";
                }

                /*pesan berhasil update*/
                if(isset($_GET['ps'])&&$_GET['ps']=='true2')
                    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";
                elseif(isset($_GET['ps'])&&$_GET['ps']=='true1')
                    echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";

                if(isset($_GET['id']))
                $data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_info where id='".$_GET['id']."'"));

                ?>
                <?php if(isset($_GET['id'])){

                ?>
              <section class="content-header">
                <h1>
                  Update Infromasi
                  <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Update Infromasi</li>
                </ol>
              </section>
                <?php
                }else{
                ?>
                <section class="content-header">
                <h1>
                  Tambah Infromasi
                  <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
                  <li class="active">Tambah Infromasi</li>
                </ol>
              </section>
                <?php
                }
                ?>
                

              <section class="content">
              <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <?php if(isset($_GET['id'])){

                        ?>
                        <h3 class="box-title">Update Infromasi</h3>
                        <?php
                        }else{
                        ?>
                        <h3 class="box-title">Tambah Infromasi Baru</h3>
                        <?php
                        }
                        ?>
                      </div><!-- /.box-header -->
                      <form method="post" enctype="multipart/form-data">
                          <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo isset($_GET['id'])?$_GET['id']:''; ?>">
                            <input type="hidden" name="gambar" value="<?php echo isset($data[4])?$data[4]:''; ?>">
                            <div class="form-group">
                              <input class="form-control" placeholder="Subject:" name="judul" value="<?php echo isset($data[1])?$data[1]:''; ?>"/>
                            </div>
                            <div class="form-group">
                              <textarea id="compose-textarea" class="form-control" style="height: 300px" name="isi">
                                <?php echo isset($data[2])?$data[2]:''; ?>
                              </textarea>
                            </div>
                            <div class="form-group">
                              <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Attachment
                                <input type="file" name="file" id="file"/>
                              </div>
                              <p class='help-block'>Silahkan pilih file Anda</p>
                            </div>
                          </div><!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['id'])?'update':'save'; ?>"><i class="fa fa-envelope-o"></i> Kirim</button>
                          </div><!-- /.box-footer -->
                        </form>
                    </div><!-- /. box -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </section>