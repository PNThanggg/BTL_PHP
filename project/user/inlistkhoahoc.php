<?php
include "connect.php";

$sql_show = "SELECT * FROM course ORDER BY courseName DESC";
$query_show = mysqli_query($connect, $sql_show);
?>

<div class="list" align="center">
    <ul class="course_list">
        <?php
        while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
            <div class="kh">
                <a href="chitietkhoahoc.php&id=<?php echo $row_pro['courseID']; ?>"><img class="anhkhoahoc" src="<?php echo $row_pro['img'] ?>"></a>
                <a href="chitietkhoahoc.php&id=<?php echo $row_pro['courseID']; ?>">
                    <p class="tenkhoahoc"> <?php echo $row_pro['courseName'] ?></p>
                </a>
            </div>
        <?php
        }
        ?>

    </ul>

</div>