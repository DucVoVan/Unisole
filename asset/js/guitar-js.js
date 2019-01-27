$(function () {
	var files = $("#files");

	$("#fileupload").fileupload({
		url: 'http://localhost/Unisole/Controller-client/uploads-guitar.php',
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
$('.15').click(function(){
	$('.16').focus();
});
$('.17').click(function(){
	$('.18').focus();
});
$('.21').click(function(){
	$('.22').focus();
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
var value8 = "";
var value9 = "";
var value10 = "";
var value11 = "";
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

// $("input[name='question7']").on('click',function(){
// 	$('.14').blur(function(){
// 		var val2 = $('.14').val();
// 		$('.13').val(val2);
// 		value7 = $("input[name='question7']:checked").val();
// 	});
// });
var save7 = ""; // Biến được dùng để lưu giá trị value1 khi submit nhiều lần
var save8 = ""; // Biến được dùng để lưu giá trị value1 khi submit nhiều lần
var save9 = ""; // Biến được dùng để lưu giá trị value1 khi submit nhiều lần
var save10 = ""; // Biến được dùng để lưu giá trị value1 khi submit nhiều lần
var save11 = ""; // Biến được dùng để lưu giá trị value1 khi submit nhiều lần
var checkspace = /^\s+$/;
$('form').on('submit',function(){
	var val2 = $('.14').val();
	$('.13').val(val2);
	$("input[name='question7']:checked").each(function(){
		value7 += $(this).val() + "\n";
	});// Lấy được giá trị value1
	if(save7!=value7){ // so sánh giá trị value1 với save1
		save7 = value7;// Nếu không bằng thì gán value1 vào save1
	}
	value7 = ""; // Gán value1 = rỗng
	
	var val3 = $('.16').val();
	$('.13').val(val3);
	$("input[name='question9']:checked").each(function(){
		value8 += $(this).val() + " ";
	});// Lấy được giá trị value1
	if(save8!=value8){ // so sánh giá trị value1 với save1
		save8 = value8;// Nếu không bằng thì gán value1 vào save1
	}
	value8 = ""; // Gán value1 = rỗng

	var val4 = $('.18').val();
	$('.17').val(val4);
	$("input[name='question10']:checked").each(function(){
		value9 += $(this).val() + " ";
	});// Lấy được giá trị value1
	if(save9!=value9){ // so sánh giá trị value1 với save1
		save9 = value9;// Nếu không bằng thì gán value1 vào save1
	}
	value9 = ""; // Gán value1 = rỗng

	var val5 = $('.20').val();
	$('.19').val(val5);
	$("input[name='question11']:checked").each(function(){
		value10 += $(this).val() + " ";
	});// Lấy được giá trị value1
	if(save10!=value10){ // so sánh giá trị value1 với save1
		save10 = value10;// Nếu không bằng thì gán value1 vào save1
	}
	value10 = ""; // Gán value1 = rỗng
	
	var val6 = $('.22').val();
	$('.21').val(val6);
	$("input[name='question12']:checked").each(function(){
		value11 += $(this).val() + " ";
	});// Lấy được giá trị value1
	if(save11!=value11){ // so sánh giá trị value1 với save1
		save11 = value11;// Nếu không bằng thì gán value1 vào save1
	}
	value11 = ""; // Gán value1 = rỗng
	
// Chạy countdown
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
// End countdown
function isEmpty(str)
{
	str = str || null;
	return (typeof str == "undefined" || str == null);
}
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
}else if (isEmpty(value6))
{
	swal({
		title: "Thông báo!",
		text: "Bạn chưa trả lời câu hỏi 4!",
		type: "error",
		confirmButtonText: 'OK',
		timer: 10000
	});
	return false;
}else if (isEmpty(save7)||checkspace.test(save7))
{
	swal({
		title: "Thông báo!",
		text: "Bạn chưa trả lời câu hỏi 5!",
		type: "error",
		confirmButtonText: 'OK',
		timer: 10000
	});
	return false;
}else if (isEmpty(save8)||checkspace.test(save8))
{
	swal({
		title: "Thông báo!",
		text: "Bạn chưa trả lời câu hỏi 6!",
		type: "error",
		confirmButtonText: 'OK',
		timer: 10000
	});
	return false;
}else if (isEmpty(save9)||checkspace.test(save9))
{
	swal({
		title: "Thông báo!",
		text: "Bạn chưa trả lời câu hỏi 7!",
		type: "error",
		confirmButtonText: 'OK',
		timer: 10000
	});
	return false;
}else if (isEmpty(save10)||checkspace.test(save10))
{
	swal({
		title: "Thông báo!",
		text: "Bạn chưa trả lời câu hỏi 8!",
		type: "error",
		confirmButtonText: 'OK',
		timer: 10000
	});
	return false;
}else if (isEmpty(save11)||checkspace.test(save11))
{
	swal({
		title: "Thông báo!",
		text: "Bạn chưa trả lời câu hỏi 9!",
		type: "error",
		confirmButtonText: 'OK',
		timer: 10000
	});
	return false;
}else{
	if(confirm("Bạn đã chắc chắn về các lựa chọn của mình! Bấm Ok để hoàn thành!")){
		$.ajax({
			url: "http://localhost/Unisole/Controller-client/TeachguitarCtr.php",
			type: "POST",
			data: {
				question1: value1,
				question2: $('.text-area1').val(),
				question3: $('.text-area2').val(),
				question4: value6,
				question5: save7,
				question6: $("input[name='question8']").val(),
				question7: save8,
				question8: save9,
				question9: save10,
				question10: save11,
				topicid: $("input[name='topicid']").val()
				},
				success: function(data){
				document.onload = init(); // start countdown
				swal({
					title: data,
					allowOutsideClick: false,
					allowEscapeKey : false,
					html: '<h2>Đang chuyển tới trang cá nhân trong <span id="container"></span> giây!</h2>',
					type: "success",
					confirmButtonText: 'OK',
				});
				}
				});
						return false;
					}else{
						return false;
					}
				}
});