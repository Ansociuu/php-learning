<?php include 'header.php'; ?>

<form method="post" action="">
    <label>Thu nhập:</label>
    <input type="number" name="income" required>
    <label>VND/Năm</label>
    <br><br>

    <button type="submit">Submit</button>
    <br><br>
</form>

<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $income = $_POST['income'];
        if ($income <= 60000000) $taxRate = 0.05;
        elseif ($income <= 120000000) $taxRate = 0.1;
        elseif ($income <= 210000000) $taxRate = 0.15;
        else $taxRate = 0.2;

        $tax = $income * $taxRate;
        echo "Thuế phải nộp: ". number_format($tax, 0, ',', '.') . "VND";
    }
    include 'footer.php';
?>