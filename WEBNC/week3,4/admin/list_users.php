<?php
    require '../config.php';

    $sql = "SELECT * FROM users ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
</head>
<body>
    <h1>Danh sách người dùng</h1>

    <p>
        <a href="add_users.php">+ Thêm người dùng mới</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Tên người </th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['username'] ?? 'Chưa cập nhật'; ?></td>
                    <td><?php echo $row['date_of_birth'] ?? 'Chưa cập nhật'; ?></td>
                    <td><?php echo $row['gender'] ?? 'Chưa cập nhật'; ?></td>
                    <td><?php echo $row['phone'] ?? 'Chưa cập nhật'; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['updated_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Chưa có người dùng nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>