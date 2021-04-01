<html>
	<meta charset="UTF-8">
	<body>
		<?php foreach ($rows as $row): ?>
			<div style="background-color: #999">
				<?php echo $row['title']; ?>
			</div>
			<div>
				<?php echo $row['details']; ?>
			</div>
			<div>
				<?php echo $row['startdate']; ?>
			</div>
		<?php endforeach; ?>
	</body>
</html>