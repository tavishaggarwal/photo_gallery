<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image Display</title>
</head>
<body>
	<h1> Image Display</h1>
</body>
</html>

<?php
require '../includes/database.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];

	$database->query("SELECT * FROM `photographs` WHERE `id`='$id'");
	$row = $database->single();

		$path = $row['filename'];

echo "<img src=images/".$path." style='margin-left: 14%;''></a>";
}

?>