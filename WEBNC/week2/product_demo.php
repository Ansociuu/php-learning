<?php
    require 'Product.php';

    $pd1 = new Product("Laptop", "5000000", "3");
    $pd2 = new Product("Keyboard", "300000", "5");
    $pd3 = new Product("Mouse", "100000", "7");

    $products = [$pd1, $pd2, $pd3];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product OOP Demo</title>
    <style>
        table {
            border-collapse: collapse; 
            width: 50%; 
        }
        th, td {
            padding: 10px 20px; 
            border: 1px solid black;
            text-align: center;
        }
    </style>    
</head>
<body>
    <h1>Product List</h1>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $pd): ?>
                <tr>
                    <td><?php echo $pd->name; ?></td>
                    <td><?php echo number_format($pd->price, 0, ',', '.') . " VND"; ?></td>
                    <td><?php echo $pd->quantity; ?></td>
                    <td><?php echo number_format($pd->getTotal(), 0, ',', '.') . " VND"; ?></td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
</body>
</html>