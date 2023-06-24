<?php 
    include 'connect.php';
    $sql = "SELECT * FROM account ";
    $res = mysqli_query($connect, $sql);

?>
<div class="dssinhvien">
    <table align="center" border="1">
        <tr class="title">
            <th>ID Tài khoản</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Role</th>
            <th>Quản lý</th>
        </tr>
        <?php
            while($row=mysqli_fetch_assoc($res)){
                echo '
                    <tr>
                        <td><a href="">'.$row["accountID"].'</a></td>
                        <td><a href="">'.$row["useName"].'</a></td>
                        <td><a href="">'.$row["pass"].'</a></td>
                        <td><a href="">'.$row["role"].'</a></td>
                        <td class="confirm">'?>
                            <form method="post" action="">
                                <input onclick="window.location = 'suataikhoan.php?id=<?php echo $row['accountID']; ?>'" type="button" value="Sửa"/>
                                <input type="hidden" name="idAccount" value="<?= $row['accountID']; ?>"/>
                                <input onclick="return alert('Không thể xóa tài khoản');" type="submit" name="delete" value="Xóa"/>
                            </form>  
                        </td>
                    </tr>
               <?php ;
            }
        ?>
    </table>
    
    <div class="btn_add">
    <a href="index.php?quanly=themtk" class="indam">
        <span class="btn-themtk">Thêm tài khoản</span>
    </a>
        <a href="index.php?quanly=hocvien" class="indam">
            <span class="btn-dshv">Danh sách học viên</span>
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
        position: relative;
        border-collapse: collapse;
        margin-left: 10%;
        width: 80%;
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
        padding:10px 30px;
        border-spacing: 0px;
    }
    table td a{
        text-decoration: none;
        color: #707070;
    }
    .btn-themtk{
        position: relative;
        display: flex;
        width: 150px;
        background: #2A9D8F;
        padding:15px 20px;
        margin: 20px 15px;
        line-height: 1.5;
        cursor: pointer;
        white-space: nowrap;
        border-radius: 20px;
        left: 80%;
    }
    .btn-dshv{
        display: flex;
        width: 200px;
        background: #F4A261;
        padding:15px 20px;
        margin: 10px 150px;
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
    .confirm input{
        font-size: 15px;
        background: #264653;
        padding:0 10px;
        color: #fff;
        width: 60px;
        height: 30px;
        cursor: pointer;    
        border: none;
        border-radius: 10px;
    }
    .confirm input[type='submit']{
        background: #E76D51;
    }
    .confirm input:hover{
        opacity: 0.8;
    }
</style>