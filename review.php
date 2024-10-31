<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_SESSION['username'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];

  $review = "$username|$rating|$comment\n";
  file_put_contents('reviews.txt', $review, FILE_APPEND);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <title>Залишити відгук</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Залиште свій відгук</h1>
  <form action="review.php" method="post">
    <label>Рейтинг:
      <select name="rating" required>
        <option value="5">5 Зірок</option>
        <option value="4">4 Зірки</option>
        <option value="3">3 Зірки</option>
        <option value="2">2 Зірки</option>
        <option value="1">1 Зірка</option>
      </select>
    </label>
    <label>Коментар:
      <textarea name="comment" required></textarea>
    </label>
    <button type="submit">Залишити відгук</button>
  </form>
</body>

</html>