<?php
if (isset($_POST)) {
  require_once '../php/database.php';
  $req_params = $_POST;
  if (isset($req_params["id"])) {
    $id = $req_params["id"];
    unset($req_params["id"]);
  }
  foreach ($req_params as $key => $value) {
    if ($req_params[$key] == "") $req_params[$key] = null;
  }
  $old_image = db_select("SELECT `image` FROM `pets` WHERE `id` = {$id}")[0]->image;
  if ($req_params["image_label"] != null) {
    $image_label = $req_params["image_label"];
    if ($image_label != "" && $_FILES["image"]["error"] == 0) {
      $req_params["image"] = bin2hex(random_bytes(10)) . "." . strtolower(pathinfo($_FILES["image"]["name"])["extension"]);
      move_uploaded_file($_FILES["image"]["tmp_name"], "../public/img/{$req_params["image"]}");
      if (file_exists("../public/img/{$old_image}")) unlink("../public/img/{$old_image}");
    }
    unset($req_params["image_label"]);
  } else {
    $req_params["image"] = null;
    if (file_exists("../public/img/{$old_image}")) unlink("../public/img/{$old_image}");
    unset($req_params["image_label"]);
  }
  foreach ($req_params as $key => $value) {
    $set_clause[] = "$key = '" . str_replace("'", "\'", $value)  . "'";
  }
  $sql = "UPDATE `pets` SET " . join(", ", $set_clause) . " WHERE id = '$id'";
  if ($connect->query($sql) === true) {
    echo  "Successfully updated!";
  } else {
    echo "Error while updating record : " . $connect->error;
    exit;
  }
  $connect->close();
}
