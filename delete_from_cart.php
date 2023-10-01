<?php
	include('config/Connection.php');
	if (isset($_GET['delete_id'])) {
		$id = $_GET['delete_id'];
		$query = "DELETE FROM cart WHERE id = '$id'";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
	else
	{
		header("location:cart.php");
	}
?>