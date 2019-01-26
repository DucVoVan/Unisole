<?php 
    if(isset($_GET['username'])){
        $username = $_GET['username'];
    }else{
        $username = "";
    }
    if(isset($_GET['f'])){
        $f = $_GET['f'];
    }else{
        $f = false;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/login.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/style-custom.css">
    <script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/Unisole/asset/js/Sweetalert.js"></script>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="home-left col-xl-3 col-lg-3">
                    <div class="site-logo"></div>
                </div>

                <div class="home-between col-xl-6 col-lg-6">
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

                        <input type="text" value="" id="number" placeholder="Nhập tin nhắn ..."/>
                    </div>
                </div>
                
                <div class="home-right col-xl-3 col-lg-3">
                    <div class="login-page">
                        <div class="form">
                            <form class="login-form" action="http://localhost/Unisole/Controller-client/User_Controller.php" method="POST">
                                <input type="text" name="username" id="username" placeholder="Tên đăng nhập" value="<?php echo $username; ?>"><br>
                                <input type="password" name="password" id="password" placeholder="Mật khẩu"><br>
                                <input type="hidden" name="controller" id="controller" value="User_Controller">
                                <input type="hidden" name="action" id="action" value="login">
                                <input type="submit" name="submit_login" value="Đăng Nhập" class="button">
                                <p class="message">Bạn không có tài khoản ?<a href="http://localhost/Unisole/register.html">Tạo một tài khoản</a></p>
                            </form>
                            
                        </div>
                    </div>
                    <?php 
                        if($f){
                        ?>
                        <script type="text/javascript">
                            swal({
                              title: "Thông báo!",
                              text: "Tên đăng nhập hoặc mật khẩu chưa chính xác!",
                              type: "error",
                              confirmButtonText: 'OK',
                              timer: 8000
                            });
                        </script>
                        <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    <script src="http://localhost/Unisole/asset/js/main-home.js"></script>
</body>
</html>
