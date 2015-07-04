<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>

    <!-- Bootstrap -->
    <link href="../stylesheets/bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>


<?php
require_once ('../../includes/session.php');
require_once ('../../includes/database.php');
require_once ('../../includes/functions.php');

if($session->is_logged_in()){
	header('location:index.php');
}

if(isset($_POST['submit'])){
	$username = $_POST['name'];
	$password =$_POST['passwd'];


	$find_user = $database->authenticate($username,$password);

	if($find_user){
		$session->login($find_user);
    log_action("LOGIN:", $find_user['username']. " logged in");
		header('location:index.php');
	}else{
		echo "please enter correct combination of user name and password";
	}
}
?>

<body style="background-color: #BAFFFF; ">
<header>
  
  <div class="jumbotron">
    <h1>PHOTO GALLERY </h1>
  </div>

</header>
  <h1 style="margin-left: 25px;">Login Form</h1><br>

  <div class="container">

    <form role="form" class="form-horizontal" action="login.php" method="POST">

          <div class="form-group">
          <label>User Name</label><input type="text" name="name"  class="form-control">
          </div>

          <div class="form-group">
          <label>Password</label><input type="password" name="passwd" class="form-control">
          </div>

          <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login" name="submit">
          <a href="register.php" target="_blank"><input type="button" class="btn btn-primary" value="Register"></a>
          <a href="../view_images.php" target="_blank"><input type="button" class="btn btn-primary" value="View"></a>
          </div>

         <!--  <div class="form-group">
          <input type="reset" class="btn btn-primary" value="Reset Values">
          </div> -->

    </form>
      
  </div> <!-- End of class container --> 