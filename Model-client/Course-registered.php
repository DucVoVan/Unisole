<?php
	require_once('UserDB.php');
	class CourseRegistered extends UserDB{
		public function checkCourse($id){
			$conn  = $this->connect();
			// Truy vấn vào bảng course-registered để xem account đã chọn khóa học nào hay chưa, nếu có trả về true, sai trả về false
			$query = "SELECT * FROM `course-registered` WHERE accountid='$id'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			// echo $id;
			// print_r($row);
			if($row){
				return true;
			}else{
				return false;
			}
		}
		public function register_course_DB($insert, $account_id){
			$conn = $this->connect();
			$query = "";
			$check = 0;
			for($i = 0; $i < count($insert); $i++){
				$query = "INSERT INTO `course-registered` (accountid,courseid) VALUES ('".$account_id."','".$insert[$i]."')";
				$result = mysqli_query($conn, $query);
				if($result){
					$check = $check + 1;
				}
			}
			if($check == count($insert)){
				echo "Đăng kí thành công!";
			}
			mysqli_close($conn);
		}

		public function getCourse($id){
			$conn  = $this->connect();
			// Truy vấn vào bảng course-registered để xem account đã chọn khóa học nào hay chưa, nếu có trả về true, sai trả về false
			$query = "SELECT `courseid` FROM `course-registered` WHERE accountid='$id'";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				$query2 = "SELECT `name` FROM `course` WHERE id='".$row['courseid']."'";
				$result2 = mysqli_query($conn, $query2);
				// printf("Error: %s\n", mysqli_error($conn));
				$row2   = mysqli_fetch_assoc($result2);
				echo $row2['name'];
			}
			
		}

		public function checkCourseRegistered($accountid,$courseid){
			$conn  = $this->connect();
			// Truy vấn vào bảng course-registered để xem account đã chọn khóa học nào hay chưa, nếu có trả về true, sai trả về false
			$query = "SELECT `courseid` FROM `course-registered` WHERE accountid='$accountid'";
			$result = mysqli_query($conn, $query);
			// $row = mysqli_fetch_assoc($result);
			// if(isset($row['courseid'])){
			// 	if($idcourse == $row['courseid']){
			// 		return true;
			// 	}else{
			// 		return false;
			// 	}
			// }
			$check = false;
			if($result->num_rows > 0){
				while ($row = mysqli_fetch_assoc($result)) {
					if($row['courseid']==$courseid){
						$check = true;
					}
				}
				if($check){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		public function ShowCourseRegistered($accountid){
			$conn  = $this->connect();
			// Truy vấn vào bảng course-registered để xem account đã chọn khóa học nào hay chưa, nếu có trả về true, sai trả về false
			$query = "SELECT `courseid` FROM `course-registered` WHERE accountid='$accountid'";
			$result = mysqli_query($conn, $query);
			if($result->num_rows > 0){
				while($row = mysqli_fetch_assoc($result)){
					$courseid = $row['courseid'];
					$query2 = "SELECT `id`,`name` FROM `course` WHERE `id`='$courseid'";
					$result2 = mysqli_query($conn, $query2);
					if($result2->num_rows > 0){
						while($row2 = mysqli_fetch_assoc($result2)){
							$link = 'http://localhost/Unisole/view-client/Course.php?id='.$row2['id'];
							echo '<a href="'.$link.'">'.$row2['name'].'</a><br>';
						}
					}
				}
			}else{
				echo '<p>Bạn chưa tham gia khóa học nào</p>';
			}
		}
	}
	// $run = new CourseRegistered();
	// $run->register_course_DB(8,56);
?>