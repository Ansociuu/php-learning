<?php
    $score = 8.2;
    $grade = "";

    if ($score >= 8.5) 
    {
        $grade = "A";
    } 
    elseif ($score >= 7.0) 
    {
        $grade = "B";
    }
    elseif ($score >= 5.5)
    {
        $grade = "C";
    }
    else 
    {
        $grade = "D";
    }
?>

<p>Score: <?php echo $score; ?></p>
<p>Grade: <?php echo $grade; ?></p>