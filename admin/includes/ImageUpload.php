<?php
if(isset($_FILES['imageFile']) && !empty($_FILES['imageFile']['name'])) { 
	$file=$_FILES['imageFile'];
	$fileName=$_FILES['imageFile']['name'];
	$fileTmpName=$_FILES['imageFile']['tmp_name'];
	$fileSize=$_FILES['imageFile']['size'];
	$fileError=$_FILES['imageFile']['error'];
	$fileType=$_FILES['imageFile']['type'];
	$fileExt=explode('.', $fileName);
	$fileActualExt=strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png');
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
				$fileNameNew = uniqid('', true).'.'.$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				
				if (move_uploaded_file($fileTmpName, $fileDestination)) {
				}
				else
				{
					echo "Not uploaded";
				}
		}
		else
		{
			echo ("<script LANGUAGE='JavaScript'>
				alert('You have some errors uploading the file!')
				window.location.href='index.php';
			</script>");
		}
	}
	else
	{
		echo ("<script LANGUAGE='JavaScript'>
				alert('You cannot upload files of this type! Only JPG, JPEG and PNG are allowed')
				window.location.href='index.php';
			</script>");
	}
}
?>