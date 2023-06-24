<style>
  .chitietkhoahoc {
    width: 80%;
    margin: 0 auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .chitietkhoahoc .imgDisplay {
    width: 300px;
  }

  .themKhoaHoc {
    display: none;
    width: 80%;
    margin: 0 auto;

  }

  .chitietkhoahoc .title {
    font-size: 20px;
    margin-bottom: 10px;
  }

  .chitietkhoahoc input[type="file"] {
    font-size: 18px;
  }

  .chitietkhoahoc .thongtin {
    text-align: center;
    margin: 50px 0;
    color: #7CC242;
    font-size: 30px;
  }

  .themKhoaHoc .thongtin {
    text-align: center;
  }

  .chitietkhoahoc table {
    width: 80%;
    margin: 0 auto;

  }

  /* -------- */
  .themKhoaHoc table {
    width: 80%;
    margin: 0 auto;

  }

  .chitietkhoahoc table td {
    padding: 20px;
    line-height: 100%;
    align-content: center;
    align-items: center;
  }

  .themKhoaHoc table td {
    padding: 20px;
    line-height: 100%;
    align-content: center;
    align-items: center;
  }

  .chitietkhoahoc input {
    padding: 10px;
    width: 300px;
  }

  .themKhoaHoc input {
    padding: 10px;
    width: 300px;
  }

  .btnXong {
    padding: 10px 25px;
    background-color: #7CC242;
    border-radius: 16px;
    border: none;
  }

  .btnXong:hover,
  .btnXoaKhoaHoc:hover {
    opacity: 0.7;
  }

  .btnXoaKhoaHoc {
    color: #fff;
    background-color: red;
    padding: 10px;
    border-radius: 16px;
  }

  .chitietkhoahoc a {
    text-decoration: none;
    color: white;
    font-weight: 600;
    font-size: 18px;
  }

  /* them css  */
  .makhoahoc {
    display: flex;
  }
</style>

<?php
  include "connect.php";

  $sql = "select * from `course` where courseID=" . $_GET['idCourse'];
  $result = mysqli_query($connect, $sql) or die("query error submit search");
  $row = mysqli_fetch_assoc($result);
?>

<div class="chitietkhoahoc" id="chiTietKhoaHoc">
  <h3 class="thongtin">Thông tin khóa học</h3>
  <h3 class="makhoahoc">Mã khóa học: <p id="idCourse"><?php echo $row['courseID'] ?></p>
  </h3>
  <form action="khoahoc.php" method="POST">
    <table>
      <tr>
        <td>
          <p class="title">Tên khóa học:</p>
          <input type="text" name="" id="courseName" value='<?php echo $row['courseName'] ?>'>
        </td>
        <td>
          <p class="title">Mô tả: </p>
          <input type="text" name="" id="courseDetail" value='<?php echo $row['courseDetail'] ?>'>
        </td>
      </tr>
      <tr>
        <td style="width:1000px">
          <p style="margin-right: 20px;" class="title">Ảnh:</p>
          <img src=<?php echo $row['img'] ?> id="img" alt="" class="imgDisplay">
          <input type="file" name="" id="fileImg">
        </td>
        <td>
          <p class="title">Giá:</p>
          <input type="text" name="courseFee" id="courseFee" value=<?php echo $row['courseFee'] ?>>
        </td>
      </tr>
      <tr>
        <td>
          <button class="btnXong" type="submit"><a href="" id="btnCapNhatKhoaHoc">Cập nhật</a></button>
          <button class="btnXong" style="background-color: #264653; margin-left: 10px;"><a href="index.php?quanly=khoahoc">Hủy</a></button>
        </td>

        <td>
          <a class="btnXoaKhoaHoc" href=<?php echo "index.php?quanly=xoakhoahoc&idCourse=" . $row['courseID'] ?> id="btnXoaKhoaHoc">Xóa khóa học</a>
        </td>
      </tr>
    </table>
  </form>
</div>