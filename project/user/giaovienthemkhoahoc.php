<?php
  include "connect.php";

  $teacherID = $_SESSION['id'] ?? 1;

  $sql_GV = "SELECT * FROM teacher WHERE accountID=$teacherID LIMIT 1";
  $query_GV = mysqli_query($connect, $sql_GV);
  $row_GV = mysqli_fetch_array($query_GV);

  if (isset($_POST['themkhoahoc'])) {
    $img_link = $_POST['img'];
    $tenKhoaHoc = $_POST['tenkhoahoc'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $video_id = $_POST['video_id'];
    $categoryID = $_POST['category_id'];

    $sql = "INSERT INTO `course` (`courseID`, `courseName`, `courseDetail`, `courseFee`, `img`, `videoDemo`, `categoryID`, `teacherID`) 
        VALUES (NULL, '" . $tenKhoaHoc . "', '" . $mota . "', '" . $gia . "', '" . $img_link . "', '" . $video_id . "', '" . $categoryID . "', '" . $row_GV['teacherID'] . "')";
    if (mysqli_query($connect, $sql) == true) {
      echo '<script language="javascript">alert("Thêm khoá học thành công");</script>';
      echo '<script type="text/javascript">window.location.href="index.php?quanly=teacherCourse"</script>';
    } else {
      echo '<script language="javascript">alert("Có lỗi không thể thêm khoá học");</script>';
      echo '<script type="text/javascript">window.location.href="index.php?quanly=teacherCourse"</script>';
    }
}

  $sql_TL = "SELECT * FROM category";
  $query_TL = mysqli_query($connect, $sql_TL);
?>
<style>
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

  .themKhoaHoc input {
    padding: 10px;
    width: 500px;
    max-width: 500px;
    min-width: 300px;
  }

  .btnXong {
    padding: 10px;
    background-color: #7CC242;
    border-radius: 16px;
    color: white;
    font-weight: 900;
    width: 200px;
  }

  .btnXong a {
    text-decoration: none;
    color: white;
  }

  .btnXoaKhoaHoc {
    color: red;
    font-weight: 900;
  }

  .headThemKhoaHoc {
    font-size: 24px;
    font-weight: bold;
    margin-left: 12%;
    color: #7CC242;
  }
</style>

<div class="headThemKhoaHoc">
  <h3>Thêm khoá học mới</h3>
</div>
<div class="themKhoaHoc" id="themKhoaHoc">
  <form method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <p>Tên khóa học:</p>
          <input type="text" name="tenkhoahoc" id="">
        </td>
        <td>
          <p>Mô tả: </p>
          <input type="text" name="mota" id="">
        </td>
      </tr>
      <tr>
        <td>
          <p>Ảnh:</p>
          <input type="text" name="img" id="">
        </td>
        <td>
          <p>Giá:</p>
          <input type="number" name="gia" id="">
        </td>
      </tr>
      <tr>
        <td>
          <p>Thể loại:</p>
          <select name="category_id" id="" style="width: 100%;  border-radius: 1px; padding: 10px;">
            <?php
            while ($row_TL = mysqli_fetch_array($query_TL)) {
            ?>
              <option value="<?php echo $row_TL['categoryID'] ?>"><?php echo $row_TL['categoryID'] . " - " . $row_TL['categoryName'] ?></option>
            <?php
            }
            ?>
          </select>
        </td>
        <td>
          <p>Video giới thiệu:</p>
          <input type="text" name="video_id" id="">
        </td>
      </tr>

      <tr>
        <td>
          <button type="submit" name="themkhoahoc" class="btnXong">Thêm khóa học</button>
        </td>

        <td>
          <button class="btnXong"><a href="index.php?quanly=teacherCourse">Huỷ</a></button>
        </td>

      </tr>
    </table>
  </form>
</div>