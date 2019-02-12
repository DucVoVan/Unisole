<?php 
	session_start();
	if(!isset($_SESSION['admin_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=admin");
		exit();
	}
	$id = $_POST['id'];
	require("../Create-table/connect.php");
	$sql = "SELECT `phone`,`fullname` FROM `account` WHERE `id`='$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	echo $row['fullname'];
	echo '<br>';
	echo "0".$row['phone'];
?>