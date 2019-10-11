<?php 

	if (isset($_POST['submit'])) {
		$title     = $_POST['title'];
		$deskripsi = $_POST['deskripsi'];
		$keyword   = $_POST['keyword'];
		$mt 	   = date('F d, Y') . " " .$_POST['time'];
		$file	   = $_FILES['favicon'];
		$favicon   = "";

		if (isset($file['name'])) {
			$favicon = $file['name'];
			move_uploaded_file($file['tmp_name'], '../assets/images/' . $favicon);
		}

		$query     = mysqli_query($db, "UPDATE home SET title='$title' , deskripsi='$deskripsi', keyword='$keyword', maintenance='$mt', favicon='$favicon' "); 

		if ($query) {
			echo ' <div class="alert alert-success"> Selamat, anda berhasil Ubah Data. </div> ';
		}else {
			echo ' <div class="alert alert-danger"> Data gagal dimasukkan. </div> ';
		}
	}

	$query = mysqli_query($db, "SELECT * FROM home");
	$data = mysqli_fetch_array($query);
 ?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<b>Favicon</b>
		<input class="form-control" type="file" name="favicon" value="<?php echo $data['favicon'] ?>">
	</div>
	<div class="form-group">
		<b>Title</b>
		<input class="form-control" type="text" name="title" value="<?php echo $data['title']; ?>">
	</div>
	<div class="form-group">
		<b>Deskripsi</b>
		<input class="form-control" type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>">
	</div>
	<div class="form-group">
		<b>Keyword</b>
		<textarea class="form-control" name="keyword"><?php echo $data['keyword']; ?></textarea>
	</div>
	<hr>
	<div class="form-group">
		<b>Maintenance</b>
		<div class="clearfix"></div>
		<input class="form-control col-5" style="float: left;" type="date" name="date"> 
		<input class="form-control col-6" style="float: right;" type="time" name="time">
	</div>
	<br>
	<div class="clearfix"></div>
	<button class="btn btn-success" type="submit" value="submit" name="submit">Save</button>
</form>