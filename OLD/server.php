<?php
	extract($_POST);
	include 'koneksi.php';
	$key = "039ff002021b487a6725273d02bbf8cf-trayek-sever";
	$response = array();
	if(isset($_POST['function'])){
		$function = $_POST['function'];
    	$userkey = $_POST['key'];
		if($userkey==$key){
			if($function=="login"){
				$nick=strtolower($_POST['email']);
				$pass=md5(strtolower($_POST['password']));
				if(mysqli_query($con,"select * from tbl_user where email='$nick' and pass='$pass'")){
					$result=mysqli_query($con,"select * from tbl_user where email='$nick' ");
					$row=mysqli_fetch_array($result);

					$response["success"] = 1;
					$response["var_id"] = $row['id'];

					$result = array();
					$result['hasil'] = $response;
					print(json_encode($result));
				}else{
					$response["success"] = 0;
				
					$result = array();
					$result['hasil'] = $response;
					print(json_encode($result));
				}

			}else if($function=="register"){
				$lupass=strtolower($_POST['password']);
				$pass=md5($lupass);
				$nama=ucwords($_POST['nama']);
				$email=$_POST['email'];
				if(mysqli_num_rows(mysqli_query($con,"select * from tbl_user where email='$email'"))!=0){
					$response["success"] = 0;
				
					$result = array();
					$result['hasil'] = $response;
					print(json_encode($result));
				}else{
					if(mysqli_query($con,"insert into tbl_user(nama,email,pass,lupass) values('$nama','$email','$pass','$lupass')")){
						$result=mysqli_query($con,"select * from tbl_user where email='$email'");
						$row=mysqli_fetch_array($result);

						$response["success"] = 1;
						$response["var_id"] = $row['id'];

						$result = array();
						$result['hasil'] = $response;
						print(json_encode($result));
					}
				}
			}else if($function=="iklan"){
				$result = mysqli_query($con,"select * from tbl_slide order by id desc");
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

					if($row['url']!="-"){
	                    $urlFile=$row['url'];
	                  }else{
	                    $urlFile="-";
	                  }

					$listIsi = array();

					$listIsi['var_id'] = $row['id'];
					$listIsi['var_link'] = $urlFile;
					$listIsi['var_deskripsi'] = $row['deskripsi'];
					$listIsi['var_image'] = $row['img'];

					$response[] = $listIsi;
				}
				mysqli_free_result($result);
				
				$result = array();
				$result['hasil'] = $response;
				print(json_encode($result));
			}else if($function=="izin"){
				$idUser=$_POST['idUser'];
				$result = mysqli_query($con,"select * from tbl_berkas where idUser='$idUser' order by id desc");
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

					$res=mysqli_query($con,"select * from tbl_izin where id='".$row['izin']."' order by id desc");
					$row2=mysqli_fetch_array($res);
					$status="Proses";
					if($row['acc']=="1"){
                        $ket="Diterima";
                    }else{
                        $ket="Proses";
                    }

					$listIsi = array();

					$listIsi['var_tanggal'] = $row['tanggal_masuk'];
					$listIsi['var_no_polisi'] = $row['no_polisi'];
					$listIsi['var_keterangan'] = $row2['nama'];
					$listIsi['var_status'] = $ket;

					$response[] = $listIsi;
				}
				mysqli_free_result($result);
				
				$result = array();
				$result['hasil'] = $response;
				print(json_encode($result));
			}else if($function=="jadwal"){
				$idUser=$_POST['idUser'];
				$tanggal=$_POST['tanggal'];
				if(mysqli_query($con,"insert into tbl_pertemuan(idUser,tanggal) values('$idUser','$tanggal')")){
					$response["success"] = 1;

					$result = array();
					$result['hasil'] = $response;
					print(json_encode($result));
				}
			}else if($function=="inbox"){
				$idUser=$_POST['idUser'];
				$result = mysqli_query($con,"select * from tbl_inbox where idUser='$idUser' order by id desc");
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

					$listIsi = array();

					$listIsi['var_tanggal'] = $row['tanggal'];
					$listIsi['var_judu'] = $row['judul'];
					$listIsi['var_isi'] = $row['pesan'];
					$listIsi['var_status'] = $row['baca'];

					$response[] = $listIsi;
				}
				mysqli_free_result($result);
				
				$result = array();
				$result['hasil'] = $response;
				print(json_encode($result));
			}
		}
	}else{
		// no function
		$response["success"] = 0;
		$response["message"] = "Function missing";
		print(json_encode($response));
	}
?>