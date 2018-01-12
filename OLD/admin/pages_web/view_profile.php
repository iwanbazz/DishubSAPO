<?php
  if(isset($_GET['kode_user'])){
    $kodeUser=$_GET['kode_user'];
    $getBerkas= mysqli_fetch_array(mysqli_query($con,"select * from tbl_berkas where id='$kodeUser'"));
    $getUser = mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where id='".$getBerkas['idUser']."'"));
  }
?>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data User || <b><?php echo $getUser['nama']?></b></h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h3><?php echo $getUser['nama'];?></h3>
                    <h5 style="margin:0px"><?php if($getBerkas['acc']==0){echo "<span style='color:orange'>*Belum diTerima</span>";}else{echo "<span style='color:green'>*Sudah diterima</span>";}?></h5>
                    <h5><?php echo "<b>No.Telp./HP</b> : ".$getUser['phone']."<br><b>Alamat</b> &emsp;&emsp;: ".$getUser['alamat'];?> <span class="mailbox-read-time pull-right"><?php echo $getBerkas['tanggal_masuk'];?></span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-read-message">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="width:30%">
                            Judul
                          </th>
                          <th>
                            Keterangan
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            Izin Trayek
                          </td>
                          <td>
                              <?php 
                                if($getBerkas['terkait']==1){
                                  $izin="Baru";
                                }else{
                                  $izin="Perpanjang";
                                }
                                echo $izin;
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Jabatan
                          </td>
                          <td>
                              <?php 
                                echo $getUser['jabatan'];
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Badan Usaha
                          </td>
                          <td>
                              <?php 
                                echo $getUser['badan_usaha'];
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Lokasi Usaha
                          </td>
                          <td>
                              <?php 
                                echo $getUser['lokasi_usaha'];
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Kelurahan
                          </td>
                          <td>
                              <?php 
                                echo $getUser['kelurahan'];
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Kecamatan
                          </td>
                          <td>
                              <?php 
                                echo $getUser['kecamatan'];
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Status Tanah
                          </td>
                          <td>
                              <?php 
                                echo $getUser['status_tanah'];
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Luas
                          </td>
                          <td>
                              <?php 
                                echo $getUser['luas'];
                              ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            File/Berkas & Bukti Pembayaran
                          </td>
                          <td>
                              <?php 
                              if($getBerkas['file']==""){
                                $urlFile="Belum diUpload";
                              }else{
                                $urlFile="<a href='../berkas_user/".$getBerkas['id']."/".$getBerkas['file']."' download='".$getBerkas['file']."'>Download File</a>";
                              }
                              if($getBerkas['pembayaran']==""){
                                $urlBukti="Belum diUpload";
                              }else{
                                $urlBukti="<a href='../berkas_bukti/".$getBerkas['id']."/".$getBerkas['pembayaran']."' download='".$getBerkas['pembayaran']."'>Download Bukti</a>";
                              }
                                echo $urlFile." & ".$urlBukti;
                              ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->