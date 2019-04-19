<?php
session_start();

// variable declaration

$name = "";
$id= "";
$phone    = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'ecommando');

// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$id = mysqli_real_escape_string($db, $_POST['id']);
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($id)) { array_push($errors, "NID is required"); }
	if (empty($name)) { array_push($errors, "Name is required"); }
	if (empty($phone)) { array_push($errors, "Email is required"); }
	if (empty($email)) { array_push($errors, "Phone is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "INSERT INTO registration (id,name,phone,email, password) 
				  VALUES('$id','$name', '$email', '$phone', '$password')";
		mysqli_query($db, $query);

		$_SESSION['name'] = $name;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}

}
// LOGIN USER
if (isset($_POST['login_user'])) {
	$NID = mysqli_real_escape_string($db, $_POST['id']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($name)) {
		array_push($errors, "Name is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM users WHERE id='$id' AND password='$password'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$_SESSION['name'] = $name;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>