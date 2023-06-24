<?php
include "connect.php";

if (isset($_SESSION['id'])) {
    $accountID = $_SESSION['id'];
    echo "<script language='javascript'>console.log('" . $accountID . "')</script>";
    $sql = "SELECT * FROM chat WHERE accountID = '$accountID' ORDER BY msgID  ASC";
    $query = mysqli_query($connect, $sql);

    if($query) {
        while ($row = mysqli_fetch_array($query)) {
            ?>
                    <div id="chat_data">
                        <span style="color: #737373; font-size: 11px; white-space: nowrap; position: absolute; top: 0; left: -20px;"><?= date('g : i A jS', $row['timestamp']) ?></span>
                        <span style="float: right; background-color: #7CC242;  color: #fff; border-radius: 20px; max-width: 60%; word-wrap: break-word; "><?= $row['msg'] ?></span>
                    </div>
            <?php
                }
    }
}

?>
<style>
    #chat_data {
        position: relative;
        width: 100%;
        min-height: 40px;
        margin-bottom: 10px;
        display: flex;
        justify-content: flex-end;
    }

    #chat_data span {
        padding: 10px 15px;
        margin: 10px 20px;
        /* line-height: 30px; */
        min-height: 40px;
        text-align: right;
    }
</style>