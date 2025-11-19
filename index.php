<?php 
session_start();
if(!isset($_SESSION["user"])){
    header("Location: dangnhap.php");
}
?>
<!DOCTYPE html> 
<html lang="vi">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv= "X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Người dùng</title>
</head>
<body> 
    <div class = "container">
        <h1>Xin chào</h1>
        <a href = "dangxuat.php" class = "btn btn-warning">Đăng xuất</a>
    </div>
</body>
</html>