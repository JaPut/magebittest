<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	$db = mysqli_connect('localhost', 'root', '', 'magebittest');
	$attribute = "";
	$value = "";
	$email = "";
	$id = 0;
	$update = false;
	$table = $_SESSION['username'];
		
	if (isset($_POST['save'])) {
		$attribute = $_POST['attribute'];
		$value = $_POST['value'];
		
		mysqli_query($db, "INSERT INTO $table (attribute, value) VALUES ('$attribute', '$value')");
		$_SESSION['message'] = "New attribute added!"; 
		header('location: attradd.php');
	}
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$attribute = $_POST['attribute'];
		$value = $_POST['value'];
	
		mysqli_query($db, "UPDATE $table SET attribute='$attribute', value='$value' WHERE id=$id");
		$_SESSION['message'] = "Record updated!"; 
		header('location: attradd.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM $table WHERE id=$id");
		$_SESSION['message'] = "Record deleted!"; 
		header('location: attradd.php');
	}
    ?>
	