<?php 
	include 'db.php'; 
	mysqli_query($db, "UPDATE home SET view=view+1");
	$query           = mysqli_query($db, "SELECT * FROM home");
	$queryUser       = mysqli_query($db, "SELECT * FROM user");
	$queryPortofolio = mysqli_query($db, "SELECT * FROM portofolio LIMIT 0,10");
	$data            = mysqli_fetch_array($query);
	$dataUser        = mysqli_fetch_array($queryUser);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="author" content="<?php echo $dataUser['nama'] ?>">
	<title><?php echo $data['title']; ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/<?php echo $data['favicon']; ?>">
	<!-- META SEO -->
    <meta name="keywords" content="<?php echo $data['keywords'] ?>" />
    <meta name="description" content="<?php echo $data['deskripsi'] ?>" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!-- PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/icons/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/icons/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.min.css">

    <script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery.carouFredSel-6.1.0-packed.js"></script>
	<script type="text/javascript">
		$(function() {
			var _direction = 'left';
			$('#carousel').carouFredSel({
				direction: _direction,
				responsive: true,
				circular: false,
				items: {
					width: 350,
					height: '100%',
					visible: {
						min: 2,
						max: 5
					}
				},
				scroll: {
					items: 1,
					duration: 1000,
					timeoutDuration: 500,
					pauseOnHover: 'immediate',
					onEnd: function( data ) {
						_direction = ( _direction == 'left' ) ? 'right' : 'left';
						$(this).trigger( 'configuration', [ 'direction', _direction ] );
					}
				}
			});
		});
	</script>

