<?php
	include('config/Connection.php');
	session_start();
        //Add New User
  if (isset($_POST['addUser'])) {
    $name=ucwords(mysqli_real_escape_string($conn, $_POST['name']));
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $address=mysqli_real_escape_string($conn, $_POST['address']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password=mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $fileDestination = 'uploads/default-profile-picture.jpg';
	    if ($password!=$confirm_password) {
	      	$_SESSION['errormsg'] = 'Passwords do not match';
	        header("location:view_users.php");
	        exit();
	    }
	    else
	    {
	      $emailcheck = "SELECT * FROM users WHERE email = '$email'";
	      $runemailcheck = mysqli_query($conn, $emailcheck);
	      $count = mysqli_num_rows($runemailcheck);
	      	if ($count == '0') {
	          //Inserting into database
	          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	          $query="INSERT INTO users (name, email, address, password, user_image) VALUES ('$name', '$email', '$address', '$hashedPassword', '$fileDestination')";
	          	if ($conn->query($query) === TRUE){
	          		$_SESSION['successmsg']='User Account Successfully Created';
	          		header("location:view_users.php");
		          	exit();
		        }
		        else
		        {
		          $_SESSION['errormsg'] = 'This Email is aleardy taken';
		          header("location:view_users.php");
		          exit();
		        }
	      	}
	    }
	}
	//Edit User
	elseif (isset($_POST['editUser'])) {
		$user_id=mysqli_real_escape_string($conn, $_POST['user_id']);
		$name=ucwords(mysqli_real_escape_string($conn, $_POST['name']));
	    $email=mysqli_real_escape_string($conn, $_POST['email']);
	    $address=mysqli_real_escape_string($conn, $_POST['address']);
	    $password=mysqli_real_escape_string($conn, $_POST['password']);
	    $confirm_password=mysqli_real_escape_string($conn, $_POST['confirm_password']);
	    if ($password!=$confirm_password) {
	      	$_SESSION['errormsg'] = 'Passwords do not match';
	        header("location:view_users.php");
	        exit();
	    }
	    else
	    {
	      $emailcheck = "SELECT * FROM users WHERE email = '$email'";
	      $runemailcheck = mysqli_query($conn, $emailcheck);
	      $count = mysqli_num_rows($runemailcheck);
	      	if ($count == '1') {
	          //Inserting into database
	          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	          if(isset($_FILES['imageFile']) && !empty($_FILES['imageFile']['name'])) {
	          	include('includes/ImageUpload.php');
	          	$query = "UPDATE users SET name = '$name', email = '$email', address = '$address', password = '$hashedPassword', user_image = '$fileDestination' WHERE id = '$user_id'";        
	          }
	          else
	          {
	          	$query = "UPDATE users SET name = '$name', email = '$email', address = '$address', password = '$hashedPassword' WHERE id = '$user_id'"; 
	          }
	          	if ($conn->query($query) === TRUE){
	          		$_SESSION['successmsg']='User Account Successfully Updated';
	          		header("location:view_users.php");
		          	exit();
		        }
		    }
	        else
	        {
	          $_SESSION['errormsg'] = 'This Email is aleardy taken';
	          header("location:view_users.php");
	          exit();
	        }
	    }
	}
	if (isset($_POST['deleteUser'])) {
		$user_id=mysqli_real_escape_string($conn, $_POST['user_id']);
		$query = "DELETE FROM users WHERE id = '$user_id'";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			$_SESSION['successmsg']='User Account Successfully Deleted';
      		header("location:view_users.php");
          	exit();
		}
		else
		{
			$_SESSION['errormsg'] = 'User Account Deletion Failed!';
          	header("location:view_users.php");
          	exit();
		}
	}
?>