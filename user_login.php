<?php

$is_invalid = FALSE;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  /*
   @var \PDO $db */
  $db = require './database.php';
  $query = "SELECT * FROM users WHERE email = ?";
  $stmt = $db->prepare($query);
  $stmt->execute([
    $_POST['email'],
  ]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
      die ("Login successful.");
    }
  }
  $is_invalid = TRUE;
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Registration </title>
    <link rel="stylesheet" href="">
  </head>
  <body>
  <h1>Login</h1>
  <?php if ($is_invalid): ?>
      <em>Invalid login.</em>
  <?php endif; ?>
  <form method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? "")?>">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button type="submit">Log in</button>
  </form>
</body>
</html>