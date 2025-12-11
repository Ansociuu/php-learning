<?php 
    function formatCurrency($amount) 
    { 
        // Format number with thousands separator 
        return number_format($amount, 0, ',', '.') . " VND"; 
    }  

    function truncateText($text, $limit = 50) 
    { 
        // Cut text to $limit chars     
        if (strlen($text) <= $limit) 
        {         
            return $text; 
        } 
        return substr($text, 0, $limit) . "..."; 
    } 

    function calculateBMI($weight, $height) 
    {
        $bmi = $weight / ($height * $height);
        return $bmi;
    }

    function getGrade($score)
    {
        if ($score >= 8.5) 
        {
            return $grade = "A";
        } 
        elseif ($score >= 7.0) 
        {
            return $grade = "B";
        }
        elseif ($score >= 5.5)
        {
            return $grade = "C";
        }
        return $grade = "D";
    }

    function toSlug($title) 
    {
        $title = strtolower($title);
        $title = str_replace(' ', '-', $title);
        return $title;
    }

?>
