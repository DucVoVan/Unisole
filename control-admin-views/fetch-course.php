<?php 
	require("../Create-table/connect.php");
	$courseid = $_POST['idcourse'];
	
	$sql = "SELECT `name`,`content-introduce`,`content` FROM `course` WHERE `id`='$courseid'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$result_arr = array(
		"name" => $row['name'],
        "contentintroduce" => $row['content-introduce'],
        "content" => $row['content']
	);
	echo json_encode($result_arr);
	
?>