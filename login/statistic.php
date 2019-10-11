<div class="stat-hm col">
	<div class="stat-item col-3">
		<div class="stat-artikel box-stat">
			<div class="stat-left">
				<p>Artikel</p>
				<i class="ion-ios-paper-outline"></i>
			</div>
			<div class="stat-right">
				<p>
					<?php 
						$total = mysqli_query($db, "SELECT * FROM artikel");
						echo mysqli_num_rows($total); 
					?>
				</p>
				<a href="?page=posting">MORE</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="stat-item col-3">
		<div class="stat-komentar box-stat">
			<div class="stat-left">
				<p>Komentar</p>
				<i class="ion-ios-chatboxes-outline"></i>
			</div>
			<div class="stat-right">
				<p>
					<?php 
						$total = mysqli_query($db, "SELECT * FROM komentar");
						echo mysqli_num_rows($total); 
					?>
				</p>
				<a href="?page=comment">MORE</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="stat-item col-3">
		<div class="stat-view box-stat">
			<div class="stat-left">
				<p>Visitors</p>
				<i class="ion-stats-bars"></i>
			</div>
			<div class="stat-right">
				<p>
					<?php 
						$sqlHome   = mysqli_query($db, "SELECT * FROM home");
						$homeArray = mysqli_fetch_array($sqlHome);
						$sql       = mysqli_query($db, "SELECT * FROM artikel");
						$view      = 0;
						while ($array = mysqli_fetch_array($sql)) {
							$view += $array['dibaca'];
						}
					?>
					<?php echo $view + $homeArray['view']; ?>
				</p>
				<a href="?page=statistic">MORE</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="stat-item col-3">
		<div class="stat-mail box-stat">
			<div class="stat-left">
				<p>Mail</p>
				<i class="ion-ios-email-outline"></i>
			</div>
			<div class="stat-right">
				<p>
					<?php 
						$total = mysqli_query($db, "SELECT * FROM mailbox");
						echo mysqli_num_rows($total); 
					?>
				</p>
				<a href="?page=mailbox">MORE</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<a href="" class="btn btn-danger">Reset Visitor</a>
</div>