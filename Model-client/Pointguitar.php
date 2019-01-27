<?php 
	require_once('UserDB.php');
	class PointGuitar extends UserDB{
		private $accountid;
		function __construct($accountid){
			$this->accountid = $accountid;
		}
		function getPointguitar(){
			$sql = 'SELECT * FROM `point-guitar` WHERE accountid = "'.$this->accountid.'"' ;
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
					"23-3" => $row['23-3']
				);
				return $arr;
				// echo "ok";
			}else{
				// echo mysqli_error($conn);
				return $arr_empty;
			}
		}
	}
	if($_SESSION['guitar']==true){
        $pg = new PointGuitar($_SESSION['id']);
        $arr_guitar = $pg->getPointguitar();
        
        $arr_details_guitar = array('','Khả năng tách và sử dụng các ngón','Sử dụng các hợp âm căn bản','Nhấn, nhả thế bấm','Rung dây','Các điệu thức căn bản (Slow rock; Ballad chậm; Ballad nhanh)','Tỉa (móc)','Quạt','Kết hợp (các điệu thức khó)','Tái hiện Melody đơn giản','Sáng tác melody trên nền nhạc','Tốc độ đi note','Đọc note','Đọc nhịp','Đọc hợp âm','Phân biệt các điệu thức','Phân biệt các bậc (I-V; I-III; I-IV…) ','Phân biệt các màu (Trưởng – Thứ; Trưởng -7; Thứ -7; Trưởng 7 – 7; Thứ 7 – 7…)','Phần mềm/ thiết bị chỉnh dây đàn','Phần mềm/ website cung cấp hợp âm','Sử dụng Capo','Tư vấn chọn đàn','Lỗi khó sửa (lớp học kèm 5 người)','Học riêng (1 kèm 1)');
    }
    
?>