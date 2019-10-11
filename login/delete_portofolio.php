<?php
	include '../db.php';
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$query = mysqli_query($db, "DELETE FROM portofolio WHERE id=$id");
	if($query) {
		echo '<meta http-equiv="refresh" content="0;url=?page=portofolio">';
	}else {
		echo '<div class="alert alert-danger">Hilih, data gagal diubah</div>';
	}
?>