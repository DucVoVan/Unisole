<?php 
	require("../Create-table/connect.php");
	$courseid = $_POST['courseid'];
	$topicidchildren = $_POST['topicchildrenid'];
	$accountid = 11;
	if(isset($_POST['nameedit'])){
		$name = $_POST['nameedit'];
	}
	if(isset($_POST['contentintroduce'])){
		$introduce = $_POST['contentintroduce'];
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
		}
	}// Kiểm tra tên khóa học có bị trùng hay không bằng biến $check
	if($check){
		$sql2 = "UPDATE `course` SET `topicidchildren`='$topicidchildren', `accountid`='$accountid', `name`='$name', `content-introduce`='$introduce', `content`='$content' WHERE `id`='$courseid'";
		if(mysqli_query($conn,$sql2)){
			echo "Sửa khóa học thành công!";
		}else{
			echo "Lỗi: ".mysqli_error($conn,$sql2);
		}
	}else{
		echo "Khóa học bị trùng tên. Mời nhập tên khác";
	}

	
?>