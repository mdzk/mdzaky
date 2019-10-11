<?php 
	$id = isset($_GET['id']) ? $_GET['id'] : "";

	$queryMailbox = mysqli_query($db, "SELECT * FROM mailbox WHERE id=$id");
	while ($dataMailbox = mysqli_fetch_array($queryMailbox)) {
 ?>

<div style="width: 100%" class="table100 ver1 m-b-110">
	<table style="width: 100%; margin-bottom: 30px;" data-vertable="ver1">
		<tbody>
			<tr class="row100 head">
				<th class="column100 column4" data-column="column4">Nama</th>
			</tr>
			<tr class="row100">
				<td class="column100 column4" data-column="column4"><?php echo $dataMailbox['nama']; ?></td>
			</tr>
			<tr class="row100 head">
				<th class="column100 column4" data-column="column4">Email</th>
			</tr>
			<tr class="row100">
				<td class="column100 column4" data-column="column4"><?php echo $dataMailbox['email']; ?></td>
			</tr>
			<tr class="row100 head">
				<th class="column100 column4" data-column="column4">Subject</th>
			</tr>
			<tr class="row100">
				<td class="column100 column4" data-column="column4"><?php echo $dataMailbox['subject']; ?></td>
			</tr>
			<tr class="row100 head">
				<th class="column100 column4" data-column="column4">Message</th>
			</tr>
			<tr class="row100">
				<td class="column100 column4" data-column="column4"><?php echo $dataMailbox['message']; ?></td>
			</tr>
		</tbody>
	</table>
	<a href="" class="btn btn-success">Reply</a>
	<a href="?page=delete_mailbox&&id=<?php echo $dataMailbox["id"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
</div>

<?php } ?>