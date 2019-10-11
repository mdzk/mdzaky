<div style="width: 100%" class="table100 ver1 m-b-110">
	<table style="width: 100%; margin-bottom: 30px;" data-vertable="ver1">
		<thead>
			<tr class="row100 head">
				<th class="column100 column4" data-column="column4">Nama</th>
				<th class="column100 column5" data-column="column5">Email</th>
				<th class="column100 column6" data-column="column6">Website</th>
				<th class="column100 column7" data-column="column7">Komentar</th>
				<th class="column100 column8" data-column="column8">Tanggal</th>
				<th class="column100 column9" data-column="column9">Options</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$total = mysqli_query($db, "SELECT * FROM komentar ORDER by id");
				$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
				$perPage = 6;
				$totalPage = ceil(mysqli_num_rows($total)/$perPage);

				$queryComment = mysqli_query($db, "SELECT * FROM komentar ORDER by id DESC LIMIT " . ($hal-1)*$perPage . "," . $perPage);
				while ($dataComment = mysqli_fetch_array($queryComment)) {
			 ?>
			<tr class="row100">
				<td class="column100 column4" data-column="column4"><?php echo $dataComment['nama']; ?></td>
				<td class="column100 column5" data-column="column5"><?php echo $dataComment['email']; ?></td>
				<td class="column100 column6" data-column="column6"><?php echo $dataComment['website']; ?></td>
				<td class="column100 column7" data-column="column7"><?php echo $dataComment['komentar']; ?></td>
				<td class="column100 column8" data-column="column8"><?php echo $dataComment['tanggal']; ?></td>
				<td class="column100 column9" data-column="column9">
					<a href="?page=delete_comment&&id=<?php echo $dataComment["id"]; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
				</td>
			</tr>
			<?php 
				} 
			?>
		</tbody>
	</table>
			<?php
				for ($i=1; $i <= $totalPage ; $i++) { 
			?>
				<a class="btn btn-outline-dark btn-sm" href="?page=comment&&id=<?php echo $id; ?>&&hal=<?php echo $i; ?>"> <?php echo $i; ?> </a>
			<?php
				}
 			?>
 			<a class="btn btn-outline-dark btn-sm" href="?page=comment&&id=<?php echo $id; ?>&&hal=<?php echo $totalPage; ?>"> >> </a>
</div>