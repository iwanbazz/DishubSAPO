   <?php
    echo $ps;
    $cekFile=mysqli_fetch_array(mysqli_query($con,"select * from tbl_berkas where id='$idBerkas'"));

    if($cekFile['pembayaran']==""){
   ?>
   <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-5 col-md-6 col-md-offset-3">
            <div class="page-login-form box">
              <h3>
                Bukti Pembayaran
              </h3>
              <form role="form" class="login-form" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                     
                  <span>Upload Bukti Pembayaran Anda</span>
               
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
              <h4><i class='icon glyphicon glyphicon-remove'></i> Uploaded !</h4> Anda telah mengupload bukti pembayaran.
              </div>";
      }
    ?>