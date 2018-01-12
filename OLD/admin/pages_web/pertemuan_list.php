<?php
          if(!empty($_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success'])){
            echo "<div class='alert alert-success' role='alert'>
                  Data Berhasil Terupdate
                  <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button>
                  </div>";
            unset($_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success']);
          }
          if(isset($_GET['action'])){
            if(isset($_GET['kode_user'])){
              $kodeUser=$_GET['kode_user'];
              if(mysqli_query($con,"update tbl_berkas set acc='1' where id='".$kodeUser."'")){
                  echo "
                    <script>
                    location.assign('?page=user');
                    </script>
                    ";
                    $_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success']=1;
              }
            }
          }
        ?>
        <section class="content-header">
          <h1>
            Permintaan Izin
          </h1>
          <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Permintaan Izin</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Informasi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th style="min-width:100px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $setResult=mysqli_query($con,"select * from tbl_pertemuan order by id desc");
                        while ($rowSet=mysqli_fetch_array($setResult,MYSQLI_ASSOC)) {
                            $setResult1=mysqli_query($con,"select * from tbl_user where id='".$rowSet['idUser']."' order by id desc");
                            $rowSet1=mysqli_fetch_array($setResult1,MYSQLI_ASSOC);
                          echo "
                              <tr>
                                <td>".$rowSet1['nama']."</td>
                                <td>".$rowSet['tanggal']."</td>
                                <td style='text-align:center'>
                                  <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel(".$rowSet['id'].",&#39;user_list&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button></span>
                                </td>
                              </tr>
                            ";
                        }
                      ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
              <script>
                  function datadel(value,jenis){
                     document.getElementById('mylink').href="./pages_web/hapus.php?del="+value+"&data="+jenis;
                  }
              </script>
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
                          </div>
                          <div class="modal-body">
                              Anda yakin ingin menghapus data ini ?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <a id="mylink" href=""><button type="button" class="btn btn-primary">Delete Data</button></a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </section>