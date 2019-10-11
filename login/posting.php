<div style="width: 100%" class="table100 ver1 m-b-110">
	<table style="width: 100%; margin-bottom: 30px;" data-vertable="ver1">
		<thead>
			<tr class="row100 head">
				<th class="column100 column4" data-column="column4">Judul</th>
				<th class="column100 column5" data-column="column5">Penulis</th>
				<th class="column100 column6" data-column="column6">View</th>
				<th class="column100 column7" data-column="column7">Date</th>
				<th class="column100 column8" data-column="column8">Options</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$total = mysqli_query($db, "SELECT * FROM artikel ORDER by id");
				$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
				$perPage = 6;
				$totalPage = ceil(mysqli_num_rows($total)/$perPage);

				$queryPosting = mysqli_query($db, "SELECT * FROM artikel ORDER by id DESC LIMIT " . ($hal-1)*$perPage . "," . $perPage);
				while ($dataPosting = mysqli_fetch_array($queryPosting)) {
			 ?>
			<tr class="row100">
				<td class="column100 column4" data-column="column4"><?php echo $dataPosting['judul']; ?></td>
				<td class="column100 column5" data-column="column5"><?php echo $dataPosting['penulis']; ?></td>
				<td class="column100 column6" data-column="column6"><?php echo $dataPosting['dibaca']; ?></td>
				<td class="column100 column7" data-column="column7"><?php echo $dataPosting['tanggal']; ?></td>
				<td class="column100 column8" data-column="column8">
					<a href="../blog/?page=artikel&&id=<?php echo $dataPosting["id"]; ?>" target="_blank" class="btn btn-info btn-sm">View</a>
					<a href="?page=ubah_artikel&&id=<?php echo $dataPosting["id"]; ?>" class="btn btn-success btn-sm">Ubah</a>
					<a href="?page=delete_artikel&&id=<?php echo $dataPosting["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
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
				<a class="btn btn-outline-dark btn-sm" href="?page=posting&&id=<?php echo $hal; ?>&&hal=<?php echo $i; ?>"> <?php echo $i; ?> </a>
			<?php
				}
 			?>
 			<a class="btn btn-outline-dark btn-sm" href="?page=posting&&id=<?php echo $hal; ?>&&hal=<?php echo $totalPage; ?>"> >> </a>
</div>