<?php
    require 'Article.php';
    $articles = [new Article("First News", "This is the first news content...", "2025-12-01", "Nguyen Van A", "Technology"), 
                 new Article("Second News", "Another news content for demo...", "2025-12-02", "Tran Thi B", "Health")];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article OOP Demo</title>
</head>
<body>
    <h1>Article List</h1>
    <ul>
        <?php foreach ($articles as $a): ?>
            <li>
                <strong><?php echo $a->title; ?></strong>
                <br>
                <?php echo $a->getSummary(30); ?>
                <br>
                <small><?php echo $a->createdAt; ?></small>
            </li>
        <?php endforeach; ?>

        <br>
        <?php foreach ($articles as $a): ?>
            <li><?php echo $a->getFullTitle(); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>