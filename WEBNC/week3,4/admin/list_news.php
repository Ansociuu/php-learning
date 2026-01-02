<?php
    // Kết nối CSDL dùng file config chung require
    require '../config.php';
    
    // Lệnh SELECT để lấy tất cả bài viết, mới nhất lên đầu
    $sql = "SELECT * FROM news ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (!$result) 
    {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
</head>
<body>
    <h1>Danh sách bài viết</h1>

    <p>
        <a href="add_news.php">+ Thêm bài viết mới</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr> 
            <th>ID</th> 
            <th>Tiêu đề</th> 
            <th>Ngày tạo</th> 
            <th>Hành động</th>  
        </tr>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr> 
                    <td><?php echo $row['id']; ?></td> 
                    <td><?php echo htmlspecialchars($row['title']); ?></td> 
                    <td><?php echo $row['created_at']; ?></td> 
                    <td>  
                        <a href="view_news.php?id=<?php echo $row['id']; ?>">Xem</a> | 
                        <a href="edit_news.php?id=<?php echo $row['id']; ?>">Sửa</a> | 
                        <a href="delete_news.php?id=<?php echo $row['id']; ?>" 
                        onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">Xóa</a>   
                    </td>
                </tr> 
            <?php endwhile; ?>
        <?php else: ?>
            <tr> 
                <td colspan="4">Chưa có bài viết nào.</td> 
            </tr> 
        <?php endif; ?>
    </table>
</body>
</html>