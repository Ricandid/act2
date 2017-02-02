<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<title></title>
	<?php echo $_SESSION['token'];?>
</head>
<body>
	<?php
	if (isset($_SESSION['token'])) {
		session_destroy();
		header("Location: login.php");
	}else {
		header("Location: login.php");
	}
	?>
</body>
</html>
