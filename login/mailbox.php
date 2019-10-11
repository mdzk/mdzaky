<div style="width: 100%" class="table100 ver1 m-b-110">
	<table style="width: 100%; margin-bottom: 30px;" data-vertable="ver1">
		<thead>
			<tr class="row100 head">
				<th class="column100 column4" data-column="column4">Nama</th>
				<th class="column100 column5" data-column="column5">Email</th>
				<th class="column100 column6" data-column="column6">Subject</th>
				<th class="column100 column7" data-column="column7">Message</th>
				<th class="column100 column8" data-column="column8">Options</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$total = mysqli_query($db, "SELECT * FROM mailbox ORDER by id");
				$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
				$perPage = 6;
				$totalPage = ceil(mysqli_num_rows($total)/$perPage);

				$queryMailbox = mysqli_query($db, "SELECT * FROM mailbox ORDER by id DESC LIMIT " . ($hal-1)*$perPage . "," . $perPage);
				while ($dataMailbox = mysqli_fetch_array($queryMailbox)) {
			 ?>
			<tr class="row100">
				<td class="column100 column4" data-column="column4"><?php echo $dataMailbox['nama']; ?></td>
				<td class="column100 column5" data-column="column5"><?php echo $dataMailbox['email']; ?></td>
				<td class="column100 column6" data-column="column6">
					<?php echo substr(trim(strip_tags($dataMailbox['subject'])), 0, 18); ?>		
				</td>
				<td class="column100 column7" data-column="column7">
					<?php 
						echo substr(trim(strip_tags($dataMailbox['message'])), 0, 15); ?>..
				</td>
				<td class="column100 column8" data-column="column8">
					<a href="?page=view_mailbox&&id=<?php echo $dataMailbox["id"]; ?>" class="btn btn-info btn-sm">View</a>
					<a href="?page=delete_mailbox&&id=<?php echo $dataMailbox["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
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
				<a class="btn btn-outline-dark btn-sm" href="?page=mailbox&&id=<?php echo $id; ?>&&hal=<?php echo $i; ?>"> <?php echo $i; ?> </a>
			<?php
				}
 			?>
 			<a class="btn btn-outline-dark btn-sm" href="?page=mailbox&&id=<?php echo $id; ?>&&hal=<?php echo $totalPage; ?>"> >> </a>
</div>