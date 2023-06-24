<?php 
    include "connect.php";

    $sql = "SELECT * FROM student ";
    $res = mysqli_query($connect, $sql);
?>

<div class="dssinhvien">
    <table align="center" border="1">
        <tr class="title">
            <th>Mã học viên</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Số dư TK</th>
            <th>Quản lý</th>
        </tr>
        <?php
            while($row= mysqli_fetch_assoc($res)){
                echo '
                    <tr>
                        <td><a href="">'.$row["studentID"].'</a></td>
                        <td><a href="">'.$row["studentName"].'</a></td>
                        <td><a href="">'.$row["studentPhone"].'</a></td>
                        <td><a href="">'.$row["studentAdress"].'</a></td>
                        <td><a href="">'.$row["studentEmail"].'</a></td>
                        <td><a href="">'.$row["studentDate_Birth"].'</a></td>
                        <td><a href="">'.$row["studentMoney"].'</a></td>
                        <td class="confirm">'?>
                            <form method="post" action="xoasinhvien.php">
                                <input style="margin-right: 10px" onclick="window.location = 'index.php?quanly=suasv&id=<?php echo $row['studentID']; ?>'" type="button" value="Sửa"/>
                                <input type="hidden" name="id" value="<?php echo  $row['studentID']; ?>"/>
                                <input type="hidden" name="idAccount" value=" <?php echo $row['accountID'];?>"/>
                                
                                <input onclick="return confirm('Bạn có chắc muốn xóa sinh viên <?= $row['studentName']?> không?');" type="submit" name="delete" value="Xóa"/>
                            </form>   
                    </td>
                    </tr>
                <?php ;
            }
        ?>
    </table>
    <div class="btn_add">
        <a href="index.php?quanly=themsv" class="indam">
            <span class="btn-themhv">Thêm học viên</span>
        </a>
        <a href="index.php?quanly=taikhoan" class="indam">
            <span class="btn-dstk">Danh sách tài khoản</span>
        </a>
    </div>
    
</div>
<style>
    *{
        padding: 0;
        margin: 0; 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-sizing: border-box;
    }
    table{
        width: 80%;
        border-collapse: collapse;
        margin: 100px auto;
        text-align: center;
    }
    .dssinhvien .title{
        background: #7CC242;
    }
    
    table th{
        color: #fff;
        padding:10px 30px;
    }
    
    table td{
        width: 100px;
        padding:10px 10px;
        border-spacing: 0px;
    }
    table td a{
        text-decoration: none;
        color: #707070;
    }
    .btn_add{
        display: flex;
        
    }
    .btn-themhv{
        display: flex;
        width: 150px;
        background: #2A9D8F;
        padding:15px 20px;
        margin: 10px 0;
        margin-left: 150px;
        line-height: 1.5;
        cursor: pointer;
        white-space: nowrap;
        border-radius: 20px;
    }
    .btn-dstk{
        display: flex;
        width: 200px;
        background: #F4A261;
        padding:15px 20px;
        margin: 10px 30px;
        line-height: 1.5;
        cursor: pointer;
        white-space: nowrap;
        border-radius: 20px;
    }
    .indam{
        font-weight: bold;
    }
    a{
        display: inline-block;
        color: #fff;
        text-decoration: none;
    }
    .confirm form{
        display: inline-flex;
    }
    .confirm input{
        font-size: 15px;
        background: #264653;
        padding:0 10px;
        color: #fff;
        width: 50px;
        height: 30px;
        cursor: pointer;    
        border: none;
        border-radius: 10px;
    }
    .confirm input[type='submit']{
        background: #E76F51;
    }
    .confirm input:hover{
        opacity: 0.8;
    }
    
</style>