<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
    }

    .indam {
        font-weight: bold;
    }

    .text-head {
        padding-right: 100px;
        font-size: 20px;
        color: #707070;
    }

    .menu-head {
        display: flex;
        background-color: #F1F1F1;
        padding: 30px;
        margin-top: 10px;
        box-shadow: #e2e2e2 2px 3px;
    }

    .menu-head a:hover {
        color: #7CC242;
        text-decoration: underline;
    }
</style>

<?php
    include 'connect.php';

    $id = $_GET['id'] ?? 1;

    $sql_show = "SELECT * FROM course WHERE course.courseID = $id ORDER BY courseName DESC";
    $query_show = mysqli_query($connect, $sql_show);
   
    if($query_show) {
        $row_pro = mysqli_fetch_array($query_show);
    }
?>

<body>
    <div class="menu-head">
        <p><a href="index.php?quanly=chiTiet&id=<?php echo $row_pro['courseID'] ?? 1; ?>" class="text-head">Giới thiệu</a></p>
        <p class="indam text-head">Đánh giá</p>
    </div>
    <?php include 'soluoc.php' ?>
    <?php include 'noidungdanhgia.php' ?>
</body>

</html>