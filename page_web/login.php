<?php
  echo $ps;
?>    
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Login
              </h3>
              <form role="form" class="login-form" method="post">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                  </div>
                </div>
                <input type="submit" name="login" class="btn btn-common log-btn" value="Submit">
                <div class="row" style="margin-bottom:10px">
                    <div class="col-md-5">
                        <div style="width:100%;background:#b4b4b4;height:1px;margin-top:12px"></div>
                    </div>
                    <div class="col-md-2">
                      <div style="width:100%;text-align:center">or</div>
                    </div>
                    <div class="col-md-5">
                        <div style="width:100%;background:#b4b4b4;height:1px;margin-top:12px"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <a href="#" class="btn btn-danger log-btn"><i class="fa fa-google-plus"></i> Google</a>
                    </div>
                    <div class="col-md-6">
                      <a href="#" class="btn btn-primary log-btn"><i class="fa fa-facebook"></i> Facebook</a>
                    </div>
                </div>
              </form>
              <ul class="form-links">
                <li class="pull-left"><a href="?page=register">Tidak mempunyai akun?</a></li>
                <li class="pull-right"><a href="?page=password">Lupa password?</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>