<?php
    require '../config.php';


    $message = "";
    $result = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $search = $_POST['search'] ?? '';

        if ($search === '')
        {
            $message = "Vui lòng nhập từ khóa tìm kiếm.";
        }
        else
        {
            $sql = "SELECT * FROM news WHERE title LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);

            if (!$result)
            {
                die("Lỗi truy vấn: " . mysqli_error($conn));
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm tin tức</title>
</head>
<body>
    <h1>Tìm kiếm tin tức</h1>

    <form method="post" action="">
        <p>
            <label>Tìm kiếm:</label><br>
            <input type="text" name="search" style="witdh: 400px;">
            <button type="submit">🔍</button>
        </p>
    </form>

    <?php if ($message !== ""): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php elseif ($result): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr> 
                <th>ID</th> 
                <th>Tiêu đề</th> 
                <th>Ngày tạo</th> 
            </tr>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr> 
                        <td><?php echo $row['id']; ?></td> 
                        <td><?php echo htmlspecialchars($row['title']); ?></td> 
                        <td><?php echo $row['created_at']; ?></td> 
                    </tr> 
                <?php endwhile; ?>
            <?php else: ?>
                <tr> 
                    <td colspan="3">Không có kết quả phù hợp.</td> 
                </tr> 
            <?php endif; ?>
        </table>
    <?php endif; ?>
</body>
</html>
