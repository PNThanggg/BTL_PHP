<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">

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

    .indam {
        font-weight: bold;
    }

    .gioithieu .menu-head {
        display: flex;
        background-color: #F1F1F1;
        padding: 30px;
        margin-top: 10px;
        box-shadow: #e2e2e2 2px 3px;
    }

    .text-head {
        padding-right: 100px;
        font-size: 20px;
        color: #707070;
    }

    .menu-head a:hover {
        color: #7CC242;
        text-decoration: underline;
    }

    .tieude {
        font-size: 40px !important;
        font-weight: bold;
        margin-bottom: 10px;
        color: #707070;
    }

    .margin20 {
        margin: 20px;
    }

    .pad-bottom10 {
        padding-bottom: 10px;
    }

    .innghieng {
        font-style: italic;
    }

    .gachchan-xanh {
        text-decoration: underline;
        color: #7CC242;
    }

    .red-color {
        color: red !important;
    }

    .soluoc {
        display: flex;
        margin: 50px;
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

    .noidung {
        margin: 50px;
        font-size: 20px;
        color: #707070;
    }

    .noidung .main {
        display: flex;
    }

    .main .text-trai {
        margin-right: 50px;
    }

    .text-trai ol {
        margin: 20px;
    }

    .noidung ol li {
        list-style: decimal;
    }

    .text-phai li {
        list-style: initial;
    }

    .text-trai li a {
        color: #7CC242;
    }
</style>
<?php
    include "connect.php";
    $id = $_GET["id"] ?? 2; 

    $sql_show = "SELECT * FROM course WHERE course.courseID =$id ORDER BY courseName DESC";
    $query_show = mysqli_query($connect, $sql_show);
    $row_pro = mysqli_fetch_array($query_show);
?>

<body>
    <div class="gioithieu">
        <div class="menu-head">
            <p class="indam text-head">Giới thiệu</p>
            <p><a href="index.php?quanly=danhgia&id= <?php echo $row_pro['courseID']; ?>" class="text-head">Đánh giá</a></p>
        </div>
        <?php include 'soluoc.php' ?>
    </div>
    <div class="noidung">
        <p class="tieude">Về khóa học này</p>
        <div class="main">
            <div class="text-trai">
                <p>Đây là khóa học đầu tiên trong chương trình đào tạo trình độ trung cấp,
                    đại học tạo nên chương trình Vi cử nhân lập trình và cấu trúc dữ liệu lớn hơn.
                    Chúng tôi khuyên bạn nên chọn chúng theo thứ tự, trừ khi bạn đã có kiến ​​thức nền về
                    những lĩnh vực này và cảm thấy thoải mái khi bỏ qua.</p>
                <ol>
                    <li><a href="">Giới thiệu về Lập trình C++</a></li>
                    <li><a href="#">Lập trình nâng cao trong C++</a></li>
                    <li><a href="#">Giới thiệu về cấu trúc dữ liệu</a></li>
                    <li><a href="#">Cấu trúc dữ liệu nâng cao</a></li>
                </ol>
                <!-- <p class=""><a href="" class="gachchan-xanh">Xem nhiều hơn</a></p> -->
            </div>
            <div class="text-phai">
                <ul>
                    <li>Tổ chức: PITU</li>
                    <li>Chủ đề: Khoa học máy tính</li>
                    <li>Trình độ: Trung cấp</li>
                    <li>Điều kiện tiên quyết:
                        Đây là khóa học đầu tiên trong chương trình đào tạo trình độ trung cấp, đại học tạo nên chương trình V
                        i cử nhân lập trình và cấu trúc dữ liệu lớn hơn. Chúng tôi khuyên bạn nên chọn chúng theo thứ tự,
                        trừ khi bạn đã có kiến ​​thức nền về những lĩnh vực này và cảm thấy thoải mái khi bỏ qua.
                    </li>
                    <li>Ngôn ngữ: tiếng anh</li>
                    <li>Bản ghi video: Tiếng Anh</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="noidung">
        <div class="tieude">
            <p>Những gì bạn sẽ học</p>
        </div>
        <ol class="margin20">
            <li>Phân tích các bài tập C ++ và áp dụng các thành phần của nó trong phát triển chương trình</li>
            <li>Áp dụng các thao tác nhập / xuất C ++ cơ bản với các kiểu dữ liệu khác nhau</li>
            <li>
                Thiết kế các biểu thức C ++ bằng cách sử dụng các phép toán số học (bao gồm hiểu các hạn chế của chúng,
                chẳng hạn như cắt bớt số nguyên, lỗi làm tròn, chia cho 0, chuyển đổi thu hẹp và mở rộng, ép kiểu, ưu
                tiên và các hàm thư viện toán học chuẩn)
            </li>
            <li>Thiết kế các biểu thức C ++ bằng cách sử dụng các toán tử quan hệ (bao gồm cả hiểu bình đẳng dấu phẩy động)</li>
            <li>Thiết kế các biểu thức C ++ bằng cách sử dụng các toán tử quan hệ (bao gồm cả hiểu bình đẳng dấu phẩy động)</li>
            <li>Thiết kế các câu lệnh lựa chọn C ++ (bao gồm cả lựa chọn lồng nhau)</li>
            <li>Thiết kế các câu lệnh lặp lại C ++ (bao gồm cả điều khiển đếm so với điều khiển sự kiện, điều khiển giám sát)</li>
        </ol>
    </div>
</body>

</html>