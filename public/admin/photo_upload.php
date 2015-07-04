<?php
require '../../includes/photograph.php';
require '../../includes/session.php';

if(!$session->is_logged_in()){
	header('location:login.php');
}

if(isset($_POST['submit'])){

	$photo->caption = $_POST['comment'];
	$photo->attach_file($_FILES['upload']);
	$photo->create();
	header('location:list_photo.php');
	$session->message("photo uploaded sucessfully");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>photo upload</title>
</head>
<body>
	
	<form action="photo_upload.php" enctype="multipart/form-data" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"><br />
	<input type="file" name="upload"><br /><br />
	<label>Comment</label><input type="text" name="comment"><br />
	<input type="submit" name="submit" value="SUBMIT">

</body>
</html>