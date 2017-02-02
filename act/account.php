<?php session_start();
	if(!isset($_SESSION['token'])){
			header("Location: index.php");
}
		?>
	
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> WELCOME <?php echo $_SESSION['token'];?></h1>
<a href="delete_session.php"> LOG_OUT</a>

</body>
</html>