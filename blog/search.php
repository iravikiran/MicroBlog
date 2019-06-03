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
$t_output = '';
$c_output = '';

if(isset($_POST['search'])) {
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

	$query = mysqli_query($con, "SELECT * FROM blog WHERE title LIKE '%$searchq%' OR content LIKE '%$searchq%'") or die("could not search!");
	$count = mysqli_num_rows($query);
	if($count == 0){
		$output = "There was no search result!";
	}else{
		while($row = mysqli_fetch_array($query)){
			$title = $row['title'];
			$content = $row['content'];
			$id = $row['id'];
			$t_output .= '<div>'.$title.'</div>';
			$c_output .= '<div>'.$content.'</div>';
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Search - Archive</title>
</head>
<body>

<br>
<center><a href="../blog/search.php" style="color: green;"><b>Search Blog</b></a>&nbsp;&nbsp;
<a href="../index.php" style="color: green;"><b>Profile</b></a>&nbsp;&nbsp;
<a href="../blog/new_post.php" style="color: green;"><b>Post New Blog</b></a>&nbsp;&nbsp;
<a href="../blog/blog_index.php" style="color: green;"><b>Blog Archive</b></a>&nbsp;&nbsp;
<a href="../index.php?logout='1'.php" style="color: green;"><b>Logout</b></a>&nbsp;&nbsp;
</center><br>

<center>
<form action="search.php" method="post">
	<input type="text" name="search" placeholder="Search blog.."/>
	<input type="submit" value="Submit" />  
</form>
</center>
<br>

<table align="center" border="1px" style="width:100%; line-height:50px">
	<tr>
			<th colspan="2"><p>Search Results.</p></th>
	</tr>
	<tr>
		<td><center><b><?php print("Post Title"); ?></b></center></td>
		<td><center><b><?php print("Contents"); ?></b></center></td>
	</tr>
	<tr>
		<td><center><?php print("$t_output"); ?></center></td>
		<td><center><?php print("$c_output"); ?></center></td>
	</tr>
</table>

</body>
</html>