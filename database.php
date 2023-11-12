<?php

$host = 'localhost';
$db_name = $user_name = 'filmdb';
$password = 'Fyg_W)S.frJm0i6n';

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