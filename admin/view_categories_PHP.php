<?php
	include('config/Connection.php');
	session_start();
        //Add New Admin
  if (isset($_POST['addCategory'])) {
    $category_name=ucwords(mysqli_real_escape_string($conn, $_POST['category_name']));
    $category_description=mysqli_real_escape_string($conn, $_POST['category_description']);
    include('includes/ImageUpload.php');
    $query="INSERT INTO categories (category_name, category_description, category_image) VALUES ('$category_name', '$category_description', '$fileDestination')";
      	if ($conn->query($query) === TRUE){
      		$_SESSION['successmsg']='New Category Successfully Added!';
      		header("location:view_categories.php");
          	exit();
        }
        else
        {
          $_SESSION['errormsg'] = 'Failed To Add New Category!';
          header("location:view_categories.php");
          exit();
        }
	}
	//Edit Admin
	elseif (isset($_POST['editCategory'])) {
    	$category_id=mysqli_real_escape_string($conn, $_POST['category_id']);
		$category_name=ucwords(mysqli_real_escape_string($conn, $_POST['category_name']));
    	$category_description=mysqli_real_escape_string($conn, $_POST['category_description']);
	    if(isset($_FILES['imageFile']) && !empty($_FILES['imageFile']['name'])) {
	      	include('includes/ImageUpload.php');
	      	$query = "UPDATE categories SET category_name = '$category_name', category_description = '$category_description', category_image = '$fileDestination' WHERE id = '$category_id'";        
        }
        else
        {
        	$query = "UPDATE categories SET category_name = '$category_name', category_description = '$category_description' WHERE id = '$category_id'"; 
        }
      	if ($conn->query($query) === TRUE){
      		$_SESSION['successmsg']='Category Successfully Updated';
      		header("location:view_categories.php");
          	exit();
        }
        else
        {
        	$_SESSION['errormsg'] = 'Category Updation Failed!';
          	header("location:view_categories.php");
          	exit();
        }
	}
	if (isset($_POST['deleteCategory'])) {
		$category_id=mysqli_real_escape_string($conn, $_POST['category_id']);
		$query = "DELETE FROM categories WHERE id = '$category_id'";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			$_SESSION['successmsg']='Category Successfully Deleted';
      		header("location:view_categories.php");
          	exit();
		}
		else
		{
			$_SESSION['errormsg'] = 'Category Deletion Failed!';
          	header("location:view_categories.php");
          	exit();
		}
	}
?>