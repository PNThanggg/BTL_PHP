<?php 
    include 'connect.php';

    $accountID = $_SESSION['id'] ?? 1;
    
    if(isset($_POST['send-message'])):
        if(($_POST['Aa']) != ""):
            $msg = $_POST['Aa'];
            $timestamp = strtotime("+7 hours");
            $query = "INSERT INTO `chat`(`accountID`, `msg`,`timestamp`) VALUES ('$accountID', '$msg', '$timestamp') ";
            $run = $connect -> query($query);
            endif;
        endif;
?>

<div class="message-button" onclick="actionChat()">
    <img src="./img/Icon awesome-facebook-messenger.png" alt="">
</div>

<div class="chatbox" id="myForm">
    <h4 class="head-chatbox">Nhắn tin trực tuyến ngay</h4>
    <div class="chat-area"> 
        <div class="message">
            <img src="./img/ic_account_circle_24px.png" alt="" class="icon-user">
            <div class="text" style="width: 30%;">Xin chào</div>
            <img src="./img/ic_check_circle_24px.png" alt="" class="icon-seen">
        </div>
        <div class="message">
            <img src="./img/ic_account_circle_24px.png" alt="" class="icon-user">
            <div class="text">Chúng tôi có thể giúp gì cho bạn</div>
            <img src="./img/ic_check_circle_24px.png" alt="" class="icon-seen">
        </div>
        <div id="chat">
            <?php
            include 'chatdata.php';
            if(empty($_SESSION['id'])){
                ?>
                <div id="chat_data">
                    <span style="text-align: center;">Hãy <a href = "index.php?quanly=login" style="color: #7CC242">Đăng nhập</a> để gửi chat trực tiếp với chúng tôi!!</span>
                </div>
            <?php }
            ?>
        </div>
        
    </div>
    <form class="reply-message" method="post" id="getform" action=""> 
        <!-- <img src="./img/Icon ionic-md-add-circle-outline.png" class="icon-reply" alt=""> -->
        <input type="text" placeholder="Aa" class="text-box" value="" name="Aa" id="Aa">
        <!-- <a href="" name="send-message"><img src="./img/Icon ionic-ios-send.png" class="icon-reply" alt=""></a> -->
        <input type="submit" id="button-reply" value="Gửi" name="send-message" >
        <!-- <button  name="send-massage" id="button-reply">Gửi</button> -->
    </form>
</div>
<script>
            document.getElementById('button-reply').addEventListener('click', loadMessage);
            // document.getElementById('getform').addEventListener('submit', loadMessage);

            function loadMessage(e){

                // var msg = document.getElementById('Aa').value;

                var xhr = new XMLHttpRequest();
                console.log(xhr);
                xhr.open("GET", "chatdata.php", true);
                xhr.onreadystatechange = function() {
                    console.log('READY STATE: ', xhr.readyState);
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("chat").innerHTML = this.responseText;
                    console.log(xhr.responseText);
                    }   
                };
                xhr.send();
            }
            
        </script>
<style>
    .color-web{
      color:#7CC242;
    }
.chatbox{
    background-color: #fff;
    display: none;
    position: fixed;
    bottom: 65px;
    right: 30px;
    width: 300px;
    height: 360px;
    border: solid #d6d6d6 2px;
    box-shadow: 3px 6px 5px #b7b7b7 ;

}
.head-chatbox{
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
.chat-area{
    height: 65%;
    overflow:auto; 
}
.message {
    display: flex;
    width: 90%;
    min-height: 25%;
    justify-content:flex-start;
}
.message .icon-seen{
    width: 20px;
    height: 20px;
    margin-top: 11px;
}
.message .icon-user{
    width: 40px;
    height: 40px;
    margin-left: 5px;
}
.message .text{
    width: 100%;
    height: 40px;
    background-color: #d2d2d2;
    line-height: 40px;
    border-radius: 20px;
    padding-left: 20px;
    margin:0 10px;
}
.reply-message{
    width: 100%;
    margin-top: 14px;
    display: flex;
    justify-content: space-around;
    align-items: center;

}
.reply-message>.icon-reply{
    width: 30px;
    height: 30px;
}
.reply-message .text-box{
    border-radius: 20px ;
    color: #737373;
    border: #737373 solid 1px;
    width: 70%;
    height: 40px;
    padding:0 15px;
}
.reply-message #button-reply{
    background-color: #fff;
    border: #737373 solid 3px;
    padding: 5px;
    font-weight: bold;
    color: #737373;
    border-radius: 10px;

}
.reply-message #button-reply:hover{
    border: #7CC242 solid 3px;
    color: #7CC242;
    cursor: pointer;

}
/* .text-box::placeholder { 
    color: #7CC242 !important;
} */
/* .text-box:focus { 
    outline: none !important;
    border-color: #7CC242;
} */
.message-button img{
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
    if(form.style.display.localeCompare("block") !== 0){
        document.getElementById("myForm").style.display = "block";
        return;
    }
    if(!form.style.display.localeCompare("block")){
        document.getElementById("myForm").style.display = "none";
        return;
    }
}
</script>