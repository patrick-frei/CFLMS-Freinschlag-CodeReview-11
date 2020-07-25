<?php
if (isset($_POST)) {
  require_once '../php/database.php';
  $req_params = $_POST;
  if (isset($req_params["id"])) unset($req_params["id"]);
  if (isset($req_params["image_label"])) unset($req_params["image_label"]);
  foreach ($req_params as $key => $value) {
    if ($req_params[$key] == "") $req_params[$key] = null;
  }
  if ($_FILES["image"]["error"] == 0) {
    $req_params["image"] = bin2hex(random_bytes(10)) . "." . strtolower(pathinfo($_FILES["image"]["name"])["extension"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../public/img/{$req_params["image"]}");
  }
  $keys = join(", ", array_keys($req_params));
  $values = join(", ", array_map(fn ($v) => "'" . str_replace("'", "\'", $v) . "'", array_values($req_params))); //escapes quotation marks and adds prefix and suffix quotation marks
  $sql = "INSERT INTO `pets` ($keys) VALUES ($values);";
  if ($connect->query($sql) === true) {
    echo  "Successfully inserted!";
  } else {
    echo "Error while updating record : " . $connect->error;
    exit;
  }
  $connect->close();
}
