<?php 
    // config.php - chứa thông tin kết nối CSDL dùng chung 
 
    $host = "localhost"; 
    $user = "root"; 
    $pass = ""; 
    $db   = "news_db"; 
    
    $conn = mysqli_connect($host, $user, $pass, $db); 
    if (!$conn) 
    { 
        die("Kết nối CSDL thất bại: " . mysqli_connect_error()); 
    }  
    mysqli_set_charset($conn, "utf8mb4");
