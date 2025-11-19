<?php
$host="localhost";
$dbuser="root";
$dbpass="";
$dbname="dangky_dangnhap";
$port=3308;
$check=mysqli_connect($host,$dbuser,$dbpass,$dbname,$port);
if(!$check){
    die("Không thể kết nối với database");
}
?>