<?php include 'header.php'; ?>

<form method="post" action="">
    <label>Weight (kg):</label>
    <input type="number" step="0.1" name="weight" required> 
    <br><br>

    <label>Height (m):</label>
    <input type="number" step="0.1" name="height" required>
    <br><br>

    <button type="submit">Calculate BMI</button>
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $weight = $_POST['weight'];
        $height = $_POST['height'];

        if ($weight > 0 && $height > 0)
        {
            $bmi = $weight / ($height * $height);
            echo "<p>Your BMI: " . round($bmi. 2) . "</p>";
            if ($bmi < 18.5) 
            {
                echo "<p>" . "Underweight" . "</p>";
            }
            elseif ($bmi < 25)
            {
                echo "<p>Normal</p>";
            }
            else 
            {
                echo "<p>Overweight</p>";
            }
        }
        else 
        {
            echo "<p>Weight and Height must be greater than 0.</p>";
        }
    }   
?>

<?php include 'footer.php'; ?>