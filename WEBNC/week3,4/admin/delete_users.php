<?php
    require '../config.php';
    
    $id = $_GET['id'] ?? '';
    if ($id === '')
    {
        die("Thiếu tham số id.");
    }

    //Thực hiện xóa
    $sql = "DELETE FROM users WHERE id = $id";
    $ok = mysqli_query($conn, $sql);
    if ($ok)
    {
        //Quay lại danh sách sau khi xóa
        header('Location: list_users.php');
        exit;
    }
    else
    {
        die("Lỗi xóa: " . mysqli_error($conn));
    }
?>