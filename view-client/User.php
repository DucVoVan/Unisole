<?php 
session_start();
require("../Model-client/Pointmusic.php");
require("../Model-client/Pointguitar.php");
require("../Model-client/Pointkeyboard.php");
require("../Controller-client/RenderCodeTable.php");
        // Xác thực người dùng
if(!isset($_SESSION['id'])){
    Header("Location: http://localhost/Unisole/view-client/404.php");
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
 <script src="http://localhost/Unisole/asset/js/popper.min.js" async></script>
 <script src="http://localhost/Unisole/asset/js/bootstrap.min.js" async></script>
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
            if(empty($arr_music)){
                echo "<h3>Bảng điểm Thanh nhạc của bạn đang được chấm</h3>";
            }else{
                echo '<h2>Bảng điểm Chuyên mục Thanh nhạc</h2>';
                echo '<table> <tr> <th>STT</th> <th>Nội dung chính</th> <th style="width: 25%;">Chi tiết</th> <th>Số điểm hiện tại</th> <th>Số điểm cần đạt</th> <th>Ghi chú thêm</th> </tr>';
                $rd = new RenderCodeTable();
                $rd->render('Hơi',1,3,$arr_details_music,$arr_music);
                $rd->render('Thanh quản',4,6,$arr_details_music,$arr_music);
                $rd->render('Âm sắc',7,14,$arr_details_music,$arr_music);
                $rd->render('Cảm thụ',15,21,$arr_details_music,$arr_music);
                $rd->render('Kỹ thuật DB',22,28,$arr_details_music,$arr_music);
                $rd->render('Các yêu cầu đặc biệt',30,31,$arr_details_music,$arr_music);
                echo "</table>";
            }

            if(empty($arr_guitar)){
                echo "<h3>Bảng điểm Guitar của bạn đang được chấm</h3>";
            }else{
                echo '<h2>Bảng điểm Chuyên mục Guitar</h2>';
                echo '<table> <tr> <th>STT</th> <th>Nội dung chính</th> <th style="width: 25%;">Chi tiết</th> <th>Số điểm hiện tại</th> <th>Số điểm cần đạt</th> <th>Ghi chú thêm</th> </tr>';
                $rd->render('Tay trái',1,4,$arr_details_guitar,$arr_guitar);
                $rd->render('Tay phải',5,8,$arr_details_guitar,$arr_guitar);
                $rd->render('Chơi melody',9,11,$arr_details_guitar,$arr_guitar);
                $rd->render('Đọc bản nhạc',12,14,$arr_details_guitar,$arr_guitar);
                $rd->render('Cảm âm',15,17,$arr_details_guitar,$arr_guitar);
                $rd->render('Sử dụng công cụ hỗ trợ',18,21,$arr_details_guitar,$arr_guitar);
                $rd->render('Các yêu cầu đặc biệt',22,23,$arr_details_guitar,$arr_guitar);
                echo "</table>";
            }
            if(empty($arr_keyboard)){
                echo "<h3>Bảng điểm Keyboard của bạn đang được chấm</h3>";
            }else{
                echo '<h2>Bảng điểm Chuyên mục Keyboard</h2>';
                echo '<table> <tr> <th>STT</th> <th>Nội dung chính</th> <th style="width: 25%;">Chi tiết</th> <th>Số điểm hiện tại</th> <th>Số điểm cần đạt</th> <th>Ghi chú thêm</th> </tr>';
                $rd->render('Tay trái',1,3,$arr_details_keyboard,$arr_keyboard);
                $rd->render('Tay phải',4,5,$arr_details_keyboard,$arr_keyboard);
                $rd->render('Chơi melody',6,8,$arr_details_keyboard,$arr_keyboard);
                $rd->render('Đọc bản nhạc',9,11,$arr_details_keyboard,$arr_keyboard);
                $rd->render('Cảm âm',12,14,$arr_details_keyboard,$arr_keyboard);
                $rd->render('Sử dụng công cụ hỗ trợ',15,18,$arr_details_keyboard,$arr_keyboard);
                $rd->render('Các yêu cầu đặc biệt',19,20,$arr_details_keyboard,$arr_keyboard);
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

                <input type="text" value="" disabled value="" id="number" placeholder="Nhập tin nhắn ..."/>
            </div>
        </div>
    </div>
    <div class="home-right col-xl-3 col-lg-3">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="http://localhost/Unisole/delete.php">Đăng xuất</a>
            </div>
        </div>

    </div>
</div>
</div>
</body>
</html>


