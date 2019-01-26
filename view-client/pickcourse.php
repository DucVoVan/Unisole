<?php 
session_start();
if(!isset($_SESSION['id'])){
	header("Location: http://localhost/Unisole/view-client/404.php");
	exit();
}
if($_SESSION['music']==true){
	$music = "#";
}else{
	$music = "http://localhost/Unisole/view-client/Teachmusic.php";
}
if($_SESSION['guitar']==true){
	$guitar = "#";
}else{
	$guitar = "http://localhost/Unisole/view-client/Teachguitar.php";
}
if($_SESSION['keyboard']==true){
	$keyboard = "#";
}else{
	$keyboard = "http://localhost/Unisole/view-client/Teachkeyboard.php";
}
if($_SESSION['band']==true){
	$band = "#";
}else{
	$band = "http://localhost/Unisole/view-client/Band.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang Giới thiệu khóa học</title>
	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/pickcourse.css" media="all" />
	<link rel="shortcut icon" type="image/png" href="http://localhost/Unisole/asset/image/logo.png"/>
	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js"></script>
	<!-- <script src="http://localhost/Unisole/asset/js/pickcourse.js" async></script> -->
	<script src="http://localhost/Unisole/asset/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="left-header">
			<img src="http://localhost/Unisole/asset/image/logo.png">
		</div>
		<div class="right-header">
			<h2>Trang chọn chủ đề</h2>
		</div>
	</header>
	<div class="select">
		<h2 class="alert-pick">Chào mừng bạn đến với Unisole!</h2>
		<div class="topic">
			<div class="part1">
				<h3>Mời bạn chọn chủ đề các khóa học của chúng tôi</h3>
				<table>
					<tr>
						<th>
							<a class="music" href="<?php echo $music; ?>">Thanh nhạc</a>
						</th>
					</tr>
					<tr>
						<td>
							<a class="guitar" href="<?php echo $guitar; ?>">Guitar</a>
						</td>
					</tr>
					<tr>
						<td>
							<a class="keyboard" href="<?php echo $keyboard; ?>">Keyboard</a>
						</td>
					</tr>
				</table>
			</div>
			<div class="part2">
				<h3>Mời bạn tham gia vào nhóm band nhạc của Unisole</h3>
				<table>
					<tr>
						<th>
							<a class="band" href="<?php echo $band; ?>">Band nhạc</a>
						</th>
					</tr>
				</table>
			</div>
			<div class="part3">
				<h3>Mời bạn tham gia vào nhóm hội chị em của Unisole</h3>
				<table>
					<tr>
						<th>
							<a href="#">Hội chị em</a>
						</th>
					</tr>
				</table>
			</div>
		</div>
		<div class="show">
			
		</div>
		

	</div>
	<script type="text/javascript">
		function isEmpty(str)
		{
			str = str || null;
			return (typeof str == "undefined" || str == null);
		}
		var music = "<?php echo $music; ?>";
		var guitar = "<?php echo $guitar; ?>";
		var keyboard = "<?php echo $keyboard; ?>";
		var band = "<?php echo $band; ?>";
		$('.music').click(function(){
			if (value1=="#"){
				swal({
					title: "Thông báo!",
					text: "Bạn đã hoàn thành bản đánh giá năng lực với chủ đề thanh nhạc!",
					type: "info",
					confirmButtonText: 'OK',
					timer: 10000
				});
			}	
		});
		$('.guitar').click(function(){
			if (guitar=="#"){
				swal({
					title: "Thông báo!",
					text: "Bạn đã hoàn thành bản đánh giá năng lực với chủ đề guitar này!",
					type: "info",
					confirmButtonText: 'OK',
					timer: 10000
				});
			}	
		});
		$('.keyboard').click(function(){
			if (keyboard=="#"){
				swal({
					title: "Thông báo!",
					text: "Bạn đã hoàn thành bản đánh giá năng lực với chủ đề keyboard này!",
					type: "info",
					confirmButtonText: 'OK',
					timer: 10000
				});
			}	
		});
		$('.band').click(function(){
			if (band=="#"){
				swal({
					title: "Thông báo!",
					text: "Bạn đã hoàn thành bản đánh giá năng lực với chủ đề band này!",
					type: "info",
					confirmButtonText: 'OK',
					timer: 10000
				});
			}	
		});
	</script>
</body>
</html>
