<section id="content">
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header" style="margin-bottom:10px;">
                <form class="login-form" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-icon">
                                    <i class="icon fa fa-search"></i>
                                    <input type="text" class="form-control" name="nomor" placeholder="Masukan nomor polisi/STNK..." autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input class="btn btn-info log-btn" name="cari_data" style="padding-top:12px;padding-bottom:12px;" type="submit" value="Cari">
                                <a href="./?page=data_trayek" class="btn btn-danger log-btn" style="padding-top:12px;padding-bottom:12px;">Semua</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-height:500px;overflow-y: auto;">
                <table id="example1" class="table table-bordered table-striped;margin-top:0px">
                    <thead>
                        <tr>
                            <th>Nomor Kendaraan</th>
                            <th>Nomor Uji KIR</th>
                            <th>Jenis Izin Trayek</th>
                            <th>Pesan dari Admin DISHUB</th>
                            <th>Bukti Bayar</th>
                            <th>Berkas Perizinan</th>
                            <th>Status</th>
                            <th>Download Izin Trayek Anda</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            if($cari=="-"){
                                $qu=mysqli_query($con,"select * from tbl_berkas where idUser='$idUser' order by id desc");
                            }else{
                                $qu=mysqli_query($con,"select * from tbl_berkas where idUser='$idUser' and (no_polisi like '%".$cari."%' or no_stnk like '%".$cari."%') order by id desc");
                            }
                            while($has=mysqli_fetch_row($qu))
                            {
                                $ket="";
                                $tglTerima="-";
                                $file="-";
                                $status="Proses";
                                $qu1=mysqli_query($con,"select * from tbl_izin where id=".$has[2]."");
                                $has1=mysqli_fetch_row($qu1);
                                if($has[3]=="1"){
                                    $ket="Baru";
                                }else{
                                    $ket="Perpanjang";
                                }
                                if($has[8]=="0000-00-00"){
                                    $tglTerima="-";
                                }else{
                                    $tglTerima=$has[8];
                                }
                                if($has[6]==""){
                                    $file="<a href='../upload_berkas/?page=upload_berkas&idBerkas=".$has[0]."'>upload file</a>";
                                }else{
                                    $file="<a href='../berkas_user/".$has[0]."/".$has[6]."' download='".$has['6']."'>download file</a>";
                                }
                                
                                if($has[11]==""){
                                    $bayar="<a href='../upload_pembayaran/?page=upload_pembayaran&idBerkas=".$has[0]."'>upload file</a>";
                                }else{
                                    $bayar="<a href='../berkas_pembayaran/".$has[0]."/".$has[11]."' download='".$has['11']."'>download file</a>";
                                }
                                
                                if($has[12]==""){
                                    $hasil="Sedang Dalam Proses";
                                }else{
                                    $hasil="<a href='../admin/hasil/".$has[12]."' download='".$has['12']."'>download file</a>";
                                }
                                
                                if($has[9]=="0"){
                                    $status="Proses";
                                }elseif($has[9]=="1"){
                                    $status="Lakukan Pembayaran";
                                    
                                }
                                elseif($has[9]=="2"){
                                    $status="Sedang Di Proses";
                                }
                                else{
                                  $status="Selesai";  
                                }
                                echo "
                                <tr>
                                    <td>$has[4]</td>
                                    <td>$has[5]</td>
                                    <td>$has1[1]</td>
                                    <td>$has[10]</td>
                                    <td>".$bayar."</td>
                                    <td>".$file."</td>
                                    <td>".$status."</td>
                                    <td>".$hasil."</td>
                                ";
                            }
                       ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
</section>
    <!-- /.col -->