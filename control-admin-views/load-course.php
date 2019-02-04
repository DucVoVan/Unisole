<?php 
	require("../Create-table/connect.php");
	$topicidchildren = $_POST['topicchildrenid'];
	$sql = "SELECT `id`,`name` FROM `course` WHERE `topicidchildren` = '$topicidchildren'";
	$result = mysqli_query($conn,$sql);
	echo '<div class="result" style="display:none;"></div>';
	echo '<table>';
	echo '<tr><th>Tên khóa học</th><th>Sửa</th><th>Xóa</th></tr>';
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$name = $row['name'];
		echo '<tr>';
		echo '<td class="name-course">'.$name.'</td>';
		echo '<td class="edit-course" data-id="'.$id.'" data-name="'.$name.'"><i class="far fa-edit"></i></td>';
		echo '<td class="delete-course" data-id="'.$id.'" data-name="'.$name.'"><i class="far fa-trash-alt"></i></td>';
		echo '</tr>';
	}
	echo '</table>';
?>
<script type="text/javascript">
	$('.delete-course').click(function(){
		var namecourse = $(this).attr("data-name");
		var alert = "Bạn chắc chắn muốn xóa khóa học \""+ namecourse +"\" này chứ?";
		if(confirm(alert)){
			$.ajax({
				url: "http://localhost/Unisole/control-admin-views/delete-course.php",
				type: "POST",
				data: {
					idcourse: $(this).attr('data-id')
				},
				success: function(data){
					var result = $.trim(data);
					if(result == "ok"){
						$.ajax({
							url: "http://localhost/Unisole/control-admin-views/load-course.php",
							type: "POST",
							data: {
								topicchildrenid: <?php echo $topicidchildren; ?>
							},
							success: function(data){
								$('.list-course').html(data);
								var nc = "Xóa khóa học \""+namecourse+"\" thành công!";
								$('.result').html(nc);
								$('.result').fadeIn();
								setTimeout(function(){
									$('.result').fadeOut();
								}, 3000);
							}
						});
					}else{
						alert(result);
					}
				}
			});
		}
	});
	$('.edit-course').click(function(){
		var course = $(this).attr("data-id");
		$("input[name='course-edit']").val(course);
		$.ajax({
			url: "http://localhost/Unisole/control-admin-views/fetch-course.php",
			type: "POST",
			dataType: "json",
			data: {
				idcourse: $("input[name='course-edit']").val()
			},
			success: function(data){
				$("input[name='name-edit']").val(data.name);
				CKEDITOR.instances.contentintroduceedit.setData(data.contentintroduce);
				CKEDITOR.instances.contentedit.setData(data.content);
			},
			error: function(){
				alert("Có lỗi xảy ra");
			}
		});
		$('.list-course').css("display","none");
		$('h5').css("display","none");
		$('.ad-course-button').css("display","none");
		$('.editt-course').css("display","block");
	});
</script>
