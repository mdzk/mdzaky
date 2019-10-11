<?php 
		if (isset($_POST["submit"])) {

			$nama 		= trim(strip_tags(mysqli_escape_string($db,$_POST['nama'])));
			$email 		= trim(strip_tags(mysqli_escape_string($db,$_POST['email'])));
			$phone 		= trim(strip_tags(mysqli_escape_string($db,$_POST['phone'])));
			$address    = trim(strip_tags(mysqli_escape_string($db,$_POST['address'])));
			$password 	= trim(strip_tags(mysqli_escape_string($db,$_POST['password'])));
			$facebook 	= trim(strip_tags(mysqli_escape_string($db,$_POST['facebook'])));
			$twitter 	= trim(strip_tags(mysqli_escape_string($db,$_POST['twitter'])));
			$instagram 	= trim(strip_tags(mysqli_escape_string($db,$_POST['instagram'])));
			$youtube 	= trim(strip_tags(mysqli_escape_string($db,$_POST['youtube'])));
			$whatsapp 	= trim(strip_tags(mysqli_escape_string($db,$_POST['whatsapp'])));
			
			if ($password == "") {
				$query = mysqli_query($db, "UPDATE user SET nama='$nama', email='$email', 
											address='$address', phone='$phone' , facebook='$facebook', twitter='$twitter', instagram='$instagram', youtube='$youtube', whatsapp='$whatsapp' ");
			}else {
				$password = md5($password);
				$query = mysqli_query($db, "UPDATE user SET nama='$nama', email='$email', password='$password', address='$address', phone='$phone' , facebook='$facebook', twitter='$twitter', instagram='$instagram', youtube='$youtube', whatsapp='$whatsapp' ");
			}

			if ($query) {
				echo ' <div class="alert alert-success"> Selamat, anda berhasil Ubah Data. </div> ';
			}else {
				echo ' <div class="alert alert-danger"> Data gagal dimasukkan. </div> ';
			}
		}

		$query = mysqli_query($db, "SELECT * FROM user ");
		$data = mysqli_fetch_array($query);

	?>

<form method="POST">
	<div class="form-group">
		<b>Nama</b>
		<input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>">
	</div>
	<div class="form-group">
		<b>Email</b>
		<input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>">
	</div>
	<div class="form-group">
		<b>Phone</b>
		<input type="text" name="phone" class="form-control" value="<?php echo $data['phone'] ?>">
	</div>
	<div class="form-group">
		<b>Address</b>
		<input type="text" name="address" class="form-control" value="<?php echo $data['address'] ?>">
	</div>
	<hr>
	<div class="form-group">
		<b>Facebook</b>
		<input type="text" name="facebook" class="form-control" value="<?php echo $data['facebook'] ?>">
	</div>
	<div class="form-group">
		<b>Twitter</b>
		<input type="text" name="twitter" class="form-control" value="<?php echo $data['twitter'] ?>">
	</div>
	<div class="form-group">
		<b>Instagram</b>
		<input type="text" name="instagram" class="form-control" value="<?php echo $data['instagram'] ?>">
	</div>
	<div class="form-group">
		<b>YouTube</b>
		<input type="text" name="youtube" class="form-control" value="<?php echo $data['youtube'] ?>">
	</div>
	<div class="form-group">
		<b>WhatsApp</b>
		<input type="text" name="whatsapp" class="form-control" value="<?php echo $data['whatsapp'] ?>">
	</div>
	<hr>
	<div class="form-group">
		<b>Username</b>
		<input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>" disabled>
	</div>
	<div class="from-group">
		<b>Password <span style="color: red">(*Klo g di ganti kosongkan aja sob)</span></b>
		<input type="password" name="password" class="form-control">
	</div>
	<br>
	<button type="submit" name="submit" value="submit" class="btn btn-success"> Ubah Data </button>
</form>