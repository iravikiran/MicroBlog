<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>User Profile</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome back, <strong><?php echo $_SESSION['username']; ?>!</strong></p>
		<br>
		<li> <a href="../blog/new_post.php" style="color: green;">New Blog Post</a> </li>
    	<br>
		<li> <a href="../blog/blog_index.php" style="color: green;">Blog Archive</a> </li>
		<br>		
		<li> <a href="index.php?logout='1'" style="color: red;">logout</a> </li>
		
    <?php endif ?>
</div>
		
</body>
</html>