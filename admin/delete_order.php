<?php
	include('config/Connection.php');
	session_start();
	if (isset($_POST['deleteProduct'])) {
		$id = $_POST['product_id'];
		$query = "DELETE FROM orders WHERE id = '$id'";
		$runQuery = mysqli_query($conn, $query);
		$query = "DELETE FROM cart WHERE order_id = '$id'";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			$_SESSION['successmsg'] = "Order has been deleted successfully!";
			header("location:view_orders.php");
		}

	}
	else
	{
		header("location:view_orders.php");
	}
?>