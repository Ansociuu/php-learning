<?php 
$name = "Nguyen Van A"; 
$age = 20; 
$height = 1.65; // meters 
 
$nextYearAge = $age + 1; 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <title>PHP Variables</title> 
</head> 
<body> 
    <h1>Personal Info</h1> 
    <p>Name: <?php echo $name; ?></p> 
    <p>Age: <?php echo $age; ?></p> 
    <p>Age next year: <?php echo $nextYearAge; ?></p> 
    <p>Height: <?php echo $height; ?> m</p> 
</body> 
</html> 
