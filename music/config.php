<?php
	$mysql_hostname = "localhost";
	$mysql_user = "bandmix";
	$mysql_password = "bandmix";
	$mysql_database = "bandmix";
	$link = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
	or die("Opps some thing went wrong");
	mysql_select_db($mysql_database, $link) or die("Opps some thing went wrong");
?>	