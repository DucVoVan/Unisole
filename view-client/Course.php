<?php 
	session_start();	
	require("../Model-client/Course.php");
	require("../Model-client/Course-registered.php");
	$c = new Course();
	$ci = $c->getCourseInfo($_GET['id']); // Trả về dữ liệu khóa học
	$title_header = $ci['name'];
	$accountid = $_SESSION['id'];
	$courseid = $ci['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Khóa học về <?php echo $ci['name']; ?></title>
	<meta charset="utf-8">
	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/music-css.css">
	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js"></script>

</head>
<body>
	<?php require_once("../header.php"); ?>
	<article>
		<?php 
			$checkcourse = new CourseRegistered();
			if($checkcourse->checkCourseRegistered($accountid,$courseid)){
				// Nếu khóa học đã được đăng kí, hiển thị nội dung gốc
				echo $ci['content'];
			}else{
				// Nếu người dùng chưa đăng kí khóa học, hiển thị nội dung giới thiệu
				?>
					<article>
						<div>
							<?php echo $ci['content-introduce'] ?>
						</div>
						<button class="btn btn-info register">Đăng kí khóa học này</button>
					</article>
				<?php
			}
		?>
	</article>
	<script type="text/javascript">
		$('.register').click(function(){
			$.ajax({
				url: "http://localhost/Unisole/Controller-client/course-registered.php",
				type: "post",
				data: {
					accountid: <?php echo $accountid; ?>,
					courseid: <?php echo $courseid; ?>
				},
				success: function(data){
					swal({
						title: "Thông báo!",
						text: data,
						type: "info",
						confirmButtonText: 'OK',
					});
					setTimeout("location.reload(true);", 3000);
				}
			});
		});
	</script>
</body>
</html>