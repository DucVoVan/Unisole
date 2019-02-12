<?php 
	session_start();
	// session_destroy();
	unset($_SESSION['id']);
?>
<script src="http://localhost/Unisole/asset/js/socket.io.js"></script>
<script type="text/javascript">
	socket.emit("end");
</script>
<?php
	header("Location: http://localhost/Unisole/");
?>