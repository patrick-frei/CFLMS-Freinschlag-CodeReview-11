<?php
ob_start();
session_start();

if (isset($_SESSION["user"])) {
  header("Location: /");
  exit;
}

require_once "../php/database.php";

if (isset($_POST["login"])) {

  $username = sanitize($_POST["username"]);
  $password = sanitize($_POST["password"]);

  if (empty($username)) {
    $error = "Please enter your username or email address.";
  }

  if (empty($password)) {
    $error = "Please enter your password.";
  }

  if (!$error) {
    $password = hash('sha256', $password);
    $res = mysqli_query($connect, "SELECT username, password, type FROM users WHERE email = '$username' OR username = '$username'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res);

    if ($count == 1 && $row["password"] == $password) {
      $_SESSION["user"] = $row["username"];
      $_SESSION["type"] = $row["type"];
      header("Location: /");
    } else {
      echo "Incorrect Credentials, Try again...";
      header("Refresh:3; url=/login");
    }
  }
}
function sanitize($string)
{
  return htmlspecialchars(strip_tags(trim($string)));
}
