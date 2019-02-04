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

	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/custom-admin.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/addcoursedetail.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/fontawesome-all.min.css">

	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/datatables.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/dataTables.bootstrap4.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/jquery.popupoverlay.js"></script>
	<script src="http://localhost/Unisole/asset/js/bootstrap.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/main.js" async></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js" async></script>
	<script src="http://localhost/Unisole/views/plugins/ckeditor/ckeditor.js"></script>
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
	<div class="admin">
		<div class="admin-left">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<h6>Xin chào, Admin</h6>
					<a class="add-nav-link nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Tạo các chủ đề con</a>
					<a class="add-nav-link nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Quản lý User</a>
					<a class="add-nav-link nav-link" id="pills-contact-tab" data-toggle="pill" href="#v-pills-contact1" role="tab" aria-controls="v-pills-contact" aria-selected="false">Quản lý giảng viên</a>
					<a class="add-nav-link nav-link" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact2" role="tab" aria-controls="v-pills-contact2" aria-selected="false">Thêm một khóa học mới</a>
			</div>
		</div>
		
		<div class="admin-right">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<?php include("AddTopicChildren.php"); ?>
				</div>
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<?php include("ManagerUser.php"); ?>
				</div>
				<div class="tab-pane fade" id="v-pills-contact1" role="tabpanel" aria-labelledby="v-pills-contact-tab">
					<?php include("ManagerUserTeacher.php"); ?>
				</div>
				<div class="tab-pane fade" id="v-pills-contact2" role="tabpanel" aria-labelledby="v-pills-contact-tab2">
					<?php include("AdminCourse.php"); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src="http://localhost/Unisole/asset/js/table-user.js"></script>
<script src="http://localhost/Unisole/asset/js/table-user-teacher.js"></script>
<script src="http://localhost/Unisole/asset/js/add-course.js"></script>