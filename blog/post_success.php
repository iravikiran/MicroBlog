<?php
$con = mysqli_connect("localhost", "id9789469_root", "123456789");
	mysqli_select_db($con, "id9789469_hash");
?>

<?php
$id = $_POST['id'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$content = $_POST['content'];

$sql = "INSERT into blog values('0', '$title', '$tag', '$content')";
$qry = mysqli_query($con, $sql);

if(!$qry)
	echo mysqli_error($con);

	 else
		 echo "Post Successfully Published! \r\n"; 
?>