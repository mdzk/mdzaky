<section id="blog">
	<div class="container">

		<div class="left-blog">
			<?php 
				$kata = isset($_GET['kata']) ? $_GET['kata'] : '';
				$total = mysqli_query($db, "SELECT * FROM artikel where judul like '%$kata%'");
				$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
				$perPage = 5;
				$totalPage = ceil(mysqli_num_rows($total)/$perPage); //total dibagi perPage

				$query = mysqli_query($db, "SELECT artikel.*, kategori.nama_kategori FROM artikel left join kategori on artikel.id_kategori = kategori.id where judul like '%$kata%' ORDER BY artikel.id DESC LIMIT " . ($hal-1)*$perPage . "," . $perPage);
				// $queryLabel = mysqli_query($db, "SELECT * FROM artikel left join kategori on artikel.id_kategori = kategori.id ORDER BY artikel.id DESC LIMIT " . ($hal-1)*$perPage . "," . $perPage);
			 ?>
			<h5>Hasil Pencarian dengan kata "<?php echo $kata; ?>"</h5>
			<h5>Total artikel yang ditemukan <?php echo mysqli_num_rows($total); ?></h5>
			<?php while($data = mysqli_fetch_array($query)) { ?>
			<div class="article-blog">
				<h4>
				 	<a href="?page=artikel&&id=<?php echo $data["id"]; ?>">
				 		<?php echo $data["judul"]; ?>
				 	</a>
				 </h4>
				 <hr>
				 <span class="content-thumb">
				 	<!-- <?php 
				 		if ($data["gambar"] == '') {
				 			echo ' <img src="../login/gambar/no-img.png"> ';
				 		}else {
				 			echo ' <img src="../login/gambar/'.$data["gambar"].'"> ';
				 		}
				 	 ?> -->
				 	 <div class="content-thumb-pic" style="background-image: url('../login/gambar/<?php echo $data["gambar"];?>');"></div>
				 	 <!-- <img src="../login/gambar/<?php echo $data["gambar"]; ?>"> -->
				 	<span class="thumb-article-1">
				 	 	<?php echo substr(trim(strip_tags($data["isi"])), 0, 430); ?>..
				 	 </span>
				 	 <span class="thumb-article-2">
				 	 	<?php echo substr(trim(strip_tags($data["isi"])), 0, 230); ?>..
				 	 </span>
				 	 <span class="thumb-article-3">
				 	 	<?php echo substr(trim(strip_tags($data["isi"])), 0, 100); ?>..
				 	 </span>
				 </span>
				
				<div class="clearfix"></div> 
				<hr>
				<div class="content-thumb-b" style="font-weight: bold;">
				 	<i class="ion-android-time"></i> <?php echo $data["tanggal"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;
				 	<i class="ion-person"></i> <?php echo $data["penulis"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;
				 	<i class="ion-ios-pricetag"></i> <span value=""><?php echo $data['nama_kategori']; ?></span>
				</div>
			</div>
			<?php 
			 	}
			  ?>

			  <?php
				for ($i=1; $i <= $totalPage ; $i++) { 
				?>
				<a class="btn btn-outline-dark btn-sm" href="?page=search&&hal=<?php echo $i; ?>&kata=<?php echo $kata; ?>"> <?php echo $i; ?> </a>
				<?php
				}
 			?>
				<a class="btn btn-outline-dark btn-sm" href="?page=search&&hal=<?php echo $totalPage; ?>&kata=<?php echo $kata; ?>"> >> </a>
		</div>

		<div class="right-blog">
			<div class="side-bar">
				<div class="bg-cover">
				</div>
				<div class="cover">
					<center>
						<img src="../assets/images/avatar.jpg">
						<h4>Muhammad Dzaky</h4>
						<p>Nganu</p>
					</center>
				</div>
			</div>
			<div class="side-bar">
				<h1>Side bar</h1>
			</div>
		</div>
	</div>
</section>