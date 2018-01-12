		<?php
			if(isset($_POST['save']))
			{
			    $getPass=md5(strtolower($password));
			    $setNama=ucwords($full_name);
			    $lowPass=strtolower($password);
			    $getKelamin=$kategori;
			    if(mysqli_query($con,"update tbl_user set username='$username', pass='$getPass',lupass='$lowPass',nama='$full_name' where id='$idUser'")){
			    	echo "
				    <script>
				    location.assign('?page=edit_profile&ps=true3');
				    </script>
				    ";
			    }
			}
			/*pesan berhasil update*/
			if(isset($_GET['ps'])&&$_GET['ps']=='true1'){
			    echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";
			}
			else if(isset($_GET['ps'])&&$_GET['ps']=='true3'){
			    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";
			}
			$data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_admin where id='$idUser'"));
			$cutNama=explode(" ", $data[4]);
		?>

		<section class="content-header">
          <h1>
            Profile
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>
		<section class="content">
			<div class="box box-primary">
				<div class="box-body">
					<form method="post">
						<!-- text input -->
		                <div class="form-group">
		                  	<label>Nama</label>
		                  	<div class="row">
			                	<div class="col-lg-12">
			                		<input type="text" class="form-control" placeholder="Nama" name="full_name" value="<?php echo $data[1]; ?>"/>
			                	</div>
		                	</div>
		                </div>
		                <div class="form-group">
		                  	<label for="exampleInputEmail1">Username</label>
		                  	<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data[2]; ?>">
		                </div>
		                <div class="form-group">
	                      	<label for="exampleInputPassword1">Password</label>
	                      	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo $data[4]; ?>">
	                    </div>
	                    <div class="box-footer">
		                   	<button type="submit" class="btn btn-primary" name="save">Submit</button>
		                </div>
		            </form>
	        	</div>
        	</div>
		</section>