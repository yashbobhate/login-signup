<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'task3');


if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
  	$password_2 = md5($password_2);

  	$query = "INSERT INTO users (username, email, password_1, password_2)
  			  VALUES('$username', '$email', '$password_1', '$password_2')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.html');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password_1)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password_1 = md5($password_2);
  	$query = "SELECT * FROM users WHERE username='$username' AND password_1='$password_1'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.html');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>