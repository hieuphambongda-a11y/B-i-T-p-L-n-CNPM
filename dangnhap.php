<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-wrapper">

    <div class="form-box">

        <h3 class="text-center mb-4">Đăng nhập</h3>

       <?php 
        if(isset($_POST["login"])){
            $email=$_POST["email"];
            $password=$_POST["password"];
            require_once "data.php";
            $csdl = "SELECT * FROM user WHERE email = '$email' ";
            $kq = mysqli_query($check,$csdl);
            $ktra= mysqli_fetch_array($kq, MYSQLI_ASSOC);
            if($ktra){
                if($password === $ktra["pass"]){
                    header("Location: index.php");
                    session_start();
                    $_SESSION["user"] = "yes";
                    die();
                }
                else{
                    echo "<div class='alert alert-danger'>Mật khẩu không hợp lệ</div>";
                }
            }
            else{
                echo "<div class = 'alert alert-danger'>Email không hợp lệ</div>";
            }
        }
        ?>

        <form action="dangnhap.php" method="post">

            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
            </div>

            <button type="submit" name="login" class="btn-submit">Đăng nhập</button>

        </form>

        <p class="login-text">
            Chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a>
        </p>

    </div>

</div>

</body>
</html>
