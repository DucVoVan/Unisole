<?php 
	session_start();
	// Xác thực người dùng, nếu đúng cho hiển thị trang, nếu ko điều hướng sang 401 và exit()
	if(!isset($_SESSION['id'])){
		header("Location: http://localhost/Unisole/view-client/401.php");
		// exit();
	}
	// true, false xác nhận người dùng đã làm bản đánh giá năng lực này hay chưa
	if($_SESSION['keyboard']==true){
		echo "Bạn đã hoàn thành bản đánh giá năng lực, vui lòng đăng kí và hoàn thành ít nhất một khóa học về keyboard để làm lại bản đánh giá năng lực này";
		exit();
	}
	$title_header = "Bảng khảo sát chủ đề Keyboard";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đánh giá chuyên mục Keyboard</title>
	<meta charset="utf-8">
	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/keyboard-css.css">
	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js"></script>
	
</head>
<body>
	<?php require_once("../header.php"); ?>
	<div class="file-music">
		<label style="margin: 0px;" class="title-file-music">Nếu đã biết chơi guitar 1 ít, bạn hãy ghi âm và gửi lên đây bản chơi tốt nhất của bạn. Đội ngũ giảng viên của chúng tôi sẽ hiểu về năng lực của bạn hơn.</label>

		<div id="dropZone">
			<label class="choose-file"> Thêm tệp
				<input type="file" id="fileupload" name="attachments[]">
			</label>
		</div>
		<div id="files"></div>
		<div id="progress"></div>
	</div>
	<form action="" method="POST" id="myForm">
		<div class="qs-background">
			<label><label class="qs">Câu hỏi 1: </label> Mục đích bạn muốn học chơi Keyboard là để ? <small style="color:red">*</small></label>
			<div>
				<input type="radio" name="question1" value="Đệm hát căn bản vài bài tủ" id="1">
				<label for="1">Đệm hát căn bản vài bài tủ</label>
			</div>
			<div>
				<input type="radio" name="question1" value="Trước mắt là đệm hát cho vui thôi, sau này nếu cảm thấy ổn sẽ đi chuyên nghiệp hơn" id="2">
				<label for="2">Trước mắt là đệm hát cho vui thôi, sau này nếu cảm thấy ổn sẽ đi chuyên nghiệp hơn</label>
			</div>
			<div>
				<input type="radio" name="question1" value="Nhạc công chuyên đệm đàn cho 1 band nhạc acoustic" id="3">
				<label for="3">Nhạc công chuyên đệm đàn cho 1 band nhạc acoustic</label>
			</div>
			<div>
				<input type="radio" name="question1" value="Chuẩn bị cho các cuộc thi sắp đến" id="4">
				<label for="4">Chuẩn bị cho các cuộc thi sắp đến</label>
			</div>
			<div>
				<input type="radio" name="question1" value="" class="11" id="6">
				<label for="6">Lý do khác:</label>
				<div class="effect-area">
					<textarea class="12 effect-1" rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Lý do của bạn ..."></textarea>
					<span class="focus-border"></span>
				</div>
			</div>
		</div>
		<div class="qs-background">
			<label><label class="qs">Câu hỏi 2: </label> Bạn thích chơi được dòng nhạc cụ thể nào, hay bài hát cụ thể nào bạn muốn chơi được trong thời gian tới? <small style="color:red;">*</small></label>
			<!-- <input type="text" name="question2"> -->
			<div class="effect-area">
				<textarea rows="1" cols="100" maxlength="100" class="text-area1 effect-2"  style="resize: none;"></textarea>
				<span class="focus-border"></span>
			</div>
		</div>
		<div class="qs-background">
			<label><label class="qs">Câu hỏi 3: </label> Bạn thích tiếng đàn của mình sẽ hay theo kiểu của ai (band nào) nhất? <small style="color: red;">*</small></label>
			<div class="effect-area">
				<textarea rows="1" cols="100" maxlength="100" class="text-area2 effect-3"  style="resize: none;" placeholder="Chất giọng ca sĩ..."></textarea>
				<span class="focus-border"></span>
			</div>
		</div>

		
		<div class="qs-background">
			<label><label class="qs">Câu hỏi 4: </label> Bạn đã trên 10 tuổi (hoặc kiểm soát ngón tay, có khả năng tự giác học tập tốt như người từ 10 tuổi trở lên) chưa? <small style="color: red;">*</small></label>
			<div>
				<input type="radio" name="question6" value="Rồi" id="7">
				<label for="7">Rồi</label>
			</div>
			<div>
				<input type="radio" name="question6" value="Chưa" id="8">
				<label for="8">Chưa</label>
			</div>
			<div>
				<input type="radio" name="question6" value="" class="13" id="9">
				<label for="9">Lý do khác:</label>
				<div class="effect-area">
					<textarea class="14 effect-1" rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Lý do của bạn ..."></textarea>
					<span class="focus-border"></span>
				</div>
			</div>
		</div>
		<div class="qs-background">
			<label><label class="qs">Câu hỏi 5: </label> Khả năng đọc bản nhạc của bạn thế nào? <small style="color: red;">*</small></label>
			<label class="a">
				<input type="checkbox" name="question7" value="Chưa biết chút nào" id="10">
				<span class="checkmark"></span>
				<label for="10">Chưa biết chút nào</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question7" value="Nhìn và hiểu được ký hiệu các note nhạc" id="11">
				<span class="checkmark"></span>
				<label for="11">Nhìn và hiểu được ký hiệu các note nhạc</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question7" value="Nhìn và hiểu được ký hiệu nhịp, biết được điệu thức của 1 bài" id="12">
				<span class="checkmark"></span>
				<label for="12">Nhìn và hiểu được ký hiệu nhịp, biết được điệu thức của 1 bài</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question7" value="Nhìn vào ký hiệu hợp âm bằng chữ (ví dụ: Cm) và đệm đàn" id="13">
				<span class="checkmark"></span>
				<label for="13">Nhìn vào ký hiệu hợp âm bằng chữ (ví dụ: Cm) và đệm đàn</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question7" value="Nhìn được bản nhạc dành cho keyboard" id="14">
				<span class="checkmark"></span>
				<label for="14">Nhìn được bản nhạc dành cho keyboard</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question7" value="Nhìn được bản hòa tấu chung với các nhạc cụ khác" id="15">
				<span class="checkmark"></span>
				<label for="15">Nhìn được bản hòa tấu chung với các nhạc cụ khác</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question7" value="" class="15" id="16">
				<span class="checkmark"></span>
				<label for="16">Mục khác:</label>
				<div class="effect-area">
					<textarea class="16"  rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Mục khác..."></textarea>
					<span class="focus-border"></span>
				</div>
			</label>
		</div>
		<div class="qs-background">	
			<label><label class="qs">Câu hỏi 6: </label> Khả năng chơi Melody (giai điệu) của bạn thế nào?  <small style="color: red;">*</small></label>
			<label class="a">
				<input type="checkbox" name="question9" value="Chưa biết chút nào" id="17">
				<span class="checkmark"></span>
				<label for="17">Chưa biết chút nào</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question9" value="Biết các note đúng trên đàn (cả note trắng và note đen)" id="18">
				<span class="checkmark"></span>
				<label for="18">Biết các note đúng trên đàn (cả note trắng và note đen)</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question9" value="Nếu bạn biết được một giai điệu nào đó trong đầu, bạn chỉ mất 10 phút để đàn được 1 câu?" id="19">
				<span class="checkmark"></span>
				<label for="19">Nếu bạn biết được một giai điệu nào đó trong đầu, bạn chỉ mất 10 phút để đàn được 1 câu?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question9" value="Bạn có khả năng sáng tạo ra 1 câu ngắn trên nền nhạc?" id="20">
				<span class="checkmark"></span>
				<label for="20">Bạn có khả năng sáng tạo ra 1 câu ngắn trên nền nhạc?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question9" value="" class="17" id="21">
				<span class="checkmark"></span>
				<label for="21">Mục khác:</label>
				<div class="effect-area">
					<textarea class="18"  rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Mục khác..."></textarea>
					<span class="focus-border"></span>
				</div>
			</label>
		</div>
		<div class="qs-background">
			<label><label class="qs">Câu hỏi 7: </label> Khả năng chơi hợp âm của bạn thế nào? <small style="color: red;">*</small></label>
			<label class="a">
				<input type="checkbox" name="question10" value="Chưa biết chút nào" id="22">
				<span class="checkmark"></span>
				<label for="22">Chưa biết chút nào</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question10" value="Biết vài thế bấm căn bản nhưng chưa nhuyễn" id="23">
				<span class="checkmark"></span>
				<label for="23">Biết vài thế bấm căn bản nhưng chưa nhuyễn</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question10" value="Có thể chơi tốt (chuyển nhanh, nhuyễn) các hợp âm căn bản" id="24">
				<span class="checkmark"></span>
				<label for="24">Có thể chơi tốt (chuyển nhanh, nhuyễn) các hợp âm căn bản</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question10" value="Có thể chơi tốt cả các hợp âm khó" id="25">
				<span class="checkmark"></span>
				<label for="25">Có thể chơi tốt cả các hợp âm khó</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question10" value="Bạn đã tự có thể đệm đàn cho chính mình ở 1 bài nào đó?" id="26">
				<span class="checkmark"></span>
				<label for="26">Bạn đã tự có thể đệm đàn cho chính mình ở 1 bài nào đó?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question10" value="Bạn có khả năng đệm đàn cho người khác một số bài dễ nếu đã tập trước" id="27">
				<span class="checkmark"></span>
				<label for="27">Bạn có khả năng đệm đàn cho người khác một số bài dễ nếu đã tập trước</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question10" value="Bạn có khả năng nhìn vào hợp âm và đệm được cho người khác hát luôn?" id="28">
				<span class="checkmark"></span>
				<label for="28">Bạn có khả năng nhìn vào hợp âm và đệm được cho người khác hát luôn?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question10" value="" class="19" id="29">
				<span class="checkmark"></span>
				<label for="29">Mục khác:</label>
				<div class="effect-area">
					<textarea class="20"  rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Mục khác..."></textarea>
					<span class="focus-border"></span>
				</div>
			</label>
		</div>
		<div class="qs-background">	
			<label><label class="qs">Câu hỏi 8: </label> Bạn chơi được các điệu thức nào <small style="color: red;">*</small></label>
			<label class="a">
				<input type="checkbox" name="question11" value="Chưa biết chút nào" id="30">
				<span class="checkmark"></span>
				<label for="30">Chưa biết chút nào</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question11" value="Bạn biết đệm theo điệu Ballad" id="31">
				<span class="checkmark"></span>
				<label for="31">Bạn biết đệm theo điệu Ballad</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question11" value="Bạn biết đệm theo điệu Jazz" id="32">
				<span class="checkmark"></span>
				<label for="32">Bạn biết đệm theo điệu Jazz</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question11" value="Bạn biết đệm theo điệu Valse" id="33">
				<span class="checkmark"></span>
				<label for="33">Bạn biết đệm theo điệu Valse</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question11" value="Bạn biết các điệu thức phức tạp? (dùng cả hai tay)" id="34">
				<span class="checkmark"></span>
				<label for="34">Bạn biết các điệu thức phức tạp? (dùng cả hai tay)</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question11" value="" class="21" id="35">
				<span class="checkmark"></span>
				<label for="35">Mục khác:</label>
				<div class="effect-area">
					<textarea class="22"  rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Mục khác..."></textarea>
					<span class="focus-border"></span>
				</div>
			</label>
		</div>
		<div class="qs-background">
			<label><label class="qs">Câu hỏi 9: </label> Khả năng cảm âm- cảm nhạc của bạn <small style="color: red;">*</small></label>
			<label class="a">
				<input type="checkbox" name="question12" value="Bạn phân biệt (nghe) được 2 note có cao độ khác nhau nửa cung (note trắng và đen cạnh nhau trên phím đàn) chứ?" id="36">
				<span class="checkmark"></span>
				<label for="36">Bạn phân biệt (nghe) được 2 note có cao độ khác nhau nửa cung (note trắng và đen cạnh nhau trên phím đàn) chứ?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question12" value="Bạn phân biệt được các điệu thức khác nhau chứ?" id="37">
				<span class="checkmark"></span>
				<label for="37">Bạn phân biệt được các điệu thức khác nhau chứ?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question12" value="Bạn nghe nhạc nhiều hơn khoảng 0.5 giờ mỗi ngày chứ?" id="38">
				<span class="checkmark"></span>
				<label for="38">Bạn nghe nhạc nhiều hơn khoảng 0.5 giờ mỗi ngày chứ?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question12" value="Bạn có rất thích (hoặc thần tượng) cách chơi của ca sĩ, band nhạc hay nhạc công nào không?" id="39">
				<span class="checkmark"></span>
				<label for="39">Bạn có rất thích (hoặc thần tượng) cách chơi của ca sĩ, band nhạc hay nhạc công nào không?</label>
			</label>
			<label class="a">
				<input type="checkbox" name="question12" value="" class="23" id="40">
				<span class="checkmark"></span>
				<label for="40">Mục khác:</label>
				<div class="effect-area">
					<textarea class="24"  rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Mục khác..."></textarea>
					<span class="focus-border"></span>
				</div>
			</label>
		</div>
			<input type="hidden" name="question8" value="">
			<input type="hidden" name="topicid" value="3">
		</div>
		<div class="submit">
			<input type="submit" name="submit" value="Hoàn thành"  class="btn btn-primary" style="margin-top: 10px;">
		</div>
		
	</form>
		
	<div class="result"></div>
		<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
		<script src="http://localhost/Unisole/asset/js/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="http://localhost/Unisole/asset/js/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="http://localhost/Unisole/asset/js/jquery.fileupload.js" type="text/javascript"></script>
		<script src="http://localhost/Unisole/asset/js/keyboard-js.js" type="text/javascript"></script>
</body>
</html>