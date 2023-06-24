<style>
    * {
        padding: 0;
        margin: 0;
    }

    .khoanThu {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        justify-content: center;
    }

    .timKiemTitle {
        margin-top: 30px;
        font-size: 20px;
        font-weight: 500;
        color: #707070;
        margin-left: 10%;
    }

    .timKiemMa {

        display: flex;
        padding: 10px;
        margin-left: 20%;
    }

    .timKiemThoiGian {

        display: flex;
        padding: 10px;
        margin-left: 20%;
    }

    .inputTim {
        border-radius: 5px;
        padding: 3px;
        margin: 10px;
        width: 150px;
    }
    
    .btTim {
        margin-left: 30px;
    }

    .btTim input {
        border: none;
        border-radius: 15px;
        padding: 5px;
        width: 65px;
        margin-top: 10px;
        color: white;
    }

    .btLoc {
        background-color: #7cc242;
    }

    .btHuy {
        background-color: red;
    }

    .btTim input:hover {
        opacity: 0.5;
    }

    /* phần xuất dữ liệu */
    .khoanThudiv {
        display: block;
        width: 80%;
        text-align: center;
        border: 1px solid black;
        margin: 40px 10% 0px 10%;
    }

    .d1 {
        padding-top: 10px;
        display: flex;
        height: 35px;
        width: 100%;
        color: white;
        background-color: #7cc242;
    }

    .d1 .th {
        width: 16%;
        font-size: 16px;
        font-weight: 500;
    }

    .d2 {
        padding-top: 10px;
        display: flex;
        height: 35px;
        width: 100%;
        color: #707070;
    }

    .d2 .td {
        width: 16%;
    }

</style>

<form action="" method="post">
    <div class="khoanThu">
        <div class="timKiem">
            <div class="timKiemTitle">
                <p>Tìm kiếm</p>
            </div>
            <div class="timKiemMa">
                <input class="inputTim" type="number" min="1" id="mahocvien" name="mahocvien" value='<?php echo $_POST['mahocvien'];?>' placeholder="Mã học viên">
                <input class="inputTim" type="number" min="1" id="makhoahoc" name="makhoahoc" value='<?php echo $_POST['makhoahoc'];?>' placeholder="Mã khoá học">
            </div>
            <div class="timKiemThoiGian">
                <input class="inputTim" type="date" id="ngaybatdau" name="ngaybatdau" value='<?php echo $_POST['ngaybatdau'];?>' placeholder="Từ ngày">
                <input class="inputTim" type="date" id="ngayketthuc" name="ngayketthuc" value='<?php echo $_POST['ngayketthuc'];?>' placeholder="Đến ngày">
                <input class="inputTim" type="number" id="giatien" min="1000" name="giatien" step="1000" value='<?php echo $_POST['giatien'];?>' placeholder="Giá tiền">

                <div class="btTim">
                    <input class="btLoc" type="submit" value="Lọc" name="loc" id="loc">
                    <input class="btHuy" type="submit" value="Huỷ" name="huy" id="huy">
                </div>

            </div>
        </div>
</form>
<?php
            
            if(!empty($_POST['loc'])){
                
                
                if(empty($_POST['mahocvien']) && empty($_POST['makhoahoc']) && empty($_POST['giatien']) && (empty($_POST['ngaybatdau'])||empty($_POST['ngayketthuc'])) && (empty($_POST['ngaybatdau']) && empty($_POST['ngayketthuc']))){
                    $sql="SELECT*
                    FROM payment, student,course
                    WHERE student.studentID=payment.studentID
                    AND payment.courseID=course.courseID";
                    $query =mysqli_query($connect,$sql);

                    echo ' <script language="javascript">alert("Vui lòng nhập đủ thông tin cần thiết để lọc");</script>';
                }
                else{

                    $sql="SELECT*
                    FROM payment, student,course
                    WHERE student.studentID=payment.studentID
                    AND payment.courseID=course.courseID"
                    ?>
<!-- kiem tra trường ma hoc vien -->
                <?php
                    if(!empty($_POST['mahocvien'])){
                        $mahocvien=$_POST['mahocvien'];
                        $sql.=" AND student.studentID=$mahocvien";
                    }
                    ?>

                <?php
                         if(!empty($_POST['makhoahoc'])){
                            $makhoahoc=$_POST['makhoahoc'];
                            $sql.=" AND course.courseID=$makhoahoc";
                        }
                    ?>
<!-- kiem tra trương giá -->
                <?php
                        if(!empty($_POST['giatien'])){
                        $giatien=$_POST['giatien'];
                        $sql.=" AND payment.paymentFee=$giatien";
                    }
                    ?>

<!-- kiem tra trương ngay thang -->
                <?php
                    if(!empty($_POST['ngaybatdau'])&&!empty($_POST['ngayketthuc'])){
                        $ngaybatdau=$_POST['ngaybatdau'];
                        $ngayketthuc=$_POST['ngayketthuc'];
                        $sql.=" AND ( payment.paymentTime BETWEEN '$ngaybatdau' AND '$ngayketthuc')";
                    }

                    ?>

            <?php
                    $query =mysqli_query($connect,$sql);
                     
                }
            }else{
                $sql="SELECT*
                    FROM payment, student,course
                    WHERE student.studentID=payment.studentID
                    AND payment.courseID=course.courseID";
                $query =mysqli_query($connect,$sql);
            }

            ?>
<!-- phần form nhập tìm kiếm khoản thu -->

<div class="khoanThudiv">
    <div class="d1">
        <div class="th">
            Số phiếu
        </div>
        <div class="th">
            Mã học viên
        </div>
        <div class="th">
            Mã khoá học
        </div>
        <div class="th">
            Giá tiền
        </div>
        <div class="th">
            Người nộp
        </div>
        <div class="th">
            Thời gian
        </div>
    </div>
    <!-- dong noi dung -->
    <?php
            
                $count= mysqli_num_rows($query);
                if($count>0){
                 while($row=mysqli_fetch_array($query)){
            ?>
    <div class="d2">
        <div class="td">
            <?= $row['paymentID']?>
        </div>
        <div class="td">
            <?= $row['studentID']?>
        </div>
        <div class="td">
            <?= $row['courseID']?>
        </div>
        <div class="td">
            <?= $row['paymentFee']?>
        </div>
        <div class="td">
            <?= $row['studentName']?>
        </div>
        <div class="td">
            <?= $row['paymentTime']?>
        </div>
    </div>
    <?php
                 }
                }else{
                    echo "dữ liệu trống";
                }
            ?>
</div>



<!-- thêm khoan thu -->
<?php
                    if(!empty($_POST['btTaoKhoanThu'])){
                     
                        echo ' <script language="javascript">window.location="index.php?quanly=taokhoanthu"</script>';	
                    }
                
                ?>

<?php
        if(!empty($_POST['huy'])){
            $_POST['mahocvien']="";
            $_POST['makhoahoc']="";
            $_POST['ngaybatdau']="";
            $_POST['ngayketthuc']="";
            $_POST['giatien']="";
            echo ' <script language="javascript">
            document.getElementById("mahocvien").value = "";
            document.getElementById("makhoahoc").value = "";
            document.getElementById("ngaybatdau").value = "";
            document.getElementById("ngayketthuc").value = "";
            document.getElementById("giatien").value = "";
            </script>';
        }

?>

</div>

