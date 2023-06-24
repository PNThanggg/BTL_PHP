<style>
    .mycourse {
        display: flex;
        border-bottom: #7cc242 2px solid;
        height: 170px;
        padding: 15px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }

    .giaovienthemkhoahoc button a {
        cursor: pointer;
        text-decoration: none;
        color: white;
    }

    .giaovienthemkhoahoc button {
        margin-left: 75%;
        text-transform: uppercase;
        border: none;
        background: #7cc242;
        padding: 10px 30px;
        border-radius: 20px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 1px;
        width: 22%;
        cursor: pointer;
        margin-right: 10px;
    }

    .p1 {
        width: 25%;
    }

    .p1 img {
        height: 100%;
        width: 250px;
        padding: 10px;
    }

    .p2 {
        width: 35%;
        padding: 10px;
        opacity: 0.7;
    }

    .courseName {
        font-size: 19px;
        font-weight: 600;
    }

    .informationCorse {
        font-size: 14px;
    }

    .p3 {
        width: 20%;
        font-size: 30px;
        display: flex;
        justify-content: center;
        padding-top: 55px;
        opacity: 0.7;

    }

    .p3 a {
        color: black;
        padding: 0px 10px 0px 10px;
        text-align: center;
    }

    .p4 {
        justify-content: center;
        width: 20%;
        height: 70%;
        text-align: center;
        padding-top: 55px;
        display: flex;
    }

    .p4 button {
        text-transform: uppercase;
        border: none;
        background: #7cc242;
        padding: 10px 30px;
        border-radius: 20px;
        color: #FFFFFF;
        font-size: .8em;
        font-weight: bold;
        letter-spacing: 1px;
        width: 50%;
        cursor: pointer;
        margin-right: 10px;
    }

    .p4 button a {
        cursor: pointer;
        text-decoration: none;
        color: white;
    }

    .titleList {
        display: flex;
        color: #707070;

    }

    .course {
        width: 80%;
        display: flex;
        font-size: 36px;
        font-weight: bold;
        display: flex;
        margin: 40px;
        color: #707070;
    }

    .course a {
        color: #707070;
    }

    .user {
        width: 20%;
        font-size: 20px;
        display: flex;
        padding: 10px;
        margin: 40px;
    }

    .user .role {
        border-left: 2px solid #707070;
        padding-left: 10px;
        margin-left: 10px;
    }
</style>

<?php
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$role = $_SESSION['role'];

$sql_show = "SELECT * 
        FROM course, account,teacher
        WHERE course.teacherID= teacher.teacherID 
        AND account.accountID= teacher.accountID 
        AND account.accountID=$id
        GROUP BY course.courseID";

$query_show = mysqli_query($connect, $sql_show);

?>
<div class="titleList">
    <div class="course">
        <i style="margin-top: 5px;" class="fa fa-folder-open" aria-hidden="true" style="padding: 0px  10px 0px 0px;"></i>
        <p><a style="font-family: Segoe UI;" href="#"> Các khóa học đã đăng</a></p>
    </div>
    <a style="color: #7CC242; font-family: Segoe UI; font-size: 20px;" href="index.php?quanly=thongtin" class="user">
        <i style="margin-top: 5px;" class="fa fa-graduation-cap" aria-hidden="true"></i>
        <p class="userN"><?php echo $name; ?></p>
        <p class="role">
            <?php
            if ($role == 1) {
                echo 'Học viên';
            } else if ($role == 2) {
                echo 'Giáo viên';
            } else {
                echo '';
            }
            ?>
        </p>

    </a>

</div>
<!-- thêm khoá học cho giáo viên -->
<div class="giaovienthemkhoahoc">

    <button name="themkhochoc"><a href="index.php?quanly=themKH">Thêm khoá học mới</a> <i class="fa fa-plus-circle" aria-hidden="true"></i></button>

</div>

<div class="listMyCourse">
    <?php
    while ($row_pro = mysqli_fetch_array($query_show)) {

    ?>
        <div class="mycourse">

            <div class="p1">
                <img class="imgMyCourse" src="<?= $row_pro['img'] ?>" alt="">
            </div>
            <div class="p2">
                <p class="courseName"><?= $row_pro['courseName'] ?></p>
                <p class="informationCourse">Giáo viên: <?= $row_pro['teacherName'] ?></p>
                <p class="informationCourse">Giá: <?= $row_pro['courseFee'] . " đ" ?> </p>
            </div>
            <div class="p3">
                <a href=""><i class="fa fa-cog" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
            <div class="p4">
                <button name="vaohoc"><a href="index.php?quanly=themBaiHoc&id=<?= $row_pro['courseID'] ?>">Chi tiết</a></button>
                <button name="vaohoc"><a href="#" ?>Sửa</a></button>
            </div>
        </div>
    <?php
    }
    ?>

</div>