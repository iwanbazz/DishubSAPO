		<?php
			if(isset($_POST['reg']))
			{
				$getPass=md5(strtolower($password));
			    $setNama=ucwords($depan);
			    $lowPass=strtolower($password);
			    $getKelamin=$kategori;

				$ryRandom = rand(1,5);
			    $pathAwal = "./default/avatar".$ryRandom.".png";
				$pathTujuan = "./image/avatar".$ryRandom.".png";
				copy($pathAwal, $pathTujuan);   
			    if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where username='$nip'||nip_nim='$nip'"))){
			    	echo "
				    <script>
				    location.assign('?page=add_dosen&ps=true2');
				    </script>
				    ";
			    }else{
			    	if(mysqli_query($con,"insert into tbl_user values('','$nip','$getPass','$lowPass','$setNama','$nip','$email','$phone','','','2','$getKelamin')")){
				    	$result=mysqli_query($con,"select * from tbl_user where username='$nip'");
				    	$roq=mysqli_fetch_array($result);
				    	$fileAwal = $pathTujuan;
						$fileBaru = "./image/".$roq['id'].".png";
						if(rename($pathTujuan, $fileBaru)){
							if(mysqli_query($con,"update tbl_user set photo='".$roq['id'].".png' where id='".$roq['id']."'")){
								echo "
							    <script>
							    location.assign('?page=add_dosen&ps=true1');
							    </script>
							    ";
							}
						}
				    }
			    }
			}elseif(isset($_POST['update']))
			{
				if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where username='$nip'||nip_nim='$nip'"))){
			    	echo "
				    <script>
				    location.assign('?page=add_dosen&ps=true2');
				    </script>
				    ";
			    }else{
					$getPass=md5(strtolower($password));
				    $setNama=ucwords($depan." ".$belakang);
				    $lowPass=strtolower($password);
				    $getKelamin=$kategori;
				    if(mysqli_query($con,"update tbl_user set username='$nip',phone='$phone', pass='$getPass',lupass='$lowPass',nama='$full_name',nip_nim='$nip',email='$email',jender='$getKelamin' where id='".$_GET['id']."'")){
				    	echo "
					    <script>
					    location.assign('?page=add_dosen&ps=true3');
					    </script>
					    ";
				    }
				}
			}
			/*pesan berhasil update*/
			if(isset($_GET['ps'])&&$_GET['ps']=='true2'){
			    echo "<div class='alert alert-warning' role='alert'>NIP/Dosen sudah ada, silahkan cek kembali.</div>";
			}
			else if(isset($_GET['ps'])&&$_GET['ps']=='true1'){
			    echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";
			}
			else if(isset($_GET['ps'])&&$_GET['ps']=='true3'){
			    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";
			}

			if(isset($_GET['id'])){
				$data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_user where id='".$_GET['id']."'"));
				$cutNama=explode(" ", $data[4]);
			}
		?>

		<section class="content-header">
          <h1>
            Tambah Akun Dosen
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tambah Dosen</li>
          </ol>
        </section>
		<section class="content">
			<div class="box box-primary">
				<div class="box-body">
					<form method="post">
						<?php
							if(isset($_GET['id'])){
						?>
						<!-- text input -->
		                <div class="form-group">
		                  	<label>Nama Dosen</label>
		                  	<div class="row">
			                	<div class="col-lg-12">
			                		<input type="text" class="form-control" placeholder="Nama" name="full_name" value="<?php echo isset($data[4])?$data[4]:''; ?>"/>
			                	</div>
		                	</div>
		                </div>
						<?php
							}else{
						?>
		                <!-- text input -->
		                <div class="form-group">
		                  	<label>Nama Dosen</label>
		                  	<div class="row">
			                	<div class="col-lg-6">
			                		<input type="text" class="form-control" placeholder="Nama depan" name="depan"/>
			                	</div>
			                	<div class="col-lg-6">
			                		<input type="text" class="form-control" placeholder="Nama belakang" name="belakang"/>
			                	</div>
		                	</div>
		                </div>
		                <?php
		                	}
		                ?>
		                <div class="form-group">
		                  	<label for="exampleInputEmail1">NIP</label>
		                  	<input type="number" class="form-control" placeholder="NIP" name="nip" value="<?php echo isset($data[1])?$data[1]:''; ?>">
		                </div>
		                <div class="form-group">
		                  	<label>Jenis Kelamin</label>
		                  	<select name="kategori" class="form-control">
		                  		<?php 
		                  			if(isset($_GET['id'])){
		                  		?>
		                  			<option value="" disabled>Pilih Jenis Kelamin</option>
	                                <?php
	                                	$getResult=mysqli_query($con,"select * from tbl_user where id='".$data[0]."'");
	                                	$setRow = mysqli_fetch_array($getResult);
	                                    $qu=mysqli_query($con,"select * from tbl_jender order by id asc");
	                                    while($has=mysqli_fetch_row($qu))
	                                    {
	                                    	if($setRow['jender']==$has[0]){
	                                    		echo "<option value=".$has[0]." selected>".$has[1]."</option>";
	                                    	}else{
	                                    		echo "<option value=".$has[0].">".$has[1]."</option>";
	                                    	}
	                                    }
	                                ?>
		                  		<?php
		                  			}else{
		                  		?>
	                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
	                                <?php
	                                    $qu=mysqli_query($con,"select * from tbl_jender order by id asc");
	                                    while($has=mysqli_fetch_row($qu))
	                                    {
	                                        echo "<option value=".$has[0].">".$has[1]."</option>";
	                                    }
	                                ?>
                                <?php
                                	}
                                ?>
                            </select>
		                </div>
		                <div class="form-group">
		                  	<label for="exampleInputEmail1">Email</label>
		                  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan email" name="email" value="<?php echo isset($data[6])?$data[6]:''; ?>">
		                </div>
		                <div class="form-group">
		                  	<label for="exampleInputEmail1">Phone</label>
		                  	<input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Masukan nomer telephone" name="phone" value="<?php echo isset($data[7])?$data[7]:''; ?>">
		                </div>
		                <div class="form-group">
	                      	<label for="exampleInputPassword1">Password</label>
	                      	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo isset($data[3])?$data[3]:''; ?>">
	                    </div>
	                    <div class="box-footer">
		                   	<button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['id'])?'update':'reg'; ?>">Submit</button>
		                </div>
		            </form>
	        	</div>
        	</div>
		</section>