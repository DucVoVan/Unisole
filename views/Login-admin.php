<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form class="login-form" action="http://localhost/Unisole/Controller-client/User_Controller.php" method="POST">
		<input type="text" name="username" id="username" placeholder="Tên đăng nhập" value=""><br>
		<input type="password" name="password" id="password" placeholder="Mật khẩu"><br>
		<input type="hidden" name="controller" id="controller" value="User_Controller">
		<input type="hidden" name="action" id="action" value="login_admin">
		<input type="submit" name="submit_login" value="Đăng Nhập" class="button">
	</form>
</body>
</html>