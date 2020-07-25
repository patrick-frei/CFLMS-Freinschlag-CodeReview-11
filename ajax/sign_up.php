<?php
ob_start();
session_start();

if (isset($_SESSION["user"])) {
  header("Location: /");
  exit;
}

require_once "../php/database.php";
if (isset($_POST["sign_up"])) {

  $username = sanitize($_POST["username"]);
  $email = sanitize($_POST["email"]);
  $password = sanitize($_POST["password"]);

  if (empty($username)) {
    $error = "Please enter a username.";
  } else if (strlen($username) < 3) {
    $error = "Username must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z.-_]+$/", $username)) {
    $error = "Username contains illegal special characters.";
  } else {
    $query = "SELECT username FROM users WHERE username='$username'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);
    if ($count != 0) {
      $error = "Provided username is already in use.";
    }
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter valid email address.";
  } else {
    $query = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);
    if ($count != 0) {
      $error = "Provided email is already in use.";
    }
  }

  if (empty($password)) {
    $error = "Please enter password.";
  } else if (strlen($password) < 6) {
    $error = "Password must have at least 6 characters.";
  }

  $password = hash('sha256', $password);

  if (!isset($error)) {

    $query = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
    if (mysqli_query($connect, $query)) {
      echo "Successfully registered, you will be redirected to the login page in a few seconds...";
      header("Refresh:3; url=/login");
    } else {
      echo "Something went wrong, try again later...";
      header("Refresh:3; url=/sign_up");
    }
  } else {
    echo $error;
  }
}
function sanitize($string)
{
  return htmlspecialchars(strip_tags(trim($string)));
}
ob_end_flush();
