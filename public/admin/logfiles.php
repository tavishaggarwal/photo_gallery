<html>
<head>
<title> LOG FILES </title>
</head>


<body>
<h2>LOG FILES</h2>
<a href="logfiles.php?clear=true">Clear logs</a>



</body>
</html>
<?php

require_once ('../../includes/session.php');

if(!$session->is_logged_in()){
	header('location:login.php');
}

$file = '../../logs/logs.txt';

if($handle = fopen($file, 'r')){

$output = fread($handle, filesize($file));
echo "<pre><h3>DATE                      NAME    LOGGIN</h3></pre>";
echo nl2br($output);
fclose($handle);
}

if(isset($_GET['clear'])){

	if($_GET['clear'] == 'true'){
		file_put_contents('$file', '');
		//unlink($file);
		header('locaton:logfiles.php');
	}
}
?>


