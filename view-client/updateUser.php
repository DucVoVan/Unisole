<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: http://localhost/Unisole/view-client/404.php");
	}
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang cập nhật thông tin cá nhân</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/updateUser.css">

	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js"></script>
	<script src="http://localhost/Unisole/asset/js/jquery.ui.widget.js" type="text/javascript"></script>
	<script src="http://localhost/Unisole/asset/js/jquery.iframe-transport.js" type="text/javascript"></script>
	<script src="http://localhost/Unisole/asset/js/jquery.fileupload.js" type="text/javascript"></script>
	<script type="text/javascript">
		var usernamefetch = '';
		var emailfetch = '';
		var fullnamefetch = '';
		var phonefetch = '';
		var urlimagefetch = '';
		var urlimage = '';
		$.ajax({
			url: "http://localhost/Unisole/Controller-client/fetchUserCtr.php",
			method: "POST",
			dataType: "json",
			data: {
				id: <?php echo $id; ?>
			},
			success: function(data){
				usernamefetch = data.username;
				emailfetch = data.email;
				fullnamefetch = data.fullname;
				phonefetch = data.phone;
				urlimagefetch = "http://localhost/Unisole/Controller-client/" + data.urlimage;
				urlimage = data.urlimage;

				$('#username').val(usernamefetch);
				$('#email').val(emailfetch);
				$('#fullname').val(fullnamefetch);
				var phone = "0"+phonefetch;
				$('#phone').val(phone);
				$('.image-user').attr('src',urlimagefetch);
			},
			error: function(){
				alert("Có lỗi xảy ra");
			}
		});
	</script>
