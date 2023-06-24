<?php
    if(!isset($connect)){
        include 'connect.php';
    }
    $sql = "SELECT * FROM comment,student,course
    where comment.studentID = student.studentID
    AND comment.courseID = course.courseID LIMIT 6";
    $query = mysqli_query($connect,$sql);
    

    
?>
<div class="main" style="display: flex; justify-content: center;">
    <?php while($row = mysqli_fetch_array($query)){?>
        <div class="comment" >
            <div class="nguoidanhgia">
                <i class="fa fa-user-o" aria-hidden="true"></i>
                <p><?=$row['studentName']?></p>
            </div>
            <div class="noidung">
                <p class="tencmt" style="height: 50px;"><?=$row['commentTitle']?></p>
                <p class="chitiet" style="height: 100px;"><?=$row['commentContent']?></p>
                <p class="nameCourse" style="margin-bottom: 10px;"><?=$row['courseName']?></p>
                <p class="thoigian"><?=$row['commentTime']?></p>
            </div>
        </div>
    <?php };?>
</div>
<!-- <table class="tb-comment">
    <div></div>
        <tr>
            <td class="comment">
                <div class="nguoidanhgia">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <p>Name</p>
                </div>
                <div class="noidung">
                    <p class="tencmt">Tham gia khóa học JavaScrips sau 3 tuần tại PITU</p>
                    <p class="chitiet">Mình là một học viên đang sinh sống và làm việc tại Nhật Bản ,
                     Vốn là dân trái ngành muốn quay đầu học lại IT để có thể tìm kiếm...</p>
                    <p class="thoigian">2 giờ trước</p>
                </div>
                
            </td>
            <td class="comment">
                <div class="nguoidanhgia">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <p>Name</p>
                </div>
                <div class="noidung">
                    <p class="tencmt">Tham gia khóa học JavaScrips sau 3 tuần tại PITU</p>
                    <p class="chitiet">Mình là một học viên đang sinh sống và làm việc tại Nhật Bản ,
                     Vốn là dân trái ngành muốn quay đầu học lại IT để có thể tìm kiếm...</p>
                    <p class="thoigian">2 giờ trước</p>
                </div>
            </td>
            <td class="comment">
                <div class="nguoidanhgia">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <p>Name</p>
                </div>
                <div class="noidung">
                    <p class="tencmt">Tham gia khóa học JavaScrips sau 3 tuần tại PITU</p>
                    <p class="chitiet">Mình là một học viên đang sinh sống và làm việc tại Nhật Bản ,
                     Vốn là dân trái ngành muốn quay đầu học lại IT để có thể tìm kiếm...</p>
                    <p class="thoigian">2 giờ trước</p>
                </div>
            </td>
        </tr>
        <tr>
            <td class="comment">
                <div class="nguoidanhgia">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <p>Name</p>
                </div>
                <div class="noidung">
                    <p class="tencmt">Tham gia khóa học JavaScrips sau 3 tuần tại PITU</p>
                    <p class="chitiet">Mình là một học viên đang sinh sống và làm việc tại Nhật Bản ,
                     Vốn là dân trái ngành muốn quay đầu học lại IT để có thể tìm kiếm...</p>
                    <p class="thoigian">2 giờ trước</p>
                </div>
            </td>
            <td class="comment">
                <div class="nguoidanhgia">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <p>Name</p>
                </div>
                <div class="noidung">
                    <p class="tencmt">Tham gia khóa học JavaScrips sau 3 tuần tại PITU</p>
                    <p class="chitiet">Mình là một học viên đang sinh sống và làm việc tại Nhật Bản ,
                     Vốn là dân trái ngành muốn quay đầu học lại IT để có thể tìm kiếm...</p>
                    <p class="thoigian">2 giờ trước</p>
                </div>
            </td>
            <td class="comment">
                <div class="nguoidanhgia">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <p>Name</p>
                </div>
                <div class="noidung">
                    <p class="tencmt">Tham gia khóa học JavaScrips sau 3 tuần tại PITU</p>
                    <p class="chitiet">Mình là một học viên đang sinh sống và làm việc tại Nhật Bản ,
                     Vốn là dân trái ngành muốn quay đầu học lại IT để có thể tìm kiếm...</p>
                    <p class="thoigian">2 giờ trước</p>
                </div>
            </td>
        </tr>
    </table> -->
    <style>
        /* .tb-comment{
        margin: 30px;
        color: #707070;
    } */
    
    .comment{
        padding-left: 50px;
        width: 30%;
        
    }
    .noidung{
        border-right: solid 1px #707070;
        padding: 20px 50px 50px 0px;

    }
    .comment:last-child{
        border-right: none;
        
    }
    .comment .nguoidanhgia{
        display: flex;
        padding-bottom: 10px;
        font-size: 24px;
    }
    .nguoidanhgia > i{
        font-size: 30px;
        padding-right: 15px;
    }
    .comment .tencmt{
        font-weight: bold;
        font-size: 20px;
        padding-bottom: 10px;
    }
    .comment .chitiet{
        padding-bottom: 10px;
        font-size: 18px;
    }
    </style>