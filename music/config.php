<?php
	$servername = "localhost";
	$username = "bandmix";
	$password = "bandmix";
	$dbname = "bandmix";
	$link = new mysqli($servername, $username, $password, $dbname);
	if ($link->connect_error) {
    		die("Connection failed: " . $link->connect_error);
	}
?>	