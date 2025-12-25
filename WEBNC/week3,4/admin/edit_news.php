<?php
    require '../config.php';

    $id = $_GET['id'] ?? '';

    if  ($id === '')
    {
        die("Thiếu tham số id.");
    }

    //Lấy dữ liệu hiện tại của bài viết
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) === 0)
    {
        die("Không tìm thấy bài viết.");
    }
    
    $news = mysqli_fetch_assoc($result);
    $message = "";

    //Xử lý khi form được submit 
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $title = $POST['title'] ?? '';
        $content = $POST['content'] ?? '';

        if ($title === '' || $content === '')
        {
            $message = "Vui lòng nhập đầy đủ tiêu đề và nội dung";
        } 
        else 
        {
            $now = date('Y-m-d H:i:s');
            $sqlUpdate = "UPDATE news SET title = '$title', content = '$content', updated_at = '$now' WHERE id = $id";
            $ok = mysqli_query($conn, $sqlUpdate);

            if ($ok)
            {
                //Quay lại danh sách sau khi cập nhật
                header('Location: List_news.php');
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
    <title>Sửa bài viết</title>
</head>
<body>
    <h1>Sửa bài viết</h1>
    <p><a href="list_news.php"><-- Quay lại danh sách</a></p>

    <?php if ($message !== ""): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action=""> 
        <p> 
            <label>Tiêu đề:</label><br> 
            <input type="text" name="title" style="width: 400px;"
            value="<?php echo htmlspecialchars($news['title']); ?>" required></p> 
        <p> 
            <label>Nội dung:</label><br> 
            <textarea name="content" rows="8" cols="60" required><?php echo htmlspecialchars($news['content']); ?></textarea> 
        </p> 
        <p> 
            <button type="submit">Cập nhật</button> 
        </p> 
    </form> 
</body>
</html>