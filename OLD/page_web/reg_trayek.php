   <?php
    echo $ps;
   ?>
   <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-5 col-md-6 col-md-offset-3">
            <div class="page-login-form box">
              <h3>
                Daftar
              </h3>
              <form role="form" class="login-form" method="post">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="no_poll" placeholder="Nomor Polisi">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="text" id="sender-email" class="form-control" name="no_stnk" placeholder="Nomor STNK">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <select name="kategori" class="form-control" required>
                            <option value="" disabled selected>Dengan ini kami mengajukan Izin Trayek :</option>
                            <option value="1">Baru</option>
                            <option value="2">Perpanjang</option>
                        </select>
                    </div>
                </div>
                <input class="btn btn-common log-btn" name="daftar_trayek" type="submit" value="Submite">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>