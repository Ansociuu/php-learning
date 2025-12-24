<?php 
    require '../config.php';

    $message ="";

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($email === '' || $password ==='')
        {
            $message = "Vui lòng nhập đầy đủ email và password!";
        }
        else
        {
            $sql = "INSERT INTO users(email, password)
                VALUES ('$email', '$password')";
            
            $result = mysqli_query($conn, $sql);

            if ($result)
            {
                $message = "Thêm người dùng thành công!";
            }
            else 
            {
                $message = "Lỗi khi thêm người dùng: " . mysqli_error($conn);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng mới</title>
</head>
<body>
    <h1>Thêm người dùng mới</h1>
    <a href="list_users.php">Xem danh sách</a>

    <?php if ($message !== ""): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <p>
            <label>Email:</label><br>
            <input type="text" name="email" style="width: 400px;" required>
        </p>
        <p>
            <label>Password:</label><br>
            <input type="password" name="password" style="width: 400px;" required>
        </p>
        <p>
            <button type="submit">Lưu</button>
        </p>
    </form>
</body>
</html>