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
$query = "select * from blog";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
	<title> Archive - Blog Posts</title>
<body>
<center><a href="../blog/search.php" style="color: green;"><b>Search Blog</b></a>&nbsp;&nbsp;
<a href="../index.php" style="color: green;"><b>Profile</b></a>&nbsp;&nbsp;
<a href="../blog/new_post.php" style="color: green;"><b>Post New Blog</b></a>&nbsp;&nbsp;
<a href="../blog/blog_index.php" style="color: green;"><b>Blog Archive</b></a>&nbsp;&nbsp;
<a href="../index.php?logout='1'.php" style="color: green;"><b>Logout</b></a>&nbsp;&nbsp;
</center><br>

	<table align="center" border="1px" style="width:100%; line-height:50px">
		<tr>
			<th colspan="5"><h2>Blog Archive.</h2></th>
		</tr>
		<tr>
			<th> ID </th>
			<th> Title </th>
			<th> Tag(s) </th>
			<th> Blog Content </th>
			<th> Delete </th>
		</tr>
	<?php
		if ($result){
			while($rows = mysqli_fetch_assoc($result))
			{
	?>
				<tr> 
					<td><center><?php echo $rows['id']; ?></center></td>
					<td><center><?php echo $rows['title']; ?></center></td>
					<td><center><?php echo $rows['tag']; ?></center></td>
					<td><center><?php echo $rows['content']; ?></center></td>
					<td><?php echo "<a href=delete.php?id=".$rows['id']."><center>Delete</center></a>" ?></td>
				</tr>
	<?php
			}
		}
	?>	
	</table>

</body>
</html>