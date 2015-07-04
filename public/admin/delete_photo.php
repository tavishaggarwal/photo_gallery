<?php

require_once ('../../includes/session.php');
//require_once ('../../includes/database.php');
require_once ('../../includes/functions.php');
require_once ('../../includes/photograph.php');

if(!$session->is_logged_in()){
	header('location:login.php');
}

$photo->delete_photo();
header('location:list_photo.php');

?>