<?php
	include('config/Connection.php');
	session_start();
	if (isset($_POST['addToCart'])) {
		$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
		$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
		$color = mysqli_real_escape_string($conn, $_POST['color']);
		$size = mysqli_real_escape_string($conn, $_POST['size']);
		if (!isset($_COOKIE['visitor_id'])) {
			$cookie_value = uniqid();
			setcookie('visitor_id', $cookie_value, time() + (86400 * 30), "/");
			$visitor_id = $cookie_value;
		}
		else
		{
			$visitor_id = $_COOKIE['visitor_id'];
		}
		$query = "INSERT INTO cart (user_id, product_id, quantity, color, size) VALUES ('$visitor_id', '$product_id', '$quantity', '$color', '$size')";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
?>