<?php
    include "connect.php";
    
    $stdUpdate = $_POST["studentID"];
    $moneyUpdate = $_POST['moneyUp'];
    $idUpdate = $_POST["rechargeID"];

    $sqlUpdate = "UPDATE  `student`  SET 
        `studentMoney` = '$moneyUpdate'
        WHERE `studentID` = '$stdUpdate'";
        
    $queryUpdate = mysqli_query($connect, $sqlUpdate);
    if($queryUpdate) {
        $sqlDelete = "DELETE FROM `recharge` WHERE `rechargeID` = '$idUpdate'";
        $queryDel = mysqli_query($connect, $sqlDelete); 

        if($queryDel) {
            echo ' <script language="javascript">alert("Xác nhận nạp tiền thành công");</script>';
        }

        echo ' <script language="javascript">window.location="index.php?quanly=qlnap"</script> ';
    }
?>