<?php
    	session_start();
	include("config.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// username and password sent from Form
		$useremail=$_POST["email"]; //addslashes($_POST['username']);
		$userpass=$_POST["password"]; //addslashes($_POST['password']);
		 
		$sql="SELECT uid FROM user WHERE email='$useremail' and pass='$userpass'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		//$active=$row['active'];
		$count=mysql_num_rows($result);
		 
		 
		// If result matched $useremail and $userpass, table row must be 1 row
		if($count==1)
		{
			/*$usid = session_id();
			$sql="UPDATE user SET sessionId='$usid' WHERE email='$useremail' and pass='$userpass'";
			mysql_query($sql);*/
			//session_register("useremail");
			$_SESSION["is_login"]=true;
			$_SESSION["login_user"]=$useremail;
			$_SESSION["user_id"]=$row["id"];
			header("location: index.php");
		}
		else
		{
			$error="Your Login Email or Password is invalid";
			echo mysql_error();
		}
	}
?>