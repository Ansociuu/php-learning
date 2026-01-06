<?php
    require '../config.php';

    $id = $_GET['id'] ?? '';

    if  ($id === '')
    {
        die("Thiếu tham số id.");
    }

    //Lấy dữ liệu hiện tại của người dùng
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) === 0)
    {
        die("Không tìm thấy người dùng.");
    }
    
    $users = mysqli_fetch_assoc($result);
    $message = "";

    //Xử lý khi form được submit 
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $email = $POST['email'] ?? '';
        $name = $POST['name'] ?? '';

        if ($email === '')
        {
            $message = "Vui lòng nhập đầy đủ email";
        } 
        else 
        {
            $now = date('Y-m-d H:i:s');
            $sqlUpdate = "UPDATE news SET title = '$email', content = '$name' WHERE id = $id";
            $ok = mysqli_query($conn, $sqlUpdate);

            if ($ok)
            {
                //Quay lại danh sách sau khi cập nhật
                header('Location: List_users.php');
                exit;
            }
            else
            {
                $message = "Lỗi cập nhật: " . mysqli_error($conn);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
</head>
<body>
    <h1>Sửa người dùng</h1>
    <p><a href="list_news.php"><-- Quay lại danh sách</a></p>

    <?php if ($message !== ""): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action=""> 
        <p> 
            <label>Email:</label><br> 
            <input type="text" name="email" style="width: 400px;"
            value="<?php echo $users['email']; ?>" required></p> 
        <p> 
            <label>Tên người dùng:</label><br> 
            <textarea name="name" rows="8" cols="60" required><?php echo htmlspecialchars($users['name']); ?></textarea> 
        </p> 
        <p> 
            <button type="submit">Cập nhật</button> 
        </p> 
    </form> 
</body>
</html>