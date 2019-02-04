	<?php 
		require("../Create-table/connect.php");
		$sql = "SELECT `id`,`name` FROM topic";
		$result = mysqli_query($conn,$sql);
		echo '<div class="course">';
		echo '<div class="course-left">';
		while($row = mysqli_fetch_assoc($result)){
			$topic = $row['name'];
			echo '<h6>'.$topic.'</h6>';
			$topicid = $row['id'];
			$sql2 = "SELECT `id`,`name` FROM `topic-children` WHERE `topicid` = '$topicid'";
			$result2 = mysqli_query($conn,$sql2);


			while($row2 = mysqli_fetch_assoc($result2)){
				// $link = "http://localhost/Unisole/views/AddCourseDetail.php?topicchildrenid=".$row2['id'];
				// echo '<a href="'.$link.'" target="_blank">'.$row2['name'].'</a><br>';
				$topicchildren = $row2['name'];
				$nametopicchildren = 'Các khóa học về chủ đề ('.$topicchildren.') hiện tại';
				$idtopicchildren = $row2['id'];
				echo '<div class="idchildren" data-id="'.$idtopicchildren.'" data-name="'.$nametopicchildren.'">'.$topicchildren.'</div>';
			}
			echo "<br>";
		}
		echo '</div>';
		echo '<div class="course-right">';
		echo '<h3>Hãy chọn một trong các chủ đề con cột dashboard bên trái</h3>';
		echo '<div class="admin-course"><h5></h5><div class="list-course"></div><button class="btn btn-primary ad-course-button">Thêm khóa học</button><div class="add-course"><button class="btn btn-basic back-course-button"><i class="fas fa-angle-double-left"></i> Quay lại</button><h2>Thêm khóa học</h2><form class="add-form" method="POST" action=""><label for="name">Tên khóa học</label><input type="text" name="name" id="name" placeholder="Nhập tên khóa học vào đây"><br><label for="content-introduce">Nội dung giới thiệu</label></br><textarea class="ckeditor" name="content-introduce" id="contentintroduce"></textarea><br><label for="content">Nội dung chi tiết</label><textarea class="ckeditor" name="content" id="content"></textarea><br><input type="hidden" name="topicchildrenid" value=""><input type="submit" name="Thêm" class="btn btn-primary" value="Thêm"></form></div><div class="editt-course"><button class="btn btn-basic back-course-button"><i class="fas fa-angle-double-left"></i> Quay lại</button><h2>Sửa khóa học</h2><form class="edit-form" method="POST" action=""><label for="name">Tên khóa học</label><input type="text" name="name-edit" id="name-edit"><br><label for="content-introduce-edit">Nội dung giới thiệu</label></br><textarea class="ckeditor" name="content-introduce-edit" id="contentintroduceedit"></textarea><br><label for="content-edit">Nội dung chi tiết</label><textarea class="ckeditor" name="content-edit" id="contentedit"></textarea><br><input type="hidden" name="course-edit" value=""><input type="submit" name="Thêm" class="btn btn-primary" value="Cập nhật"></form></div></div>';
		echo '</div>';
		echo '</div>';
	?>
	
