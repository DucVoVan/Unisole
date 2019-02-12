<?php 
	session_start();
	if(!isset($_SESSION['admin_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=admin");
		exit();
	}
	$id = $_POST['id'];
	require("../Create-table/connect.php");
	$sql = "UPDATE `band` SET `status`=0 WHERE `accountid`='$id'";
	if(mysqli_query($conn,$sql)){
		echo "Hủy đăng kí thành công!";
	}else{
		echo mysqli_error($conn);
	}
	
?>