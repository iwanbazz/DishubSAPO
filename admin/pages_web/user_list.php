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
              if(mysqli_query($con,"update tbl_berkas set acc='2' where id='".$kodeUser."'")){
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
                        <th>Izin Trayek</th>
                        <th>Terkait</th>
                        <th>Alamat</th>
                        <th>Badan Usaha</th>
                        <th>No.Telp./HP</th>
                        <th>Lokasi Usaha</th>
                        <th>Pembayaran</th>
                        <th>File</th>
                        <th style="min-width:100px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $setResult=mysqli_query($con,"select * from tbl_berkas order by id desc");
                        while ($rowSet=mysqli_fetch_array($setResult,MYSQLI_ASSOC)) {
                            $setResult1=mysqli_query($con,"select * from tbl_user where id='".$rowSet['idUser']."' order by id desc");
                            $rowSet1=mysqli_fetch_array($setResult1,MYSQLI_ASSOC);
                            $setResult2=mysqli_query($con,"select * from tbl_izin where id='".$rowSet['izin']."' order by id desc");
                            $rowSet2=mysqli_fetch_array($setResult2,MYSQLI_ASSOC);
                          if($rowSet['terkait']==1){
                            $izin="Baru";
                          }else{
                            $izin="Perpanjang";
                          }
                          if($rowSet['file']==""){
                            $urlFile="Belum diUpload";
                          }else{
                            $urlFile="<a href='../berkas_user/".$rowSet['id']."/".$rowSet['file']."' download='".$rowSet['file']."'>Download File</a>";
                          }
                          if($rowSet['pembayaran']==""){
                            $urlBayar="Belum diUpload";
                          }else{
                            $urlBayar="<a href='../berkas_bukti/".$rowSet['id']."/".$rowSet['pembayaran']."' download='".$rowSet['pembayaran']."'>Download Bukti</a>";
                          }
                          if($rowSet['acc']==0){
                            echo "
                              <tr class='active'>
                                <td>".$rowSet1['nama']."</td>
                                <td>".$izin."</td>
                                <td>".$rowSet2['nama']."</td>
                                <td>".$rowSet1['alamat']."</td>
                                <td>".$rowSet1['badan_usaha']."</td>
                                <td>".$rowSet1['phone']."</td>
                                <td>".$rowSet1['lokasi_usaha']."</td>
                                <td>".$urlBayar."</td>
                                <td>".$urlFile."</td>
                                <td style='text-align:center'>
                                  <a href='?page=data_user&kode_user=".$rowSet['id']."'><span data-placement='top' data-toggle='tooltip' title='View'><button class='btn btn-default btn-xs' data-title='View' data-toggle='modal' data-target='#edit' ><span class='fa fa-eye'></span></button></span></a>
                                  <a href='?page=add_pesan&kode_user=".$rowSet['id']."'><span data-placement='top' data-toggle='tooltip' title='Bayar'><button class='btn btn-default btn-xs' data-title='Bayar' data-toggle='modal' data-target='#edit' ><span class='fa fa-pencil'></span></button></span></a>
                                  <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel(".$rowSet['id'].",&#39;user_list&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button><span>
                                </td>
                            </tr>
                            ";
                          }elseif($rowSet['acc']==1){
                            echo "
                              <tr>
                                <td>".$rowSet1['nama']."</td>
                                <td>".$izin."</td>
                                <td>".$rowSet2['nama']."</td>
                                <td>".$rowSet1['alamat']."</td>
                                <td>".$rowSet1['badan_usaha']."</td>
                                <td>".$rowSet1['phone']."</td>
                                <td>".$rowSet1['lokasi_usaha']."</td>
                                <td>".$urlBayar."</td>
                                <td>".$urlFile."</td>
                                <td style='text-align:center'>
                                  <a href='?page=data_user&kode_user=".$rowSet['id']."'><span data-placement='top' data-toggle='tooltip' title='View'><button class='btn btn-default btn-xs' data-title='View' data-toggle='modal' data-target='#edit' ><span class='fa fa-eye'></span></button></span></a>
                                  <a href='index.php?page=user&kode_user=".$rowSet['id']."&action=acc'><span data-placement='top' data-toggle='tooltip' title='Acc'><button class='btn btn-success btn-xs' data-title='Acc' data-toggle='modal' data-target='#edit' ><span class='fa fa-check'></span></button></span></a>
                                  <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel(".$rowSet['id'].",&#39;user_list&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button></span>
                                </td>
                              </tr>
                            ";
                          }
                          elseif($rowSet['acc']==2){
                            echo "
                              <tr>
                                <td>".$rowSet1['nama']."</td>
                                <td>".$izin."</td>
                                <td>".$rowSet2['nama']."</td>
                                <td>".$rowSet1['alamat']."</td>
                                <td>".$rowSet1['badan_usaha']."</td>
                                <td>".$rowSet1['phone']."</td>
                                <td>".$rowSet1['lokasi_usaha']."</td>
                                <td>".$urlBayar."</td>
                                <td>".$urlFile."</td>
                                <td style='text-align:center'>
                                  <a href='?page=data_user&kode_user=".$rowSet['id']."'><span data-placement='top' data-toggle='tooltip' title='View'><button class='btn btn-default btn-xs' data-title='View' data-toggle='modal' data-target='#edit' ><span class='fa fa-eye'></span></button></span></a>
                                  <a href='?page=finish&kode_user=".$rowSet['id']."'><span data-placement='top' data-toggle='tooltip' title='Finish'><button class='btn btn-default btn-xs' data-title='Finish' data-toggle='modal' data-target='#edit' ><span class='fa fa-pencil'></span></button></span></a>
                                  <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel(".$rowSet['id'].",&#39;user_list&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button></span>
                                </td>
                              </tr>
                            ";
                          }
                         else{
                            echo "
                              <tr>
                                <td>".$rowSet1['nama']."</td>
                                <td>".$izin."</td>
                                <td>".$rowSet2['nama']."</td>
                                <td>".$rowSet1['alamat']."</td>
                                <td>".$rowSet1['badan_usaha']."</td>
                                <td>".$rowSet1['phone']."</td>
                                <td>".$rowSet1['lokasi_usaha']."</td>
                                <td>".$urlBayar."</td>
                                <td>".$urlFile."</td>
                                <td style='text-align:center'>
                                  <a href='?page=data_user&kode_user=".$rowSet['id']."'><span data-placement='top' data-toggle='tooltip' title='View'><button class='btn btn-default btn-xs' data-title='View' data-toggle='modal' data-target='#edit' ><span class='fa fa-eye'></span></button></span></a>
                    
                                  <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel(".$rowSet['id'].",&#39;user_list&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button></span>
                                </td>
                              </tr>
                            ";
                          }
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