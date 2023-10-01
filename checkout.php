<?php
	include('config/Connection.php');
	session_start();
	if (!isset($_SESSION['userid'])) {
		$_SESSION['errormsg'] = 'Please Login First to Checkout!';
	    header("location:cart.php");
	    exit();
	}
	else
	{
		if (isset($_POST['checkout'])) {
			$userid = $_SESSION['userid'];
			$address = mysqli_real_escape_string($conn, $_POST['shippingAddress']);
			$total = mysqli_real_escape_string($conn, $_POST['total']);
			$query = "INSERT INTO orders (user_id, total, address) VALUES ('$userid', '$total', '$address')";
			$runQuery = mysqli_query($conn, $query);
			$order_id = $conn->insert_id;
			$visitor_id = $_COOKIE['visitor_id'];
			$sql = "UPDATE cart SET user_id = '$userid', user_confirmation = '1', order_id = '$order_id' WHERE user_id = '$visitor_id'";
			$runSql = mysqli_query($conn, $sql);
			if ($runSql) {
				$_SESSION['successmsg'] = 'Thank you!<br>We have successfully received your order, <br> We will shortly send you a confirmation email!';
			    header("location:cart.php");
			    exit();
			}
			else
			{
				$_SESSION['errormsg'] = 'Your Order has been failed! Please Try again!';
			    header("location:cart.php");
			    exit();
			}
		}
	}
?>