<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['username'] = $_POST['username'];
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <title>Увійти</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Авторизація</h1>
  <form action="login.php" method="post">
    <label>Ім'я користувача:
      <input type="text" name="username" required>
    </label>
    <button type="submit">Увійти</button>
  </form>
</body>

</html>