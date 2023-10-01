<?php
include('config/Connection.php');
session_start();

// Add New Admin
if (isset($_POST['addAdmin'])) {
    $admin_name = ucwords(mysqli_real_escape_string($conn, $_POST['admin_name']));
    $admin_email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $fileDestination = 'uploads/default-profile-picture.jpg';

    if ($password != $confirm_password) {
        $_SESSION['errormsg'] = 'Passwords do not match';
        header("location:view_admins.php");
        exit();
    } else {
        $admin_emailcheck = "SELECT * FROM admins WHERE admin_email = '$admin_email'";
        $runadmin_emailcheck = mysqli_query($conn, $admin_emailcheck);
        $count = mysqli_num_rows($runadmin_emailcheck);
        if ($count == '0') {
            // Inserting into database
            $query = "INSERT INTO admins (admin_name, admin_email, password, image_path) VALUES ('$admin_name', '$admin_email', '$password', '$fileDestination')";
            if ($conn->query($query) === TRUE) {
                $_SESSION['successmsg'] = 'Admin Account Successfully Created';
                header("location:view_admins.php");
                exit();
            } else {
                $_SESSION['errormsg'] = 'This Email is already taken';
                header("location:view_admins.php");
                exit();
            }
        }
    }
}

// Edit Admin
elseif (isset($_POST['editAdmin'])) {
    $admin_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $admin_name = ucwords(mysqli_real_escape_string($conn, $_POST['admin_name']));
    $admin_email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    if ($password != $confirm_password) {
        $_SESSION['errormsg'] = 'Passwords do not match';
        header("location:view_admins.php");
        exit();
    } else {
        $admin_emailcheck = "SELECT * FROM admins WHERE admin_email = '$admin_email'";
        $runadmin_emailcheck = mysqli_query($conn, $admin_emailcheck);
        $count = mysqli_num_rows($runadmin_emailcheck);
        if ($count == '1') {
            // Updating the database
            $query = "UPDATE admins SET admin_name = '$admin_name', admin_email = '$admin_email', password = '$password' WHERE id = '$admin_id'";
            
            if (isset($_FILES['imageFile']) && !empty($_FILES['imageFile']['name'])) {
                include('includes/ImageUpload.php');
                $query = "UPDATE admins SET admin_name = '$admin_name', admin_email = '$admin_email', password = '$password', image_path = '$fileDestination' WHERE id = '$admin_id'";
            }
            
            if ($conn->query($query) === TRUE) {
                $_SESSION['successmsg'] = 'Admin Account Successfully Updated';
                header("location:view_admins.php");
                exit();
            }
        } else {
            $_SESSION['errormsg'] = 'This Email is already taken';
            header("location:view_admins.php");
            exit();
        }
    }
}

// Delete Admin
if (isset($_POST['deleteAdmin'])) {
    $admin_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $query = "DELETE FROM admins WHERE id = '$admin_id'";
    $runQuery = mysqli_query($conn, $query);
    if ($runQuery) {
        $_SESSION['successmsg'] = 'Admin Account Successfully Deleted';
        header("location:view_admins.php");
        exit();
    } else {
        $_SESSION['errormsg'] = 'Admin Account Deletion Failed!';
        header("location:view_admins.php");
        exit();
    }
}
?>
