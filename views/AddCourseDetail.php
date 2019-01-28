<?php 
	session_start();

	if(!isset($_SESSION['admin_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=admin");
		exit();
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="http://localhost/Unisole/plugins/ckeditor/ckeditor.js"></script>
</head>
<body>
	<h2>Thêm khóa học</h2>
	<form method="POST" action="http://localhost/Unisole/control-admin-views/AddCourseDetail.php">
		<label for="name">Tên khóa học</label>
		<input type="text" name="name" id="name"><br>
		<label for="content-introduce">Nội dung giới thiệu</label></br>
		<textarea class="ckeditor" rows="10" cols="50" name="content-introduce" id="content-introduce"></textarea><br>
		<label for="content">Nội dung chi tiết</label>
		<textarea class="ckeditor" rows="10" cols="50" name="content" id="content"></textarea><br>
		<input type="hidden" name="topicchildrenid" value="<?php echo $_GET['topicchildrenid']; ?>">
		<input type="submit" name="Thêm">
		<p>
			<?php 
			if(isset($_GET['error'])){
				echo "Tên khóa học bị trùng!";
			}
			
			?>
		</p>
	</form>
</body>
</html>