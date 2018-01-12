<?php
  echo $ps;
?>    
   <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Register
              </h3>
              <form role="form" class="login-form" method="post">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="name" placeholder="Nama Lengkap" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email Address" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                  </div>
                </div>  
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="re_pass" placeholder="Retype Password" required>
                  </div>
                </div>                 
                <div class="checkbox">
                  <input type="checkbox" id="remember" name="accept" value="1" style="float: left;">
                  <label for="remember">By creating account you agree to our Terms & Conditions</label>
                </div>
                <input class="btn btn-common log-btn" name="register" type="submit" value="Register">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>