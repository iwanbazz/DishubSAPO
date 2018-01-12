<?php
session_start();
include './koneksi.php';
if(!empty($_SESSION['c58c1d179d60e7874f8c856f833eedd3-login'])){
    $idUser=$_SESSION['c58c1d179d60e7874f8c856f833eedd3-user'];
	$user = mysqli_fetch_array(mysqli_query($con,"select * from tbl_user where id='$idUser'"));
}
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Sistem Aplikasi Perizinan Online (SAPO)</title>
	
	<!-- Styles -->
	<link rel='stylesheet' href='assets/css/bootstrap.min.css'>
	<link rel='stylesheet' href='assets/css/animate.min.css'>
	<link rel='stylesheet' href="assets/css/font-awesome.min.css"/>
	<link rel='stylesheet' href="assets/css/style.css"/>
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
			
	<!-- Favicon -->
	<link rel="shortcut icon" href="#">

	<style type="text/css">
		#circle {
		  padding-top: 21px;
	      width: 100px;
	      height: 100px;
	      -webkit-border-radius: 50%;
	      -moz-border-radius: 50%;
	      border-radius: 50%;
	      background: red;
	      text-align:center; 
	      margin:0 auto;
	    }
	</style>
</head>
<body>
<!-- Begin Hero Bg -->
<div id="parallax">
</div>
<!-- End Hero Bg
	================================================== -->
<!-- Start Header
	================================================== -->
<header id="header" class="navbar navbar-inverse navbar-fixed-top" role="banner">
<div class="container">
	<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<!-- Your Logo -->
		<a href="#hero" class="navbar-brand">Sistem Aplikasi Perizinan Online <span class="lighter">(SAPO)</span></a>
	</div>
	<!-- Start Navigation -->
	<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	<ul class="nav navbar-nav">
		<li>
		<a href="#hero">Home</a>
		</li>
		<li>
		<a href="#izin">Izin Trayek</a>
		</li>
		<li>
		<a href="#slider">Info</a>
		</li>
		<li>
		<a href="#faq">FAQ</a>
		</li>
		<li>
		<a href="#contactarea">Kontak</a>
		</li>
		<?php
			if(!empty($_SESSION['c58c1d179d60e7874f8c856f833eedd3-login'])){
				echo '
		<li>
			<a href="./profile"><i class="fa fa-user" aria-hidden="true"></i> '.$user['nama'].'</a>
		</li>';
			}
		?>
	</ul>
	</nav>
</div>
</header>

<!-- Intro
	================================================== -->
<section id="hero" class="section">
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="herotext">
				<h1 class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.1s">Sistem Aplikasi Perizinan Online <span class="lighter">(SAPO)</span></h1>
				<p class="lead wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5s">
					Dinas Perhubungan Kota Pekanbaru
				</p>
				<?php
				if(empty($_SESSION['c58c1d179d60e7874f8c856f833eedd3-login'])){
				    echo'
				<p>
					<a href="./page/?page=login" class="btn btn-default btn-lg wow fadeInLeft" role="button"> MASUK </a> &nbsp; <a href="./page/?page=register" class="btn btn-default btn-lg wow fadeInRight" role="button">DAFTAR</a>
				</p>';
				}
				
				?>
			</div>
		</div>
		<div class="col-md-7" style="text-align: right; padding-top:75px">
			<img src="./img/logo_dishub.png">
		</div>
	</div>
</div>
</section>
<!-- About
	================================================== -->
<section id="izin" class="parallax section" style="background-image: url(http://themepush.com/demo/runcharity/assets/img/1.jpg);">
<div class="wrapsection">
	<div class="parallax-overlay" style="background-color: #01b0d1;opacity:0.9;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Title -->
				<div class="maintitle">
					<h3 class="section-title"><strong>IZIN <span class="lighter">TRAYEK</span></strong></h3>
					<p class="lead">
						Daftarkan segera kendaraan Umum Anda untuk mendapatkan Izin trayek.
					</p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="service-box wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">
					<div id="circle" style="background:#09be00">
						<img src="./icon/taxi.png" alt="" style="filter: invert(190%);">
					</div>
					<h3 style="margin-top:10px;">Taxi</h3>
					<div class="text-left">
						<p class="text-center">
							<a class="btn btn-info btn-md wow fadeInLeft" href="./register_trayek/?type=taxi"><b>Daftar</b></a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="service-box wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
					<div id="circle" style="background:#006bc2; padding-left:10px;padding-right:10px;padding-top:30px">
						<img src="./icon/angkot.png" alt="" style="filter: invert(100%);">
					</div>
					<h3 style="margin-top:10px;">Oplet</h3>
					<a class="btn btn-info btn-md wow fadeInLeft" href="./register_trayek/?type=oplet"><b>Daftar</b></a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="service-box wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.2s">
					<div id="circle" style="background:#ff9600; padding-top:28px">
						<img src="./icon/bus.png" alt="" style="filter: invert(100%);">
					</div>
					<h3 style="margin-top:10px;">Bus Kota</h3>
					<a class="btn btn-info btn-md wow fadeInLeft" href="./register_trayek/?type=bus_kota"><b>Daftar</b></a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="service-box wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.4s">
					<div id="circle" style="background:#b4b4b4; padding-top:23px; padding-left:5px;padding-right:5px;">
						<img src="./icon/mobil.png" alt="" style="filter: invert(100%);">
					</div>
					<h3 style="margin-top:10px;">Angkutan Karyawan</h3>
					<a class="btn btn-info btn-md wow fadeInLeft" href="./register_trayek/?type=keryawan"><b>Daftar</b></a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="service-box wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.4s">
					<div id="circle" style="background:#ffc400; padding-top:25px;padding-left:10px;padding-right:10px;">
						<img src="./icon/truck.png" alt="" style="filter: invert(100%);">
					</div>
					<h3 style="margin-top:10px;">Angkutan Barang</h3>
					<a class="btn btn-info btn-md wow fadeInLeft" href="./register_trayek/?type=barang"><b>Daftar</b></a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php
