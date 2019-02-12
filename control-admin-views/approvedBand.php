<?php 
	session_start();
	if(!isset($_SESSION['admin_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=admin");
		exit();
	}
	$id = $_POST['id'];
	require("../Create-table/connect.php");
	$sql = "UPDATE `band` SET `status`=1 WHERE `accountid`='$id'";
	if(mysqli_query($conn,$sql)){
		echo "Thành công";
	}else{
		echo mysqli_error($conn);
	}
	
?>