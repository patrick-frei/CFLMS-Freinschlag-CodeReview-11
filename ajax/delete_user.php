<?php
if (isset($_POST["id"])) {
  require_once '../php/database.php';
  $sql = "DELETE FROM `users` WHERE `id` = '{$_POST["id"]}'";
  if ($connect->query($sql) === true) {
    echo  "Successfully deleted!";
  } else {
    echo "Error while updating record : " . $connect->error;
    exit;
  }
  $connect->close();
}