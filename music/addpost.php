<?php
	session_id($_GET["s"]);
	session_start();

	$whopost=$_GET["p"];
	$title=$_POST["title"];
	$content=$_POST["content"];
	$musician=$_POST["musician"];
	date_default_timezone_set("Asia/Taipei");
	$date=date("Y-m-d H:i:s");
	$userId=$_SESSION["user_id"];

	if($whopost==1){
		$teamsql="SELECT tid FROM user WHERE uid='$userId'";
		$result=mysql_query($teamsql);
		$row=mysql_fetch_array($result);
		$teamId=$row["tid"];

		$list=implode(",", $musician);
	}
	else
		$list=$musician;

	include("config.php");
	$sql="INSERT INTO post (title, content, uid, musician, tid, p, date)
		VALUES ('$title', '$content', '$userId', '$list', '$teamId', '$whopost', '$date')";
	mysql_query($sql);
	echo "insert seccess!"
	//header("location: index.php");
?>