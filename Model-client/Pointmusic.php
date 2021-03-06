<?php 
	require_once('UserDB.php');
	class PointMusic extends UserDB{
		private $accountid;
		function __construct($accountid){
			$this->accountid = $accountid;
		}
		function getPointmusic(){
			$sql = 'SELECT * FROM `point-music` WHERE accountid = "'.$this->accountid.'"' ;
			$conn = $this->connect();
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$arr_empty = array();
			if(isset($row)){
				$arr = array(
					"1-1" => $row['1-1'],
					"1-2" => $row['1-2'],
					"1-3" => $row['1-3'],
					"2-1" => $row['2-1'],
					"2-2" => $row['2-2'],
					"2-3" => $row['2-3'],
					"3-1" => $row['3-1'],
					"3-2" => $row['3-2'],
					"3-3" => $row['3-3'],
					"4-1" => $row['4-1'],
					"4-2" => $row['4-2'],
					"4-3" => $row['4-3'],
					"5-1" => $row['5-1'],
					"5-2" => $row['5-2'],
					"5-3" => $row['5-3'],
					"6-1" => $row['6-1'],
					"6-2" => $row['6-2'],
					"6-3" => $row['6-3'],
					"7-1" => $row['7-1'],
					"7-2" => $row['7-2'],
					"7-3" => $row['7-3'],
					"8-1" => $row['8-1'],
					"8-2" => $row['8-2'],
					"8-3" => $row['8-3'],
					"9-1" => $row['9-1'],
					"9-2" => $row['9-2'],
					"9-3" => $row['9-3'],
					"10-1" => $row['10-1'],
					"10-2" => $row['10-2'],
					"10-3" => $row['10-3'],
					"11-1" => $row['11-1'],
					"11-2" => $row['11-2'],
					"11-3" => $row['11-3'],
					"12-1" => $row['12-1'],
					"12-2" => $row['12-2'],
					"12-3" => $row['12-3'],
					"13-1" => $row['13-1'],
					"13-2" => $row['13-2'],
					"13-3" => $row['13-3'],
					"14-1" => $row['14-1'],
					"14-2" => $row['14-2'],
					"14-3" => $row['14-3'],
					"15-1" => $row['15-1'],
					"15-2" => $row['15-2'],
					"15-3" => $row['15-3'],
					"16-1" => $row['16-1'],
					"16-2" => $row['16-2'],
					"16-3" => $row['16-3'],
					"17-1" => $row['17-1'],
					"17-2" => $row['17-2'],
					"17-3" => $row['17-3'],
					"18-1" => $row['18-1'],
					"18-2" => $row['18-2'],
					"18-3" => $row['18-3'],
					"19-1" => $row['19-1'],
					"19-2" => $row['19-2'],
					"19-3" => $row['19-3'],
					"20-1" => $row['20-1'],
					"20-2" => $row['20-2'],
					"20-3" => $row['20-3'],
					"21-1" => $row['21-1'],
					"21-2" => $row['21-2'],
					"21-3" => $row['21-3'],
					"22-1" => $row['22-1'],
					"22-2" => $row['22-2'],
					"22-3" => $row['22-3'],
					"23-1" => $row['23-1'],
					"23-2" => $row['23-2'],
					"23-3" => $row['23-3'],
					"24-1" => $row['24-1'],
					"24-2" => $row['24-2'],
					"24-3" => $row['24-3'],
					"25-1" => $row['25-1'],
					"25-2" => $row['25-2'],
					"25-3" => $row['25-3'],
					"26-1" => $row['26-1'],
					"26-2" => $row['26-2'],
					"26-3" => $row['26-3'],
					"27-1" => $row['27-1'],
					"27-2" => $row['27-2'],
					"27-3" => $row['27-3'],
					"28-1" => $row['28-1'],
					"28-2" => $row['28-2'],
					"28-3" => $row['28-3'],
					"29-1" => $row['29-1'],
					"29-2" => $row['29-2'],
					"29-3" => $row['29-3'],
					"30-1" => $row['30-1'],
					"30-2" => $row['30-2'],
					"30-3" => $row['30-3'],
					"31-1" => $row['31-1'],
					"31-2" => $row['31-2'],
					"31-3" => $row['31-3']
				);
				return $arr;
			}else{
				return $arr_empty;
			}
		}
	}
	if($_SESSION['music']==true){ // Kiểm tra xem người dùng đã làm bảng đánh giá chưa
        // Làm rồi thì hiển thị bảng điểm nếu có và trang cá nhân
        $pm = new PointMusic($_SESSION['id']);
        $arr_music = $pm->getPointmusic();
        
        $arr_details_music = array('','Dung tích phổi','Áp suất hơi','Độ ổn định của áp suất hơi','Quãng giọng (Range)','Kỹ thuật ngân rung','Mức thoải mái của cổ với note cao','Khả năng điều chỉnh hơi lên mũi','Khả năng điều chỉnh hơi xuống miệng','Phát âm','Điều chỉnh khoảng vang miệng','Điều chỉnh khoảng vang mũi','Âm sắc quãng trầm','Âm sắc quãng trung','Âm sắc quãng cao','Vị trí âm thanh','Cảm âm giai điệu','Cảm âm nhịp','Cảm nhạc','Tái hiện cảm xúc nội tại','Biểu đạt cảm xúc','Mức độ tập trung (không bị xao lãng)','Giọng pha (mixed voice)','Điều tiết âm lượng','Điều tiết áp suất hơi','Giọng siêu trầm (Vocal Fry)','Hát theo điệu thức (Flow)','Khả năng hát liền tiếng','Khả năng hát nảy tiếng','Sửa lỗi (Khóa “UNLIMIT” : 1 kèm 4)','Sửa lỗi khó trị (Khóa “UNLIMIT +” : 1 kèm 2)','Học riêng (Khóa cao cấp: 1 kèm 1)');
    }
?>