<html>
	<meta charset="UTF-8">
	<body>
		<?php

use Fuel\Core\Asset;

foreach ($rows as $row): ?>
			<div style="background-color: #999">
				<?php echo $row['title']; ?>
			</div>
			<div>
				<?php echo $row['details']; ?>
			</div>
			<div>
				<?php echo $row['starttime']; ?>
			</div>
		<?php endforeach; ?>
		<?php echo Asset::img('test.jpg');?>
	</body>
</html>