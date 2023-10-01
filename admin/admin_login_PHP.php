<?php
session_start();
require('config/Connection.php');
if (isset($_POST['btn_login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	if (empty($email) || empty($password)) {
		header("location: admin_login.php?error=empty");
		exit();
	} else {
		$query = "SELECT * FROM admins WHERE admin_email='$email'";
		$runQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
		$count = mysqli_num_rows($runQuery);
		if ($count < 1) {
			header("location: login_registration.php?error=incorrectusername");
			exit();
		} else {
			$row = mysqli_fetch_assoc($runQuery);
			// Compare plain text password directly (not recommended)
			if ($password != $row['password']) {
				header("location: login_registration.php?error=incorrectpassword");
				exit();
			} else {
				$_SESSION['adminid'] = $row['id'];
				// You can add additional logic here if needed
				header("location:index.php");
			}
		}
	}
}
?>
