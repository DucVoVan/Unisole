$(function(){
	var files = $("#files");

	$("#fileupload").fileupload({
		url: 'http://localhost/Unisole/Controller-client/uploads-band.php',
		dropZone: '#dropZone',
		dataType: 'json',
		autoUpload: false
	}).on('fileuploadadd', function (e, data) {
// var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
var fileTypeAllowed = /.\.(avi|mov|mp4)$/i;
var fileName = data.originalFiles[0]['name'];
var fileSize = data.originalFiles[0]['size'];

if (!fileTypeAllowed.test(fileName))
	$("#files").html('Chỉ được upload file với định dạng avi|mov|mp4!');
else if (fileSize > 20000000)
    $("#error").html('Chỉ được upload file với dung lượng tối đa 20MB');
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
		$("input[name='question0']").val(path);
	} else{
		$("#files").fadeIn(5000).html(msg);
	}
}).on('fileuploadprogressall', function(e,data) {
	var progress = parseInt(data.loaded / data.total * 100, 10);
	$("#progress").html("Tiến trình: " + progress + "%");
});
});



$('.1').click(function(){
	$('.2').focus();
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
var value2 = "";
var value3 = "";
var value4 = "";
var value5 = "";
var value6 = "";
var value7 = "";
var value8 = "";
var value9 = "";
var value10 = "";
var value11 = "";
var value12 = "";
var value13 = "";
var value14 = "";
var value15 = "";
var value16 = "";
var value17 = "";
var value18 = "";
var value19 = "";
var value20 = "";
var value21 = "";
$("input[name='question1']").on('change',function(){
	value6 = $("input[name='question1']:checked").val();
});

$("input[name='question2']").on('change',function(){
	value7 = $("input[name='question2']:checked").val();
});

$("input[name='question3']").on('change',function(){
	value8 = $("input[name='question3']:checked").val();
});

$("input[name='question4']").on('change',function(){
	value9 = $("input[name='question4']:checked").val();
});

$("input[name='question5']").on('change',function(){
	value10 = $("input[name='question5']:checked").val();
});

$("input[name='question6']").on('change',function(){
	value11 = $("input[name='question6']:checked").val();
});

$("input[name='question7']").on('change',function(){
	value12 = $("input[name='question7']:checked").val();
});

$("input[name='question8']").on('change',function(){
	value13 = $("input[name='question8']:checked").val();
});

$("input[name='question9']").on('change',function(){
	value14 = $("input[name='question9']:checked").val();
});

$("input[name='question10']").on('change',function(){
	value15 = $("input[name='question10']:checked").val();
});

$("input[name='question11']").on('change',function(){
	value16 = $("input[name='question11']:checked").val();
});

$("input[name='question12']").on('change',function(){
	value17 = $("input[name='question12']:checked").val();
});


// $("input[name='question6']").on('change',function(){
// 	value6 = $("input[name='question6']:checked").val();
// });

// $("input[name='question7']").on('change',function(){
// 	$('.14').blur(function(){
// 		var val2 = $('.14').val();
// 		$('.13').val(val2);
// 		value7 = $("input[name='question7']:checked").val();
// 	});
// 	value7 = $("input[name='question7']:checked").val();
// });

$('.text-area2').blur(function(){
	value2 = $('.text-area2').val();
});
$('.text-area3').blur(function(){
	value3 = $('.text-area3').val();
});
$('.text-area4').blur(function(){
	value4 = $('.text-area4').val();
});
$('.text-area5').blur(function(){
	value5 = $('.text-area5').val();
});
$('.text-area7').blur(function(){
	value18 = $('.text-area7').val();
});
$('.text-area8').blur(function(){
	value19 = $('.text-area8').val();
});
$('.text-area9').blur(function(){
	value20 = $('.text-area9').val();
});
$('.text-area10').blur(function(){
	value21	 = $('.text-area10').val();
});
var save1 = ""; // Biến được dùng để lưu giá trị value1 khi submit nhiều lần
$('form').on('submit',function(){
	var val1 = $('.2').val();
	$('.1').val(val1);
	$("input[name='questionone']:checked").each(function(){
		value1 += $(this).val() + ".";
	});// Lấy được giá trị value1
	if(save1!=value1){ // so sánh giá trị value1 với save1
		save1 = value1;// Nếu không bằng thì gán value1 vào save1
	}
	value1 = ""; // Gán value1 = rỗng
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

	var link = $("input[name='question0']").val();
	if (isEmpty(link)){
		swal({
			title: "Thông báo!",
			text: "Bạn chưa upload video!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(save1)){
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 1!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}	
	else if (isEmpty(value2))
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
	else if (isEmpty(value3))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 3!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}else if (isEmpty(value4))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 4!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}else if (isEmpty(value5))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 5!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}else if (isEmpty(value6))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Ballad!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}else if (isEmpty(value7))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Pop(nhạc trẻ phổ biến)!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}else if (isEmpty(value8))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Rock!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}else if (isEmpty(value9))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Jazz!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value10))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Funk!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value11))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục R&B!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value12))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Country!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value13))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Nhạc Trữ tình - Bolero!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value14))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Nhạc đỏ (cách mạng)!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value15))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Dân ca!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value16))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Thính phòng!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value17))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa chọn vào mục Dòng nhạc khác!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value18))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 7!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value19))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 8!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value20))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 9!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else if (isEmpty(value21))
	{
		swal({
			title: "Thông báo!",
			text: "Bạn chưa trả lời câu hỏi 10!",
			type: "error",
			confirmButtonText: 'OK',
			timer: 10000
		});
		return false;
	}
	else{
		if(confirm("Bạn đã chắc chắn về các lựa chọn của mình! Bấm Ok để hoàn thành!")){
			$.ajax({
				url: "http://localhost/Unisole/Controller-client/BandCtr.php",
				type: "POST",
				data: {
					question0: link,
					question1: save1,
					question2: value2,
					question3: value3,
					question4: value4,
					question5: value5,
					question6: value6,
					question7: value7,
					question8: value8,
					question9: value9,
					question10: value10,
					question11: value11,
					question12: value12,
					question13: value13,
					question14: value14,
					question15: value15,
					question16: value16,
					question17: value17,
					question18: value18,
					question19: value19,
					question20: value20,
					question21: value21,
				},
				success: function(data){
					if(data=="exits"){
						swal({
							title: "Thông báo!",
							text: "Bạn đã hoàn thành bản đánh giá band trước đó!",
							type: "info",
							confirmButtonText: 'OK',
							timer: 10000
						});
					}else if(data=="ok"){
						swal({
							title: "Thông báo!",
							html: 'Hoàn thành! Vui lòng chờ quản trị viên của chúng tôi xét duyệt! Khi việc xét duyệt thành công, bạn sẽ nhận được thông báo và Band của bạn sẽ được giới thiệu trên trang <a href="http://localhost/Unisole/view-client/Band.php">Band nhạc</a>',
							type: "success",
							confirmButtonText: 'OK',
						});
					}else{
						swal({
							title: "Thông báo!",
							text: data,
							type: "error",
							confirmButtonText: 'OK',
							timer: 10000
						});
					}
				}
			});
			return false;
		}else{
			return false;
		}
	}
});
