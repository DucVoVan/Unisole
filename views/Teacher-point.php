<?php 
	session_start();
	if(!isset($_SESSION['teacher_id'])){
		Header("Location: http://localhost/Unisole/views/401.php?t=teacher");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<script src="http://localhost/Unisole/asset/js/jquery-3.3.1.min.js"></script>
	<link rel='stylesheet' id='bootstrap-css-css'  href='http://localhost/Unisole/asset/css/bootstrap.min.css' type='text/css' media='all' />

	<script src="http://localhost/Unisole/asset/js/datatables.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/dataTables.bootstrap4.min.js"></script>

	<link rel="stylesheet" href="http://localhost/Unisole/asset/css/bootstrap-datepicker.css" />
	<script src="http://localhost/Unisole/asset/js/bootstrap-datepicker.js"></script>
	<script src="http://localhost/Unisole/asset/js/jquery.popupoverlay.js"></script>
	<script src="http://localhost/Unisole/asset/js/bootstrap.min.js"></script>
	<script src="http://localhost/Unisole/asset/js/main.js" async></script>
	<link rel="stylesheet" type="text/css" href="http://localhost/Unisole/asset/css/custom-admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
	<div id="fadeandscale" class="well">
    </div>
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Chấm điểm thanh nhạc</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact" aria-selected="false">Contact2</a>
		</li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
			<?php
				include("ManagerMusic.php");
			?>
		</div>
		<div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
	</div>
	
</body>
</html>
<script src="http://localhost/Unisole/asset/js/table-user.js"></script>