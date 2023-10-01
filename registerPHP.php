<?php
session_start();
require('config/Connection.php');
if (isset($_POST['btn_login'])) {
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);
	if (empty($email) || empty($password)) {
		$_SESSION['errormsg'] = 'Please Fill in all the fields';
	    header("location:login.php");
	    exit();
	}
	else
	{
		$query="SELECT id,name,email, password FROM users WHERE email='$email'";
		$runQuery=mysqli_query($conn, $query) or die(mysqli_error($conn));
		$count=mysqli_num_rows($runQuery);
		if ($count<1) {
			$_SESSION['errormsg'] = 'Incorrect Email!';
		    header("location:login.php");
		    exit();
		}
		else
			{
				$row = mysqli_fetch_assoc($runQuery);
				//De-hashing the password
				$hashedPasswordCheck = password_verify($password, $row['password']);
				if ($hashedPasswordCheck == false) {
					$_SESSION['errormsg'] = 'Incorrect Password!';
				    header("location:login.php");
				    exit();
				}
				elseif ($hashedPasswordCheck == true) {
						$_SESSION['userid'] = $row['id'];
						$_SESSION['username'] = $row['name'];
						header("location:Index.php");
				}

			}
		}
}

// Registration Code Goes here
elseif (isset($_POST['btn_register'])) {
	$name=mysqli_real_escape_string($conn, $_POST['name']);
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$address=mysqli_real_escape_string($conn, $_POST['address']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);
	$confirm_password=mysqli_real_escape_string($conn, $_POST['confirm_password']);
	$fileDestination = 'uploads/default-profile-picture.jpg';
	if (empty($name) || empty($email) || empty($address) || empty($password) || empty($confirm_password)) {
		$_SESSION['errormsg'] = 'Please Fill in all the fields';
	    header("location:register.php");
	    exit();
	}
	else{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$_SESSION['errormsg'] = 'Please Enter Correct Name';
		    header("location:register.php");
		    exit();
		}
		else
		{
			if ($password!=$confirm_password) {
				$_SESSION['errormsg'] = 'Passwords do not match!';
			    header("location:register.php");
			    exit();
			}
			else
			{
				$emailcheck = "SELECT * FROM users WHERE email = '$email'";
				$runemailcheck = mysqli_query($conn, $emailcheck);
				$count = mysqli_num_rows($runemailcheck);
				if ($count===0) {
					//Inserting into database
						$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
						$query="INSERT INTO users (name, email, address, password, user_image) VALUES ('$name', '$email', '$address', '$hashedPassword', '$fileDestination')";
						$runQuery=mysqli_query($conn, $query) or die(mysqli_error($conn));
						if(!$runQuery)
						{
							$_SESSION['errormsg'] = 'Account Creation Failed! Please Try again!';
						    header("location:register.php");
						    exit();
						}
						else
						{
							$userid=$conn->insert_id;
							$_SESSION['userid'] = $userid;
							$_SESSION['username'] = $name;
							header("location:index.php");
						}
				}
				else
				{
					$_SESSION['errormsg'] = 'Email Aleardy Exists!';
				    header("location:register.php");
				    exit();
				}
			}
		}
	}	
}
?>