<?php 
            $rd = new RenderCodeTable();
            if($_SESSION['music']==true){
                if(empty($arr_music)){
                    echo "<h3>Bảng điểm Thanh nhạc của bạn đang được chấm</h3>";
                }else{
                    echo '<h2>Bảng điểm Chuyên mục Thanh nhạc</h2>';
                    echo '<table> <tr> <th>STT</th> <th class="1-music" style="width:20%";>Nội dung chính</th> <th class="2-music" style="width:40%;">Chi tiết</th> <th>Số điểm hiện tại</th> <th>Số điểm cần đạt</th> <th class="3-music" style="width:20%;">Ghi chú thêm</th> </tr>';
                    $tc = new TopicChildren(1);
                    $arr_idtopicchild = $tc->getIdTopicChildren();
                    $arr_nametopicchild = $tc->getNameTopicChildren();
                    $arr_start = array(1,4,7,15,22,30);
                    $arr_end = array(3,6,14,21,28,31);
                    for($i=0; $i<count($arr_idtopicchild);$i++){
                        $rd->render($arr_nametopicchild[$i],$arr_idtopicchild[$i],$arr_start[$i],$arr_end[$i],$arr_details_music,$arr_music);
                    }
                    // $rd->render('Hơi',1,3,$arr_details_music,$arr_music);
                    // $rd->render('Thanh quản',4,6,$arr_details_music,$arr_music);
                    // $rd->render('Âm sắc',7,14,$arr_details_music,$arr_music);
                    // $rd->render('Cảm thụ',15,21,$arr_details_music,$arr_music);
                    // $rd->render('Kỹ thuật DB',22,28,$arr_details_music,$arr_music);
                    // $rd->render('Các yêu cầu đặc biệt',30,31,$arr_details_music,$arr_music);
                    echo "</table>";
                }
            }

            if($_SESSION['guitar']==true){//Nếu đã làm bản đánh giá
                if(empty($arr_guitar)){
                    echo "<h3>Bảng điểm Guitar của bạn đang được chấm</h3>";
                }else{
                    echo '<h2>Bảng điểm Chuyên mục Guitar</h2>';
                    echo '<table> <tr> <th>STT</th> <th class="1-guitar" style="width:20%;">Nội dung chính</th> <th class="2-guitar" style="width:40%;">Chi tiết</th> <th>Số điểm hiện tại</th> <th>Số điểm cần đạt</th> <th class="3-guitar" style="width:20%;">Ghi chú thêm</th> </tr>';
                    $tc = new TopicChildren(2);
                    $arr_idtopicchild = $tc->getIdTopicChildren();
                    $arr_nametopicchild = $tc->getNameTopicChildren();
                    $arr_start = array(1,5,9,12,15,18,22);
                    $arr_end = array(4,8,11,14,17,21,23);
                    for($i=0; $i<count($arr_idtopicchild);$i++){
                        $rd->render($arr_nametopicchild[$i],$arr_idtopicchild[$i],$arr_start[$i],$arr_end[$i],$arr_details_guitar,$arr_guitar);
                    }
                    echo "</table>";
                }
            }


            if($_SESSION['keyboard']==true){
                if(empty($arr_keyboard)){
                    echo "<h3>Bảng điểm Keyboard của bạn đang được chấm</h3>";
                }else{
                    echo '<h2>Bảng điểm Chuyên mục Keyboard</h2>';
                    echo '<table> <tr> <th>STT</th> <th class="1-keyboard" style="width:20%;">Nội dung chính</th> <th class="2-keyboard" style="width:40%;">Chi tiết</th> <th>Số điểm hiện tại</th> <th>Số điểm cần đạt</th> <th class="3-keybord" style="width:20%;">Ghi chú thêm</th> </tr>';
                    $tc = new TopicChildren(3);
                    $arr_idtopicchild = $tc->getIdTopicChildren();
                    $arr_nametopicchild = $tc->getNameTopicChildren();
                    $arr_start = array(1,4,6,9,12,15,19);
                    $arr_end = array(3,5,8,11,14,18,20);
                    for($i=0; $i<count($arr_idtopicchild);$i++){
                        $rd->render($arr_nametopicchild[$i],$arr_idtopicchild[$i],$arr_start[$i],$arr_end[$i],$arr_details_keyboard,$arr_keyboard);
                    }
                    // $rd->render('Tay trái',1,3,$arr_details_keyboard,$arr_keyboard);
                    // $rd->render('Tay phải',4,5,$arr_details_keyboard,$arr_keyboard);
                    // $rd->render('Chơi melody',6,8,$arr_details_keyboard,$arr_keyboard);
                    // $rd->render('Đọc bản nhạc',9,11,$arr_details_keyboard,$arr_keyboard);
                    // $rd->render('Cảm âm',12,14,$arr_details_keyboard,$arr_keyboard);
                    // $rd->render('Sử dụng công cụ hỗ trợ',15,18,$arr_details_keyboard,$arr_keyboard);
                    // $rd->render('Các yêu cầu đặc biệt',19,20,$arr_details_keyboard,$arr_keyboard);
                    echo '</table>';
                }
            }
            ?>