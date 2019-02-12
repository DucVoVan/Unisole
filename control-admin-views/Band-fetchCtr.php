<?php 
	session_start();
	if(!isset($_SESSION['admin_id'])){
			Header("Location: http://localhost/Unisole/views/401.php?t=admin");
			exit();
	}
	require("../Create-table/connect.php");
	$sql = "SELECT `accountid`,`question2` FROM `band` WHERE `status`=1";
	$result = mysqli_query($conn,$sql);
	echo '<h4>Đã được duyệt</h4>';
	echo '<table>';
	echo '<tr><th>STT</th><th>Tên band nhạc</th></tr>';
	$stt = 1;
	while($row = mysqli_fetch_assoc($result)){
		echo '<tr><td>'.$stt.'</td><td class="band-ok" data-id="'.$row['accountid'].'">'.$row['question2'].'</td></tr>';
		$stt++;
	}
	echo "</table>";
?>
<script type="text/javascript">
	$('.band-ok').click(function(){
			$('.show-band-details').fadeIn(500);
			$('.aprrove-band').append('<button class="btn notok-band">Hủy đăng kí</button>');
			$('.aprrove-band').append('<button class="btn btn-info info2-band">Liên hệ</button>');

			$('.info2-band').click(function(){
				$.ajax({
					url: "http://localhost/Unisole/control-admin-views/infoBand.php",
					method: "POST",
					data: {
						id: $('input[name="accountid"]').val()
					},
					success: function(data){
						swal({
							title: "Thông tin liên hệ",
							html: data,
							type: "info",
							confirmButtonText: 'OK',
							timer: 10000
						});
					}
				});
			});

			$('.notok-band').click(function(){
				$.ajax({
					url: "http://localhost/Unisole/control-admin-views/notapprovedBand.php",
					method: "POST",
					data: {
						id: $('input[name="accountid"]').val()
					},
					success: function(data){
						swal({
							title: "Thông báo!",
							text: data,
							type: "success",
							confirmButtonText: 'OK',
							timer: 10000
						});
						$('.show-band-details').css("display","none");
						$('.ok-band').remove();
						$('.notok-band').remove();
						$('.info2-band').remove();
						$('.info-band').remove();
						$.ajax({
							url: "http://localhost/Unisole/control-admin-views/Band-fetchwaitCtr.php",
							method: "POST",
							success: function(data){
								$('.list-band').html(data);
							}
						});

						$.ajax({
							url: "http://localhost/Unisole/control-admin-views/Band-fetchCtr.php",
							method: "POST",
							success: function(data){
								$('.list-band-ok').html(data);
							}
						});
						$('.list-band').fadeIn(500);
						$('.list-band-ok').fadeIn(500);
					}
				});
			});

			$('.list-band-ok').css("display","none");
			$('.list-band').css("display","none");
			var account_id = $(this).attr("data-id");
			$('input[name="accountid"]').val(account_id);
			$.ajax({
				url: "http://localhost/Unisole/Controller-client/Band-fetchCtr.php",
				method: "POST",
				dataType: "json",
				data: {
					id: account_id
				},
				success: function(data){
					$("input[name='question0']").val(data.question0);
					var src = "http://localhost/Unisole/Controller-client/" + data.question0;
					$('video').attr("src",src);
					var arr1 = [];
					var str1 = data.question1;
					arr1 = str1.split(".");
					$("input[name='questionone']").each(function(){
						var i = 0;
						var check = false;
						for(i; i < arr1.length-1; i++){
							if($(this).val() == arr1[i]){
								$(this).attr("checked","checked");
								check = true;
							}
						}
						if(check==false){
							$(".1").attr("checked","checked");
							$(".2").val(arr1[arr1.length-2]);
						}
					});
					$(".text-area2").val(data.question2);
					var band = "Nhóm nhạc: " + data.question2;
					$(".name-band").text(band);
					$(".text-area3").val(data.question3);
					$(".text-area4").val(data.question4);
					$(".text-area5").val(data.question5);
					$("input[name='question1']").each(function(){
						if($(this).val() == data.question6){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question2']").each(function(){
						if($(this).val() == data.question7){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question3']").each(function(){
						if($(this).val() == data.question8){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question4']").each(function(){
						if($(this).val() == data.question9){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question5']").each(function(){
						if($(this).val() == data.question10){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question6']").each(function(){
						if($(this).val() == data.question11){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question7']").each(function(){
						if($(this).val() == data.question12){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question8']").each(function(){
						if($(this).val() == data.question13){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question9']").each(function(){
						if($(this).val() == data.question14){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question10']").each(function(){
						if($(this).val() == data.question15){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question11']").each(function(){
						if($(this).val() == data.question16){
							$(this).attr("checked","checked");
						}
					});
					$("input[name='question12']").each(function(){
						if($(this).val() == data.question17){
							$(this).attr("checked","checked");
						}
					});
					$(".text-area7").val(data.question18);
					$(".text-area8").val(data.question19);
					$(".text-area9").val(data.question20);
					$(".text-area10").val(data.question21);
				},
				error: function(){
					alert("Có lỗi xảy ra");
				}
			});
		});
</script>