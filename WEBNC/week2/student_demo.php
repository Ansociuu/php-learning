<?php
    require 'Student.php';

    $st1 = new Student ("Nguyen Van A", "a@example.com", 8.6);
    $st2 = new Student ("Tran Thi B", "b@example.com", 7.2);
    $st3 = new Student ("Le Van C", "c@example.com", 5.0);

    $students = [$st1, $st2, $st3];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student OOP Demo</title>
</head>
<body>
    <h1>Student List (OOP)</h1>
    <ul>
        <?php foreach ($students as $st): ?>
            <li><?php echo $st->getInfo(); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
