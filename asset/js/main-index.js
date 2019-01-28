(function($){

	$('#number').keypress(function(event){
	var data = $('#number').val();
	const messages = document.getElementById("messages");
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
		/*
		* Get your messages, we'll just simulate it by appending a new one syncronously.
		*/
			$("#messages").append("<div><p></p></div>");
			$("#messages div p:last").html(data);
		shouldScroll = messages.scrollTop + messages.clientHeight ===   messages.scrollHeight;
		// After getting your messages.
		if (!shouldScroll) {
			messages.scrollTop = messages.scrollHeight;
		} 
	    $.ajax({
	            url : "http://localhost/thanhnhac/chatbot/", // gửi ajax đến file result.php
	            type : "get", // chọn phương thức gửi là get
	            dateType:"text", // dữ liệu trả về dạng text
	            data : { // Danh sách các thuộc tính sẽ gửi đi
	                 number : $('#number').val()
	            },
	            success : function (result){
	                // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	                // đó vào thẻ div có id = result1
	                $('#result1').html(result);
	            }
        	});
    	}
	});

	$('.avatar img').click(function(){
		$(".mark-point").fadeToggle();
		$(".chatbot-child").fadeToggle();
	});
	$('.topicchildren').click(function(){
		$.ajax({
			url: "http://localhost/Unisole/Controller-client/QueryCourseCtr.php",
			type: "POST",
			data: {
				topicidchildren: $(this).attr("data-id"),
				nametopic: $(this).html()
			},
			success: function(data){
				swal({
					title: "Thông báo!",
					html: data,
					type: "info",
					confirmButtonText: 'OK',
				});
			}
		});
	});
})(jQuery);




