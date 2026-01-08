<?php
    require '../config.php';
    
    //Lấy id từ URL
    $id = $_GET['id'] ?? '';

    if ($id === '')
    {
        die("Thiếu tham số id.");
    }

    //Lấy ra bản ghi theo id
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($users['username']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($users['username']); ?></h1>
    <p><em>Ngày tạo: <?php echo $users['created_at']; ?></em></p>
    <hr>
    <p>Email: <?php echo $users['email']; ?></p>
    <hr>
    <p>Ngày sinh: <?php echo $users['date_of_birth'] ?? 'Chưa cập nhật'; ?></p>
    <hr>
    <p>Giới tính: <?php echo $users['gender'] ?? 'Chưa cập nhật'; ?></p>
    <hr>
    <p>Số điện thoại: <?php echo $users['phone'] ?? 'Chưa cập nhật'; ?></p>
    <hr>
    <p>
        <a href="list_users.php"><-- Quay lại danh sách</a>
    </p>
</body>
</html>