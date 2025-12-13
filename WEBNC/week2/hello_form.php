<?php include 'header.php'; ?>

<form method="get" action="">
    <label>Name:</label>
    <input type="text" name="name" required> 
    <br><br>

    <label>Age:</label>
    <input type="text" name="age" required>
    <br><br>

    <button type="submit" name="submit">Submit</button>
    <br><br>
</form>

<?php 
    if (isset($_GET['submit']))
    {
        $name = $_GET['name'];
        $age = $_GET['age'];
        echo "Xin chào $name, $age tuổi!";
    }
?>

<?php include 'footer.php'; ?>