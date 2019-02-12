<?php 
	if(!isset($_SESSION['admin_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=admin");
		exit();
	}
?>
<div class="container box">
	<div class="table-responsive">
		<br />
		<div align="right">
			<button type="button" name="add_teacher" id="add_teacher" class="btn btn-info">Thêm tài khoản mới</button>
		</div>
		<br />
		<div id="alert_message2"></div>
		<table id="user_teacher_data" class="table table-bordered table-striped display">
			<thead>
				<tr>
					<th>username</th>
					<th>email</th>
					<th>phone</th>
					<th>fullname</th>
					<th>delete</th>
				</tr>
			</thead>
		</table>
	</div>
</div>