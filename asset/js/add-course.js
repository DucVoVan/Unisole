(function($){
	$('.course-left').on('click','.idchildren',function(){
		$('.course-left .idchildren.active-me').removeClass('active-me');
		$(this).addClass('active-me');
	});

	var topicchildrenid = '';
	$('.idchildren').click(function(){
		topicchildrenid = $(this).attr('data-id');
		$('h5').text($(this).attr('data-name'));
		$("input[name='topicchildrenid']").val(topicchildrenid);
		$.ajax({
			url: "http://localhost/Unisole/control-admin-views/load-course.php",
			type: "POST",
			data: {
				topicchildrenid: $("input[name='topicchildrenid']").val()
			},
			success: function(data){
				$('.list-course').html(data);
			}
		});
		$('.course-right h3').css("display","none");
		$('.course-right .admin-course').fadeIn(600);
	});

	$('.ad-course-button').click(function(){
		$('.list-course').css("display","none");
		$('h5').css("display","none");
		$(this).css("display","none");
		$('.add-course').css("display","block");
	});

	$('.back-course-button').click(function(){
		$('.list-course').css("display","block");
		$.ajax({
			url: "http://localhost/Unisole/control-admin-views/load-course.php",
			type: "POST",
			data: {
				topicchildrenid: topicchildrenid
			},
			success: function(data){
				$('.list-course').html(data);
			}
		});
		$('h5').css("display","block");
		$('.ad-course-button').css("display","block");
		$('.add-course').css("display","none");
		$('.editt-course').css("display","none");
	});
	
	$('form.add-form').submit(function(){
		$.ajax({
			url: "http://localhost/Unisole/control-admin-views/AddCourseDetail.php",
			type: "POST",
			data:{
				topicchildrenid: $("input[name='topicchildrenid']").val(),
				name: $("#name").val(),
				contentintroduce: CKEDITOR.instances.contentintroduce.getData(),
				content: CKEDITOR.instances.content.getData()
			},
			success: function(data){
				alert(data);
				$('.list-course').css("display","block");
				CKEDITOR.instances.contentintroduce.setData(''); // set giá trị trong text area về rỗng
				CKEDITOR.instances.content.setData('');// set giá trị trong text area về rỗng
				$("#name").val('');// set giá trị trong text area về rỗng
				$.ajax({
					url: "http://localhost/Unisole/control-admin-views/load-course.php",
					type: "POST",
					data: {
						topicchildrenid: $("input[name='topicchildrenid']").val()
					},
					success: function(data){
						$('.list-course').html(data);
					}
				});
				$('h5').css("display","block");
				$('.ad-course-button').css("display","block");
				$('.add-course').css("display","none");
			}
		});
		return false;
	});

	$('form.edit-form').submit(function(){
		$.ajax({
			url: "http://localhost/Unisole/control-admin-views/edit-course.php",
			type: "POST",
			data:{
				courseid: $("input[name='course-edit']").val(),
				topicchildrenid: $("input[name='topicchildrenid']").val(),
				nameedit: $("#name-edit").val(),
				contentintroduce: CKEDITOR.instances.contentintroduceedit.getData(),
				content: CKEDITOR.instances.contentedit.getData()
			},
			success: function(data){
				alert(data);
				$('.list-course').css("display","block");
				CKEDITOR.instances.contentintroduce.setData(''); // set giá trị trong text area về rỗng
				CKEDITOR.instances.content.setData('');// set giá trị trong text area về rỗng
				$("#name-edit").val('');// set giá trị trong text area về rỗng
				$.ajax({
					url: "http://localhost/Unisole/control-admin-views/load-course.php",
					type: "POST",
					data: {
						topicchildrenid: $("input[name='topicchildrenid']").val()
					},
					success: function(data){
						$('.list-course').html(data);
					}
				});
				$('h5').css("display","block");
				$('.ad-course-button').css("display","block");
				$('.editt-course').css("display","none");
			}
		});
		return false;
	});
})(jQuery);
