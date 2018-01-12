<?php
  echo $ps;
?>    
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                New Password
              </h3>
              <form role="form" method="post" class="login-form">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="pass" placeholder="New Password" required>
                  </div>
                </div>  
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="re_pass" placeholder="Retype Password" required>
                  </div>
                </div>  
                <input class="btn btn-common log-btn" type="submit" name="save_pass" value="Submite">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>