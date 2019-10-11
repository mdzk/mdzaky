<div id="portofolio">
	<div class="container">
 		<?php 

 			$query = mysqli_query($db, "SELECT * FROM portofolio");
 			while ($data = mysqli_fetch_array($query)) {

 		 ?>

		<div class="portofolio col-3">
			<div class="portofolio-item">
				<div class="portofolio-content" style="
					background-image: url('../login/gambar/<?php echo $data["gambar"] ?>');
					background-repeat: no-repeat;
					background-position: center;
					float: left;
					background-size: 100% auto;
					height: 200px;
				"></div>
				<!-- <img src="../login/gambar/<?php echo $data['gambar'] ?>"> -->
				<a href="?page=portofolio&&id=<?php echo $data["id"]; ?>"><?php echo $data['judul']; ?></a>
				<div class="button-pf">
					<a href="?page=portofolio&&id=<?php echo $data["id"]; ?>" class="btn btn-sm btn-success">Read More</a>
					<a href="#" class="btn btn-sm btn-danger">Detail</a>
				</div>
			</div>
		</div>
		
		<?php } ?>
		
	</div>
</div>