<div class="main">

    <?php /*lấy lấy giá trị quản lý từ menu*/

    if (isset($_GET['quanly'])) {
        $bientam = $_GET['quanly'];
    } else {
        $bientam = "trangChu";
    }

    if ($bientam == 'trangChu') {
        include 'danhmuc.php';
    } elseif ($bientam == 'gioiThieu') {
        include("gioithieu.php");
    } elseif ($bientam == 'khoaHoc') {
    ?>
        <div class="screenKH">
            <div class="menudoc">
                <?php include("khoahoc.php"); ?>
            </div>
            <div class="listKH">
                <?php include("course_category.php"); ?>
            </div>
        </div>
    <?php
    } elseif ($bientam == 'blog') {
        include("blog.php");
    } elseif ($bientam == 'lienHe') {
        include("lienhe.php");
    } elseif ($bientam == 'find') {
        include("#");
    } elseif ($bientam == 'myCourse') {
        include("khoahoccuatoi.php");
    } elseif ($bientam == 'teacherCourse') {
        include("khoahoccuagiaovien.php");
    } elseif ($bientam == 'thongtin') {
        include("thongtinhocvien.php");
    } elseif ($bientam == 'login') {
        include("dangnhap.php");
    } elseif ($bientam == 'create') {
        include("dangky.php");
    } elseif ($bientam == 'logout') {
        include("logout.php");
    } elseif ($bientam == 'nhapthongtin') {
        include("nhapthongtincanhan.php");
    } elseif ($bientam == 'chiTiet') {
        include("chitietkhoahoc.php");
    } elseif ($bientam == 'danhgia') {
        include("danhgia.php");
    } elseif ($bientam == 'lesson') {
        include("user.baihoc.php");
    } elseif ($bientam == 'suathongtin') {
        include("suasinhvien.php");
    } elseif ($bientam == 'naptien') {
        include("naptien.php");
    } elseif ($bientam == 'themKH') {
        include("giaovienthemkhoahoc.php");
    } elseif ($bientam == 'themBaiHoc') {
        include("thembaihoc.php");
    } elseif ($bientam == 'themTietHoc') {
        include("tiethoc.php");
    } else { ?>
    <?php

    }
    ?>
</div>

<style>
    .screenKH {
        display: flex;
    }

    .menudoc {
        width: 20%;
    }

    .listKH {
        width: 75%;
    }
</style>