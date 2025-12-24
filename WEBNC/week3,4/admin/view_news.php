<?php
    require '../config.php';

    // Lấy id từ URL 
    $id = $_GET['id'] ?? '';

    if ($id === '')
    {
        die("Thiếu tham số id.");
    }
    
    // Lấy ra 1 bản ghi theo id 
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) === 0 )
    {
        die("Không tìm thấy bài viết.");
    }

    $news = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($news['title']); ?></h1>
    <p><em>Ngày tạo: <?php echo $news['created_at']; ?></em></p>
    <hr>
    <div>
        <?php 
        // content có thể chứa xuống dòng, dùng nl2br cho dễ đọc
        echo nl2br(htmlspecialchars($news['content']));
        ?>
    </div>
    <hr>
    <p>
        <a href="list_news.php"><-- Quay lại danh sách</a>
    </p>
</body>
</html>