<?php
	include('config/Connection.php');
	session_start();
	if (!isset($_SESSION['adminid'])) {
		header("location:admin_login.php");
	}
	else
	{
		$adminid = $_SESSION['adminid'];
	}
	//Update Picture
  if (isset($_POST['updatePicture'])) {
    include('includes/ImageUpload.php');
		$query = "UPDATE admins SET image_path = '$fileDestination' WHERE id = $adminid";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			$_SESSION['successmsg']='Profile Updated Successfully';
      		header("location:admin_profile.php");
          	exit();
		}
		else
		{
			$_SESSION['errormsg'] = 'Profile Updation Failed!';
	        header("location:admin_profile.php");
	        exit();
		}   
	}
	//Update Profile
	elseif (isset($_POST['updateProfile'])) {
		$admin_name = ucwords(mysqli_real_escape_string($conn, $_POST['admin_name']));
		$admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
		$query = "UPDATE admins SET admin_name = '$admin_name', admin_email = '$admin_email' WHERE id = $adminid";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			$_SESSION['successmsg']='Profile Updated Successfully';
      		header("location:admin_profile.php");
          	exit();
		}
		else
		{
			$_SESSION['errormsg'] = 'Profile Updation Failed!';
	        header("location:admin_profile.php");
	        exit();
		} 
	}
	//Update Password
	elseif (isset($_POST['updatePassword'])) {
		$current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
		if ($password != $confirm_password) {
			$_SESSION['errormsg'] = 'Passwords do not match!';
	        header("location:admin_profile.php");
	        exit();
		}
		else
		{
			$sql = "SELECT * FROM admins WHERE id = '$adminid'";
			$runSql = mysqli_query($conn, $sql);
			$info = mysqli_fetch_assoc($runSql);
			$password_check = PASSWORD_VERIFY($current_password, $info['password']);
			if ($password_check == true) {
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$query = "UPDATE admins SET password = '$hashedPassword' WHERE id = $adminid";
				$runQuery = mysqli_query($conn, $query);
				if ($runQuery) {
					$_SESSION['successmsg']='Password Updated Successfully';
		      		header("location:admin_profile.php");
		          	exit();
				}
				else
				{
					$_SESSION['errormsg'] = 'Password Updation Failed!';
			        header("location:admin_profile.php");
			        exit();
				}
			}
			else
			{
				$_SESSION['errormsg'] = 'You have entered a wrong old password!';
		        header("location:admin_profile.php");
		        exit();
			}
		}
	}
?>