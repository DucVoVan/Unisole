<?php 
	require("../Create-table/connect.php");
	$id = $_POST['id'];
	$passwordchange = $_POST['passwordchange'];
	$passwordchange = md5($passwordchange);
	$sql = "UPDATE `account` SET `password`='$passwordchange' WHERE `id`='$id'";
	if(mysqli_query($conn,$sql)){
		echo "ok";
	}else{
		echo "Lỗi: ".mysqli_error($conn);
	}
	
	
?>