</head>
<body>
	<?php 
		$title_header = "Thay đổi thông tin hồ sơ cá nhân";
		require("../header.php"); 
	?>
	<div class="updateUser">
		<div class="updateUser1">
			<h1>Cập nhật tài khoản</h1>
			<div class="file-music">
				<div id="dropZone">
					<label class="choose-file"> Thêm ảnh
						<input type="file" id="fileupload" name="attachments[]">
					</label>
				</div>
				<div id="files"></div>
				<div id="progress"></div>
			</div>
			<img class="image-user" src="">
			<form class="updateinfo" action="" method="POST">
				<label>Tên đăng nhập</label>
				<input type="text" name="username" id="username" placeholder="Tên đăng nhập" disabled value="">
				<p class="username"></p>
				<label>Email</label>
				<input type="email" name="email" id="email" placeholder="E-mail" value="">
				<p class="email"></p>
				<label>Số điện thoại</label>
				<input type="text" name="phone" id="phone" placeholder="Số điện thoại" value="">
				<p class="phone"></p>
				<label>Họ và tên</label>
				<input type="text" name="fullname" id="fullname" placeholder="Họ và tên" value="">
				
				<input type="hidden" name="url_image" value="">
				<input type="submit" name="signup_submit" value="Cập nhật">
			</form>
		</div>
		<div class="updateUser2">
			<h1>Thay đổi mật khẩu</h1>
			<form class="updatepassword" action="" method="POST">
				<div style="margin-bottom: 10px;">
					<input type="password" name="passwordchange" id="passwordchange" placeholder="Mật khẩu mới" value="">  <i class="show-eye1 far fa-eye"></i>
				</div>
				<div>
					<input type="password" name="passwordchangecheck" id="passwordchangecheck" placeholder="Nhập lại mật khẩu mới" value="">  <i class="show-eye2 far fa-eye"></i>
				</div>
				<p class="alert-password"></p>
				<input type="submit" name="signup_submit" value="Thay đổi">
			</form>
		</div>
	</div>
	<script type="text/javascript" >
		$('.show-eye1').click(function(){
			if ($('#passwordchange').attr("type") === "password") {
				$('#passwordchange').attr("type","text");
			} else {
				$('#passwordchange').attr("type","password");
			}
		});			

		$('.show-eye2').click(function(){
			if ($('#passwordchangecheck').attr("type") === "password") {
				$('#passwordchangecheck').attr("type","text");
			} else {
				$('#passwordchangecheck').attr("type","password");
			}
		});

		function isEmpty(str)
		{
		    str = str || null;
		    return (typeof str == "undefined" || str == null);
		}
		
		$("#passwordchangecheck").blur(function(){
			if($('#passwordchange').val()!=$('#passwordchangecheck').val()){
				$('.alert-password').html("Mật khẩu không trùng khớp! Yêu cầu phải trùng khớp!");
			}
		});

		$('.updatepassword').submit(function(){
			
			var passwordchange = $('#passwordchange').val();
			var passwordchangecheck = $('#passwordchangecheck').val();
			var patt = /^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/;
			if(isEmpty(passwordchange)){
				swal({
				  title: "Thông báo!",
				  text: "Bạn chưa nhập mật khẩu mới!",
				  type: "error",
				  confirmButtonText: 'OK',
				  timer: 10000
				});
				return false;
			}else if(isEmpty(passwordchangecheck)){
				swal({
				  title: "Thông báo!",
				  text: "Bạn chưa nhập lại mật khẩu mới!",
				  type: "error",
				  confirmButtonText: 'OK',
				  timer: 10000
				});
				return false;
			}else if (!patt.test(passwordchange))
		    {
		        swal({
				  title: "Thông báo!",
				  html: "<p>Mật khẩu bao gồm: </p><p> Cả ký tự chữ cái hoa, thường, chữ số, ký tự đặc biệt, dấu chấm</p><p> Bắt đầu với ký tự in hoa</p><p> Có từ 6 đến 32 ký tự</p><p>Ví dụ: User@123</p>",
				  type: "error",
				  confirmButtonText: 'OK',
				});
				return false;
		    }
			else if(passwordchange!=passwordchangecheck){
				swal({
				  title: "Thông báo!",
				  text: "Mật khẩu không trùng khớp! Yêu cầu phải trùng khớp!",
				  type: "error",
				  confirmButtonText: 'OK',
				  timer: 10000
				});
				return false;
			}
			else{
				$.ajax({
					url: "http://localhost/Unisole/Controller-client/changePassword.php",
					method: "POST",
					data: {
						id: <?php echo $id; ?>,
						passwordchange: passwordchange
					},
					success: function(data){
						if(data=="ok"){
							swal({
								title: "Thông báo!",
								text: "Mật khẩu đã được thay đổi!",
								type: "success",
								confirmButtonText: 'OK',
								timer: 10000
							});
						}else{
							alert(data);
						}
					},
					error: function(){
						alert("Có lỗi xảy ra!");
					}
				});
				return false;
			}
		});
		
		$('form.updateinfo').on('submit',function(){
			var patt = /^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/;
			var phone = /((09|03|07|08|05)+([0-9]{8})\b)/;
			// Bước 1: Lấy giá trị của username và password
		    var username = $('#username').val();
		    var password = $('#password').val();
		 	var email    = $('#email').val();
    		var mobile = $('#phone').val();
		    var username1 = $('.username').html();
			var phone1 = $('.phone').html();
			var email1 = $('.email').html();
		    // Bước 2: Kiểm tra dữ liệu hợp lệ hay không
			if (isEmpty(email))
		    {
		        swal({
				  title: "Thông báo!",
				  text: "Bạn chưa nhập Email!",
				  type: "error",
				  confirmButtonText: 'OK',
				  timer: 10000
				});
				return false;
		    }
		    else if(mobile == ''){
		        swal({
					  title: "Thông báo!",
					  html: "Bạn chưa nhập số điện thoại!",
					  type: "error",
					  confirmButtonText: 'OK',
				});
				return false;
		    }	
		    else if(phone.test(mobile) == false){
		            swal({
					  title: "Thông báo!",
					  html: "Số điện thoại của bạn nhập không đúng định dạng!",
					  type: "error",
					  confirmButtonText: 'OK',
					});
		        return false;
		    }
		    else if($('#email').val()==emailfetch && $('#fullname').val()==fullnamefetch && $('#phone').val()=="0"+phonefetch && $("input[name='url_image']").val()==urlimage){
		    	swal({
					title: "Thông báo!",
					html: "Bạn chưa thay đổi thông tin!",
					type: "error",
					confirmButtonText: 'OK',
				});
		        return false;
		    }
		   	else{
				if(confirm("Bạn đã chắc chắn về các thay đổi của mình! Bấm Ok để hoàn thành!")){
					$.ajax({
						url: "http://localhost/Unisole/Controller-client/updateUserCtr.php",
						method: "POST",
						data: {
							id: <?php echo $id; ?>,
							email: $('#email').val(),
							phone: $('#phone').val(),
							fullname: $('#fullname').val(),
							url: $("input[name='url_image']").val()
						},
						success: function(data){
							if(data=="ok"){
								 swal({
								 	title: "Thông báo!",
								 	html: "Tài khoản của bạn được cập nhật thành công!",
								 	type: "success",
								 	confirmButtonText: 'OK',
								 });
							}else{
								alert(data);
							}
						},
						error: function(){
							alert("Có lỗi xảy ra!");
						}
					});
					return false;
				}else{
					return false;
				}
			}
			});

		$(function() {
			var files = $("#files");

			$("#fileupload").fileupload({
				url: 'http://localhost/Unisole/Controller-client/uploads-image.php',
				dropZone: '#dropZone',
				dataType: 'json',
				autoUpload: false
			}).on('fileuploadadd', function (e, data) {
			// var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
			var fileTypeAllowed = /.\.(jpg|png|gif|jpeg)$/i;
			var fileName = data.originalFiles[0]['name'];
			var fileSize = data.originalFiles[0]['size'];

			if (!fileTypeAllowed.test(fileName))
				$("#files").html('Chỉ được upload file với đuôi định dạng jpg, jpeg, png hoặc gif!');
			// else if (fileSize > 500000)
			//     $("#error").html('Your file is too big! Max allowed size is: 500KB');
			else {
				$("#files").html("");
				data.submit();
			}
		}).on('fileuploaddone', function(e, data) {
			var status = data.jqXHR.responseJSON.status;
			var msg = data.jqXHR.responseJSON.msg;
			if (status == 1) {
				var path = data.jqXHR.responseJSON.path;
				$("#files").fadeIn(3000).append('<p>'+msg+'</p>');
				$("input[name='url_image']").val(path);
			} else{
				$("#files").fadeIn(5000).html(msg);
			}
		}).on('fileuploadprogressall', function(e,data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$("#progress").html("Tiến trình: " + progress + "%");
		});
		});



	</script>
</body>
</html>