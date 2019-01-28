<?php 
	session_start();

	if(!isset($_SESSION['admin_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=admin");
		exit();
	}
	require("../Create-table/connect.php");
	$topicidchildren = $_POST['topicchildrenid'];
	$accountid = 11;
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}
	if(isset($_POST['content-introduce'])){
		$introduce = $_POST['content-introduce'];
	}
	if(isset($_POST['content'])){
		$content = $_POST['content'];
	}
	$sql = "SELECT `name` FROM `course`";
	$result = mysqli_query($conn,$sql);
	$check = true;
	while($row = mysqli_fetch_assoc($result)){
		if($row['name']==$name){
			$check = false;
			header("Location: http://localhost/Unisole/views/AddCourseDetail.php?error=1");
		}
	}
	if($check){
		$sql2 = "INSERT INTO `course` (`topicidchildren`, `accountid`, `name`, `content-introduce`, `content`) VALUES ('$topicidchildren','$accountid','$name','$introduce','$content')";
		mysqli_query($conn,$sql2);
		
		header("Location: http://localhost/Unisole/views/AddCourseDetail.php");
	}

	
?>