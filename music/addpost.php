<?php
	session_id($_GET["s"]);
	session_start();
	include("config.php");

	$whopost = $_GET["p"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	date_default_timezone_set("Asia/Taipei");
	$date = date("Y-m-d H:i:s");
	$userId = $_SESSION["user_id"];

	if($whopost == 1){
		$teamsql = "SELECT tid FROM user WHERE uid='$userId'";
		$teamresult = $link->query($teamsql);
		$row = $teamresult->fetch_assoc();
		$teamId = $row["tid"];
	
		$musician = $_POST["musician"];
	}
	else{		
		$teamId = "0";
		$musician = NULL;
	}

	$sql="INSERT INTO post (title, content, uid, musician, tid, p, date)
		VALUES ('$title', '$content', '$userId', '$musician', '$teamId', '$whopost', '$date')";
	$link->query($sql);
	/*echo "<br>title: $title";
	echo "<br>content: $content";
	echo "<br>uid: $userId";
	echo "<br>musician: $musician";
	echo "<br>tid: $teamId";
	echo "<br>p: $whopost";
	echo "<br>date: $date";
	echo $link->connect_error;*/
	header("location: index.php");
?>