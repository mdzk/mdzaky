<?php 
    session_start();
    date_default_timezone_set('Asia/Jakarta');
    if (!isset($_SESSION["admin"])) {
        header('location:login.php');
    }
    include '../db.php';
    $queryHome = mysqli_query($db, "SELECT * FROM home");
	$dataHome = mysqli_fetch_array($queryHome);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title> Admin | <?php echo $dataHome['title']; ?> </title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/images/<?php echo $dataHome['favicon']; ?>">

	<!-- Plugin -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../assets/css/icons/css/ionicons.css">
 	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/font-awesome.css">
 	<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
 	<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
 	<link rel="stylesheet" type="text/css" href="../assets/css/perfect-scrollbar.css">
 	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
 	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
 	<link rel="stylesheet" type="text/css" href="../assets/summernote/summernote-lite.css">

 	<!-- Fonts -->
 	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">

 	<!-- CSS -->
 	<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">

</head>
<body>

	<header id="headernav">
		<div class="containernav">
			<div class="nav-left">
				<span href="javascript:void(0)" id="close" onclick="closeNav()" class="open">&#9776;</span>	
				<span id="open" class="open" onclick="openNav()">&#9776;</span>
				<a href="index.php"> <?php echo $dataHome['title']; ?> </a>
			</div>
			<nav class="nav-right">
				<li class="nav-item dropdown">                
	                <a href="#" class="nav-link dropdown-toggle" id="dropdown" data-toggle="dropdown">
	                	<img src="../assets/images/avatar.jpg">
	                	<span>Hi, <?php echo $_SESSION["admin"]["nama"]; ?></span>
	                </a>
	                <div class="dropdown-menu">
	                	<a class="dropdown-item" href="../index.php" target="_blank">Home</a>
		                <a class="dropdown-item" href="../blog" target="_blank">Blog</a>
		                <a class="dropdown-item" href="../forum" target="_blank">Forum</a>
		                <a class="dropdown-item" href="../portofolio" target="_blank">Portofolio</a>
		                <hr>
		                <a class="dropdown-item" href="#">Night Mode</a>
		                <a class="dropdown-item" href="?page=settings">Settings</a>
		                <a class="dropdown-item" href="?page=logout">Logout</a>
	                </div>
              	</li> 
			</nav>
		</div>
		<div class="clear"></div>
	</header>

	<div class="nav" id="nav">
		<div class="cover-nav">
			<img src="../assets/images/avatar.jpg">
			<div class="cover-nav-text">
				<h4><?php echo $_SESSION["admin"]["nama"]; ?></h4>
				<p>CEO & Founder</p>
			</div>
		</div>
		<div class="menu-nav">
			<a href="?page=home"><i class="ion-ios-home-outline"></i>Dashboard</a>
			<a href="?page=mailbox"><i class="ion-ios-email-outline"></i>Mailbox <span>20</span></a>
			
			<button class="according" type="button">
				<i class="ion-ios-paper-outline"></i>Posting&nbsp;&nbsp;
				<i class="ion-android-arrow-dropdown"></i>
			</button>
				<div class="panel">
					<a href="?page=posting">Artikel</a>
					<a href="?page=tambah_artikel">Tambah Artikel</a>
				</div>

			<button class="according" type="button">
				<i class="ion-ios-paper-outline"></i>Portofolio&nbsp;&nbsp;
				<i class="ion-android-arrow-dropdown"></i>
			</button>
				<div class="panel">
					<a href="?page=portofolio">Portofolio</a>
					<a href="?page=tambah_portofolio">Add Portofolio</a>
				</div>

			<a href="?page=comment"><i class="ion-ios-chatboxes-outline"></i>Comment</a>
			<a href="?page=user"><i class="ion-ios-person-outline"></i>User</a>
			<a href="?page=statistic"><i class="ion-stats-bars"></i>Statistic</a>
			<button class="according" type="button">
				<i class="ion-ios-gear-outline"></i>Settings&nbsp;&nbsp;
				<i class="ion-android-arrow-dropdown"></i></button>
				<div class="panel">
					<a href="?page=settings">Account</a>
					<a href="?page=web_settings">Website</a>
				</div>
		</div>

		

	</div>

	<section id="new-artikel">
		<div class="containernav">

			<?php 
				$page = isset($_GET["page"]) ? $_GET["page"] : "home";
        		
		            if (file_exists($page . ".php")) {
		                include $page . ".php";
		            }else {
		                include "../error.php";
		            }
	         ?>

		</div>
	</section>

	<script type="text/javascript">		
		var acc = document.getElementsByClassName("according");

		var i;

		for(i = 0;i < acc.length; i++) {
			acc[i].onclick = function() {
				this.classList.toggle("active");

				var panel = this.nextElementSibling;

				if(panel.style.maxHeight) {
					panel.style.maxHeight = null;
				}else {
					panel.style.maxHeight = panel.scrollHeight + "px";
				}
			}
		}

		function openNav() {
			document.getElementById('open').style.display = "none";
			document.getElementById('close').style.display = "block";
			document.getElementById('nav').style.width = "20%";
			document.getElementById('new-artikel').style.paddingLeft = "20%";
		}

		function closeNav() {
			document.getElementById('nav').style.width = "0";
			document.getElementById('close').style.display = "none";
			document.getElementById('open').style.display = "block";
			document.getElementById('new-artikel').style.paddingLeft = "0%";
		}
	</script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/popper.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/select2.min.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
	<script type="text/javascript" src="../assets/summernote/summernote-lite.js"></script>
	<script type="text/javascript">
		$(function() {
	    	$('.textarea').summernote({'height' : 400});
	    });s
	</script>
</body>
</html>