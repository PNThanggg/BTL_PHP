<?php
    $severName = "localhost";
    $userName  = "root";
    $password  = "";
    $databaseName = "btl_php";

    $connect = new mysqli($severName, $userName, $password, $databaseName);
    mysqli_set_charset($connect, "utf8");

    if(mysqli_connect_errno()){
        echo "Lỗi kết nối".mysqli_connect_error();
        echo "Không thể kết nối database";
        exit();
    }
?>