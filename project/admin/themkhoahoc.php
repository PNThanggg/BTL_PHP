<?php 
  include './connect.php';
  include '../user/uploadfile.php';
  
  
  if (isset($_POST['themkhoahoc'])){
    $img_link= upload($_FILES['img']);
    $tenKhoaHoc= $_POST['tenkhoahoc'];
    $mota= $_POST['mota'];
    $gia= $_POST['gia'];
    $video_id= $_POST['video_id'];
    $categoryID= $_POST['category_id'];
    $teacherID= $_POST['teacher_id'];

    $sql= "INSERT INTO `course` (`courseID`, `courseName`, `courseDetail`, `courseFee`, `img`, `videoDemo`, `categoryID`, `teacherID`) 
      VALUES (NULL, '".$tenKhoaHoc."', '".$mota."', '".$gia."', '".$img_link."', '".$video_id."', '".$categoryID."', '".$teacherID."')";
    mysqli_query($connect, $sql) or die("query error submit");
    header('location: index.php?quanly=khoahoc');
    
  }

?>
<style>
  .themKhoaHoc{
    padding: 0;
        margin: 0; 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-sizing: border-box;
    
  }
  .themKhoaHoc .head{
    text-align: center;
    font-size: 30px;
    margin: 30px;
    color: #7CC242;
  }
  .themKhoaHoc table{
    width: 80%;
    margin: 0 auto;

  }
  .chitietkhoahoc table td{
    padding: 20px;
    line-height: 100%;
    align-content: center;
    align-items: center;
  }
  .themKhoaHoc table td{
    padding: 20px;
    line-height: 100%;
    align-content: center;
    align-items: center;
  }

  .themKhoaHoc input{
    padding: 10px;
    width: 500px;
    max-width: 500px;
    min-width: 300px;
  }
  .themKhoaHoc input[type="file"]{
    font-size: 20px;
  }

  .btnXong{
    cursor: pointer;
    padding:10px 20px;
    font-size: 20px;
    background-color: #7CC242;
    border-radius: 16px;
    border: none; 
    color: white;
    font-weight: 500;
  }
  .btnXong:hover{
    opacity: 0.7;
  }
  .btnXong a{
    color: #fff;
    text-decoration: none;
  }
  .btnXoaKhoaHoc{
    color: red;
    font-weight: 900;
  }
  table .title{
    font-size: 20px;
    margin-bottom: 10px;
  }

</style>
<div class="themKhoaHoc" id="themKhoaHoc">
  <h2 class="head">
    Nhập thông tin khóa học
  </h2>
  <form action="themkhoahoc.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <p class="title">Tên khóa học:</p>
          <input type="text" name="tenkhoahoc" id="" >
        </td>
        <td>
          <p class="title">Mô tả: </p>
          <input type="text" name="mota" id="" >
        </td>
      </tr>
      <tr>
        <td>
          <p class="title">Ảnh:</p>
          <input type="file" name="img" id="">
        </td>
        <td>
          <p class="title">Giá:</p>
          <input type="number" name="gia" id="" >
        </td>
      </tr>
      <tr>
        <td>
          
        </td>
        <td>
          <p class="title">Video giới thiệu:</p>
          <input type="text" name="video_id" id="" >
        </td>
      </tr>
      <tr>
        <td>
          <p class="title">Mã danh mục:</p>
          <input type="text" name="category_id" id="" >
        </td>
        <td>
          <p class="title">Mã giáo viên giảng dạy: </p>
          <input type="text" name="teacher_id" id="" >
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="themkhoahoc" class="btnXong">Thêm khóa học</button>
        </td>
        
        <td>
          <button class="btnXong" style="background-color: #264653;"><a href="index.php?quanly=khoahoc">Hủy</a></button>
        </td>
        
      </tr>
    </table>
  </form>
</div>