<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<title>LOGIN</title>
</head>
<body bgcolor="lightblue">

<form method="post", action="#">

		<center>
		<div style="background-color:lightblue;">
		<h1>LOG-IN</h1>
		</div>
		<div>
		<input type="text", name="username", placeholder="Enter username"/><br>
		<input type="password", name="password", placeholder="Enter password"/><br>
		<input type="submit", name="submit", value="Let's Go!"/>
		<a href="#">Home</a>
		</center>
		</div>
</form>

<?php
	$c = oci_connect("ricandid", "yopanda", "localhost/XE");
		if (!$c) {
			$e = oci_error();
			trigger_error('Could not connect to database: ' . $e['message'], E_USER_ERROR);
		}
	
		if (isset($_POST ['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

		$s = oci_parse($c, "select * from users where username='".$username."' AND password='".$password."'");
		$exec = oci_execute($s);
		$fetcharr = oci_fetch_array($s);
		$chk=oci_num_rows($s);
		echo $chk;
		while (($row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS)) != FALSE){
		}


		if ($chk == 0) {
			$_SESSION['token'] = $username;
			echo "<center>YOUR USERNAME AND PASSWORD DO NOT MATCH!</center>";
		} else {	
			header("Location: index.php");
		}
	}

?>
</body>
</html>