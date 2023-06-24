
<style>
    *{
        padding: 0;
        margin: 0;
    }

    .headadmin {
        display: block;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .headadmin .headpie {
        display: flex;
        width: 90%;
        padding: 10px;
        margin-left: 5%;
        margin-right: 5%;
    }

    .headadmin .icon {
        color: #7CC242;
        font-family: 'Luᴄida Bright';
        font-weight: 450;
        line-height: 30px;
        font-size: 80px;
        padding: 40px;
        margin-top: 20px;
        transform: perspective(100px) rotateY(15deg);
        width: 30%;
    }

    .headadmin .admin {
        color: #707070;
        margin-top: 70px;
        font-weight: 600;
        line-height: 25px;
        font-size: 25px;
        width: 40%;
        margin-left: 45%;
    }

    .headadmin .admin a{
        color: #7CC242;
    }

    .headadmin .name {
        margin-bottom: 50px;
        text-align: center;
        font-weight: 600;
        line-height: 20px;
        font-size: 35px;
        color: #707070;
    }
</style>

<div class="headadmin">
    <div class="headpie">
        <div class="icon">
            PITU
        </div>
        <div class="admin">
            Admin: <?php echo $_SESSION['name']?> <a href="index.php?quanly=adminlogout"><i>Đăng xuất</i></a>
        </div>

    </div>

    <div class="name">
        Hệ thống quản lý học tập trực tuyến
    </div>
</div>