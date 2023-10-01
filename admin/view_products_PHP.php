<?php
	include('config/Connection.php');
	session_start();
        //Add New Admin
  if (isset($_POST['addProduct'])) {
    $product_name=ucwords(mysqli_real_escape_string($conn, $_POST['product_name']));
    $category_id=mysqli_real_escape_string($conn, $_POST['category_id']);
    $product_description=mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_price=mysqli_real_escape_string($conn, $_POST['product_price']);
    include('includes/ImageUpload.php');
    $query="INSERT INTO products (product_name, category_id, product_description, product_price, product_image) VALUES ('$product_name', '$category_id', '$product_description', '$product_price', '$fileDestination')";
      	if ($conn->query($query) === TRUE){
      		$_SESSION['successmsg']='New Product Successfully Added!';
      		header("location:view_products.php");
          	exit();
        }
        else
        {
          $_SESSION['errormsg'] = 'Failed To Add New Product!';
          header("location:view_products.php");
          exit();
        }
	}
	//Edit Admin
	elseif (isset($_POST['editProduct'])) {
      $product_id=mysqli_real_escape_string($conn, $_POST['product_id']);
      $product_name=ucwords(mysqli_real_escape_string($conn, $_POST['product_name']));
      $category_id=mysqli_real_escape_string($conn, $_POST['category_id']);
      $product_description=mysqli_real_escape_string($conn, $_POST['product_description']);
      $product_price=mysqli_real_escape_string($conn, $_POST['product_price']);
	    if(isset($_FILES['imageFile']) && !empty($_FILES['imageFile']['name'])) {
	      	include('includes/ImageUpload.php');
	      	$query = "UPDATE products SET product_name = '$product_name', category_id = '$category_id', product_description = '$product_description', product_price = '$product_price', product_image = '$fileDestination' WHERE id = '$product_id'";        
        }
        else
        {
        	$query = "UPDATE products SET product_name = '$product_name', category_id = '$category_id', product_description = '$product_description', product_price = '$product_price' WHERE id = '$product_id'"; 
        }
      	if ($conn->query($query) === TRUE){
      		$_SESSION['successmsg']='Product Successfully Updated';
      		header("location:view_products.php");
          	exit();
        }
        else
        {
        	$_SESSION['errormsg'] = 'Product Updation Failed!';
          	header("location:view_products.php");
          	exit();
        }
	}
	if (isset($_POST['deleteProduct'])) {
		$product_id=mysqli_real_escape_string($conn, $_POST['product_id']);
		$query = "DELETE FROM products WHERE id = '$product_id'";
		$runQuery = mysqli_query($conn, $query);
		if ($runQuery) {
			$_SESSION['successmsg']='Product Successfully Deleted';
      		header("location:view_products.php");
          	exit();
		}
		else
		{
			$_SESSION['errormsg'] = 'Product Deletion Failed!';
          	header("location:view_products.php");
          	exit();
		}
	}
?>