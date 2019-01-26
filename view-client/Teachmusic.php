<?php 
session_start();
	// Xác thực người dùng, nếu đúng cho hiển thị trang, nếu ko điều hướng sang 401 và exit()
if(!isset($_SESSION['id'])){
	header("Location: http://localhost/Unisole/view-client/401.php");
		// exit();
}
	// true, false xác nhận người dùng đã làm bản đánh giá năng lực này hay chưa
if($_SESSION['music']==true){
	echo "Bạn đã hoàn thành bản đánh giá năng lực, vui lòng đăng kí và hoàn thành ít nhất một khóa học về thanh nhạc để làm lại bản đánh giá năng lực này";
	exit();
}
// Tham số truyền vào file header.php
$title_header = "Bảng khảo sát chủ đề thanh nhạc";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Đánh giá chuyên mục thanh nhạc</title>
	<meta charset="utf-8">
	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/music-css.css">
	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/Sweetalert.js"></script>
</head>
<body>
	<?php require_once("../header.php"); ?>
	<div class="file-music">
		<label class="title-file-music">Ngay lúc này, hãy mở chức năng ghi âm của điện thoại hoặc máy tính lên, bấm ghi âm và hát (không nhạc) một bài hát đầy đủ có đoạn đầu và đoạn điệp khúc, sau đó up file ghi âm đó lên đây, các chuyên gia của chúng tôi sẽ giúp bạn phân tích giọng hát. <small style="color:red">*</small></label>

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
			<label><label class="qs">Câu hỏi 1: </label> Mục đích bạn muốn học hát là để? <small style="color:red">*</small></label>
			<div>
				<input type="radio" name="question1" value="Hát Karaoke với bạn bè" id="1">
				<label for="1">Hát Karaoke với bạn bè (không yêu cầu cao, chỉ cần hát ổn là được)</label>
			</div>
			<div>
				<input type="radio" name="question1" value="Trở thành ca sĩ nổi tiếng" id="2">
				<label for="2">Trở thành ca sĩ nổi tiếng (hiện đã đi hát chuyên nghiệp rồi)</label>
			</div>
			<div>
				<input type="radio" name="question1" value="Trước mắt là hát cho vui thôi, sau này nếu cảm thấy ổn sẽ đi chuyên nghiệp hơn" id="3">
				<label for="3">Trước mắt là hát cho vui thôi, sau này nếu cảm thấy ổn sẽ đi chuyên nghiệp hơn</label>
			</div>
			<div>
				<input type="radio" name="question1" value="Trở thành ca sĩ chuyên nghiệp" id="4">
				<label for="4">Trở thành ca sĩ chuyên nghiệp</label>
			</div>
			<div>
				<input type="radio" name="question1" value="Chuẩn bị cho các cuộc thi ca hát sắp đến" id="5">
				<label for="5">Chuẩn bị cho các cuộc thi ca hát sắp đến</label>
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
			<div>
				<label><label class="qs">Câu hỏi 2: </label> Nếu ngay bây giờ, bạn đang ngồi một mình, cho bạn NGHE nhạc thì bạn sẽ chọn bài hát cụ thể nào? (ghi tên 3 bài hát cụ thể) <small style="color:red;">*</small></label>
				<!-- <input type="text" name="question2"> -->
				<div class="effect-area">
					<textarea rows="3" cols="100" maxlength="300" class="text-area1 effect-2"  style="resize: none;" placeholder="Mỗi bài hát hãy nhập trong 1 dòng..."></textarea>
					<span class="focus-border"></span>
				</div>
			</div>
		</div>
		<div class="qs-background">
			<div>
				<label><label class="qs">Câu hỏi 3: </label> Bạn thích chất giọng của ca sĩ nào nhất (hay cụ thể hơn, hãy ghi thêm trong chất giọng đó, bạn thích ở điểm nào, điểm nào không thích) ? <small style="color: red;">*</small></label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="100" class="text-area2 effect-3"  style="resize: none;" placeholder="Chất giọng ca sĩ..."></textarea>
					<span class="focus-border"></span>
				</div>
			</div>
		</div>
		<div class="qs-background">
			<div>
				<label><label class="qs">Câu hỏi 4: </label> Hãy thử đọc to rõ MỘT HƠI, với tốc độ vừa phải chuỗi câu "1 ông sao sáng, 2 ông sao sáng, 3 ông sao sáng...." xem thử đếm được tối đa bao nhiêu ông sao sáng? <small style="color: red;">*</small>
			</label>
			<div class="effect-area">
				<input type="number" name=""  step="1" class="text-1">
				<span class="focus-border"></span>
			</div>
		</div>
	</div>
	<div class="qs-background">
		<label><label class="qs">Câu hỏi 5: </label> Bạn có thường xuyên (hoặc có đủ khả năng) hét lớn tiếng gọi 1 người bạn ở cách chỗ bạn đang đứng khoảng bao nhiêu mét? <small style="color: red;">*</small></label>
		<div>
			<input type="radio" name="question6" value="Dưới 10 mét" id="7">
			<label for="7">Dưới 10 mét</label>
		</div>
		<div>
			<input type="radio" name="question6" value="Từ 10 đến 20 mét" id="8">
			<label for="8">Từ 10 đến 20 mét</label>
		</div>
		<div>
			<input type="radio" name="question6" value="Trên 20 mét" id="9">
			<label for="9">Trên 20 mét</label>
		</div>
	</div>
	<div class="qs-background">
		<label><label class="qs">Câu hỏi 6: </label> Note cao nhất mà bạn hát THOẢI MÁI là note nào? (kiểm tra bằng cách thử trên nhạc cụ hoặc các App Tuner trên điện thoại) <small style="color: red;">*</small></label>
		<div>
			<input type="radio" name="question7" value="Note Fa 4 đối với nam và Note Fa 5 đối với nữ" id="10">
			<label for="10">Note Fa 4 đối với nam và Note Fa 5 đối với nữ</label>
		</div>
		<div>
			<input type="radio" name="question7" value="Note La 4 đối với nam và Note La 5 đối với nữ" id="11">
			<label for="11">Note La 4 đối với nam và Note La 5 đối với nữ</label>
		</div>
		<div>
			<input type="radio" name="question7" value="Note Đô 5 đối với nam và Note Đô 6 đối với nữ" id="12">
			<label for="12">Note Đô 5 đối với nam và Note Đô 6 đối với nữ</label>
		</div>
		<div>
			<input type="radio" name="question7" value="" class="13" id="13">
			<label for="13">Mục khác:</label>
			<div class="effect-area">
				<textarea class="14"  rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Mục khác..."></textarea>
				<span class="focus-border"></span>
			</div>
		</div>
		<input type="hidden" name="question8" value="">
		<input type="hidden" name="topicid" value="1">
	</div>
	<div class="submit">
		<input type="submit" name="submit" value="Hoàn thành"  class="btn btn-primary" style="margin-top: 10px;">
	</div>
</form>

<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
<script src="http://localhost/Unisole/asset/js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="http://localhost/Unisole/asset/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="http://localhost/Unisole/asset/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="http://localhost/Unisole/asset/js/music-js.js" type="text/javascript"></script>
</body>
</html>