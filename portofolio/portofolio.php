<style type="text/css">
	.nav-blog {
		/*position: relative;*/
	}
</style>

<section id="blog" style="margin-bottom: 50px;">
	<div class="container">
			<?php 
				$id = isset($_GET['id']) ? $_GET['id'] : "";

				$query = mysqli_query($db, "SELECT * FROM portofolio WHERE id=$id");
				while($data = mysqli_fetch_array($query)) {
			 ?>
			<div class="article-blog">
				<h4>
				 	<h4>
				 		<?php echo $data["judul"]; ?>
				 	</h4>
				 </h4>
				 <hr>
				 <?php echo $data["isi"]; ?>
				 <div class="clearfix"></div>
			</div>
			<?php 
			 	}
			  ?>

	</div>
</section>