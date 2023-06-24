<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        text-decoration: none;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .tieude {
        font-size: 40px !important;
        font-weight: bold;
        margin-bottom: 10px;
        color: #707070;
    }

    .innghieng {
        font-style: italic;
    }

    .red-color {
        color: red !important;
    }

    .soluoc {
        display: flex;
        margin: 50px;
    }

    .soluoc .text1 {
        font-size: 20px;
        color: #707070;
    }

    .soluoc .soluoc-trai {
        width: 60%;
    }

    .soluoc-trai table {
        width: 100%;
        margin-top: 20px;

    }

    .soluoc-trai td {
        font-size: 18px;
        color: #707070;
    }

    .soluoc-trai .text1 {
        margin-right: 30px
    }

    .soluoc-phai img {
        width: 300px;
    }

    .soluoc-phai p {
        margin-left: 20px;
        width: 250px;
        padding: 10px 50px;
        white-space: nowrap;
        background-color: #7CC242;
        text-align: center;
        border-radius: 25px;
    }

    .soluoc-phai a {
        color: #fff;
    }
</style>
<?php
include "connect.php";

if (isset($_GET['thamgia'])) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($connect)) {
        include './connect.php';
    }

    if (isset($_SESSION['id'])) {
        $sqlGetIdStudent =  "select *from student where accountID=" . $_SESSION['id'];
        $res = mysqli_query($connect, $sqlGetIdStudent) or die("query error submit search");
        $r = mysqli_fetch_assoc($res);
        $sql = "INSERT INTO `payment` (`paymentID`, `paymentFee`, `paymentTime`, `mota`, `studentID`, `courseID`) VALUES (NULL, '" . $row_pro['courseFee'] . "', '" . date("Y-m-d") . "', 'Tham gia khóa học " . $row_pro['courseName'] . "', '" . $r['studentID'] . "', '" . $row_pro['courseID'] . "')";
        mysqli_query($connect, $sql);
        echo '<script type="text/javascript">alert("Tham gia thành công");</script>';
        echo '<script type="text/javascript">window.location.href="index.php?quanly=myCourse"</script>';
    } else {
        echo '<script language="javascript">alert("Bạn chưa đăng nhập. Hãy đăng nhập");</script>';
    }
    // header('location: index.php?quanly=myCourse');
}
?>

<body>
    <div class="soluoc">
        <div class="soluoc-trai">
            <p class="tieude"><?php echo $row_pro['courseName'] ?? ''; ?></p>
            <p class="text1"><?php echo $row_pro['courseDetail'] ?? ''; ?></p>
            <table>
                <tr class="innghieng">
                    <td>Thời lượng khóa học</td>
                    <td>Ngôn ngữ</td>
                    <td class="red-color">Học phí</td>
                </tr>
                <tr>
                    <td>6 tuần</td>
                    <td>Tiếng Anh</td>

                    <td class="red-color" style="text-decoration:line-through"><?php echo ($row_pro['courseFee'] ?? 0 + 200000); ?> đ</td>
                </tr>
                <tr>
                    <td class="red-color" colspan="3" style="text-align: right; padding-right: 122px;"><?php echo $row_pro['courseFee'] ?? ''; ?> đ</td>
                </tr>
            </table>
        </div>
        <div class="soluoc-phai">

            <img src="<?php echo $row_pro['img']; ?>">

            <?php
            if(isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 1) {
                    ?>
                        <p><a href=<?= "http://localhost/PHP_BTL_PiTu/user/index.php?quanly=chiTiet&id=" . $row_pro['courseID'] ?? 1 . "&thamgia=true"  ?>>Tham gia ngay</a></p>
                    <?php
                    }
            }
            ?>
        </div>
    </div>
</body>

</html>