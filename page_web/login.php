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
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>