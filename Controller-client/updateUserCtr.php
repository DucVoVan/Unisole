<?php 
	require("../Create-table/connect.php");
	$id = $_POST['id'];
	$email = $_POST['email'];
	$phone = intval($_POST['phone']);
	$fullname = $_POST['fullname'];
	$urlimage = $_POST['url'];

	if(empty($urlimage)){
		$sql = "UPDATE `account` SET `email`='$email', `fullname`='$fullname', `phone`='$phone' WHERE `id`='$id'";
		if(mysqli_query($conn,$sql)){
			echo "ok";
		}else{
			echo "Lỗi: ".mysqli_error($conn);
		}
	}else{
		$sql = "UPDATE `account` SET `email`='$email', `fullname`='$fullname', `phone`='$phone',`urlimage`='$urlimage' WHERE `id`='$id'";
		if(mysqli_query($conn,$sql)){
			echo "ok";
		}else{
			echo "Lỗi: ".mysqli_error($conn);
		}
	}
?>