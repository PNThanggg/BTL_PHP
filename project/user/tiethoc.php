<?php 

    if(isset($_GET['id'])){
        $idKhoaHoc= $_GET['id'];
    
  if (isset($_POST['themkhoahoc'])){
    if($_POST['img']!=""&&$_POST['tenkhoahoc']!=""&&$_POST['video_id']!=""){
    $img_link= $_POST['img'];
    $tenKhoaHoc= $_POST['tenkhoahoc'];
    $video_id= $_POST['video_id'];


    $sql= "INSERT INTO `lesson` (`lessonID`, `lessonName`, `lessontImage`, `lessonVideo`, `courseID`)
             VALUES (NULL,'".$tenKhoaHoc."', '". $img_link."', '".$video_id."', '".$idKhoaHoc."')";
    
    if(mysqli_query($connect, $sql)==true){
      echo '<script language="javascript">alert("Thêm bài học mới thành công");</script>'; 
      header("Location:http://localhost/PHP_BTL_PiTu/user/index.php?quanly=themBaiHoc&id=$idKhoaHoc");


    }else{
      echo '<script language="javascript">alert("Có lỗi không thể thêm bài học");</script>';
      header("Location:http://localhost/PHP_BTL_PiTu/user/index.php?quanly=themBaiHoc&id=$idKhoaHoc");

    }
   
    
    }else{
        echo '<script language="javascript">alert("Nhập đầy đủ thông tin");</script>';
    }
  }

    }
?>
<style>
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

  .btnXong{
    padding: 10px;
    background-color: #7CC242;
    border-radius: 16px;
    color: white;
    font-weight: 900;
    width: 300px;
  }
  .btnXong a{
    text-decoration: none;
    color: white;
  }
 
  .btnXoaKhoaHoc{
    color: red;
    font-weight: 900;
  }
  .headThemKhoaHoc{
    font-size: 24px;
    font-weight: bold;
    margin-left: 12%;
    color: #7CC242;
  }
  

</style>

<div class="headThemKhoaHoc">
  <h3>Thêm bài học mới</h3>
</div>
<div class="themKhoaHoc" id="themKhoaHoc">
  <form method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <p>Tên bài:</p>
          <input type="text" name="tenkhoahoc" id="" >
        </td>
      </tr>
      <tr>
        <td>
          <p>Ảnh:</p>
          <input type="text" name="img" id="">
        </td>
      </tr>
      <tr>    
        <td>
          <p>Video bài học:</p>
          <input type="text" name="video_id" id="" >
        </td>
      </tr>
     
      <tr>
        <td>
          <button type="submit" name="themkhoahoc" class="btnXong">Thêm</button>
        </td>
        
        <td>
          <button class="btnXong"><a href="index.php?quanly=themBaiHoc&id=<?=$idKhoaHoc?>">Huỷ</a></button>
        </td>
        
      </tr>
    </table>
  </form>
</div>