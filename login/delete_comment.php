<?php
	include '../db.php';
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$query = mysqli_query($db, "DELETE FROM komentar WHERE id=$id");
	if($query) {
		echo '<meta http-equiv="refresh" content="0;url=?page=comment">';
	}else {
		echo '<div class="alert alert-danger">Hilih, data gagal diubah</div>';
	}
?>