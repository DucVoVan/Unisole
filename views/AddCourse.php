<?php 
	require("../Create-table/connect.php");
	$sql = "SELECT `id`,`name` FROM topic";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
		echo $row['name'].'</br>';
		$topicid = $row['id'];
		$sql2 = "SELECT `id`,`name` FROM `topic-children` WHERE `topicid` = '$topicid'";
		$result2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_assoc($result2)){
			$link = "http://localhost/Unisole/views/AddCourseDetail.php?topicchildrenid=".$row2['id'];
			echo '<a href="'.$link.'" target="_blank">'.$row2['name'].'</a><br>';
		}
		echo "<br>";
	}
?>