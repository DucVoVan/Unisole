<?php 
	session_start();
	// session_destroy();
	unset($_SESSION['id']);
	header("Location: http://localhost/Unisole/");
?>