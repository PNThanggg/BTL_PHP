<?php
include 'connect.php';
$accountID = $_SESSION['id'];
echo $accountID;
// if(isset($_POST['send-message'])){
//     if(isset($_POST['submit'])):
//         $msg=$_POST['Aa'];
//         $query = "INSERT INTO `chat`(`name`, `msg`) VALUES ('$name', '$msg') ";
//         $run = $connect->query($query);
//     endif;
// }
?>
<div class="message-button" onclick="actionChat()">
    <img src="./img/Icon awesome-facebook-messenger.png" alt="">
</div>

<div class="chatbox" id="myForm">
    <h4 class="head-chatbox">Welcome to online chat</h4>
    <div class="chat-area">
        <div class="message">
            <img src="./img/ic_account_circle_24px.png" alt="" class="icon-user">
            <div class="text" style="width: 30%;">Hello</div>
            <img src="./img/ic_check_circle_24px.png" alt="" class="icon-seen">
        </div>
        <div class="message">
            <img src="./img/ic_account_circle_24px.png" alt="" class="icon-user">
            <div class="text">How can I help you?</div>
            <img src="./img/ic_check_circle_24px.png" alt="" class="icon-seen">
        </div>
        <div id="chat"></div>
    </div>
    <form class="reply-message" action="" method="post">
        <img src="./img/Icon ionic-md-add-circle-outline.png" class="icon-reply" alt="">
        <input type="text" placeholder="Aa" class="text-box" value="" name="Aa">
        <!-- <a href="" name="send-message"><img src="./img/Icon ionic-ios-send.png" class="icon-reply" alt=""></a> -->
        <input type="submit" value="send" name="send-message" class="reply">
    </form>
</div>

<style>
    .color-web {
        color: #7CC242;
    }

    .chatbox {
        background-color: #fff;
        display: none;
        position: fixed;
        bottom: 65px;
        right: 30px;
        width: 300px;
        height: 360px;
        border: solid #d6d6d6 2px;
        box-shadow: 3px 6px 5px #b7b7b7;

    }

    .head-chatbox {
        width: 100%;
        background-color: #7CC242;
        height: 50px;
        margin-top: 0;
        margin-bottom: 15px;
        line-height: 50px;
        font-size: 20px;
        text-align: center;
        color: #fff;
    }

    .chat-area {
        height: 65%;
    }

    .message {
        display: flex;
        width: 90%;
        min-height: 25%;
        justify-content: flex-start;
    }

    .message .icon-seen {
        width: 20px;
        height: 20px;
        margin-top: 11px;
    }

    .message .icon-user {
        width: 40px;
        height: 40px;
        margin-left: 5px;
    }

    .message .text {
        width: 100%;
        height: 40px;
        background-color: #d2d2d2;
        line-height: 40px;
        border-radius: 20px;
        padding-left: 20px;
        margin: 0 10px;
    }

    .reply-message {
        width: 100%;
        margin-top: 14px;
        display: flex;
        justify-content: space-around;
        align-items: center;

    }

    .reply-message>.icon-reply {
        width: 30px;
        height: 30px;
    }

    .reply-message .text-box {
        border-radius: 20px;
        color: #737373;
        border: #737373 solid 1px;
        width: 70%;
        height: 40px;
        padding: 0 15px;
    }

    .reply-message .reply {
        background-color: #fff;
        border: none;
    }

    /* .text-box::placeholder { 
    color: #7CC242 !important;
} */
    /* .text-box:focus { 
    outline: none !important;
    border-color: #7CC242;
} */
    .message-button img {
        position: fixed;
        right: 20px;
        bottom: 20px;
        cursor: pointer;
        width: 40px;
        height: 40px;
    }
</style>
<script>
    function actionChat() {
        const form = document.getElementById("myForm");
        // console.log( form.style.display.localeCompare("block"));
        if (form.style.display.localeCompare("block") !== 0) {
            document.getElementById("myForm").style.display = "block";
            return;
        }
        if (!form.style.display.localeCompare("block")) {
            document.getElementById("myForm").style.display = "none";
            return;
        }
    }
</script>