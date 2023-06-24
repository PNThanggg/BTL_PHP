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

  .btThembaihoc button {
    border: none;
    width: 25%;
    margin-left: 55%;
    padding: 10px;
    font-size: 20px;
    background-color: #7cc242;
    border-radius: 20px;
  }

  .btThembaihoc a,
  i {
    color: white;
  }
</style>

<body>
  <div class="body">
    <div class="baihoc">
      <?php
      include 'connect.php';

      if (isset($_GET['id'])) {
        $idCourse = $_GET['id'];

        $sql = "select *from lesson where courseID=" . $idCourse . " ";
        $res = mysqli_query($connect, $sql);

        $sql2 = "select *from course where courseID=" . $idCourse . "";
        $resCourse = mysqli_query($connect, $sql2);
        $rowCourse = mysqli_fetch_assoc($resCourse);
        echo ' <h1>
          ' . $rowCourse['courseName'] . '
        </h1>';
      ?>

        <div class="btThembaihoc">
          <button name="thembaihoc"><a href="index.php?quanly=themTietHoc&id=<?= $idCourse ?>">Thêm bài học mới</a> <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
        </div>

        <?php
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
          <ul class="baiHoc">
            <li>
              <h2 class="tenkhoahoc"><?php echo $row['lessonName']; ?></h2>
              <iframe src=<?php echo "https://youtube.com/embed/" . $row['lessonVideo'] ?>></iframe>
            </li>

          </ul>

      <?php
        }
      }
      ?>

    </div>
  </div>

</body>

</html>