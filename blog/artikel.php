<section id="blog" style="margin-bottom: 50px;">
	<div class="container">
		<!-- <div class="left-blog"> -->
			<?php 
				$id = isset($_GET['id']) ? $_GET['id'] : "";
				mysqli_query($db, "UPDATE artikel SET dibaca=dibaca+1 WHERE id=$id");
				// mysqli_query($db, "UPDATE artikel SET ")

				$query = mysqli_query($db, "SELECT * FROM artikel WHERE id='$id' ");
				if (mysqli_num_rows($query) == 0) {
					echo ' <meta http-equiv="refresh" content="0;url=index.php"> ';
				}
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

			<hr>

			<h5> Komentar </h5>
			<p> Masukkan komentar ente mblo! </p>

			<?php 

				if (isset($_POST['submit'])) {
					
					$nama 		= trim(strip_tags(mysqli_escape_string($db,$_POST['nama'])));
					$email 		= trim(strip_tags(mysqli_escape_string($db,$_POST['email'])));
					$website 	= trim(strip_tags(mysqli_escape_string($db,$_POST['website'])));
					$komentar 	= trim(strip_tags(mysqli_escape_string($db,$_POST['komentar'])));
					$capca 		= trim(strip_tags(mysqli_escape_string($db,$_POST['capca'])));

					if ($_SESSION["capca"] != $capca) { //tanda != maksudnya Tidak Sama Dengan
						echo ' <div class="alert alert-danger"> Kode tidak sesuai. </div> ';
					}elseif ($nama == "") {
						echo ' <div class="alert alert-danger"> Nama harus diisi. </div> ';
					}elseif ($email == "") {
						echo ' <div class="alert alert-danger"> Email harus diisi. </div> ';
					}elseif ($komentar == "") {
						echo ' <div class="alert alert-danger"> Komentar harus diisi. </div> ';
					}else {
						$query = mysqli_query($db, "INSERT INTO komentar VALUES('','$id','$nama','$email','$website','$komentar',' ". date("H:i:s d-m-y") ." ')");
						if ($query) {
							echo ' <div class="alert alert-success"> Terimakasih sudah memberikan komentar. </div> ';
						}else {
							echo ' <div class="alert alert-danger"> Data gagal dimasukkan. </div> ';
						}
					}
				}

				$text 			   = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
				$_SESSION["capca"] = substr(str_shuffle($text), 0,5);
			 ?>

			<form method="POST">
				<div class="form-group">
					<b>Nama</b>
					<input type="text" name="nama" class="form-control" placeholder="Name">
				</div>
				<div class="form-group">
					<b>Email</b>
					<input type="email" name="email" class="form-control" placeholder="Email">	
				</div>
				<div class="form-group">
					<b>Website</b>
					<input type="text" name="website" class="form-control" placeholder="Website">
				</div>
				<div class="form-group">
					<b>Komentar</b>
					<textarea name="komentar" placeholder="Komentar" class="form-control"></textarea>
				</div>

				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text" style="-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">
							<?php echo $_SESSION["capca"]; ?>
						</div>
					</div>
					<input type="text" name="capca" class="form-control" placeholder="Masukkan Captcha">
				</div>

				<br>
				<button name="submit" value="submit" type="submit" class="btn btn-dark">Submit</button>
			</form>


			<?php 

				$total = mysqli_query($db, "SELECT * FROM komentar WHERE id_artikel=$id");
				$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
				$perPage = 5;
				$totalPage = ceil(mysqli_num_rows($total)/$perPage);

				$komentar = mysqli_query($db, "SELECT * FROM komentar WHERE id_artikel=$id ORDER by id DESC LIMIT " . ($hal-1)*$perPage . "," . $perPage);
			 ?>

			 <hr>
			 <h4>Komentar Pengunjung (<?php echo mysqli_num_rows($total); ?>)</h4>
			<?php 
				while ($data = mysqli_fetch_array($komentar)) {
			 ?>

			<div class="card">
				<div class="card card-header">
					<?php echo $data["nama"]; ?> <br>
					<?php echo $data["email"]; ?> |
					<?php echo $data["website"]; ?> |
					<?php 

						$ago = 60;
						if (date("H") == date("H", strtotime($data["tanggal"]))) {
							
							$ago = (date("i") - date("i", strtotime($data["tanggal"])));
						}

						echo ($ago <= 59) ? $ago . " menit yang lalu" : $data["tanggal"];
					 ?>
				</div>
				<div class="card card-header">
					<?php echo $data["komentar"]; ?>
				</div>
			</div>
			<br>
			<?php } ?>
			<?php
				for ($i=1; $i <= $totalPage ; $i++) { 
			?>
				<a class="btn btn-outline-dark btn-sm" href="?page=artikel&&id=<?php echo $id; ?>&&hal=<?php echo $i; ?>"> <?php echo $i; ?> </a>
				<?php
			}
 			?>
 			<a class="btn btn-outline-dark btn-sm" href="?page=artikel&&id=<?php echo $id; ?>&&hal=<?php echo $totalPage; ?>"> >> </a>
		<!-- </div>
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
		</div> -->
	</div>
</section>