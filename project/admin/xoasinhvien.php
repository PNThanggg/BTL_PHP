<?php
    include 'connect.php';
    
    $id = isset($_POST['id']) ? (int)$_POST['id'] : '';
    $id_account = $_POST['idAccount'];
    if ($id) {
        try {
            // delete student
            $sql_delete = "DELETE FROM student WHERE studentID = $id";
            mysqli_query($connect, $sql_delete);
            
            // delete account
            $sql_delete_acc = " DELETE FROM account WHERE accountID = $id_account";
            mysqli_query($connect, $sql_delete_acc);
        } catch(Exception $e) {
            echo '<script language="javascript">alert("Có lỗi không thể thêm bài học");</script>';
        }
    }
    
    // Trở về trang danh sách
    header("location: index.php?quanly=hocvien");
?>