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

	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/custom-admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	<script src="http://localhost/Unisole/asset/js/datatables.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/dataTables.bootstrap4.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/jquery.popupoverlay.js"></script>
	<script src="http://localhost/Unisole/asset/js/bootstrap.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/main.js" async></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js" async></script>
</head>
<body>
	<div id="fadeandscale" class="well">
	</div>
	<div id="fade" class="well">
		<form action="http://localhost/Unisole/control-admin-views/add-user.php" method="POST" class="form-add-user" >
			<label class="label-add">Thêm tài khoản mới</label>
			<div>
				<label for="data1">username:</label>
				<input type="text" id="data1"/>
			</div>
			<div>
				<label for="data2">email:</label>
				<input type="email" id="data2"/>
			</div>
			<div>
				<label for="data3">phone:</label>
				<input type="text" id="data3"/>
			</div>
			<div>
				<label for="data4">fullname:</label>
				<input type="text" id="data4"/>
			</div>
			<div>
				<label for="data5">password:</label>
				<input type="password" id="data5"/>
			</div>
			<input type="submit" class="btn btn-info" value="Thêm" />
			<input type="button" class="my_popup_close btn btn-info" value="Đóng" />
		</form>
		<!-- Add an optional button to close the popup -->
	</div>
	<div id="fade2" class="well">
		<form action="http://localhost/Unisole/control-admin-views/add-user-teacher.php" method="POST" name="myForm" class="form-add-user2">
			<label class="label-add">Thêm tài khoản mới</label>
			<div>
				<label for="data6">username:</label>
				<input type="text" id="data6"/>
			</div>
			<div>
				<label for="data7">email:</label>
				<input type="email" id="data7"/>
			</div>
			<div>
				<label for="data8">phone:</label>
				<input type="text" id="data8"/>
			</div>
			<div>
				<label for="data9">fullname:</label>
				<input type="text" id="data9"/>
			</div>
			<div>
				<label for="data10">password:</label>
				<input type="password" id="data10"/>
			</div>
			<input type="submit" class="btn btn-info" value="Thêm" />
			<input type="button" class="my_popup_close2 btn btn-info" value="Đóng" />
		</form>
	</div>
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tạo các chủ đề con</a>
		</li>
		<li class="nav-item">
			<a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Quản lý User</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact1" role="tab" aria-controls="pills-contact" aria-selected="false">Quản lý giảng viên</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Chấm điểm thanh nhạc</a>
		</li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<?php include("AddTopicChildren.php"); ?>
		</div>
		<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			<?php include("ManagerUser.php"); ?>
		</div>
		<div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab">
			<?php include("ManagerUserTeacher.php"); ?>
		</div>
		<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

		</div>
	</div>

</body>
</html>
<script src="http://localhost/Unisole/asset/js/table-user.js"></script>
<script src="http://localhost/Unisole/asset/js/table-user-teacher.js"></script>