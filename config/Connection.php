<?php
	$servername="localhost";
	$name="root";
	$password="";
	$db="virtualdiamondplace";
	$conn = new mysqli($servername, $name, $password, $db);
	if (!$conn) {
		echo "Connection is not established";
	}
?>