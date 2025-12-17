<?php
    // Sử dụng file cấu hình kết nối chung require 
    require '../config.php'; 

    $message = "";

    // 2. Xử lý form khi người dùng ấn "Lưu" 

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        if ($title === '' || $content === '')
        {
            $message = "Vui lòng nhập đầy đủ tiêu đề và nội dung!";
        }
        else
        {
            $now = date('Y-m-d H:i:s');

            //Lệnh SQL INSERT
            $sql = "INSERT INTO news(title, content, created_at, updated_at) 
                VALUES ('$title', '$content', '$now', '$now')";
            
            $result = mysqli_query($conn, $sql);

            if ($result)
            {
                $message = "Thêm bài viết thành công!";
            }
            else
            {
                $message = "Lỗi khi thêm bài viết: " . mysqli_error($conn);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết mới</title>
</head>
<body>
    <h1>Thêm bài viết mới</h1>
    <a href="list_news.php">Xem danh sách</a>

    <?php if ($message !== ""): ?>
        <p style="color: green;" ><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <p>
            <label>Tiêu đề:</label><br>
            <input type="text" name="title" style="width: 400px;" required>
        </p>
        <p>
            <label>Nội dung:</label>
            <textarea name="content" rows="8" cols="60" required></textarea>
        </p>
        <p>
            <button type="submit">Lưu</button>
        </p>
    </form>
</body>
</html>