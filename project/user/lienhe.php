<?php
    include "connect.php";

    $idAccount = $_SESSION['id'] ?? 1;
    $sql = "SELECT * FROM account,student,payment,course
        WHERE account.accountID = student.accountID
        AND student.studentID = payment.studentID
        AND payment.courseID = course.courseID
        AND account.accountID = $idAccount";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);
?>

<div class="contact">
    <hr>
    <h2>Chúng tôi có thể giúp gì cho bạn, <?php if (isset($row['useName'])) echo $row['useName']; ?></h2>
    <h3 style="color: #737373"><?php if (!isset($_SESSION['id'])) {
                                    echo '<br>Hãy <a href = "index.php?quanly=login" style="color: #7CC242">Đăng nhập</a>  để gửi phản hồi đến chúng tôi';
                                } ?></h3>
    <p class="title">Chủ đề</p>
    <select id="form-select">
        <option value>Chọn một danh mục</option>
        <option value="1">Cài đặt tài khoản</option>
        <option value="2">Nội dung khóa học</option>
        <option value="3">Hóa đơn học phí</option>
        <option value="4">Các lỗi/ sự cố kỹ thuật</option>
        <option value="5">Chứng chỉ</option>
        <option value="6">Khác</option>
    </select>
    <p class="title">Tên khóa học</p>
    <p class="note">Nếu bạn có bất kỳ câu hỏi nào liên quan đến bài tập, điểm số hoặc cấu trúc của
        một khóa học cụ thể, vui lòng đăng trực tiếp lên diễn đàn thảo luận cho khóa học đó.</p>
    <select id="form-select">
        <option value>----------------------</option>
        <option value="1">Tính năng này không dành riêng cho 1 khóa học</option>
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <option value=""><?php echo $row['courseName']; ?></option>
        <?php }; ?>
        <!-- <option value="3">Lập trình C++: Kỹ năng cơ bản</option>
        <option value="4">Giới thiệu về lập trình Java cho người mới bắt đầu</option>
        <option value="5">Giới thiệu về JavaScript</option>
        <option value="<">Cơ bản về khoa học máy tính</option> -->
    </select>
    <p class="title">Thông tin chi tiết</p>
    <p class="note">Nhanh chóng và hiệu quả nhất mà chúng tôi có thể phản hồi!</p>
    <textarea id="message" cols="30" rows="10"></textarea>

    <a href="">
        <?php
        if (isset($_SESSION['id'])) {
            echo '
                <div class="btn-create-inner">Tạo một phiếu hỗ trợ</div>';
        } else {
            echo '<div class="btn-create-inner" style="background-color: #737373; opacity: 0.8;
                ">Tạo một phiếu hỗ trợ</div>';
        }
        ?>

    </a>
</div>
<style>
    .contact {
        width: 1000px;
        margin: 30px auto;
        font-family: Calibri;
    }

    .contact h2 {
        margin-top: 80px;
        font-size: 35px;
        color: #555;
    }

    .contact .title {
        margin: 10px 0;
        color: #696969;
        font-size: 25px;
    }

    .contact #form-select {
        width: 1000px;
        height: 40px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #form-select option {
        color: #696969;
        font-size: 14px;
    }

    .contact textarea {
        width: 100%;
        height: auto;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px 12px;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .contact .note {
        font-style: italic;
        margin-bottom: 10px;
        color: #737373;
    }

    .btn-create-inner {
        background-color: #7CC242;
        text-align: center;
        padding: 15px 0;
        color: #fff;
        font-size: 20px;
        border-radius: 4px;
    }

    .btn-create-inner:hover {
        opacity: 0.8;
    }
</style>