</head>
<body>

		<!-- Home -->
	<section id="home">
		<div id="particles-js"></div>
		<!-- Navigation -->
		<header>
			<div class="container">
				<div class="navigation">
					<div class="logo"><a href="index.php"><?php echo $data['title']; ?></a></div>
					<nav id="navigation">
						<ul>
							<li><a href="#about">About</a></li>
							<li><a href="#services">What i do?</a></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</nav>
				</div>
				<div class="clear"></div>
			</div>
		</header>

		<div class="banner">
			<center>
				<img src="assets/images/avatar.jpg">
				<p class="hm-name">Hi, I'm <?php echo $dataUser['nama']; ?></p>
				<p class="hm-about">I’M NOT ANTI SOCIAL, I JUST SHY, SO GREET ME</p>
				<div class="hm-social-media">
					<a href="<?= $dataUser['facebook']; ?>"><i class="fa fa-facebook"></i></a>
					<a href="<?= $dataUser['twitter']; ?>"><i class="fa fa-twitter"></i></a>
					<a href="<?= $dataUser['instagram']; ?>"><i class="fa fa-instagram"></i></a>
					<a href="<?= $dataUser['youtube']; ?>"><i class="ion-social-youtube"></i></a>
				</div>
			</center>
		</div>
	</section>

	<div class="clear"></div>

	<!-- 2nd Navigation -->
	<div id="navbar" class="menu-web">
		<div class="container">
			<div class="logo-web">
				<a href="#home"><?php echo $data['title']; ?></a>
			</div>
			<nav id="navigation-web">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#portofolio">Portofolio</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</div>
	</div>

	<!-- About -->
	<section id="about">
		<div class="container">
			<div class="about-content">
				<img src="assets/images/about-me-img.jpg">
			</div>
			<div class="about-content">
				<div class="section-heading">
					<h2>About</h2>
					<span><br>Let's Introduce My Self <br><br></span>
				</div>
				<p> Hello <i class="ion-happy-outline"></i>
					<br>My Name is <?php echo $dataUser['nama']; ?>, Im Student in Vocational High School 3 Metro, I like technology especially Web Design.
					<br><br>
					Do you have any question about Web Design?? Ask me via
				</p>
				<p>
					<a class="fa fa-facebook-square" href="<?= $dataUser['facebook']; ?>"></a>
					<a class="ion-social-twitter" href="<?= $dataUser['twitter']; ?>"></a>
					<a class="fa fa-instagram" href="<?= $dataUser['instagram']; ?>"></a>
					<a class="ion-social-whatsapp" href="<?= $dataUser['whatsapp']; ?>"></a>
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>

	<!-- Services -->
	<section id="services">
		<div class="container">
			<div style="text-align: center;" class="section-heading">
				<h2>Services</h2>
				<p>What we do ?</p>
			</div>
			<div class="services-content">
				<div class="services-content-item">
					<img src="assets/images/wd.png">
					<!-- <i class="ion-ios-monitor-outline"></i> -->
					<h3 class="web-heading">Web&nbsp;Design</h3>
					<p>We make Landing page, UI/UX, Material Design, Flat Design, PSD file and other about web design. you can put trust in us about it.</p>
				</div>
				<div class="services-content-item">
					<img src="assets/images/development.png">
					<!-- <i class="ion-code"></i> -->
					<h3 class="dev-heading">Development</h3>
					<p>Wanna make website like e-commerce, personal, landing page, School, Company, Megazine, Community and help maintenance about website. We are ready to serve</p>
				</div>
				<div class="services-content-item">
					<img src="assets/images/design.png">
					<!-- <i class="ion-paintbrush"></i> -->
					<h3 class="design-heading">Design&nbsp;Graphic</h3>
					<p>We can help to improve your company, we make design logo, banner, invite card, brosure, book cover, wallpaper, and other about design graphic</p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</section>

	<!-- Portofolio -->
	<section id="portofolio">
		<div class="container">
			<div style="text-align: center;" class="section-heading">
				<h2>Portofolio</h2>
				<p>Our Portofolio</p>
			</div>
		</div>
		<div id="wrapper">
			<div id="carousel">
				<?php 
					while ($dataPortofolio = mysqli_fetch_array($queryPortofolio)) {
				 ?>
				<!-- <img src="login/gambar/<?php echo $dataPortofolio['gambar'] ?>" alt="" width="350" height="350" /> -->
				<div class="portofolio-home" style="
					width: 350;
					height: 350;
					background-image: url('login/gambar/<?php echo $dataPortofolio['gambar'] ?>');
					background-repeat: no-repeat;
					background-position: center;
					float: left;
					background-size: auto 100%;
				"></div>
				<?php } ?>
			</div>
			<center>
			<a href="portofolio"><button class="view-more"> View More <i class="ion-arrow-right-c"></i></button></a>	
		</center>
		</div>
		<div class="clear"></div>
	</section>

	<!-- Contact -->
	<section id="contact">
		<div class="container">
			<div style="text-align: center;" class="section-heading">
				<h2>Contact</h2>
				<p></p>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-lg-3 col-md-4 dark-bg">
					<div class="contact-info-box">
						<h2>Contact Information</h2>
						<div class="contact-info">
							<i class="fa fa-map-marker"></i>
							<p><?php echo $dataUser['address']; ?> <br> Indonesian</p>
						</div>
						<div class="contact-info">
							<i class="ion-email"></i>
							<p><?= $dataUser['email']; ?></p>
						</div>
						<div class="contact-info">
							<i class="ion-ios-telephone"></i>
							<p><?php echo $dataUser['phone']; ?></p>
						</div>
						<ul class="social-icons social-icons-no-border">
							<li>
								<a href="<?= $dataUser['facebook']; ?>" class="fa fa-facebook"></a>
							</li>
							<li>
								<a href="<?= $dataUser['twitter']; ?>" class="fa fa-twitter"></a>
							</li>
							<li>
								<a href="<?= $dataUser['instagram']; ?>" class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="<?= $dataUser['whatsapp']; ?>" class="fa fa-whatsapp"></a>
							</li>
						</ul>
					</div>	
				</div>
				<div class="col-12 col-lg-6 col-md-7 white-bg">
					<div class="contact-form">
						<h2>Send a Message</h2>
						<?php 

							if (isset($_POST['submit'])) {

								$nama 	  = $_POST['nama'];
								$email 	  = $_POST['email'];
								$subject  = $_POST['subject'];
								$message = $_POST['message'];

								if ($nama == "") {
									echo "<p style='color: red;'> Nama Harus di isi </p>";
								}elseif ($email == "") {
									echo "<p style='color: red;'> Email Harus di isi </p>";
								}elseif ($subject == "") {
									echo "<p style='color: red;'> Subject Harus di isi </p>";
								}elseif ($message == "") {
									echo "<p style='color: red;'> Pesan Harus di isi </p>";
								}else {
									$query = mysqli_query($db, "INSERT INTO mailbox VALUES('','$nama','$email','$subject','$message')");

									if ($query) {
										echo '<p> Pesan berhasil dikirim </p>';
										echo ' <meta http-equiv="refresh" content="0;url=index.php#contact"> ';
										
									}else {
										echo '<div class="alert alert-danger">Hilih, data gagal masuk</div>';
									}
								}

							}
							
						 ?>
						<form method="POST">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<input type="text" name="nama" placeholder="Name" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="email" name="email" placeholder="Email" class="form-control">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="subject" placeholder="Subject" class="form-control">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<textarea name="message" placeholder="Message" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<button type="submit" name="submit" value="submit" class="btn btn-dark">Send&nbsp;&nbsp;<i class="fa fa-paper-plane"></i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Supporters -->
	<section id="supporters">
		<div class="container">
			<div class="section-heading">
				<h2>Support</h2>
				<p>We dont have Nana or Rafaela for our support, but we have this</p>
			</div>
			<div class="sp-item">
				<img src="assets/images/html.png">
			</div>
			<div class="sp-item">
				<img src="assets/images/css3.svg">
			</div>
			<div class="sp-item">
				<img src="assets/images/javascript.png">
			</div>
			<div class="sp-item">
				<img src="assets/images/bootstrap.svg">
			</div>
		</div>
		<div class="clearfix"></div>
	</section>

	<!-- Footer -->
	<footer>
			<p class="footer-sm">
				<a href="#home">HOME</a><a href="#about">ABOUT</a><a href="blog">ARTICLE</a><a href="#contact">CONTACT</a>
			</p>
			<p>
				&copy; 2018 <?php echo $data['title']; ?> | Made with <span style="color: red;">&hearts;</span> and <i style="color: chocolate;font-size: 20px;" class="ion-coffee"></i>
			</p>
			<p>
				<a href="<?= $dataUser['facebook']; ?>"><i class="fa fa-facebook"></i></a>
				<a href="<?= $dataUser['twitter']; ?>"><i class="fa fa-twitter"></i></a>
				<a href="<?= $dataUser['instagram']; ?>"><i class="fa fa-instagram"></i></a>
				<a href="<?= $dataUser['youtube']; ?>"><i class="ion-social-youtube"></i></a>
			</p>
		<div class="clearfix"></div>
	</footer>

	<!-- JS LOAD -->
	<script type="text/javascript">

		window.onscroll = function() {myFunction()};
		var navbar = document.getElementById("navbar");
		var sticky = navbar.offsetTop;

		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky")
		  } else {
		    navbar.classList.remove("sticky");
		  }
		}
	</script>
	<script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/scroll.js"></script>
	<script type="text/javascript" src="assets/js/particles.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>

</body>
</html>