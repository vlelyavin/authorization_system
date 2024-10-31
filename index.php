<?php
session_start();

$reviews = file_exists('reviews.txt') ? file('reviews.txt') : [];
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Система відгуків</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Відгуки про продукти</h1>
    <a href="login.php">Увійти</a> | <a href="review.php">Залишити відгук</a> | <a href="logout.php">Вийти</a>
    <div class="reviews">
        <?php if (empty($reviews)): ?>
            <p>Відгуків ще немає. Будьте першим!</p>
        <?php else: ?>
            <?php foreach ($reviews as $review): ?>
                <?php list($username, $rating, $comment) = explode("|", $review); ?>
                <div class="review">
                    <h3>Користувач: <?php echo htmlspecialchars($username); ?></h3>
                    <p>Рейтинг: <?php echo str_repeat("★", intval($rating)); ?></p>
                    <p><?php echo htmlspecialchars($comment); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>