<?php 
	require ("../Create-table/connect.php");
	$username = isset($_POST['username'])? $_POST['username']: '';
	$password = isset($_POST['password'])? $_POST['password']: '';
	$email = isset($_POST['email'])? $_POST['email']: '';
	$phone = isset($_POST['phone'])? $_POST['phone']: '';
	$fullname = isset($_POST['fullname'])? $_POST['fullname']: '';
	$password = md5($_POST["password"]);
	$sql = "INSERT INTO `teacher` (`username`, `email`, `phone`, `fullname`, `password`) VALUES ('$username','$email','$phone','$fullname','$password' )";
	// $conn = $this->connect();
	if(mysqli_query( $conn, $sql )){
		echo "Thêm mới thành công";
	}else{
		echo "Thêm thất bại. Lỗi: ".mysqli_error($conn);
	}
	
?>