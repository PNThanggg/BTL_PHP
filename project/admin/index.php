<?php
  session_start();

  if ($_SESSION['isLogined']) {
    include 'connect.php';
    include 'head.php';
    include 'menu.php';
    include 'main.php';
  } else {
    header("Location:http://localhost/PHP_BTL_PiTu/user/index.php?quanly=login");
  }
?>