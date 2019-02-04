<?php 
	require("../Create-table/connect.php");
	$idcourse = $_POST['idcourse'];
	$sql = "DELETE FROM `course` WHERE `id`='$idcourse'";
	if(mysqli_query($conn,$sql)){
		echo "ok";
	}else{
		echo "Lỗi: ".mysqli_error();
	}
	
?>

