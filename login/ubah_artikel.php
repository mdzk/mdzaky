<?php 
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$q = mysqli_query($db, "SELECT * FROM artikel WHERE id=$id");
	$data = mysqli_fetch_array($q);

	if (isset($_POST['submit'])) {
		$idKategori = $_POST['id_kategori'];
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$file = $_FILES['gambar'];
		$image = "";

	if (isset($file['name'])) {
		$image = $file['name'];
		move_uploaded_file($file['tmp_name'], 'gambar/' . $image);
	}

	$query = mysqli_query($db, "UPDATE artikel SET judul='$judul', isi='$isi', id_kategori='$idKategori' WHERE id=$id ");
		if ($query) {
			echo '<meta http-equiv="refresh" content="0;url=?page=posting">';
		}else {
			echo '<div class="alert alert-danger">Hilih, data gagal masuk</div>';
		}
	}
 ?>

<form method="POST" enctype="multipart/form-data">
	<input type="text" name="judul" style="float: left;" class="form-control col-9" value="<?php echo $data['judul'] ?>" placeholder="Judul">
	<select class="form-control col-2" style="float: right;" name="id_kategori">
		<?php
			$cat = mysqli_query($db, "SELECT*FROM kategori");
			while($kategori = mysqli_fetch_array($cat)) {
		?>
			<option value="<?php echo $kategori['id']; ?>" 
				
				<?php 
					if($data["id_kategori"] == $kategori["id"]) echo "selected"; 
				?>
				
				><?php echo $kategori['nama_kategori']; ?></option>
		<?php
			}
		?>
	</select>
	<br><br>
	<div class="form-group">
		<textarea class="textarea" style="width: 0; height: 0" name="isi"><?php echo $data['isi']; ?></textarea>
	</div>
	<input type="file" name="gambar" style="float: left;">
	<button type="submit" name="submit" value="submit" class="btn btn-success col-1" style="float: right;"> Publikasi </button>
</form>