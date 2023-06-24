<?php
    include 'uploadfile.php';
    $idAccount = $_SESSION['id'] ;
    $sqlSelect = "SELECT * FROM account WHERE accountID = $idAccount";
    $query = mysqli_query($connect,$sqlSelect);
    $row = mysqli_fetch_array($query);
    if(isset($_POST["btnNapThe"])){
        $timestamp=strtotime("+7 hours");
        $cost= $_POST['cost'];
        $img_link= upload($_FILES['imgCheck']);
        $sqlInsert = "INSERT INTO `recharge`(`cost`, `imgCheck`, `timestamp`, `accountID`) VALUES ('$cost','$img_link','$timestamp','$idAccount')";
        $queryInsert = mysqli_query($connect, $sqlInsert);
        if($queryInsert){
            echo ' <script language="javascript">alert("Chúng tôi sẽ xác nhận yêu cầu nạp tiền của bạn trong vài phút");</script>';
            }
        // Trở về trang danh sách
        echo ' <script language="javascript">window.location="index.php?quanly=thongtin"</script> ';
    }
?>
<div class="recharge">
    <hr>
    <h2>Thực hiện nạp tiền vào tài khoản</h2>
    <div class="guide"><h3>Hướng dẫn thanh toán</h3>
        <br>b1. Chuyển tiền vào số tài khoản bên dưới
        <br>b2. Chụp lại biên lai thanh toán của bạn
        <br>b3. Xác nhận lại các thông tin vào biểu mẫu dưới đây.
    </div>
    <form action="index.php?quanly=naptien" method="POST">
        <p class="title">Tên tài khoản</p>
        <input type="text" value="<?php echo $row['useName'];?>" disabled name="name">
        <p class="title">Nhập số tiền</p>
        <input type="text" name="cost">
        <p class="title">Xác nhận lại với hình ảnh biên lai của bạn</p>
        <input type="file" name="imgCheck" ><br>
        <button type="submit" name="btnNapThe" class="btnNapThe">Nạp thẻ</button>

    </form>
</div>
<style>
    .recharge{
        width: 1000px;
        margin: 30px auto;
        font-family: Calibri;
    }
    .recharge h2{
        margin-top: 80px;
        margin-bottom: 30px;
        font-size: 35px;
        color: #555;
    }
    .recharge .title{
        margin: 10px 0;
        color: #696969;
        font-size: 25px;
    }
    .recharge .guide{
        color: #696969;
        font-size: 18px;
        font-style: italic;
        
    }
    .guide h3{
        color: #7CC242;
        margin-top: 10px;
        margin-bottom: 0;
    }
    .recharge input{
        width: 100%;
        margin-top: 10px;
        height: 40px;
        color: #696969;
        padding: 5px;
        padding-left: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 18px;
    }
    .recharge input[type="file"]{
        border: none;
        padding-left: 0;
    }
    .recharge .btnNapThe{
        width: 100%;
        padding: 10px;
        font-size: 20px;
        color: #fff;
        background-color: #7CC242;
        border: none;
        margin: 30px 0;
        cursor: pointer;
    }
    .recharge .btnNapThe:hover{
        opacity: 0.8;
    }
</style>