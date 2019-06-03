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

<!DOCTYPE html>
<html>
<head>
<title>HashTaag - Blog </title>
</head>

<br/>
<center><a href="../blog/search.php" style="color: green;"><b>Search Blog</b></a>&nbsp;&nbsp;
<a href="../index.php" style="color: green;"><b>Profile</b></a>&nbsp;&nbsp;
<a href="../blog/new_post.php" style="color: green;"><b>Post New Blog</b></a>&nbsp;&nbsp;
<a href="../blog/blog_index.php" style="color: green;"><b>Blog Archive</b></a>&nbsp;&nbsp;
<a href="../index.php?logout='1'.php" style="color: green;"><b>Logout</b></a>&nbsp;&nbsp;
</center><br>
<center>
<h2>Post a new blog!</h2>
<form action="post_success.php" method="post">
<input type="hidden" name="id"><br/>
Blog Title : <input type="text" name="title" autofocus size="51"><br/><br/>
Tag(s) : <input type="text" name="tag" autofocus size="47"><br/><br/>
Content : <input type="text" name="content" autofocus size="120"><br/><br/>
<input type="submit" value="Publish">
</form>
</center>
</body>
</html>
