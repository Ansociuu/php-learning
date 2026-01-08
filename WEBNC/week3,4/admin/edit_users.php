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
        $email = $_POST['email'] ?? '';
        $username = $_POST['username'] ?? '';
        $dob = $_POST['date_of_birth']  ?? '';
        $gender = $_POST['gender'] ?? '';
        $phone = $_POST['phone'] ?? '';


        if ($email === '')
        {
            $message = "Vui lòng nhập đầy đủ email";
        } 
        else 
        {
            $now = date('Y-m-d H:i:s');
            $sqlUpdate = "UPDATE users SET email = '$email', username = '$username', date_of_birth = '$dob', 
                                            gender = '$gender', phone = '$phone' WHERE id = $id";
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
    <p><a href="list_users.php"><-- Quay lại danh sách</a></p>

    <?php if ($message !== ""): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action=""> 
        <p> 
            <label>Email:</label><br> 
            <input type="text" name="email" style="width: 400px;"
            value="<?php echo $users['email']; ?>" required>
        </p> 
        <p> 
            <label>Tên người dùng:</label><br> 
            <input type="text" name="username" style="width: 400px;" 
            value="<?php  echo isset($users['username']) ? htmlspecialchars($users['username']) : htmlspecialchars('Chưa cập nhật'); ?>" required>
        </p> 
        <p>
            <label>Ngày sinh:</label><br>
            <input type="date" name="date_of_birth" style="width: 400px;"
            value="<?php echo $users['date_of_birth'] ?? '' ; ?>" required>
        </p>
        <p>
            <label>Giới tính:</label><br>
            <input type="radio" name="gender" value="male"
                <?php if (($users['gender'] ?? '') == 'male') echo 'checked'; ?>> Nam
            <input type="radio" name="gender" value="female"
                <?php if (($users['gender'] ?? '') == 'female') echo 'checked'; ?>> Nữ
            <input type="radio" name="gender" value="other"
                <?php if (($users['gender'] ?? '') == 'other') echo 'checked'; ?>> Khác
        </p>
        <p>
            <label>Số điện thoại:</label><br>
            <input type="tel" name="phone" style="width: 400px;"
            value="<?php echo $users['phone'] ?? 'Chưa cập nhật'; ?>"
            pattern="[0-9]{9,11}" required>
        </p>
        <p> 
            <button type="submit">Cập nhật</button> 
        </p> 
    </form> 
</body>
</html>