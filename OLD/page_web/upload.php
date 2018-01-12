   <?php
    echo $ps;
    $cekFile=mysqli_fetch_array(mysqli_query($con,"select * from tbl_berkas where id='$idBerkas'"));

    if($cekFile['file']==""){
   ?>
   <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-5 col-md-6 col-md-offset-3">
            <div class="page-login-form box">
              <h3>
                Berkas Trayek
              </h3>
              <form role="form" class="login-form" method="post" enctype="multipart/form-data">
                <div class="form-group" style="text-align:center">
                  <div class="input-group file-caption-main">
                     <div class="input-group-btn">
                         <div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse …</span><input class="file" id="featured-file" name="file" type="file"></div>
                     </div>
                  </div>
                  <span>Jika file lebih dari 1 (satu), silahkan diCompress kedalam ".ZIP",".rar", atau ".tar"</span>
                </div>
                <input class="btn btn-common log-btn" name="upload_data" type="submit" value="Submite">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      }else{
        echo "<div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon glyphicon glyphicon-remove'></i> Uploaded !</h4> Anda telah mengupload berkas.
              </div>";
      }
    ?>