<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/header.css">
<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/fontawesome-all.min.css">


<header>
		<div class="left-header">
			<a href="http://localhost/Unisole/"><img src="http://localhost/Unisole/asset/image/logo.png"></a>
		</div>
		<div class="right-header">
			<div class="content-header">
				<h2><?php echo $title_header; ?></h2>
				<?php
					if(isset($redirect_user)){
						if($redirect_user==true){
							echo '<p><a href="">Trang cá nhân <i class="fas fa-angle-double-right"></i></a></p>';
						}
					}
				?>
			<div>
			
		</div>
</header>