<?php
ob_start();
?>

<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<?php
$con = mysqli_connect("localhost", "id9789469_root", "123456789");

	mysqli_select_db($con, "id9789469_hash");

$query = "DELETE FROM blog WHERE id='$_GET[id]'";

if (mysqli_query($con, $query))
    {
    	header("Location:blog_index.php");
    	ob_enf_fluch();
    }
else
    {
    	echo "Error : Cannot Delete Post!";
    }
?>

