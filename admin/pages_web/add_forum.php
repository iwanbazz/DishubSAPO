		<?php
			if(isset($_POST['reg']))
			{
		    	if(mysqli_query($con,"insert into tbl_forum values('','$idUser','$full_name','$kategori','#".$idUser.",')")){
			    	echo "
				    <script>
				    location.assign('?page=add_forum&ps=true1');
				    </script>
				    ";
			    }
			}elseif(isset($_POST['update']))
			{
			    if(mysqli_query($con,"update tbl_forum set nama='$full_name', idMatakuliah='$kategori' where id='".$_GET['id']."'")){
			    	echo "
				    <script>
				    location.assign('?page=add_forum&ps=true3');
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
				$data=mysqli_fetch_row(mysqli_query($con,"select * from tbl_forum where id='".$_GET['id']."'"));
				$cutNama=explode(" ", $data[4]);
			}
		?>

		<section class="content-header">
          <h1>
            Tambah Forum
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tambah Forum</li>
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
		                  	<label>Nama Forum</label>
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
		                  	<label>Nama Forum</label>
		                  	<div class="row">
			                	<div class="col-lg-12">
			                		<input type="text" class="form-control" placeholder="Nama" name="full_name" value=""/>
			                	</div>
		                	</div>
		                </div>
		                <?php
		                	}
		                ?>
		                <div class="form-group">
		                  	<label>Matakuliah</label>
		                  	<select name="kategori" class="form-control">
		                  		<?php 
		                  			if(isset($_GET['id'])){
		                  		?>
		                  			<option value="" disabled>Pilih Matakuliah</option>
	                                <?php
	                                	$getResult=mysqli_query($con,"select * from tbl_forum where idMatakuliah='".$data[3]."'");
	                                	$setRow = mysqli_fetch_array($getResult);
	                                    $qu=mysqli_query($con,"select * from tbl_matakuliah order by id asc");
	                                    while($has=mysqli_fetch_row($qu))
	                                    {
	                                    	if($setRow['idMatakuliah']==$has[0]){
	                                    		echo "<option value=".$has[0]." selected>".$has[2]."</option>";
	                                    	}else{
	                                    		echo "<option value=".$has[0].">".$has[2]."</option>";
	                                    	}
	                                    }
	                                ?>
		                  		<?php
		                  			}else{
		                  		?>
	                                <option value="" disabled selected>Pilih Matakuliah</option>
	                                <?php
	                                    $qu=mysqli_query($con,"select * from tbl_matakuliah where idUser='$idUser' order by id asc");
	                                    while($has=mysqli_fetch_row($qu))
	                                    {
	                                        echo "<option value=".$has[0].">".$has[2]."</option>";
	                                    }
	                                ?>
                                <?php
                                	}
                                ?>
                            </select>
		                </div>
	                    <div class="box-footer">
		                   	<button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['id'])?'update':'reg'; ?>">Submit</button>
		                </div>
		            </form>
	        	</div>
        	</div>
		</section>