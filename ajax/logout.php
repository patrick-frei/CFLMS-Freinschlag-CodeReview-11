<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: /");
}
if (isset($_GET["logout"])) {
  unset($_SESSION["user"]);
  unset($_SESSION["type"]);
  session_unset();
  session_destroy();
  header("Location: /");
  exit;
}
