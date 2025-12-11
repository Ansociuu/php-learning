<?php 
$students = ["An", "Binh", "Chi", "Dung"]; 
?> 
 
<h2>Student List</h2> 
<ul> 
    <?php foreach ($students as $s): ?> 
        <li><?php echo $s; ?></li> 
    <?php endforeach; ?> 
</ul> 