$num=0;
$num2=0;
$response = array();
$result=mysqli_query($con,"select * from tbl_slide order by id desc");

if(mysqli_num_rows($result)!=0){
echo'
<!-- Text Carousel
	================================================== -->
<section id="slider" class="parallax section" style="background-image: url(./img/background_info.png);">
<div class="wrapsection">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="Carousel" class="carousel slide">
					<div class="carousel-inner">';
						    while($rowSlide=mysqli_fetch_array($result)){
						        if($num==0){
						            echo'
            						<div class="item active">
            							<blockquote>
            								<p class="lead">
            									'.$rowSlide['deskripsi'].'
            								</p>
            								<small><a href="'.$rowSlide['url'].'">Link</a></small>
            							</blockquote>
            						</div>';
						        }else{
						            echo'
            						<div class="item">
            							<blockquote>
            								<p class="lead">
            									'.$rowSlide['deskripsi'].'
            								</p>
            								<small><a href="'.$rowSlide['url'].'">Link</a></small>
            							</blockquote>
            						</div>';
						        }
						        $num++;
						    }
					    echo'
					    </div>
					<a class="left carousel-control" href="#Carousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#Carousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>';
}
?>
<!-- FAQ
	================================================== -->
<section id="faq" class="section">
<div class="wrapsection">
	<div class="container">
		<div class="row">
			<div class="col-md-12 sol-sm-12">
				<div class="maintitle">
					<h3 class="section-title">KONDISI <span class="wow bounceInRight">PARTISIPASI</span></h3>
					<p class="lead">
						Mungkin dibawah ini ada masalah/pertanyaan yang Anda cari.
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-12">
				<div class="faq-block wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0s">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								Pertanyaan 1? </a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								Pertanyaan 2? </a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
								Pertanyaan 3? </a>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="faq-block wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.1s">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
								Pertanyaan 4? </a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
								Pertanyaan 5? </a>
								</h4>
							</div>
							<div id="collapseFive" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
								Pertanyaan 6? </a>
								</h4>
							</div>
							<div id="collapseSix" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="faq-block wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
								Pertanyaan 7? </a>
								</h4>
							</div>
							<div id="collapseSeven" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
								Pertanyaan 8? </a>
								</h4>
							</div>
							<div id="collapseEight" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
								Pertanyaan 9? </a>
								</h4>
							</div>
							<div id="collapseNine" class="panel-collapse collapse">
								<div class="panel-body">
									 Jawaban.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Contact
	================================================== -->
<section id="contactarea" class="parallax section" style="background-image: url(http://themepush.com/demo/runcharity/assets/img/map.png);">
<div class="wrapsection">
	<div class="parallax-overlay" style="background-color: #1cbb9b;opacity:0.95;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="maintitle">
					<h3 class="section-title">BERHUBUNGAN</h3>
					<p class="lead">
						Jika Anda memiliki pertanyaan kepada kami, jangan ragu untuk mengirimkan pesan Anda kepada kami. Ini adalah bentuk kontak kerja yang sesungguhnya.
					</p>
				</div>
				<form id="contact" name="contact" method="post" class="text-left">
					<fieldset>
						<div class="row">
							<div class="col-md-4 wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">
								<label for="name">Nama<span class="required">*</span></label>
								<input type="text" name="name" id="name" size="30" value="" required/>
							</div>
							<div class="col-md-4 wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="2s">
								<label for="email">Email<span class="required">*</span></label>
								<input type="text" name="email" id="email" size="30" value="" required/>
							</div>
							<div class="col-md-4 wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="2s">
								<label for="phone">No.Telp/Hp</label>
								<input type="text" name="phone" id="phone" size="30" value=""/>
							</div>
						</div>
						<div class="wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="1.5" style="margin-top:15px;">
							<label for="message">Pesan<span class="required">*</span></label>
							<textarea name="message" id="message" required></textarea>
						</div>
						<div class="wow fadeIn animated" data-wow-delay="0.3" data-wow-duration="1.5s">
							<input id="submit" type="submit" name="submit" value="Kirim"/>
						</div>
					</fieldset>
				</form>
				<div id="success">		
					<p class="contactalert">
						Your message was sent succssfully! I will be in touch as soon as I can.
					</p>			
				</div>
				<div id="error">			
					<p class="contactalert">
						 Something went wrong, try refreshing and submitting the form again.
					</p>			
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Credits 
=============================================== -->
<section id="credits" class="text-center">
	<span class="social wow zoomIn">
	<a href="#"><i class="fa fa-facebook"></i></a>
	<a href="#"><i class="fa fa-twitter"></i></a>
	<a href="#"><i class="fa fa-skype"></i></a>
	<a href="#"><i class="fa fa-linkedin"></i></a>
	<a href="#"><i class="fa fa-pinterest"></i></a>
	<a href="#"><i class="fa fa-google-plus"></i></a>
	</span><br/>
	Copyright &copy; <a href="#">SAPO</a> 
</section>
<!-- Bootstrap core JavaScript
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.localScroll.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/validate.js"></script>
<script src="assets/js/common.js"></script>
</body>
</html>