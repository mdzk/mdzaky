<?php 
	session_start(); 
	include '../db.php';
	$queryHome = mysqli_query($db, "SELECT * FROM home");
	$queryUser = mysqli_query($db, "SELECT * FROM user");
	$dataHome = mysqli_fetch_array($queryHome);
	$dataUser = mysqli_fetch_array($queryUser);
?>
<!DOCTYPE html>
<html id="login">
<head>
	<title>Login | <?php echo $dataHome['title']; ?></title>
	<link rel="shortcut icon" href="../assets/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
</head>
<body>
	<div class="box">
		<h2><img src="../assets/images/avatar.jpg"></h2>
		<form method="POST">
			<div class="inputBox" hidden="">
				<input type="text" name="username" required="" value="admin">
				<label>Username</label>
			</div>
			<h2 style="margin-top:-15px;"> <?php echo $dataUser['nama']; ?> </h2>
			<div class="inputBox">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>
			<input type="submit" name="submit" value="LOGIN">
			<?php 
				include '../db.php';
				if (isset($_POST['submit'])) {
					
					$username = $_POST['username'];
					$password = $_POST['password'];
					$password = md5($password);

					$query = mysqli_query($db, "SELECT * FROM user WHERE username='$username' AND password='$password' ");

					if (mysqli_num_rows($query) > 0) {
						$_SESSION["admin"] = mysqli_fetch_array($query);
						echo ' <div style="color: #fff; margin-top: 5px;"> Selamat anda berhasil login. </div> ';
						echo ' <meta http-equiv="refresh" content="2;url=index.php"> ';
					}else {
						echo ' <div style="color: red; margin-top: 5px;"> Password salah. </div> ';
					}

				}
			 ?>
		</form>
	</div>
</body>
</html>