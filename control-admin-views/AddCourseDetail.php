<?php 
	require("../Create-table/connect.php");
	$topicidchildren = $_POST['topicchildrenid'];
	$accountid = 11;
	if(isset($_POST['name'])){
		$name = $_POST['name'];
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
		$sql2 = "INSERT INTO `course` (`topicidchildren`, `accountid`, `name`, `content-introduce`, `content`) VALUES ('$topicidchildren','$accountid','$name','$introduce','$content')";
		if(mysqli_query($conn,$sql2)){
			echo "Thêm khóa học thành công!";
		}else{
			echo "Lỗi: ".mysqli_error($conn,$sql2);
		}
	}else{
		echo "Khóa học bị trùng tên. Mời nhập tên khác";
	}

	
?>