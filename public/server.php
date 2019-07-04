<?php 
	session_start();
	require_once('../config/config.php');
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$db = mysqli_connect('localhost', 'root', '', 'magebittest');
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password']);
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}
		if (count($errors) == 0) {
			$query = "CREATE TABLE " . $username . "(
						id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
						attribute VARCHAR(30) NOT NULL,
						value VARCHAR(30) NOT NULL,
						email VARCHAR(70) NOT NULL,
						updatetime TIMESTAMP NOT NULL
					)";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}
		if (count($errors) == 0) {
			$query = "INSERT INTO $username (attribute, value) 
			VALUES('$username', '$email')";
			mysqli_query($db, $query);
		}
	}

	if (isset($_POST['login_user'])) {
		// $username = mysqli_real_escape_string($db, $_POST['username']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: attradd.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>