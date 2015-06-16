<?php
	include("config.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST["name"];
		$useremail = $_POST["email"];
		$userpass = $_POST["password"];

		$checksql = "SELECT uid FROM user WHERE email='$useremail'";
		$checkresult = $link->query($checksql);

		if($checkresult->num_rows == 0)
		{
			$sql = "INSERT INTO user (name, email, pass, tid, photo) 
				VALUES ('$username', '$useremail', '$userpass', '0', 'img/authors/0.png')";
			$result = $link->query($sql);
			$row = $checkresult->fetch_assoc();

			/*session_start();
			$_SESSION["is_login"] = true;
			$_SESSION["login_user"] = $useremail;
			$_SESSION["user_id"] = $row["uid"];
			$_SESSION["sn"] = session_id();*/
			header("location: index.php");
		}
		else {
			header("location: index.php");
		}
	}
?>