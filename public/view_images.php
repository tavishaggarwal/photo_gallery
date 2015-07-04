<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image Display</title>
</head>
<body>
	<h1> Images Display</h1>
</body>
</html>

<?php

require '../includes/photograph.php';

		$database->query("SELECT * FROM `photographs`");
		$result = $database->resultset();

		foreach( $result as $row ) {
		$id = $row['id'];
		echo "<div style='float: left; margin-left: 20px;'>";
		echo "<a href='full_images.php?id=$id'><img src=images/{$row['filename']} style='width:250px;'></a>";
		echo "<p>".$row['caption']."</p>";
		echo "</div>";
	}
?>

