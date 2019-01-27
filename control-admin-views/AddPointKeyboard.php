<?php 
	session_start();
	require_once("../Create-table/connect.php");
	$p11 =  $_POST['p11'];
	$p12 =  $_POST['p12'];
	$p13 =  $_POST['p13'];
	$p21 =  $_POST['p21'];
	$p22 =  $_POST['p22'];
	$p23 =  $_POST['p23'];
	$p31 =  $_POST['p31'];
	$p32 =  $_POST['p32'];
	$p33 =  $_POST['p33'];
	$p41 =  $_POST['p41'];
	$p42 =  $_POST['p42'];
	$p43 =  $_POST['p43'];
	$p51 =  $_POST['p51'];
	$p52 =  $_POST['p52'];
	$p53 =  $_POST['p53'];
	$p61 =  $_POST['p61'];
	$p62 =  $_POST['p62'];
	$p63 =  $_POST['p63'];
	$p71 =  $_POST['p71'];
	$p72 =  $_POST['p72'];
	$p73 =  $_POST['p73'];
	$p81 =  $_POST['p81'];
	$p82 =  $_POST['p82'];
	$p83 =  $_POST['p83'];
	$p91 =  $_POST['p91'];
	$p92 =  $_POST['p92'];
	$p93 =  $_POST['p93'];
	$p101 =  $_POST['p101'];
	$p102 =  $_POST['p102'];
	$p103 =  $_POST['p103'];
	$p111 =  $_POST['p111'];
	$p112 =  $_POST['p112'];
	$p113 =  $_POST['p113'];
	$p121 =  $_POST['p121'];
	$p122 =  $_POST['p122'];
	$p123 =  $_POST['p123'];
	$p131 =  $_POST['p131'];
	$p132 =  $_POST['p132'];
	$p133 =  $_POST['p133'];
	$p141 =  $_POST['p141'];
	$p142 =  $_POST['p142'];
	$p143 =  $_POST['p143'];
	$p151 =  $_POST['p151'];
	$p152 =  $_POST['p152'];
	$p153 =  $_POST['p153'];
	$p161 =  $_POST['p161'];
	$p162 =  $_POST['p162'];
	$p163 =  $_POST['p163'];
	$p171 =  $_POST['p171'];
	$p172 =  $_POST['p172'];
	$p173 =  $_POST['p173'];
	$p181 =  $_POST['p181'];
	$p182 =  $_POST['p182'];
	$p183 =  $_POST['p183'];
	$p191 =  $_POST['p191'];
	$p192 =  $_POST['p192'];
	$p193 =  $_POST['p193'];
	$p201 =  $_POST['p201'];
	$p202 =  $_POST['p202'];
	$p203 =  $_POST['p203'];
	
	$accountid = $_POST['accountid'];
	$topicid = $_POST['topicid'];
	$teacherid = $_SESSION['teacher_id'];

	$sql = "SELECT `topicid` FROM `point-keyboard` WHERE `accountid`='$accountid'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if($row['topicid']==$topicid){
		echo "Bạn đã chấm điểm cho học viên này!";
	}else{
		$sql = "INSERT INTO `point-keyboard` (`accountid`,`topicid`,`teacherid`,`1-1`,`1-2`,`1-3`,`2-1`,`2-2`,`2-3`,`3-1`,`3-2`,`3-3`,`4-1`,`4-2`,`4-3`,`5-1`,`5-2`,`5-3`,`6-1`,`6-2`,`6-3`,`7-1`,`7-2`,`7-3`,`8-1`,`8-2`,`8-3`,`9-1`,`9-2`,`9-3`,`10-1`,`10-2`,`10-3`,`11-1`,`11-2`,`11-3`,`12-1`,`12-2`,`12-3`,`13-1`,`13-2`,`13-3`,`14-1`,`14-2`,`14-3`,`15-1`,`15-2`,`15-3`,`16-1`,`16-2`,`16-3`,`17-1`,`17-2`,`17-3`,`18-1`,`18-2`,`18-3`,`19-1`,`19-2`,`19-3`,`20-1`,`20-2`,`20-3`) VALUES ('$accountid','$topicid','$teacherid','$p11','$p12','$p13','$p21','$p22','$p23','$p31','$p32','$p33','$p41','$p42','$p43','$p51','$p52','$p53','$p61','$p62','$p63','$p71','$p72','$p73','$p81','$p82','$p83','$p91','$p92','$p93','$p101','$p102','$p103','$p111','$p112','$p113','$p121','$p122','$p123','$p131','$p132','$p133','$p141','$p142','$p143','$p151','$p152','$p153','$p161','$p162','$p163','$p171','$p172','$p173','$p181','$p182','$p183','$p191','$p192','$p193','$p201','$p202','$p203')";

		if(mysqli_query($conn,$sql)){
			$sql = "UPDATE `teach-keyboard` SET `status` = 1";
			mysqli_query($conn,$sql);
			echo "Thêm thành công!";
		}else{
			echo mysqli_error($conn);
			echo "Thêm không thành công!";
		}
	}
?>