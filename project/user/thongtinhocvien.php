<?php
    include 'connect.php';

    $idAccount = $_SESSION['id'] ?? 1;

    $sql_show = "SELECT * FROM account,student
        WHERE account.accountID = student.accountID 
        AND account.accountID = '$idAccount'";
    $query_show = mysqli_query($connect, $sql_show);
    
    if($query_show) {
        $row_pro = mysqli_fetch_array($query_show);
    }
?>
<style>
    .thongtinhocvien {
        font-family: "Segoe UI", "Calibri", sans-serif;
        padding: 0;
        margin: 20px;
    }

    .font-bold {
        font-weight: bold;
    }

    .green-italic {
        color: #7CC242;
        font-style: italic;
    }

    .header {
        display: flex;
        margin: 40px;

        justify-content: space-between;
        color: #707070;
    }

    .header .infor {
        font-size: 36px;
        font-weight: bold;
        display: flex;
    }

    .header .infor .role {
        border-left: thick solid #707070;
        padding-left: 10px;
        margin-left: 10px;
    }

    .header .infor .name {
        padding: 0 10px;
    }

    .course {
        font-size: 20px;
        display: flex;
        padding: 10px;
    }

    i {
        padding: 5px;
    }

    .sub-header {
        display: flex;
        margin: 40px;
        justify-content: space-between;
        color: #707070;
        font-size: 20px;
    }

    .sub-header .text1 {
        display: flex;
        padding: 10px;
    }

    .sub-header .text2 {
        display: flex;
        padding: 10px;
    }

    .text2 p {
        padding-left: 15px;
        color: #707070;
    }

    .content a {
        color: #7CC242;
        font-style: italic;
    }

    .tb-content {
        margin-left: 100px;
        width: 1000px;
        margin-bottom: 50px
    }

    .tb-content td {
        display: inline-flex;
        color: #707070;
        margin: 15px;

    }

    .tb-content p {
        padding-right: 30px;
    }

    .tb-content .editing {
        float: right;
        color: #7CC242;
    }

    .tb-content .infor {
        border-bottom: solid 1px;
        width: 600px;
    }
</style>
<div class="thongtinhocvien">
    <div class="header">
        <div class="infor">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            <p class="userN"><?php echo $row_pro['useName'] ?></p>
            <p class="role">
                <?php
                if ($row_pro['role'] == 1) {
                    echo 'Học viên';
                } else if ($row_pro['role'] == 2) {
                    echo 'Giáo viên';
                } else {
                    echo 'Admin';
                }
                ?>
            </p>
        </div>
        <div style="color: #7CC242;" class="course">
            <i class="fa fa-folder-open" aria-hidden="true"></i>
            <p><a style="color: #7CC242;" href="index.php?quanly=myCourse"> Các khóa học của tôi</a></p>
        </div>
    </div>
    <div class="sub-header">
        <div class="text1">
            <i class="fa fa-user"></i>
            <p>Thông tin cá nhân</p>
        </div>
        <div class="text2">
            <p>Số dư TK</p>
            <p><?= $row_pro['studentMoney'] ?> đ</p>
            <p><a href="index.php?quanly=naptien" class="green-italic">Nạp tiền</a></p>
        </div>
    </div>
    <div class="content">
        <form action="" method="get">
            <table class="tb-content">
                <tr>
                    <td colspan="2" class="font-bold">
                        <p> Mã học viên</p>
                        <p><?= $row_pro['studentID'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="infor">
                        <p class="font-bold">Email</p>
                        <p><?= $row_pro['studentEmail'] ?></p>
                    </td>
                    <td class="editing">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <p><a href="index.php?quanly=suathongtin&id=<?= $row_pro['studentID'] ?>">Chỉnh sửa</a></p>
                    </td>
                </tr>
                <tr>
                    <td class="infor">
                        <p class="font-bold">Họ tên</p>
                        <p><?= $row_pro['studentName'] ?></p>
                    </td>
                    <td class="editing">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <p><a href="index.php?quanly=suathongtin&id=<?= $row_pro['studentID'] ?>">Chỉnh sửa</a></p>
                    </td>
                </tr>
                <tr>
                    <td class="infor">
                        <p class="font-bold">Mật khẩu</p>
                        <p><?= $row_pro['pass'] ?></p>
                    </td>
                    <td class="editing">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <p><a href="index.php?quanly=suathongtin&id=<?= $row_pro['studentID'] ?>">Chỉnh sửa</a></p>
                    </td>
                </tr>
                <tr>
                    <td class="infor">
                        <p class="font-bold">Số điện thoại</p>
                        <p><?= $row_pro['studentPhone'] ?></p>
                    </td>
                    <td class="editing">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <p><a href="index.php?quanly=suathongtin&id=<?= $row_pro['studentID'] ?>">Chỉnh sửa</a></p>
                    </td>
                </tr>
                <tr>
                    <td class="infor">
                        <p class="font-bold">Địa chỉ</p>
                        <p><?= $row_pro['studentAdress'] ?></p>
                    </td>
                    <td class="editing">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <p><a href="index.php?quanly=suathongtin&id=<?= $row_pro['studentID'] ?>">Chỉnh sửa</a></p>
                    </td>
                </tr>
                <tr>
                    <td class="infor">
                        <p class="font-bold">Ngày sinh</p>
                        <p><?= $row_pro['studentDate_Birth'] ?></p>
                    </td>
                    <td class="editing">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <p><a href="index.php?quanly=suathongtin&id=<?= $row_pro['studentID'] ?>">Chỉnh sửa</a></p>
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>