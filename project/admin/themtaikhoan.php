<?php
    include 'connect.php';

    // session_start();

    if (!empty($_POST['add_account'])) {
        $data['userName'] = isset($_POST['userName']) ? $_POST['userName'] : '';
        $data['pass'] = isset($_POST['pass']) ? $_POST['pass'] : '';
        $data['role'] = isset($_POST['role']) ? $_POST['role'] : '';
        $errors = array();

        if (empty($data['userName'])) {
            $errors['userName'] = '<p class="errStyle" >*Chưa nhập tên tài khoản</p>';
        }

        if (empty($data['pass'])) {
            $errors['pass'] = '<p class="errStyle" >*Chưa nhập mật khẩu</>';
        }

        if(empty($data['role'])) {
            $errors['role'] = '<p class="errStyle" >*Chưa nhập vai trò</p>';
        }

        if (!$errors) {
            $userName = addslashes($data['userName']);
            $pass = addslashes($data['pass']);
            $role = addslashes($data['role']);

            
            $sql_check = "SELECT * FROM account WHERE account.useName = '$userName'";
            $check = mysqli_query($connect, $sql_check);
            if (mysqli_num_rows($check) > 0) {
                echo '<script language="javascript">alert("Tài khoản đã tồn tại !");</script>';
            } else {
                $sql_them = "INSERT INTO `account`(`useName`, `pass`, `role`) VALUES ('$userName','$pass','$role')";
                $query = mysqli_query($connect, $sql_them);
                if($query) {
                    echo ' <script language="javascript">alert("Thêm tài khoản thành công");</script>';
                }

                if($role == 1) {
                    echo ' <script language="javascript">alert("Thêm thông tin sinh viên");</script>';
                    $sql = "SELECT * FROM account WHERE account.useName='$userName' AND account.pass='$pass'";
                    $row = mysqli_query($connect,$sql);
                
                    $count= mysqli_num_rows($row);
            
                    if($count > 0) {
                        $row_data = mysqli_fetch_array($row);
                        // $id_account = $row_data['accountID'];
                        $_SESSION['id_account']= $row_data['accountID'];
                        echo ' <script language="javascript">window.location="index.php?quanly=themsv"</script> ';
                    }
                } else {
                    echo ' <script language="javascript">window.location="index.php?quanly=hocvien"</script> ';
                }
            }
            
        }
    }

    if(!empty($_POST['huy'])) {
        echo ' <script language="javascript">window.location="index.php?quanly=hocvien"</script> ';
    }
?>

<div>
    <form action="" method="post">
        <table align="center" class="them">
            
            <tr>
                <td>
                    <label for="userName">UserName</label>
                    
                </td>
                <td>
                    <input type="text" name="userName" value="<?php echo !empty($data['userName']) ? $data['userName'] : '';?>">
                    <?php if (!empty($errors['userName'])) echo $errors['userName']; ?>
                </td>
            <tr>
                <td>
                    <label for="pass">Password</label>
                </td>
                <td>
                    <input type="password" name="pass" value="<?php echo !empty($data['pass']) ? $data['pass'] : '';?>">
                    <?php if (!empty($errors['pass'])) echo $errors['pass']; ?>
                </td>
            </tr>
                <td>
                    <label for="role">Role</label>
                </td>
                <td>
                    <input type="text" name="role" value="<?php echo !empty($data['role']) ? $data['role'] : '';?>">
                    <?php if (!empty($errors['role'])) echo $errors['role']; ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Thêm tài khoản" name="add_account" class="add"></td>
                <td><input type="submit" value="Hủy bỏ" style="background-color: red;" name="huy"></td>
            </tr>
        </table>
    </form>
</div>

<style>
    table{
        padding: 20px;
        color: #707070;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-left: 25%;
        margin-top: 50px;
    }
    .them td{
        position: relative;
        font-size: 20px;
        padding: 15px;
    }
    .errStyle{
        color: red; 
        font-size: 12px; 
        font-style: italic;
    }
    .them p{
        position: absolute;
    }
    .them label{
        padding-left: 30px;
    }
    .them input{
        height: 40px;
        width: 300px;
        font-size: 18px;
        border-radius: 15px;   
        padding-left:10px ; 
    }
    .them input[type="submit"]{
        margin: 20px;
        font-size: 20px;
        background-color: #7CC242;
        width: 200px;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    .them input[type="submit"]:hover{
        opacity: 0.7;
    }
</style>