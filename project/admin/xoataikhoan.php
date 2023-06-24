<?php
    include 'connect.php';
    
    $id = isset($_POST['idAccount']) ? (int)$_POST['idAccount'] : '';

    if($id) {
        $sql_delete = "DELETE FROM account WHERE `account`.`accountID` = $id";
        $query = mysqli_query($connect, $sql_delete);
    }
    
    // Trở về trang danh sách
    header("location: index.php?quanly=taikhoan");
?>