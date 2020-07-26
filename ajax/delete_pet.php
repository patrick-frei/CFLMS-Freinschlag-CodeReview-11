<?php
if (isset($_POST["id"])) {
  require_once '../php/database.php';
  $image = db_select("SELECT `image` FROM `pets` WHERE `id` = {$_POST["id"]}")[0]->image;
  $sql = "DELETE FROM `pets` WHERE `id` = '{$_POST["id"]}'";
  if ($connect->query($sql) === true) {
    if (file_exists("../public/img/{$image}")) unlink("../public/img/{$image}");
    echo  "Successfully deleted!";
  } else {
    echo "Error while updating record : " . $connect->error;
    exit;
  }
  $connect->close();
}