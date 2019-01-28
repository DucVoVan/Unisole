<?php 
	require "../Create-table/connect.php";
	$accountid = $_POST['accountid'];
	$courseid = $_POST['courseid'];

	$query = "SELECT `courseid` FROM `course-registered` WHERE accountid='$accountid'";
	$result = mysqli_query($conn, $query);
	// $row = mysqli_fetch_assoc($result);
	$check = false;
	if($result->num_rows > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			if($row['courseid']==$courseid){
				$check = true;
			}
		}
		if($check){
			echo "Bạn đã đăng kí khóa học này!";
		}else{
			$query = "INSERT INTO `course-registered` (`accountid`,`courseid`) VALUES ('$accountid','$courseid')";
			if(mysqli_query($conn, $query)){
				echo "Đăng kí thành công!";
			}else{
				echo "Đăng kí không thành công!".mysqli_error($conn);
			}
		}
	}else{
		$query = "INSERT INTO `course-registered` (`accountid`,`courseid`) VALUES ('$accountid','$courseid')";
		if(mysqli_query($conn, $query)){
			echo "Đăng kí thành công!";
		}else{
			echo "Đăng kí không thành công!";
		}
	}
?>