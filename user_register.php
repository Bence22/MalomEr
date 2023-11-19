<?php

$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

require './database.php';

$name = $email = $password = NULL;
if (isset($_POST['name']) && !empty($_POST['name'])) {
  $name = $_POST['name'];
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
  $email = $_POST['email'];
}

$query = "
    INSERT INTO login 
    (name, email, password)
    VALUES(?, ?, ?)";

$stmt = $db->prepare($query);
if (!$stmt) {
  $message = "SQL error: " . print_r($stmt->errorInfo());
  die($message);
}

if ($stmt->execute([
  $name,
  $email,
  $hash,
])) {
  header("Location: registration_success.html");
  exit;
}
else {
  $message = "SQL error: " . print_r($stmt->errorInfo());
  die($message);
}
?>
 