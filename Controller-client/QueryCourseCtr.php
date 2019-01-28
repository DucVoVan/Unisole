<?php 
	session_start();
	require_once("../Create-table/connect.php");
	$topicidchildren = $_POST['topicidchildren'];
	$sql = "SELECT `name`,`id` FROM `course` WHERE `topicidchildren`='$topicidchildren'";
	$result = mysqli_query($conn, $sql);
	if($result->num_rows > 0){
		echo '<h3>Các khóa học với chủ đề '.$_POST['nametopic'].'</h3>';
		while($row = mysqli_fetch_assoc($result)){
			echo '<a href="http://localhost/Unisole/view-client/Course.php?id='.$row['id'].'">'.$row['name'].'</a>';
			echo '</br>';
		}
	}
	else{
		echo '<p>Hiện tại chưa có khóa học nào cho chủ đề này!</p>';
	}
?>