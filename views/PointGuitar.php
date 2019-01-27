<?php 
	session_start();
	if(!isset($_SESSION['teacher_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=teacher");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chấm điểm</title>
	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/jquery.popupoverlay.js"></script>
	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/pointmusic.css">
	<style type="text/css">
		td,th{
			width: 9%!important;
		}
	</style>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<header>
	<div class="left-header">
		<img src="http://localhost/Unisole/asset/image/logo.png">
	</div>
	<?php 
		$accountid = $_GET['a'];
		require_once("connect.php");
		$sql = "SELECT `fullname` FROM `account` WHERE `id`=$accountid";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
	?>
	<div class="right-header">
		<h2>Chấm điểm cho học viên <p class="name"><?php echo $row['fullname']; ?></p></h2>
		<h3>Chuyên mục Guitar</h3>
	</div>
</header>
<body>

<?php 
	$sql = "SELECT * FROM `teach-guitar` WHERE `accountid`=$accountid";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if(empty($row['question6'])){
		$link2 = "#";
	}else{
		$link2 = "http://localhost/Unisole/Controller-client/".$row['question6'];
	}
	echo '<table><tr>
		<th>Mục đích muốn học chơi guitar</th>
		<th>Bạn thích chơi được dòng nhạc cụ thể nào, hay bài hát cụ thể nào bạn muốn chơi được trong thời gian tới?</th>
		<th>Bạn thích tiếng đàn của mình sẽ hay theo kiểu của ai (band nào) nhất? </th>
		<th>Bạn đã trên 12 tuổi (hoặc kiểm soát ngón tay, có khả năng tự giác học tập tốt như người từ 12 tuổi trở lên) chưa? </th>
		<th>Khả năng đọc bản nhạc của bạn thế nào? </th>
		<th>Khả năng chơi Melody (giai điệu) của bạn thế nào? </th>
		<th>Khả năng chặn hợp âm của bạn thế nào? </th>
		<th>Bạn chơi được các điệu thức nào? </th>
		<th>Khả năng cảm âm- cảm nhạc của bạn? </th>
		<th>File nhạc của học viên</th>
	</tr>';

	echo '<tr><td>'.$row['question1'].'</td><td>'.$row['question2'].'</td><td>'.$row['question3'].'</td><td>'.$row['question4'].'</td><td>'.$row['question5'].'</td><td>'.$row['question7'].'</td><td>'.$row['question8'].'</td><td>'.$row['question9'].'</td><td>'.$row['question10'].'</td><td><a href="'.$link2.'" target="blank"><i class="far fa-eye"></i></a></td></tr></table>';

?>

<div class="mark-point">
	<table>
		<tr>
			<th>STT</th>
			<th>Nội dung chính</th>
			<th style="width: 25%;">Chi tiết</th>
			<th>Số điểm hiện tại</th>
			<th>Số điểm cần đạt</th>
			<th>Ghi chú thêm</th>
		</tr>

		<tr>
			<td>1</td>
			<td rowspan="4">Tay trái</td>
			<td>Khả năng tách và sử dụng các ngón</td>
			<td><input type="number" value="0" min="0" max="10" name="1-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="1-2"></td>
			<td><input type="text" name="1-3"></td>
		</tr>

		<tr>
			<td>2</td>
			<td>Sử dụng các hợp âm căn bản</td>
			<td><input type="number" value="0" min="0" max="10" name="2-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="2-2"></td>
			<td><input type="text" name="2-3"></td>
		</tr>

		<tr>
			<td>3</td>
			<td>Nhấn, nhả thế bấm</td>
			<td><input type="number" value="0" min="0" max="10" name="3-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="3-2"></td>
			<td><input type="text" name="3-3"></td>
		</tr>

		<tr>
			<td>4</td>
			<td>Rung dây</td>
			<td><input type="number" value="0" min="0" max="10" name="4-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="4-2"></td>
			<td><input type="text" name="4-3"></td>
		</tr>

		<tr>
			<td>5</td>
			<td rowspan="4">Tay phải</td>
			<td>Các điệu thức căn bản (Slow rock; Ballad chậm; Ballad nhanh)</td>
			<td><input type="number" value="0" min="0" max="10" name="5-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="5-2"></td>
			<td><input type="text" name="5-3"></td>
		</tr>

		<tr>
			<td>6</td>
			<td>Tỉa (móc)</td>
			<td><input type="number" value="0" min="0" max="10" name="6-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="6-2"></td>
			<td><input type="text" name="6-3"></td>
		</tr>

		<tr>
			<td>7</td>
			<td>Quạt</td>
			<td><input type="number" value="0" min="0" max="10" name="7-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="7-2"></td>
			<td><input type="text" name="7-3"></td>
		</tr>

		<tr>
			<td>8</td>
			<td>Kết hợp (các điệu thức khó)</td>
			<td><input type="number" value="0" min="0" max="10" name="8-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="8-2"></td>
			<td><input type="text" name="8-3"></td>
		</tr>

		<tr>
			<td>9</td>
			<td rowspan="3">Chơi melody</td>
			<td>Tái hiện Melody đơn giản</td>
			<td><input type="number" value="0" min="0" max="10" name="9-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="9-2"></td>
			<td><input type="text" name="9-3"></td>
		</tr>

		<tr>
			<td>10</td>
			<td>Sáng tác melody trên nền nhạc</td>
			<td><input type="number" value="0" min="0" max="10" name="10-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="10-2"></td>
			<td><input type="text" name="10-3"></td>
		</tr>

		<tr>
			<td>11</td>
			<td>Tốc độ đi note</td>
			<td><input type="number" value="0" min="0" max="10" name="11-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="11-2"></td>
			<td><input type="text" name="11-3"></td>
		</tr>

		<tr>
			<td>12</td>
			<td rowspan="3">Đọc bản nhạc</td>
			<td>Đọc note</td>
			<td><input type="number" value="0" min="0" max="10" name="12-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="12-2"></td>
			<td><input type="text" name="12-3"></td>
		</tr>

		<tr>
			<td>13</td>
			<td>Đọc nhịp</td>
			<td><input type="number" value="0" min="0" max="10" name="13-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="13-2"></td>
			<td><input type="text" name="13-3"></td>
		</tr>

		<tr>
			<td>14</td>
			<td>Đọc hợp âm</td>
			<td><input type="number" value="0" min="0" max="10" name="14-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="14-2"></td>
			<td><input type="text" name="14-3"></td>
		</tr>

		<tr>
			<td>15</td>
			<td rowspan="3">Cảm âm</td>
			<td>Phân biệt các điệu thức</td>
			<td><input type="number" value="0" min="0" max="10" name="15-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="15-2"></td>
			<td><input type="text" name="15-3"></td>
		</tr>

		<tr>
			<td>16</td>
			<td>Phân biệt các bậc (I-V; I-III; I-IV…) </td>
			<td><input type="number" value="0" min="0" max="10" name="16-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="16-2"></td>
			<td><input type="text" name="16-3"></td>
		</tr>

		<tr>
			<td>17</td>
			<td>Phân biệt các màu (Trưởng – Thứ; Trưởng -7; Thứ -7; Trưởng 7 – 7; Thứ 7 – 7…)</td>
			<td><input type="number" value="0" min="0" max="10" name="17-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="17-2"></td>
			<td><input type="text" name="17-3"></td>
		</tr>

		<tr>
			<td>18</td>
			<td rowspan="4">Sử dụng công cụ hỗ trợ</td>
			<td>Phần mềm/ thiết bị chỉnh dây đàn</td>
			<td><input type="number" value="0" min="0" max="10" name="18-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="18-2"></td>
			<td><input type="text" name="18-3"></td>
		</tr>

		<tr>
			<td>19</td>
			<td>Phần mềm/ website cung cấp hợp âm</td>
			<td><input type="number" value="0" min="0" max="10" name="19-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="19-2"></td>
			<td><input type="text" name="19-3"></td>
		</tr>

		<tr>
			<td>20</td>
			<td>Sử dụng Capo</td>
			<td><input type="number" value="0" min="0" max="10" name="20-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="20-2"></td>
			<td><input type="text" name="20-3"></td>
		</tr>

		<tr>
			<td>21</td>
			<td>Tư vấn chọn đàn</td>
			<td><input type="number" value="0" min="0" max="10" name="21-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="21-2"></td>
			<td><input type="text" name="21-3"></td>
		</tr>

		<tr>
			<td>22</td>
			<td rowspan="2">Các yêu cầu đặc biệt</td>
			<td>Lỗi khó sửa (lớp học kèm 5 người)</td>
			<td><input type="number" value="0" min="0" max="10" name="22-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="22-2"></td>
			<td><input type="text" name="22-3"></td>
		</tr>

		<tr>
			<td>23</td>
			<td>Học riêng (1 kèm 1)</td>
			<td><input type="number" value="0" min="0" max="10" name="23-1"></td>
			<td><input type="number" value="10" min="0" max="10" name="23-2"></td>
			<td><input type="text" name="23-3"></td>
		</tr>
	</table>
	<button class="btn btn-info mark">Hoàn thành</button>
</div>
	<div id="fade" class="well">
	    
	</div>
<script type="text/javascript">
	function getQueryVariable(variable)
	{
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for (var i=0;i<vars.length;i++) {
		       var pair = vars[i].split("=");
		       if(pair[0] == variable){return pair[1];}
		}
		return(false);
	}
	var a = getQueryVariable('a');
	var t = getQueryVariable('t');
	$('.name').on('click',function(){
		$.ajax({
			url: "http://localhost/Unisole/control-admin-views/InfoAccount.php",
			type: "POST",
			dataType: "text",
			data: {
				id: a
			},
			success: function(data){
				$('#fade').html(data);
				$('#fade').popup({
					transition: 'all 0.3s',
		            autoopen: true,
		            closeelement: '.my_popup_close'
				});
			}
		});

	});
	$('.mark').on('click',function(){
		// document.body.scrollTop là khoảng cách từ vị trí hiện tại tới đầu trang
		// document.documentElement.scrollTop là khoảng cách từ vị trí hiện tại tới đầu trang
		// $("input[name='1-1']").offset().top là khoảng cách từ cái thẻ đến đầu trang
		var count = 0;
		$('input[type="number"]').each(function(){
			if($(this).val()>10){
				$(this).css("border-color","red");
				document.body.scrollTop = $(this).offset().top - 50;
				document.documentElement.scrollTop = $(this).offset().top - 50;
				alert("Điểm bạn nhập vượt quá cho phép! (<= 10)");
				count = 1;
			}
		})
		if(count==0){
			$.ajax({
				url: "http://localhost/Unisole/control-admin-views/AddPointGuitar.php",
				type: "POST",
				dataType: "text",
				data: {
					accountid: a,
					topicid: t,
					p11: $("input[name='1-1']").val(),
					p12: $("input[name='1-2']").val(),
					p13: $("input[name='1-3']").val(),
					p21: $("input[name='2-1']").val(),
					p22: $("input[name='2-2']").val(),
					p23: $("input[name='2-3']").val(),
					p31: $("input[name='3-1']").val(),
					p32: $("input[name='3-2']").val(),
					p33: $("input[name='3-3']").val(),
					p41: $("input[name='4-1']").val(),
					p42: $("input[name='4-2']").val(),
					p43: $("input[name='4-3']").val(),
					p51: $("input[name='5-1']").val(),
					p52: $("input[name='5-2']").val(),
					p53: $("input[name='5-3']").val(),
					p61: $("input[name='6-1']").val(),
					p62: $("input[name='6-2']").val(),
					p63: $("input[name='6-3']").val(),
					p71: $("input[name='7-1']").val(),
					p72: $("input[name='7-2']").val(),
					p73: $("input[name='7-3']").val(),
					p81: $("input[name='8-1']").val(),
					p82: $("input[name='8-2']").val(),
					p83: $("input[name='8-3']").val(),
					p91: $("input[name='9-1']").val(),
					p92: $("input[name='9-2']").val(),
					p93: $("input[name='9-3']").val(),
					p101: $("input[name='10-1']").val(),
					p102: $("input[name='10-2']").val(),
					p103: $("input[name='10-3']").val(),
					p111: $("input[name='11-1']").val(),
					p112: $("input[name='11-2']").val(),
					p113: $("input[name='11-3']").val(),
					p121: $("input[name='12-1']").val(),
					p122: $("input[name='12-2']").val(),
					p123: $("input[name='12-3']").val(),
					p131: $("input[name='13-1']").val(),
					p132: $("input[name='13-2']").val(),
					p133: $("input[name='13-3']").val(),
					p141: $("input[name='14-1']").val(),
					p142: $("input[name='14-2']").val(),
					p143: $("input[name='14-3']").val(),
					p151: $("input[name='15-1']").val(),
					p152: $("input[name='15-2']").val(),
					p153: $("input[name='15-3']").val(),
					p161: $("input[name='16-1']").val(),
					p162: $("input[name='16-2']").val(),
					p163: $("input[name='16-3']").val(),
					p171: $("input[name='17-1']").val(),
					p172: $("input[name='17-2']").val(),
					p173: $("input[name='17-3']").val(),
					p181: $("input[name='18-1']").val(),
					p182: $("input[name='18-2']").val(),
					p183: $("input[name='18-3']").val(),
					p191: $("input[name='19-1']").val(),
					p192: $("input[name='19-2']").val(),
					p193: $("input[name='19-3']").val(),
					p201: $("input[name='20-1']").val(),
					p202: $("input[name='20-2']").val(),
					p203: $("input[name='20-3']").val(),
					p211: $("input[name='21-1']").val(),
					p212: $("input[name='21-2']").val(),
					p213: $("input[name='21-3']").val(),
					p221: $("input[name='22-1']").val(),
					p222: $("input[name='22-2']").val(),
					p223: $("input[name='22-3']").val(),
					p231: $("input[name='23-1']").val(),
					p232: $("input[name='23-2']").val(),
					p233: $("input[name='23-3']").val()
					
				},
				success: function(data){
					$('#fade').html(data);
					$('#fade').popup({
						transition: 'all 0.3s',
			            autoopen: true,
			            
					});
				}
			});
		}
	});
</script>

</body>
</html>


