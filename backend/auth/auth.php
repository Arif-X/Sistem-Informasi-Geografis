<?php
session_start();

$username = "";
$errors = array(); 

if (isset($_POST['register'])) {

  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $password_1 = mysqli_real_escape_string($connect, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($connect, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
  $result = mysqli_query($connect, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  if (count($errors) == 0) {
    $password = $password_1;

   $query = "INSERT INTO user (username, password) VALUES('$username', '$password')";
   mysqli_query($connect, $query);
   $_SESSION['username'] = $username;
   $_SESSION['success'] = "You are now logged in";
   header('location: ../../index.php');
 }
}

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = $password;
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $results = mysqli_query($connect, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../../index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>