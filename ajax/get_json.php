<?php
session_start();
if ($_GET["table"] == "users" && $_SESSION["type"] != "administrator") die("Permission denied");
header("Content-type: application/json");
require_once "../php/database.php";
$req_params = $_GET;
if (isset($req_params["table"])) {
  $table = $req_params["table"];
  unset($req_params["table"]);
} else {
  die("No Table submitted!");
}
if (isset($req_params["like"])) {
  $like = $req_params["like"];
  unset($req_params["like"]);
}
if (isset($req_params["or"])) {
  $or = $req_params["or"];
  unset($req_params["or"]);
}
function get_where_clause() {
  global $req_params;
  global $like;
  global $or;
  if ($like) {
    foreach ($req_params as $key => $value) {
      if (is_array($value)) {
        foreach ($value as $subvalue) {
          $where_clause_array[] = "$key LIKE '" . str_replace("'", "\'", $subvalue) . "'";
        }
      } else {
        $where_clause_array[] = "$key LIKE '" . str_replace("'", "\'", $value) . "'";
      }
    }
  } else {
    foreach ($req_params as $key => $value) {
      if (is_array($value)) {
        foreach ($value as $subvalue) {
          $where_clause_array[] = "$key='" . str_replace("'", "\'", $subvalue) . "'";
        }
      } else {
        $where_clause_array[] = "$key='" . str_replace("'", "\'", $value) . "'";
      }
    }
  }
  if (count($where_clause_array) > 0) {
    if ($or) {
      return " WHERE " . join(" OR ", $where_clause_array);
    } else {
      return " WHERE " . join(" AND ", $where_clause_array);
    }
  }
}
$result = $connect->query("SELECT * FROM $table" . get_where_clause());
if ($result->num_rows > 0) {
  while ($media = $result->fetch_object()) {
    $media_array[] = $media;
  }
}
if ($media_array != null) {
  echo json_encode($media_array);
} else {
  echo "[]";
}
