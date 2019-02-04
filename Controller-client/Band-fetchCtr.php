<?php 
	require_once("../Create-table/connect.php");
	$account_id = $_POST['id'];
	
	$sql = "SELECT * FROM `band` WHERE `accountid` = '$account_id'" ;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	// Kiểm tra xem người dùng đã có bản đánh giá trong CSDL hay chưa
	$arr = array(
		"question0" => $row['question0'],
		"question1" => $row['question1'],
		"question2" => $row['question2'],
		"question3" => $row['question3'],
		"question4" => $row['question4'],
		"question5" => $row['question5'],
		"question6" => $row['question6'],
		"question7" => $row['question7'],
		"question8" => $row['question8'],
		"question9" => $row['question9'],
		"question10" => $row['question10'],
		"question11" => $row['question11'],
		"question12" => $row['question12'],
		"question13" => $row['question13'],
		"question14" => $row['question14'],
		"question15" => $row['question15'],
		"question16" => $row['question16'],
		"question17" => $row['question17'],
		"question18" => $row['question18'],
		"question19" => $row['question19'],
		"question20" => $row['question20'],
		"question21" => $row['question21']
	);
	echo json_encode($arr);
	
?>