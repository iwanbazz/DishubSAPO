		<?php
			if(isset($_POST['reg']))
			{
		    	if(mysqli_query($con,"insert into tbl_matakuliah values('','$idUser','$full_name','')")){
			    	echo "
				    <script>
				    location.assign('?page=add_matakuliah&ps=true1');
				    </script>
				    ";
			    }
			}elseif(isset($_POST['update']))
			{
			    if(mysqli_query($con,"update tbl_matakuliah set nama='$full_name' where id='".$_GET['id']."'")){
			    	echo "
				    <script>
				    location.assign('?page=add_matakuliah&ps=true3');
				    </script>
				    ";
			    }
			}
			/*pesan berhasil update*/
			if(isset($_GET['ps'])&&$_GET['ps']=='true1')
			    echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";
			elseif(isset($_GET['ps'])&&$_GET['ps']=='true3')
			    echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";

			if(isset($_GET['id'])){
				$data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_matakuliah where id='".$_GET['id']."'"));
			}
		?>

		<section class="content-header">
          <h1>
            Tambah Matakuliah
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tambah Matakuliah</li>
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
		                  	<label>Nama Matakuliah</label>
		                  	<div class="row">
			                	<div class="col-lg-12">
			                		<input type="text" class="form-control" placeholder="Nama" name="full_name" value="<?php echo isset($data[2])?$data[2]:''; ?>"/>
			                	</div>
		                	</div>
		                </div>
						<?php
							}else{
						?>
		                <!-- text input -->
		                <div class="form-group">
		                  	<label>Nama Matakuliah</label>
		                  	<div class="row">
			                	<div class="col-lg-12">
			                		<input type="text" class="form-control" placeholder="Nama" name="full_name" value="<?php echo isset($data[2])?$data[2]:''; ?>"/>
			                	</div>
		                	</div>
		                </div>
		                <?php
		                	}
		                ?>
	                    <div class="box-footer">
		                   	<button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['id'])?'update':'reg'; ?>">Submit</button>
		                </div>
		            </form>
	        	</div>
        	</div>
		</section>