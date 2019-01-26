<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Flashy Error Page a Flat Responsive Widget Template :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Smart Error Page Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- font files -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<!-- /font files -->
	<!-- css files -->
	<link href="http://localhost/Unisole/asset/css/style-404.css" rel="stylesheet" type="text/css" media="all" />
	<!-- /css files -->
	<!-- js files -->

	<!-- /js files -->
	<?php 
		if($_GET['t']=="teacher"){
			$link = "http://localhost/Unisole/views/Login-teacher.php";
		}
		if($_GET['t']=="admin"){
			$link = "http://localhost/Unisole/views/Login-admin.php";
		}
	?>
	<body>
		<div class="container demo-2">
			<div class="content">
				<div id="large-header" class="large-header">
					<h1 class="header-w3ls">Lỗi trang</h1>
					<p class="w3-agileits1">Oops!</p>
					<canvas id="demo-canvas"></canvas>
					<img src="http://localhost/Unisole/asset/image/owl.gif" alt="flashy" class="w3l">
					<h2 class="main-title">401</span></h2>
					<p class="w3-agileits2">Bạn không có quyền truy cập trang này. Vui lòng <a href="<?php echo $link; ?>">quay về trang chủ</a> và đăng nhập.</p>

					<p class="copyright">© 2019 Unisole Error Page.</p>
				</div>
			</div>
		</div>	
		<!-- js files -->
		<script src="http://localhost/Unisole/asset/js/rAF.js"></script>
		<script src="http://localhost/Unisole/asset/js/demo-2.js"></script>
		<!-- /js files -->
	</body>
	</html>