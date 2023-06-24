<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<style>
  .body {
    width: 80%;
    margin: 0 auto 100px;
  }

  .baihoc h2 {
    color: #707070;

  }

  .baihoc .tenkhoahoc {
    color: #39f505;
  }

  .baihoc ul {
    width: 80%;
    margin: 0 auto;
    list-style: none;
    display: flex;
    flex-direction: column;
  }

  .baihoc ul li {
    padding-bottom: 50px;
    border-bottom: solid 4px #7CC242;
    margin-top: 50px;
  }

  .baihoc ul li iframe {
    width: 100%;
    min-height: 400px;
  }

  /* headdd */
  .heading1 {
    font-weight: 900;
    color: #707070;
    width: 100%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
  }

  .icon1 {

    display: flex;
    height: 50px;
    line-height: 50px;
    align-items: center;
  }

  .icon1 h1 {
    margin-left: 20px;
  }

  .hocvien {
    display: flex;
    align-items: center;
  }

  .hocvien i {
    margin-right: 10px;
  }

  .title {
    color: #696969;
    font-family: Calibri;
    margin-left: 111px;
    margin-top: 32px;
    margin-bottom: 20px;
    font-size: 40px;
  }
</style>

<body>
  <div class="body">
    <div class="baihoc">
      <!-- <div class="heading1">
        <div class="icon1">
          <i class="fa-solid fa-chalkboard-user"></i>
          <h1>Các khóa học của tôi</h1>
        </div>
        <div class="hocvien">
          <i class="fa-solid fa-chalkboard-user"></i>
          <h3>Thanhtb01</h3>
          <h3>|Role</h3>
        </div>
        
      </div> -->
      <?php
      $idCourse = $_GET['courseID'];

      if (!isset($connect)) {
        include 'connect.php';
      }

      $sql = "select * from lesson where courseID=" . $idCourse . " ";
      $res = mysqli_query($connect, $sql);

      $sql2 = "select *from course where courseID=" . $idCourse . "";
      $resCourse = mysqli_query($connect, $sql2);

      if($resCourse) {
        $rowCourse = mysqli_fetch_assoc($resCourse);
      }

      echo ' <h1 class="title">
          ' . $rowCourse['courseName'] . '
        </h1>';
      while ($row = mysqli_fetch_assoc($res)) {
        echo '
            <ul>
              <li>
                <h2 class="tenkhoahoc">' . $row['lessonName'] . '</h2>
                <iframe src="https://youtube.com/embed/' . $row['lessonVideo'] . '"></iframe>
              </li>
            </ul>
          ';
      }

      ?>

    </div>
  </div>
  <?php
  echo '<h1 class="title">Các khóa học liên quan</h1>';
  include 'course_category.php';
  ?>
</body>

</html>