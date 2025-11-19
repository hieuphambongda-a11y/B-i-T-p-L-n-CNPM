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
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="form-wrapper">

        <h3 class="title">Đăng ký tài khoản</h3>
          <?php
        if(isset($_POST["submit"])){
            $fullname=$_POST["fullname"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $repeat=$_POST["repeat_password"];
            $error=array();
            $luu_mk=password_hash($password,PASSWORD_DEFAULT);

            if(empty($fullname) or empty($email) or empty($password) or empty($repeat)){
                array_push($error,"Bạn phải điền đầy đủ thông tin");
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($error,"Email không hợp lệ");
            }
            if(strlen($password) < 8){
                array_push($error,"Mật khẩu phải dài hơn 8");
            }
            if($password!=$repeat){
                array_push($error,"Mật khẩu không hợp lệ");
            }
            require_once "data.php";
            $kiem_tra= "SELECT * FROM user WHERE email ='$email' ";
            $ket_qua = mysqli_query($check,$kiem_tra);
            $dem = mysqli_num_rows($ket_qua);
            if($dem > 0){
                array_push($error,"Email đã tồn tại");
            }
            if(count($error)>0){
                foreach($error as $loi){
                    echo "<div class='alert alert-danger'>$loi</div>";
                }
             }
            else{
                require_once "data.php";
                $csdl="INSERT INTO user (full_name,email,pass) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($check);
                $stmt_prepare=mysqli_stmt_prepare($stmt,$csdl);
                if($stmt_prepare){
                    mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$password);
                    mysqli_stmt_execute($stmt);
                    echo"<div class ='alert alert-success'>Bạn đã đăng ký thành công</div>";
                }
                else{
                    die("Không đăng ký thành công");
                }
            }
        }
        ?>
        <form action="dangky.php" method="post">

            <input type="text" name="fullname" class="form-input" placeholder="Họ tên">

            <input type="email" name="email" class="form-input" placeholder="Email">

            <input type="password" name="password" class="form-input" placeholder="Mật khẩu">

            <input type="password" name="repeat_password" class="form-input" placeholder="Nhắc lại mật khẩu">

            <button type="submit" name="submit" class="btn-submit">Đăng ký</button>

        </form>

        <p class="login-text">
            Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a>
        </p>

    </div>

</div>

</body>
</html>
