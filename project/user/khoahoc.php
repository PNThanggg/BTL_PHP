<?php
    include "connect.php";

    $sql_show = "SELECT * FROM category ORDER BY categoryName DESC";
    $query_show = mysqli_query($connect, $sql_show);
?>

<style>
    .tenTheLoai {
        text-align: left;
        text-indent: 40px;
    }
</style>

<div class="list_category" align="left" width="100%">
    <ul class="category_list">
        <div class="title_category">
            <h4>danh mục</h4>
        </div>
        <?php
        while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
            <div class="TL">
                <a href="index.php?quanly=khoaHoc&id=<?php echo $row_pro['categoryID'] ?>">
                    <p class="tenTheLoai"> <?php echo $row_pro['categoryName'] ?></p>
                </a>
            </div>
        <?php
        }
        ?>

    </ul>

</div>