<?php

require '../../includes/photograph.php';
require '../../includes/session.php';

if(!$session->is_logged_in()){

	header('location:login.php');
}
echo $session->message;

		$database->query("SELECT * FROM `photographs`");
		$result = $database->resultset();
		
		echo "<table id = 'table' border = '2px'>";                                        
		echo "<tr>";
		echo "<th width ='40'> IMAGES</th>";
		echo "<th width ='140'> FILENAME</th>";
		echo "<th width ='140'>TYPE</th>";
		echo "<th width ='100'>SIZE</th>";
		echo "<th width ='200'>CAPTION</th>";
		echo "<th width ='200'>Delete photo</th>";
		echo "</tr>";

foreach( $result as $row ) {

		echo "<tr>";
		echo "<td> <img src=../images/{$row['filename']} style='width:100px'> </td>";
		echo "<td>" .$row['filename']."</td>";
		echo "<td>" .$row['type']."</td>";
		echo "<td>" .$row['size']."</td>";
		echo "<td>" .$row['caption']."</td>";
		echo "<td><a href='delete_photo.php?id=".$row['id']."'>Click to delete photo</td>";
		echo "</tr>";
}
 echo "</table>"; 
 echo "<a href='photo_upload.php'>CLICK TO UPLOAD NEW PHOTO</a><br />";
?>