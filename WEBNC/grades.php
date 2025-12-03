<?php 
    $scores = [6.5, 7.0, 8.0, 9.0, 5.5]; 
    $sum = 0;

    foreach ($scores as $score) {
        $sum += $score;
    }
    $average = $sum / count($scores);

    if ($average >= 8.5) 
    {
        $grade = "A";
    } 
    elseif ($average >= 7.0) 
    {
        $grade = "B";
    }
    elseif ($average >= 5.5)
    {
        $grade = "C";
    }
    else 
    {
        $grade = "D";
    }
?>

<h2>Score List</h2> 
<ul> 
    <?php foreach ($scores as $s): ?> 
        <li><?php echo $s; ?></li> 
    <?php endforeach; ?> 
</ul> 
<p>Average: <?php echo $average; ?></p>
<p>Grade: <?php echo $grade; ?></p>