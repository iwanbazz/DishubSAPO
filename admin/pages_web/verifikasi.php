        <?php
          if(!empty($_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success'])){
            echo "<div class='alert alert-danger' role='alert'>
                  Data telah dihapus
                  <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button>
                  </div>";
            unset($_SESSION['039ff002021b487a6725273d02bbf8cf-trayek-notif-success']);
          }
          
          if(isset($_GET['ps'])&&$_GET['ps']=='true2')
    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button></div>";
elseif(isset($_GET['ps'])&&$_GET['ps']=='true1')
    echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button></div>";
elseif(isset($_GET['ps'])&&$_GET['ps']=='true3')
    echo "<div class='alert alert-warning' role='alert'>Kategori sudah ada. <button type='button' class='close' data-dismiss='alert'>
                        x
                    </button></div>";
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
                  <h3 class="box-title">Daftar Verifikasi</h3>
                </div><!-- /.box-header -->
                <a href="?page=add_verifikasi" button type="button" data-toggle="modal" class="btn btn-info"> Tambah</a>
                <div class="box-body">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:10%">No</th>
                        <th>No Uji</th>
                        <th>No Kendaraan</th>
                        <th style="width:10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                        $setResult=mysqli_query($con,"select * from tbl_verifikasi order by id desc");
                        while ($rowSet=mysqli_fetch_array($setResult,MYSQLI_ASSOC)) {
                          echo "
                            <tr>
                              <td>".$no++."</td>
                              <td>".$rowSet['no_uji']."</td>
                              <td>".$rowSet['no_kendaraan']."</td>
                              <td style='text-align:center'>
                                <a href='?page=add_verifikasi&id=".$rowSet['id']."'><span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-default btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='fa fa-pencil'></span></button></span></a>
                                <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel(".$rowSet['id'].",&#39;verifikasi&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button></span>
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