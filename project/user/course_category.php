<style>
    #formSearch input {
        padding: 10px;
        width: 500px;
        border-radius: 12px;
        font-size: 20px;
    }
</style>

<?php
    // GET id là lấy id từ bên MENU.php 

    include "connect.php";

    if (isset($_GET['id'])) {
        $sql_show = "SELECT * FROM course WHERE course.categoryID='$_GET[id]' ORDER BY courseName DESC";
        $query_show = mysqli_query($connect, $sql_show);
    } else {
        $sql_show = "SELECT * FROM course ORDER BY courseName DESC";
        $query_show = mysqli_query($connect, $sql_show);
    }

    if (isset($_POST['search'])) {
        $sql_show = "SELECT * FROM course where courseName like '%" . $_POST['search'] . "%'";
        $query_show = mysqli_query($connect, $sql_show);
    }
?>

<div class="list_course_category">
    <div class="list" align="center">
        <?php if ($_GET['quanly'] == 'khoaHoc') { ?>
            <form action="" id="formSearch" method="POST" enctype="multipart/form-data">
                <input type="text" placeholder="Tìm kiếm khóa học" name="search" id="inpSearch">
            </form>
        <?php } ?>
        <ul class="course_list">
            <?php
            while ($row_pro = mysqli_fetch_array($query_show)) {
            ?>
                <div class="kh">
                    <a href="index.php?quanly=chiTiet&id=<?php echo $row_pro['courseID']; ?>"><img class="anhkhoahoc" src="<?php echo $row_pro['img'] ?>"></a>
                    <a href="index.php?quanly=chiTiet&id=<?php echo $row_pro['courseID']; ?>">
                        <p class="tenkhoahoc"> <?php echo $row_pro['courseName'] ?></p>
                    </a>
                </div>
            <?php
            }
            ?>

        </ul>

    </div>
</div>
<script>
    let inpSearch = document.getElementById("inpSearch")
    let formSearch = document.getElementById("formSearch")
    inpSearch.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            console.log(inpSearch.value)
            formSearch.submit()
        }
    })
</script>