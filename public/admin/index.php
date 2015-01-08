<?php
require_once ('../../includes/session.php');

if(!$session->is_logged_in()){
	header('location:login.php');
}

?>

<html>
<head>
<title>Gallery</title>
</head>
<body>

<h1> Gallery </h1>
<h4> Welcome to my gallery page</h4>
<a href="logfiles.php">LOG FILES </a><br />
<a href="logout.php">LOGOUT </a><br />

<a href="photo_upload.php">CLICK TO UPLOAD PHOTO</a><br />
<a href="list_photo.php">CLICK TO VIEW PHOTO</a><br />

</body>
</html>