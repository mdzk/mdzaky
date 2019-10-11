<?php 
	if (isset($_POST['submit'])) {
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$file = $_FILES['gambar'];
		$tanggal = date('F d, Y');
		$image = "";
		$idKategori = $_POST['id_kategori'];

	if (isset($file['name'])) {
		$image = $file['name'];
		move_uploaded_file($file['tmp_name'], 'gambar/' . $image);
	}

	$query = mysqli_query($db, "INSERT INTO portofolio VALUES('','$judul','$isi','$tanggal','$image','$idKategori')");
		if ($query) {
			echo '<meta http-equiv="refresh" content="0;url=?page=portofolio">';
		}else {
			echo '<div class="alert alert-danger">Hilih, data gagal masuk</div>';
		}
	}
 ?>

<form method="POST" enctype="multipart/form-data">
	<input type="text" name="judul" style="float: left;" class="form-control col-9" placeholder="Judul">
	<select class="form-control col-2" style="float: right;" name="id_kategori">
		<?php
			$cat = mysqli_query($db, "SELECT*FROM kategorip");
			while($kategori = mysqli_fetch_array($cat)) {
		?>
			<option value="<?php echo $kategori['id']; ?>"><?php echo $kategori['nama_kategori']; ?></option>
		<?php
			}
		?>
	</select>
	<br><br>
	<div class="form-group">
		<textarea class="textarea" style="width: 0; height: 0" name="isi"></textarea>	
	</div>
	<input type="file" name="gambar" style="float: left;">
	<button type="submit" name="submit" value="submit" class="btn btn-success col-1" style="float: right;"> Publikasi </button>
</form>