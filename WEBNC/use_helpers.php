<?php 
    require 'helpers.php';

    $price = 1500000;
    echo "Price: " . formatCurrency($price) . "<br>";

    $content = "This is a very long content of a news article in our future project.";
    echo "Short content: " . truncateText($content, 30);

    $kg = 70;   $m = 1.75;
    echo "<br> Chỉ số BMI của người có cân nặng $kg" . "kg và chiều cao $m" . "m là " . 
    calculateBMI($kg, $m) . " kg/m² <br>";

    $score = 9;
    echo "Score: $score => Grade: " . getGrade($score);

    $title = "Tin Tức Công Nghệ";
    echo "<br>Title: $title => Convert: " . toSlug($title);

?>