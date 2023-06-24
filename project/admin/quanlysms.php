<?php
    include "connect.php";

    $sql = "SELECT * FROM chat INNER JOIN account ON chat.accountID = account.accountID ORDER BY chat.msgID DESC LIMIT 1"; 
        
    $query = mysqli_query($connect, $sql);
?>
<div class="qlsms">
    <table border="1">
        <tr class="title">
            <td>ID</td>
            <td>Tên tài khoản</td>
            <td>Nội dung</td>
            <td>Thời gian</td>
            <td>Quản lý</td>
        </tr>
        <?php 
            if($query) {
                while($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $row['msgID'];?></td>
                        <td><?= $row["useName"];?></td>
                        <td><?= $row["msg"];?></td>
                        <td><?=date('g : i A jS', $row['timestamp'])?></td>
                        <td class="confirm">
                                <form action="acceptNap.php"  method="post">
                                    <input type="submit" name="accept" value="Xem"/>
                                    <input type="hidden" name="rechargeID" value="<?php echo $row['rechargeID'];?>"/>
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

    table {
        width: 90%;
        border-collapse: collapse;
        margin: 30px auto;
        text-align: center;
    }

    .qlsms .title{
        background: #7CC242;
    }

    table td {
        width: 100px;
        padding:10px 10px;
        border-spacing: 0px;
    }

    .confirm form {
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