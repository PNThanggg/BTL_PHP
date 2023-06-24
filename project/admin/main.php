<div class="mainadmin">

    <?php /*lấy lấy giá trị quản lý từ menu*/

    if (isset($_GET['quanly'])) {
        $bientam = $_GET['quanly'];
    } else {
        $bientam = "hocvien";
    }

    if ($bientam == 'hocvien') {
        include("dssinhvien.php");
    } elseif ($bientam == 'khoahoc') {
        include("khoahoc.php");
    } elseif ($bientam == 'themkhoahoc') {
        include("themkhoahoc.php");
    } elseif ($bientam == 'chitietkhoahoc') {
        include("./chitietkhoahoc.php");
    } elseif ($bientam == 'xoakhoahoc') {
        $idCourse = $_GET['idCourse'];
        $sqlDeleteLesson = "DELETE FROM lesson where courseID=" . $idCourse;
        $sqlDeleteComment = "DELETE FROM comment where courseID=" . $idCourse;
        $sqlDeletePayment = "DELETE FROM payment where courseID=" . $idCourse;

        $sqlDeleteCourse = "DELETE FROM course where courseID=" . $idCourse;
        mysqli_query($connect, $sqlDeleteLesson) or die("query error submit search");
        mysqli_query($connect, $sqlDeleteComment) or die("query error submit search");
        mysqli_query($connect, $sqlDeletePayment) or die("query error submit search");
        mysqli_query($connect, $sqlDeleteCourse) or die("query error submit search");
        include("./khoahoc.php");
    } elseif ($bientam == 'khoanthu') {
        include("khoanthu.php");
    } elseif ($bientam == 'thongkebaocao') {
        include("#");
    } elseif ($bientam == 'khac') {
        include("#");
    } elseif ($bientam == 'taokhoanthu') {
        include("taokhoanthu.php");
    } elseif ($bientam == 'themtk') {
        include("themtaikhoan.php");
    } elseif ($bientam == 'themsv') {
        include("themsinhvien.php");
    } elseif ($bientam == 'taikhoan') {
        include("dstaikhoan.php");
    } elseif ($bientam == 'suasv') {
        include("suasinhvien.php");
    } elseif ($bientam == 'qlnap') {
        include("quanlynaptien.php");
    } elseif ($bientam == 'qlsms') {
        include("quanlysms.php");
    } elseif ($bientam == 'logout') {
        // unset($_SESSION["isLogined"]);
        // // $_SESSION['isLogined']= false;
        // header("Location:http://localhost/PHP_BTL_PiTu/index.php?quanly=login");

    } else if ($bientam == 'adminlogout') {

        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        unset($_SESSION["role"]);
        unset($_SESSION["isLogined"]);
        header("Location:http://localhost/PHP_BTL_PiTu/user/index.php?quanly=login");
    } else { ?>


    <?php
    }
    ?>
</div>