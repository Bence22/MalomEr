<?php

$host = 'localhost';
$db_name = $user_name = 'login';
$password = 'aaSSdd00';

try {
  $db = new PDO(
    "mysql:host=$host;dbname=$db_name",
    $user_name,
    $password
  );
  return $db;
}
catch (PDOException $e) {
  die("Connection error: " . $e->getMessage());
}