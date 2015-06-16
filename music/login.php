<?php
    	session_start();
	include("config.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// username and password sent from Form
		$useremail = $_POST["email"]; //addslashes($_POST['username']);
		$userpass = $_POST["password"]; //addslashes($_POST['password']);
		 
		$sql = "SELECT uid FROM user WHERE email='$useremail' and pass='$userpass'";
		$result = $link->query($sql);
		$count = $result->num_rows;
		 
		// If result matched $useremail and $userpass, table row must be 1 row
		if($count == 1)
		{
			$row = $result->fetch_assoc();
			$_SESSION["is_login"] = true;
			$_SESSION["login_user"] = $useremail;
			$_SESSION["user_id"] = $row["uid"];
			$_SESSION["sn"] = session_id();
			echo '<br>'.$_SESSION["sn"];
			header("location: index.php");
		}
		else
		{
			$error = "Your Login Email or Password is invalid";
			echo $link->connect_error;
		}
	}
?>