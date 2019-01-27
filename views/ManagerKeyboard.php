<?php 
	require_once("connect.php");  
	$sql = "SELECT * FROM `teach-keyboard` WHERE `status`=0";
	$result = mysqli_query($conn, $sql);
	echo '<div><a class="hi" href="http://localhost/Unisole/views/ShowMusic.php" target="blank">Xem tất cả câu trả lời của học viên</a></div>';

	echo '<table><tr>
		<th>Mục đích bạn muốn học chơi Keyboard là để ?</th>
		<th>Bạn thích chơi được dòng nhạc cụ thể nào, hay bài hát cụ thể nào bạn muốn chơi được trong thời gian tới?</th>
		<th>Bạn thích tiếng đàn của mình sẽ hay theo kiểu của ai (band nào) nhất? </th>
		<th>Bạn đã trên 10 tuổi (hoặc kiểm soát ngón tay, có khả năng tự giác học tập tốt như người từ 10 tuổi trở lên) chưa?</th>
		<th>Khả năng đọc bản nhạc của bạn thế nào?</th>
		<th>Khả năng chơi Melody (giai điệu) của bạn thế nào?</th>
		<th>Khả năng chơi hợp âm của bạn thế nào?</th>
		<th>Bạn chơi được các điệu thức nào</th>
		<th>Khả năng cảm âm - cảm nhạc của bạn</th>
		<th>File nhạc của học viên</th>
		<th>Chấm điểm cho học viên này</th>
	</tr>';
	while($row = mysqli_fetch_assoc($result)){
			$str = (string)$row['accountid'];
			$str2 = (string)$row['topicid'];
			$link = "http://localhost/Unisole/views/PointKeyboard.php?a=".$str."&&t=".$str2;
			if(empty($row['question10'])){
				$link2 = "#";
			}else{
				$link2 = "http://localhost/Unisole/Controller-client/".$row['question10'];
			}
			echo "<tr>";
			echo "<td>";
			echo $row['question1'];
			echo "</td>";
			echo "<td>";
			echo $row['question2'];
			echo "</td>";
			echo "<td>";
			echo $row['question3'];
			echo "</td>";
			echo "<td>";
			echo $row['question4'];
			echo "</td>";
			echo "<td>";
			echo $row['question5'];
			echo "</td>";
			echo "<td>";
			echo $row['question6'];
			echo "</td>";
			echo "<td>";
			echo $row['question7'];
			echo "</td>";
			echo "<td>";
			echo $row['question8'];
			echo "</td>";
			echo "<td>";
			echo $row['question9'];
			echo "</td>";
			echo '<td class="eye">';
			echo '<a href="'.$link2.'" target="blank"><i class="far fa-eye"></i></a>';
			echo "</td>";
			echo '<td class="pencil">';
			echo '<a href="'.$link.'" target="blank"><i class="fas fa-paint-brush"></i></a>';
			echo "</td>";
			echo "</tr>";
	}
	echo "</table>";

?>

