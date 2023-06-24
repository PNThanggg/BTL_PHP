<style>
    * {
        padding: 0;
        margin: 0;
    }

    .menuadmin {
        justify-content: center;
        display: flex;
        width: 100%;
       font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin-top: 10px;

    }

    .menuadmin div{
        padding: 15px;
        width: 20%;
        font-size: 20px;
        border: 2px solid #707070;
    }

    .menuadmin a{
        margin-left: 25%;
        text-decoration: none;
        color: #707070;
    }
    .menuadmin a:hover{
        color: #7CC242;
        font-weight: 600;
    }

    .menuadmin div:hover{
        border-bottom: none;
    }

    .menuadmin .khac{
        position: relative;
    }
    
    .menuadmin .listKhac{
        display: none;
        position: absolute;
        width: 295px;
        top: 57px;
        left: -2px;
        /* padding: 10px; */
        background-color: #fff;
        /* border: 2px solid #696969; */
    }
    .menuadmin .khac:hover .listKhac{
        display: block;
    }
    .listKhac a{
        padding: 5px;
        margin-bottom: 10px;
    }
    .listKhac a:hover{
        color: #7CC242;
        font-weight: 600;
        /* border: 2px solid #7CC242   ; */

    }
</style>


<div class="menuadmin">
    <div>
        <a href="index.php?quanly=hocvien">Học viên</a>
    </div>
    <div>
        <a href="index.php?quanly=khoahoc">Khoá học</a>
    </div>
    <div>
        <a href="index.php?quanly=khoanthu">Khoản thu</a>
    </div>
    <div>
        <a href="index.php?quanly=thongkebaocao">Thống kê báo cáo</a>
    </div>
    <div class="khac">
        <div href="index.php?quanly=khac" style="width: 200px; border: none; padding: 0; margin-left: 50px; color: #737373;">Khác
            <div class="listKhac">
                <!-- <a href="#">Quản lý khác</a> -->
                <a href="index.php?quanly=qlnap">Quản lý nạp tiền</a>
                <a href="index.php?quanly=qlsms">Quản lý tin nhắn</a>
            </div>
        </div>
    </div>
</div>