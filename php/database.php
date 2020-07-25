<?php 
$host = "localhost";
$username = "root";
$password = "74quA!Cc3E";
$dbname = "cr11_freinschlag_petadoption";
$connect = new mysqli($localhost, $username, $password, $dbname);

if($connect->connect_error) die("Connection failed: " . $connect->connect_error);

function db_select($query_string) {
    global $connect;
    $query = $connect->query($query_string);
    while ($result = $query->fetch_object()) {
      $results[] = $result;
    }
    return $results;
  }