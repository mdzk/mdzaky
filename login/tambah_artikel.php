<?php 
	if (isset($_POST['submit'])) {
		$idKategori = $_POST['id_kategori'];
		$judul      = $_POST['judul'];
		$isi        = $_POST['isi'];
		$file       = $_FILES['gambar'];
		$penulis    = $_SESSION['admin']['nama'];
		$idUser     = $_SESSION['admin']['id'];
		$tanggal    = date('F d, Y');
		$image      = "";
		$upload     = true;

	if (isset($file['name'])) {
		$image = $file['name'];
		move_uploaded_file($file['tmp_name'], 'gambar/' . $image);
	}


	$query = mysqli_query($db, "INSERT INTO artikel VALUES('','$idKategori','$idUser','$judul','$penulis','$isi','$tanggal','$image','0')");
		if ($query) {
			echo '<meta http-equiv="refresh" content="0;url=?page=posting">';
		}else {
			echo '<div class="alert alert-danger">Hilih, data gagal masuk</div>';
		}	
	}

	// if (isset($file['name'])) {
	// 	$image = $file['name'];

	// 	$pisah = explode('.', $file['name']);
	// 	if($pisah[1] != "jpg" ||$pisah[1] != "png" ||$pisah[1] != "jpeg") {
	// 		$upload= false;
	// 	}else {
	// 		move_uploaded_file($file['tmp_name'], 'gambar/' . $image);
	// 	}
	// }

	// 	if($upload == true) {
	// 		$query = mysqli_query($db, "INSERT INTO artikel VALUES('','$idKategori','$idUser','$judul','$penulis','$isi','$tanggal','$image','0')");
	// 			if ($query) {
	// 				echo '<meta http-equiv="refresh" content="0;url=?page=posting">';
	// 			}else {
	// 				echo '<div class="alert alert-danger">Hilih, data gagal masuk</div>';
	// 			}
	// 		}else {
	// 			echo '<div class="alert alert-danger">Format gambar yang diterima hanya .jpg,.png,.jpeg</div>';
	// 	}
	// }
 ?>

<form method="POST" enctype="multipart/form-data">
	<input type="text" name="judul" style="float: left;" class="form-control col-9" placeholder="Judul">
	<select class="form-control col-2" style="float: right;" name="id_kategori">
		<?php
			$cat = mysqli_query($db, "SELECT*FROM kategori");
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