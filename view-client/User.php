<?php 
session_start();
require("../Model-client/Pointmusic.php");
require("../Model-client/Pointguitar.php");
require("../Model-client/Pointkeyboard.php");
require("../Model-client/TopicChildren.php");
require("../Model-client/Course-registered.php");
require("../Controller-client/RenderCodeTable.php");
        // Xác thực người dùng
if(!isset($_SESSION['id'])){
    Header("Location: http://localhost/Unisole/view-client/404.php");
    exit();
}
if($_SESSION['music']==true||$_SESSION['guitar']==true||$_SESSION['keyboard']==true||$_SESSION['band']==true){

}else{
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
   <script src="http://localhost/Unisole/asset/js/popper.min.js" async></script>
   <script src="http://localhost/Unisole/asset/js/bootstrap.min.js" async></script>
   <script src="http://localhost/Unisole/asset/js/Sweetalert.js" async></script>
   <script src="http://localhost/Unisole/asset/js/socket.io.js"></script>

</head>
<body>
   <div class="container">
    <div class="row">
        <div class="home-left col-xl-3 col-lg-3">
            <div class="site-logo">
                <a href="http://localhost/Unisole/"><img src="http://localhost/Unisole/asset/image/logo.png"></a>
            </div>
            <div class="avatar">
                <img src="http://localhost/Unisole/asset/image/avatar.png">
            </div>
            <div class="advertisement">
                Quảng cáo đặt ở đây
            </div>
            
        </div>

        <div class="home-between col-xl-6 col-lg-6">
            <div class="mark-point">
                <?php include("showMarkPoint.php"); ?>
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

                    <input type="text" value="" value="" id="number" placeholder="Nhập tin nhắn ..."/>
                </div>
            </div>
            <div class="chat-messenger">
                
            </div>
        </div>
    <div class="home-right col-xl-3 col-lg-3">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['fullname']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="http://localhost/Unisole/view-client/updateUser.php">Hồ sơ cá nhân</a>
                <a class="dropdown-item" href="http://localhost/Unisole/view-client/pickcourse.php">Đánh giá năng lực</a>
                <a class="dropdown-item" href="http://localhost/Unisole/view-client/Band.php">Band của bạn</a>
                <a class="dropdown-item" href="http://localhost/Unisole/delete.php">Đăng xuất</a>
            </div>
        </div>
        <div class="Course-registered">
            <h2>Các khóa học đang tham gia</h2>
            <?php 
            $cr = new CourseRegistered();
            $cr->ShowCourseRegistered($_SESSION['id']);
            ?>
            <div class="list-user-online">
                
            </div>
            <script type="text/javascript">
                var socket = io("http://localhost:3000");
                var username = "<?php echo $_SESSION['fullname']; ?>";

                socket.emit("user-name", username);
                socket.on("list-user-online", function(manghienthi){
                    $(".list-user-online").html('');
                    manghienthi.map(function(r){
                        $(".list-user-online").append('<h4 class="user-online">'+r+'</h4>');
                    });

                    $(document).ready(function(){
                        function ignoreSpaces(string) {
                            var temp = "";
                            string = '' + string;
                            splitstring = string.split(" ");
                            for(i = 0; i < splitstring.length; i++)
                                temp += splitstring[i];
                            return temp;
                        }
                        var count = 0;
                        $(".user-online").each(function(){
                            var idd = "<?php echo preg_replace('/\s+/', '', $_SESSION['fullname']); ?>" + ignoreSpaces($(this).text()) + "-" + String(count);
                            count++;
                            var idh = idd + "h5";
                            var chat = idd + "chat";
                            var content_chat = idd + "content_chat";
                            var dem = 0;
                            var mang = [];
                            mang.push(idd);
                            mang.push(idh);
                            mang.push(chat);
                            mang.push(content_chat);
                            mang.push("<?php echo preg_replace('/\s+/', '', $_SESSION['fullname']); ?>");
                            $(this).click(function(){
                                mang.push($(this).text());
                                socket.emit('chat-user',mang);
                                if(dem==0){
                                    $('.chat-messenger').append('<div id="'+idd+'"  style="display:none;"><h5 id="'+idh+'"></h5> <div class="'+content_chat+'"> </div> <input id="'+chat+'" type="text" name="" placeholder="Nhập tin nhắn..."></div>');
                                    $('.chat-messenger > div').css("display","block");
                                    $('#'+idh).text($(this).text());
                                }
                                dem++;
                               
                                $('#'+chat).keypress(function(event){
                                    var keycode = (event.keyCode ? event.keyCode : event.which);
                                    if(keycode == '13'){
                                        socket.emit("content-chat",$(this).val());
                                        $(this).val(''); 
                                    }
                                });
                                // socket.on("server-chat",function(data){
                                //     $('.'+content_chat).append('<p>'+data+'</p>');
                                // });
                            });
                        });
                    });

                });
                
                socket.on("create-box-chat",function(data){
                    var idd = data[0];
                    var idh = data[1];
                    var chat = data[2];
                    var content_chat = data[3];
                    var mang = [];
                    $('.chat-messenger').append('<div id="'+idd+'"  style="display:none;"><h5 id="'+idh+'">'+data[4]+'</h5><div class="'+content_chat+'"> </div> <input id="'+chat+'" type="text" name="" placeholder="Nhập tin nhắn..."></div>');
                    var phong = data[6];
                    $('#'+chat).keypress(function(event){
                        var keycode = (event.keyCode ? event.keyCode : event.which);
                        if(keycode == '13'){
                            mang.push($(this).val());
                            mang.push(content_chat);
                            mang.push(phong);
                            $(this).val('');
                            socket.emit("content-chat2",mang);
                        }
                    });
                });

                socket.on("server-chat",function(data){
                    $('.chat-messenger > div').css("display","block");
                    $('.'+data[1]).append('<p>'+data[0]+'</p>');
                });

                socket.on("server-chat2",function(data){
                    $('.chat-messenger > div').css("display","block");
                    $('.'+data[1]).append('<p>'+data[0]+'</p>');
                });

            </script>
        </div>

    </div>
 </div>
</div>
</body>
</html>


