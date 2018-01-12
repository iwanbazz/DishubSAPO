   <?php
    echo $ps;
   ?>
   <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-sm-offset-6 col-md-8 col-md-offset-2">
            <div class="page-login-form box">
              <h3>
                Update Profile
              </h3>
              <form role="form" class="login-form" method="post">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo isset($user['nama'])?$user['nama']:''; ?>">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email Address" value="<?php echo isset($user['email'])?$user['email']:''; ?>" disabled>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-briefcase"></i>
                    <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" value="<?php echo isset($user['jabatan'])?$user['jabatan']:''; ?>" required>
                  </div>
                </div>  
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-map"></i>
                    <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?php echo isset($user['alamat'])?$user['alamat']:''; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-flag"></i>
                    <input type="text" class="form-control" placeholder="Nama Badan Usaha" name="badan_usaha" value="<?php echo isset($user['badan_usaha'])?$user['badan_usaha']:''; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-phone"></i>
                    <input type="tel" class="form-control" placeholder="No.Telp./HP" name="phone" value="<?php echo isset($user['phone'])?$user['phone']:''; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-map-marker"></i>
                    <input type="text" class="form-control" placeholder="Lokasi Tempat Usaha" name="lokasi_usaha" value="<?php echo isset($user['lokasi_usaha'])?$user['lokasi_usaha']:''; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-map-pin"></i>
                    <input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan" value="<?php echo isset($user['kelurahan'])?$user['kelurahan']:''; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-map-pin"></i>
                    <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" value="<?php echo isset($user['kecamatan'])?$user['kecamatan']:''; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-file"></i> 
                    <input type="text" class="form-control" placeholder="Status Tanah" name="status_tanah" value="<?php echo isset($user['status_tanah'])?$user['status_tanah']:''; ?>"required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-exchange"></i>
                    <input type="number" class="form-control" placeholder="Luas Tanah(m2)" name="luas" value="<?php echo isset($user['luas'])?$user['luas']:''; ?>" required>
                  </div>
                </div>
                <input class="btn btn-common log-btn" name="save" type="submit" value="Save">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>