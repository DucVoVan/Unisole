<!DOCTYPE html>
<html>
<head>
	<title>Quản trị trang Unisole</title>
	
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/login-teacher.css">
	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js"></script>
	
</head>

<body>
	<script type="text/javascript">
		function getQueryVariable(variable)
		{
			var query = window.location.search.substring(1);
			var vars = query.split("&");
			for (var i=0;i<vars.length;i++) {
				var pair = vars[i].split("=");
				if(pair[0] == variable){return pair[1];}
			}
		}
		var a = getQueryVariable('fail');
		if(typeof a != 'undefined'){
			swal({
				title: "Thông báo!",
				text: "Bạn nhập sai tên đăng nhập hoặc mật khẩu!",
				type: "error",
				confirmButtonText: 'OK',
				timer: 3000
			});
		}
	</script>
	
	<div class="container">
		
		<div id="login" class="signin-card">
			<div class="logo-image">
				<img src="http://localhost/Unisole/asset/image/logo.png" alt="Logo" title="Logo" width="138">
			</div>
			<h1 class="display1">Unisole Teacher</h1>
			<p class="subhead">Trang giành cho giảng viên Unisole chấm bài</p>
			<form action="http://localhost/Unisole/Controller-client/User_Controller.php" method="POST" class="login-form" role="form">
				<div id="form-login-username" class="form-group">
					<input id="username" class="form-control" name="username" type="text" size="18" alt="login" required />
					<span class="form-highlight"></span>
					<span class="form-bar"></span>
					<label for="username" class="float-label">Tên đăng nhập</label>
				</div>
				<div id="form-login-password" class="form-group">
					<input id="passwd" class="form-control" name="password" type="password" size="18" alt="password" required>
					<span class="form-highlight"></span>
					<span class="form-bar"></span>
					<label for="password" class="float-label">Mật khẩu</label>
				</div>
				<div>
					<input type="hidden" name="controller" id="controller" value="User_Controller">
					<input type="hidden" name="action" id="action" value="login_teacher">
					<input type="submit" class="btn btn-block btn-info ripple-effect" name="submit_login" value="Đăng Nhập" class="button">
				</div>
			</form>
		</div>
	</div>
</body>
</html>
	