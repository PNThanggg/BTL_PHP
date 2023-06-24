<div class="menu" align="center">
    <ul>
        <li><a href="index.php?quanly=trangChu">Trang chủ</a></li>
        <li><a href="index.php?quanly=gioiThieu">Giới thiệu</a></li>
        <li><a href="index.php?quanly=khoaHoc">Khoá học</a></li>
        <li><a href="index.php?quanly=blog">Blog</a></li>
        <li><a href="index.php?quanly=lienHe">Liên hệ</a></li>
        <li>
            <a href="index.php?quanly=khoaHoc"><i class="fa fa-search" aria-hidden="true"></i></a>
        </li>
        <li>
            <?php
            if (isset($_SESSION['id'])) {
                if ($_SESSION['role'] == 1) {
            ?>
                    <a href="index.php?quanly=myCourse"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
                <?php
                } else if ($_SESSION['role'] == 2) {
                ?>
                    <a href="index.php?quanly=teacherCourse"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
                <?php
                } else {
                }
            } else {
                ?>
        <li><a href="index.php?quanly=login"><i class="fa fa-folder-open" aria-hidden="true"></i></a></li>

    <?php
            }
    ?>
    </li>
    <?php
    if (isset($_SESSION['id'])) {

    ?>
        <!-- nếu là học viên thì hiện thông tin cá nhân, nếu là giáo viên thì không hiện -->
        <?php
        if ($_SESSION['role'] == 1) {
        ?>
            <li><a href="index.php?quanly=thongtin"> <i class="fa fa-user" aria-hidden="true"></i></a></li>
        <?php
        }
        ?>
        <li> <a href="index.php?quanly=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
    <?php
    } else {
    ?>
        <li><a href="index.php?quanly=login"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>

    <?php
    }
    ?>
    </ul>

</div>