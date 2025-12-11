<?php
    function add($a, $b)
    {
        return $a + $b;
    }

    function avarage($numbers) 
    {
        $sum = 0;
        foreach ($numbers as $n) 
        {
            $sum += $n;
        }
        return $sum / count($numbers);
    }

    $kq = add(5,3);
    echo "5 + 3 = " . $kq . "<br>";

    $scores = [7.5, 8.0, 9.0];
    echo "Avarage score = " . avarage($scores);
?>