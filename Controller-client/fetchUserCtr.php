<?php 
	require("../Create-table/connect.php");
	$id = $_POST['id'];
	
	$sql = "SELECT `username`,`email`,`fullname`,`phone`,`urlimage` FROM `account` WHERE `id`='$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$result_arr = array(
        "username" => $row['username'],
		"email" => $row['email'],
        "fullname" => $row['fullname'],
        "phone" => $row['phone'],
        "urlimage" => $row['urlimage']
	);
	echo json_encode($result_arr);
	
?>