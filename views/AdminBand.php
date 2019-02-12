	<script type="text/javascript">
		
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
	</script>
	<div class="list-band"></div>
	
	<div class="list-band-ok"></div>

	<div class="show-band-details">
		<button class="btn btn-basic back-band-button"><i class="fas fa-angle-double-left"></i> Quay lại</button>
		<div class="name-band"></div>
			<video controls src=""></video>

			<div class="qs-background">
				<label><label class="qs">Câu hỏi 1: </label> Bạn cung cấp dịch vụ nào?<small style="color: red;">*</small></label>
				<label class="a">
					<input type="checkbox" name="questionone" value="Ca hát" id="1" disabled>
					<span class="checkmark"></span>
					<label for="1">Ca hát</label>
				</label>
				<label class="a">
					<input type="checkbox" name="questionone" value="Guitar đệm hát" id="2" disabled>
					<span class="checkmark"></span>
					<label for="2">Guitar đệm hát</label>
				</label>
				<label class="a">
					<input type="checkbox" name="questionone" value="Guitar độc tấu" id="3" disabled>
					<span class="checkmark"></span>
					<label for="3">Guitar độc tấu</label>
				</label>
				<label class="a">
					<input type="checkbox" name="questionone" value="Piano đệm hát" id="4" disabled>
					<span class="checkmark"></span>
					<label for="4">Piano đệm hát</label>
				</label>
				<label class="a">
					<input type="checkbox" name="questionone" value="Piano độc tấu" id="5" disabled>
					<span class="checkmark"></span>
					<label for="5">Piano độc tấu</label>
				</label>
				<label class="a">
					<input type="checkbox" name="questionone" value="Violin độc tấu" id="6" disabled>
					<span class="checkmark"></span>
					<label for="6">Violin độc tấu</label>
				</label>
				<label class="a">
					<input type="checkbox" name="questionone" value="" class="1" id="7" disabled>
					<span class="checkmark"></span>
					<label for="7">Mục khác:</label>
					<div class="effect-area">
						<textarea class="2"  rows="1" cols="100" maxlength="100" style="resize: none;" placeholder="Mục khác..." disabled></textarea>
						<span class="focus-border"></span>
					</div>
				</label>
			</div>
			<div class="qs-background">
				<label><label class="qs">Câu hỏi 2: </label> Nghệ danh của bạn? <small style="color: red;">*</small></label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="100"  class="text-area2 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>

			<div class="qs-background">
				<label><label class="qs">Câu hỏi 3: </label> Bạn đang sống và làm việc ở quận huyện, thành phố nào?  <small style="color: red;">*</small></label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="100" class="text-area3 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>

			<div class="qs-background">
				<label><label class="qs">Câu hỏi 4: </label> Link Facebook<small style="color: red;">*</small></label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="300" class="text-area4 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>

			<div class="qs-background">
				<label><label class="qs">Câu hỏi 5: </label> Bạn đã từng đoạt giải thưởng nào trong những cuộc thi liên quan đến âm nhạc chưa? (ghi tên giải thưởng cụ thể)<small style="color: red;">*</small></label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="300" class="text-area5 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>
			<div class="qs-background">
				<label class="table"><label class="qs">Câu hỏi 6: </label> Bạn có thể chơi dòng nhạc nào? <small style="color:red">*</small></label>
				<table>
					<tr>
						<th></th>
						<th>Không biết chơi</th>
						<th>Biết chút ít</th>
						<th>Chơi tạm được</th>
						<th>Chơi khá</th>
						<th>Chơi tốt</th>
					</tr>
					<tr>
						<td class="table-header">Ballad</td>
						<td><input type="radio" name="question1" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question1" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question1" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question1" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question1" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Pop(nhạc trẻ phổ biến)</td>
						<td><input type="radio" name="question2" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question2" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question2" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question2" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question2" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Rock</td>
						<td><input type="radio" name="question3" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question3" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question3" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question3" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question3" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Jazz</td>
						<td><input type="radio" name="question4" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question4" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question4" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question4" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question4" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Funk</td>
						<td><input type="radio" name="question5" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question5" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question5" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question5" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question5" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">R&B</td>
						<td><input type="radio" name="question6" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question6" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question6" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question6" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question6" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Country</td>
						<td><input type="radio" name="question7" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question7" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question7" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question7" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question7" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Nhạc Trữ tình - Bolero</td>
						<td><input type="radio" name="question8" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question8" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question8" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question8" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question8" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Nhạc đỏ (cách mạng)</td>
						<td><input type="radio" name="question9" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question9" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question9" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question9" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question9" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Dân ca</td>
						<td><input type="radio" name="question10" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question10" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question10" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question10" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question10" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Thính phòng</td>
						<td><input type="radio" name="question11" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question11" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question11" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question11" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question11" value="Chơi tốt" disabled></td>
					</tr>
					<tr>
						<td class="table-header">Dòng nhạc khác</td>
						<td><input type="radio" name="question12" value="Không biết chơi" disabled></td>
						<td><input type="radio" name="question12" value="Biết chút ít" disabled></td>
						<td><input type="radio" name="question12" value="Chơi tạm được" disabled></td>
						<td><input type="radio" name="question12" value="Chơi khá" disabled></td>
						<td><input type="radio" name="question12" value="Chơi tốt" disabled></td>
					</tr>
				</table>
			</div>

			<div class="qs-background">
				<label><label class="qs">Câu hỏi 7: </label> Bạn đã từng tham gia khóa học nào liên quan đến âm nhạc chưa? (ghi tên khóa học và thời gian cụ thể)<small style="color: red;">*</small></label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="300" class="text-area7 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>

			<div class="qs-background">
				<label><label class="qs">Câu hỏi 8: </label> Đối với Nhạc công đệm hát hoặc độc tấu đơn lẻ, mức thù lao bạn đề xuất là bao nhiêu? (Giả sử rằng nơi biểu diễn cách nơi bạn ở dưới 15km, trong một chương trình quy mô rất ít người, tại quán cafe hoặc phòng trà, nơi công cộng, chơi khoảng 5 bài)</label>
				<div class="effect-area">
					<textarea type="number" rows="1" cols="100" maxlength="100" class="text-area8 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>
			
			<div class="qs-background">
				<label><label class="qs">Câu hỏi 9: </label> Đối với Ca sĩ đơn lẻ (không biết chơi nhạc cụ tự đệm hát), mức thù lao bạn đề xuất là bao nhiêu? (Giả sử rằng nơi biểu diễn cách nơi bạn sống dưới 15km, trong một chương trình quy mô rất ít người, tại quán cafe hoặc phòng trà, nơi công cộng, hát khoảng 5 bài)</label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="100" class="text-area9 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>
			
			<div class="qs-background">
				<label><label class="qs">Câu hỏi 10: </label> Đối với Ca sĩ đơn lẻ (có thể tự đệm hát), mức thù lao bạn đề xuất là bao nhiêu? (Giả sử rằng nơi biểu diễn cách nơi bạn sống dưới 15km, trong một chương trình quy mô rất ít người, tại quán cafe hoặc phòng trà, nơi công cộng, hát khoảng 5 bài)</label>
				<div class="effect-area">
					<textarea rows="1" cols="100" maxlength="100" class="text-area10 effect-3"  style="resize: none;" disabled></textarea>
					<span class="focus-border"></span>
				</div>
			</div>

			<input type="hidden" name="question0" value="">
			<input type="hidden" name="accountid" value="">
			<div class="aprrove-band"></div>
			
	</div>

