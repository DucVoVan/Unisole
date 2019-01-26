<?php 
session_start();
require("../Model-client/Pointmusic.php");
require("../Controller-client/RenderCodeTable.php");
    // Xác thực người dùng
if(!isset($_SESSION['id'])){
    Header("Location: http://localhost/Unisole/view-client/401.php");
    exit();
}
    if($_SESSION['music']==true){ // Kiểm tra xem người dùng đã làm bảng đánh giá chưa
        // Làm rồi thì hiển thị bảng điểm nếu có và trang cá nhân
        $pm = new PointMusic($_SESSION['id']);
        $arr = $pm->getPointmusic();
        
        $arr_details = array('','Dung tích phổi','Áp suất hơi','Độ ổn định của áp suất hơi','Quãng giọng (Range)','Kỹ thuật ngân rung','Mức thoải mái của cổ với note cao','Khả năng điều chỉnh hơi lên mũi','Khả năng điều chỉnh hơi xuống miệng','Phát âm','Điều chỉnh khoảng vang miệng','Điều chỉnh khoảng vang mũi','Âm sắc quãng trầm','Âm sắc quãng trung','Âm sắc quãng cao','Vị trí âm thanh','Cảm âm giai điệu','Cảm âm nhịp','Cảm nhạc','Tái hiện cảm xúc nội tại','Biểu đạt cảm xúc','Mức độ tập trung (không bị xao lãng)','Giọng pha (mixed voice)','Điều tiết âm lượng','Điều tiết áp suất hơi','Giọng siêu trầm (Vocal Fry)','Hát theo điệu thức (Flow)','Khả năng hát liền tiếng','Khả năng hát nảy tiếng','Sửa lỗi (Khóa “UNLIMIT” : 1 kèm 4)','Sửa lỗi khó trị (Khóa “UNLIMIT +” : 1 kèm 2)','Học riêng (Khóa cao cấp: 1 kèm 1)');
    }else{
        // chưa làm mà truy cập thì chuyển về 401 báo lỗi
        Header("Location: http://localhost/Unisole/view-client/401.php");
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
       <title>Trang cá nhân</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="mobile-web-app-capable" content="yes">
       <meta name="apple-mobile-web-app-capable" content="yes">
       <link rel="stylesheet" id="bootstrap-css-css" href="http://localhost/Unisole/asset/css/bootstrap.min.css" type="text/css" media="all">
       <link rel="stylesheet" id="custom-css-css" href="http://localhost/Unisole/asset/css/style-custom.css" type="text/css" media="all">
       <script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
       <script src="http://localhost/Unisole/asset/js/main-index.js" async></script>
   </head>
   <body>
       <div class="container">
        <div class="row">
            <div class="home-left col-xl-3 col-lg-3">
                <div class="img">click</div>
            </div>

            <div class="home-between col-xl-6 col-lg-6">
              <div class="mark-point">
                    <?php 
                        if(empty($arr)){
                            echo "Bảng điểm của bạn đang được chấm";
                        }else{
                            echo '<table> <tr> <th>STT</th> <th>Nội dung chính</th> <th style="width: 25%;">Chi tiết</th> <th>Số điểm hiện tại</th> <th>Số điểm cần đạt</th> <th>Ghi chú thêm</th> </tr>';
                            $rd = new RenderCodeTable();
                            $rd->render('Hơi',1,3,$arr_details,$arr);
                            $rd->render('Thanh quản',4,6,$arr_details,$arr);
                            $rd->render('Âm sắc',7,14,$arr_details,$arr);
                            $rd->render('Cảm thụ',15,21,$arr_details,$arr);
                            $rd->render('Cảm thụ',22,28,$arr_details,$arr);
                            $rd->render('Cảm thụ',30,31,$arr_details,$arr);
                            echo "</table>";
                        }
                    ?>
                
                
            </div>
            <div class="chatbot-child">
                <div class="chatbot">
                    <div id="result1">

                    </div>

                    <div class="chatbot-title">
                        Chat Bot
                    </div>
                    <div id="messages">
                        <pre>
                            Mời bạn lựa chọn theo các phím chức năng sau: 
                            1.abc
                            2.xyz
                            3.def
                        </pre>
                    </div>

                    <input type="text" value="<?php echo $arr['2-1']; ?>" disabled value="" id="number" placeholder="Nhập tin nhắn ..."/>
                </div>
            </div>
        </div>
        <div class="home-right col-xl-3 col-lg-3">
         <?php 
				// echo "<pre>";
				// print_r($row);
				// echo "</pre>";
				// $check->getCourse($row['id']);
         ?>
     </div>
 </div>
</div>
</body>
</html>


