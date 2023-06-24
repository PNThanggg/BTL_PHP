<?php
    include "connect.php";

    $sql = "SELECT * FROM recharge, account, student where account.accountID = recharge.accountID and student.accountID = account.accountID";
    $query = mysqli_query($connect, $sql);

    if (isset($_POST["huy"])) {
        $rechargeID = $row['rechargeID'];
        $sqlDelete = "DELETE FROM `recharge` WHERE `rechargeID` = '$rechargeID'";
        $queryDel = mysqli_query($connect, $sqlDelete);

        header("location: index.php?quanly=qlnap");
    }
?>

<div class="dsnaptien">
    <table border="1">
        <tr class="title">
            <td>ID</td>
            <td>Tên tài khoản</td>
            <td>Số tiền nạp</td>
            <td>Ảnh xác nhận</td>
            <td>Thời gian</td>
            <td>Số dư ban đầu</td>
            <td>Số dư sau nạp</td>
            <td>Quản lý</td>
        </tr>
        <?php 
            if($query) {
                while($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $row["rechargeID"]; ?></td>
                            <td><?= $row["useName"]; ?></td>
                            <td><?= $row["cost"].' đ'; ?></td>
                            <td><img class="imgcheck" src=<?php echo $row['imgcheck'] ?> /></td> 
                            <td><?= date('g : i A jS', $row['timestamp'])?></td>
                            <td><?= $row["studentMoney"].' đ'; ?></td>
                            <td><?= $row["studentMoney"] + $row["cost"] .' đ'; ?></td>
                            <td class="confirm">
                                <form action="acceptNap.php"  method="post">
                                    <input type="submit" name="accept" value="Xác nhận"/>
                                    <input type="hidden" name="rechargeID" value="<?php echo $row['rechargeID'];?>"/>
                                    <input type="hidden" name="moneyUp" value="<?php echo ($row['studentMoney'] + $row["cost"]);?>"/>
                                    <input type="hidden" name="studentID" value="<?php echo $row['studentID'];?>"/>
                                    <input type="button" name="huy" value="Hủy"/>
                                </form>
                            </td>
                        </tr>
                    <?php 
                }
            }
            ?>
    </table>
</div>
<style>
    * {
        padding: 0;
        margin: 0; 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-sizing: border-box;
    }
    table{
        width: 90%;
        border-collapse: collapse;
        margin: 30px auto;
        text-align: center;
    }
    .dsnaptien .title{
        background: #7CC242;
    }
    .dsnaptien .imgcheck{
        width: 100px;
        height: 150px;
    }
    .title td{
        color: #fff;
        padding:10px 30px;
        font-weight: bold;
    }
    
    table td {
        width: 100px;
        padding:10px 10px;
        border-spacing: 0px;
    }
    
    .confirm form{
        display: inline-flex;
    }

    .confirm input, button {
        font-size: 15px;
        background: #264653;
        padding:0 10px;
        color: #fff;
        width: 50px;
        height: 30px;
        cursor: pointer;    
        border: none;
        border-radius: 10px;
        margin: 5px;
    }
    
    .confirm input[type='submit'] {
        background: #E76F51;
        width: 100px;
    }

    .confirm input:hover {
        opacity: 0.8;
    }
</style>