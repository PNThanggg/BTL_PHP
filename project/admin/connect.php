<?php
    $severName = "localhost";
    $username = "root";
    $password = "";
    $database = "btl_php";

    $connect = new mysqli($severName, $username, $password, $database);
    mysqli_set_charset($connect, "utf8");

    if(mysqli_connect_errno()) {
        echo "Lỗi kết nối ".mysqli_connect_error();
        echo "Không thể kết nối database";
        exit();
    }
?>