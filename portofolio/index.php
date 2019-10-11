<?php 
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	include '../db.php';
	$query = mysqli_query($db, "SELECT * FROM home");
	$data = mysqli_fetch_array($query);
	mysqli_query($db, "UPDATE home SET view=view+1");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="author" content="Muhammad Dzaky">
	<title><?= $data['title'] ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/images/favicon.png">
	<!-- META SEO -->
    <meta name="keywords" content="mdzaky, dzaky, muhammad dzaky, mdzaky.id, smk3metro.sch.id, web design smk, web desain smk, smk 3 metro, smk negeri 3 metro, metro lampung" />
    <meta name="description" content="An Onepage that represented who muhammad dzaky is.." />

    <!-- MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <!-- PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/icons/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/icons/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
    <style type="text/css">
	.blog {
		background-color: #fff!important;
	}
</style>
</head>
<body class="blog">

	<div id="navbar" class="menu-web nav-blog" style="position: relative;margin-bottom: -50px;z-index: 99; margin-top: 0">
		<div class="container">
			<div class="logo-web logo-blog">
				<a href="index.php"><?= $data['title'] ?></a>
			</div>
			<nav id="navigation-web">
				<ul>
					<form method="GET" class="form-inline mt-2 mt-md-0 search-blog">
		            	<input type="hidden" name="page" value="search"> 
		            	<input name="kata" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		            	<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
		            </form>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</div>
	</div>

		<?php 
			$page = isset($_GET["page"]) ? $_GET["page"] : "home";
    		
	            if (file_exists($page . ".php")) {
	                include $page . ".php";
	            }else {
	            	echo '<meta http-equiv="refresh" content="0;url=../error.php">';
	            }
         ?>

	<div class="clearfix"></div>
	<!-- Footer -->
	<footer class="footer-blog">
		<div class="container">
			<p>
				&copy; 2018 <?php echo $data['title']; ?> | Made with <span style="color: red;">&hearts;</span> and <i style="color: chocolate;font-size: 20px;" class="ion-coffee"></i>
			</p>
			<p class="social-md">
				<a href=""><i class="fa fa-facebook"></i></a>
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-instagram"></i></a>
				<a href=""><i class="ion-social-youtube"></i></a>
			</p>
		</div>
		<div class="clearfix"></div>
	</footer>
</body>
</html>