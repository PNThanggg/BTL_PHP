<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel='stylesheet' href="style.css">
    
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    

    <script src='main.js'></script>
</head>
<body>
    <?php
        include 'connect.php';
        include 'head.php';
        include 'menu.php';
        include 'main.php';
        include 'iconlienhe.php';
        include 'chatbox.php';
        include 'footer.php';
    ?>
</body>
</html>