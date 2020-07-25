<?php
session_start();
$path = ($_GET["path"]);
unset($_GET["path"]);
if (!isset($path) || $path == "home") {
  $request = "../templates/home.html.php";
} else {
  if (dirname($path) == ".") {
    $request = "../templates/$path.html.php";
  } elseif (dirname($path) == "templates") {
    $request = "../$path.html.php";
  } else {
    $request = "../$path.php";
  }
}
if (file_exists($request)) {
  require $request;
}