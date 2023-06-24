
<?php
    include 'connect.php';
    $studentID = $_GET['id'];
    $sql_select = "SELECT * FROM `student` WHERE studentID = $studentID";
    $query_select = mysqli_query($connect, $sql_select);
    $row = mysqli_fetch_assoc($query_select);
    
    if(!empty($_POST['edit_student'])) {
        //Lay data

        $data['studentName'] = isset($_POST['name']) ? $_POST['name'] : '';
        $data['studentPhone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
        $data['studentEmail'] = isset($_POST['email']) ? $_POST['email'] : '';
        $data['studentAdress'] = isset($_POST['address']) ? $_POST['address'] : '';
        $data['studentDate_Birth'] = isset($_POST['date_birth']) ? $_POST['date_birth'] : '';
        $data['studentMoney'] = isset($_POST['amount']) ? $_POST['amount'] : '';
        
        $errors = array();
        if(empty($data['studentName'])){
            $errors['studentName'] = '<p class="errStyle" >*Chưa nhập tên sinh viên</p>';
        }
        if(empty($data['studentPhone'])){
            $errors['studentPhone'] = '<p class="errStyle" >*Chưa nhập số điện thoại</p>';
        }
        if(empty($data['studentAdress'])){
            $errors['studentAdress'] = '<p class="errStyle" >*Chưa nhập địa chỉ</p>';
        }
        if(empty($data['studentEmail'])){
            $errors['studentEmail'] = '<p class="errStyle" >*Chưa nhập email</p>';
        }
        if(empty($data['studentDate_Birth'])){
            $errors['studentDate_Birth'] = '<p class="errStyle" >*Chưa nhập ngày sinh</p>';
        }
        if(empty($data['studentMoney'])){
            $errors['studentMoney'] = '<p class="errStyle">*Chưa nhập số dư tài khoản</p>';
        }
        
        if(!$errors){
            
            $studentName = ($data['studentName']);
            $studentPhone = ($data['studentPhone']);
            $studentEmail = ($data['studentEmail']);
            $studentAdress = ($data['studentAdress']);
            $studentDate_Birth = ($data['studentDate_Birth']);
            $studentMoney = ($data['studentMoney']);
            
            $sql = "UPDATE  `student`  SET 
            `studentName` = '$studentName', 
            `studentPhone` = '$studentPhone',
            `studentAdress` = '$studentAdress', 
            `studentEmail` = '$studentEmail', 
            `studentDate_Birth` = '$studentDate_Birth',
            `studentMoney` = '$studentMoney'
            WHERE `studentID` = '$studentID'";
                
                $query = mysqli_query($connect, $sql);
                
                if($query){
                    echo ' <script language="javascript">alert("Sửa thông tin sinh viên thành công");</script>';
                    }
                // Trở về trang danh sách
                
                echo ' <script language="javascript">window.location="index.php?quanly=hocvien"</script> ';
        }
    }
    if(!empty($_POST['huy'])){
        echo ' <script language="javascript">window.location="index.php?quanly=hocvien"</script> ';
    }
?>
<div>
    <form action="" method="post">
        <table align="center" class="sua">
            <tr>
                <td><label for="id">ID student</label></td>
                <td>
                    <?php echo  $row['studentID']?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="text" name="email" value="<?php echo  $row['studentEmail']; ?>">
                    <?php if (!empty($errors['studentEmail'])) echo $errors['studentEmail']; ?>
                </td>
                <td>
                    <label for="hoten">Họ tên</label>
                </td>
                <td>
                    <input type="text" name="name" value="<?php echo  $row['studentName']; ?>">
                    <?php if (!empty($errors['studentName'])) echo $errors['studentName']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="sdt">Số điện thoại</label>
                    
                </td>
                <td>
                    <input type="text" name="phone" value="<?php echo $row['studentPhone']; ?>">
                    <?php if (!empty($errors['studentPhone'])) echo $errors['studentPhone']; ?>
                </td>
                <td>
                    <label for="address">Địa chỉ</label>
                </td>
                <td>
                    <input type="text" name="address" value="<?php echo $row['studentAdress']; ?>">
                    <?php if (!empty($errors['studentAdress'])) echo $errors['studentAdress']; ?>

                </td>
            </tr>
            <tr>    
                <td>
                    <label for="date_birth">Ngày sinh</label>
                </td>
                <td>
                    <input type="date" name="date_birth" value="<?php echo $row['studentDate_Birth']; ?>">
                    <?php if (!empty($errors['studentDate_Birth'])) echo $errors['studentDate_Birth']; ?>
                </td>
                <td>
                    <label for="amount">Số dư tài khoản</label>
                </td>
                <td>
                    <input type="text" name="amount" value="<?php echo $row['studentMoney']; ?>">
                    <?php if (!empty($errors['studentMoney'])) echo $errors['studentMoney']; ?>

                </td>   
            </tr>
            <tr>
                <td><input type="submit" value="Sửa học viên" name="edit_student"></td>
                <td><input type="submit" value="Hủy bỏ" style="background-color: red;" name="huy"></td>
            </tr>
        </table>
    </form>
</div>

<style>
    table{
        color: #707070;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        
    }
    .sua td{
        position: relative;
        font-size: 20px;
        padding: 20px;
    }
    .errStyle{
        color: red; 
        font-size: 12px; 
        font-style: italic;
    }
    .sua p{
        position: absolute;
        font-size: 18px;
    }
    .sua label{
        padding-left: 30px;
    }
    .sua input{
        height: 40px;
        width: 300px;
        font-size: 18px;
        border-radius: 15px;   
        padding-left:10px ; 
        color: #707070;
    }
    .sua input[type="submit"]{
        
        margin: 20px;
        font-size: 20px;
        background-color: #7CC242;
        width: 200px;
        color: #fff;
        border: none;
        cursor: pointer;
        
    }
    .sua input[type="submit"]:hover{
        opacity: 0.7;
    }
</style>