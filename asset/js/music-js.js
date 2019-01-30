$(function () {
	var files = $("#files");

	$("#fileupload").fileupload({
		url: 'http://localhost/Unisole/Controller-client/uploads-music.php',
		dropZone: '#dropZone',
		dataType: 'json',
		autoUpload: false
	}).on('fileuploadadd', function (e, data) {
// var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
var fileTypeAllowed = /.\.(mp3)$/i;
var fileName = data.originalFiles[0]['name'];
var fileSize = data.originalFiles[0]['size'];

if (!fileTypeAllowed.test(fileName))
	$("#files").html('Chỉ được upload file với định dạng mp3!');
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
		$("input[name='question8']").val(path);
	} else{
		$("#files").fadeIn(5000).html(msg);
	}
}).on('fileuploadprogressall', function(e,data) {
	var progress = parseInt(data.loaded / data.total * 100, 10);
	$("#progress").html("Tiến trình: " + progress + "%");
});
});



$('.11').click(function(){
	$('.12').focus();
});
$('.13').click(function(){
	$('.14').focus();
});
$('.12').focus(function(){
	$('.11').attr("checked","checked");
});
$('.14').focus(function(){
	$('.13').attr("checked","checked");
});
var value1 = "";
var value6 = "";
var value7 = "";
$("input[name='question1']").on('change',function(){
	$('.12').blur(function(){
		var val1 = $('.12').val();
		$('.11').val(val1);
		value1 = $("input[name='question1']:checked").val();
	});
	value1 = $("input[name='question1']:checked").val();
});

$("input[name='question6']").on('change',function(){
	value6 = $("input[name='question6']:checked").val();
});

$("input[name='question7']").on('change',function(){
	$('.14').blur(function(){
		var val2 = $('.14').val();
		$('.13').val(val2);
		value7 = $("input[name='question7']:checked").val();
	});
	value7 = $("input[name='question7']:checked").val();
});
// Countdown
var time = 5;
function countDown(){
	time--;
	gett("container").innerHTML = time;
	if(time == 0){
		window.location = "http://localhost/Unisole/view-client/User.php";
	}
}
function gett(id){
	if(document.getElementById) return document.getElementById(id);
	if(document.all) return document.all.id;
	if(document.layers) return document.layers.id;
	if(window.opera) return window.opera.id;
}
function init(){
	if(gett('container')){
		setInterval(countDown, 1000);
		gett("container").innerHTML = time;
	}
	else{
		setTimeout(init, 50);
	}
}
//endCountdow
function isEmpty(str)
{
	str = str || null;
	return (typeof str == "undefined" || str == null);
}
// Kiểm tra giữ liệu trước khi gửi
$('form').on('submit',function(){
	if (isEmpty(value1)){
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 1!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}	
	else if (isEmpty($('.text-area1').val()))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 2!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty($('.text-area2').val()))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 3!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty($('.text-1').val()))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 4!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (Number($('.text-1').val()) >= 100)
	{
		swal({
			title: "Thông báo!",
			text: "Câu hỏi 4. Bạn chỉ được nhập số nhỏ hơn 100",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value6))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 5!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value7))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 6!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty($("input[name='question8']").val()))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa up file ghi âm!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else{				
		if(confirm("Bạn đã chắc chắn về các lựa chọn của mình! Bấm Ok để hoàn thành!")){
			$.ajax({
				url: "http://localhost/Unisole/Controller-client/TeachmusicCtr.php",
				type: "POST",
				data: {
					question1: value1,
					question2: $('.text-area1').val(),
					question3: $('.text-area2').val(),
					question4: $('.text-1').val(),
					question5: value6,
					question6: value7,
					question7: $("input[name='question8']").val(),
					topicid: $("input[name='topicid']").val()
				},
				success: function(data){
					document.onload = init(); // start countdown
					swal({
						title: data,
						allowOutsideClick: false,
						allowEscapeKey : false,
						showConfirmButton: false,
						html: '<h2>Đang chuyển tới trang cá nhân trong <span id="container"></span> giây!</h2>',
						type: "success",
 					});
					// setTimeout('Redirect()', 10000);
					}
				});
			return false;
		}else{
			return false;
		}
	}

});