<?php
require 'database.php';
require 'userinfo.php';

if( !isset($_SESSION['user_id']) ){
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <title>E-Farm CSE311</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/plugins-bundle.css" >
    <link rel="stylesheet" href="assets/css/icons-bundle.css" >
    <link rel="stylesheet" href="assets/css/maincss.min.css" >

</head>

<body>
<header id="header">
    <a href="/311/dashboard.php"><img src="assets/img/logo.png"></a>
    <nav id="nav-main">
        <ul class="nav nav-main-vertical">
            <li><a href=""></i><?php echo "$nam"; ?></a></li>
        </ul>
            <p class="text-muted"><?php echo "$desi"; ?></p>
        <hr>
    </nav>
    <?php
    if($usertype==1)
        include('menu/adminmenu.php');
    else if($usertype==2)
        include('menu/landownermenu.php');
    else if ($usertype==3)
        include('menu/dcmenu.php');
    else if ($usertype==4)
        include('menu/farmermenu.php');
    else if ($usertype==5)
        include('menu/labmenu.php');
    else {
        echo '<script language="javascript">';
        echo 'alert("Error!")';
        echo '</script>';
    }
    ?>

    <div class="bottom">
        <p class="text-muted">CSE311L Final Project</p>
        <p class="text-muted">Md. Sahidur Rahman</p>
        <p class="text-muted">Rabiul Ali Sarkar</p>
        <p class="text-muted">Tasdid Rahman</p>
        <ul class="nav-bottom">
            <li><a></span>Group: R4H</a></li>
        </ul>
    </div>

</header>
<div id="content">

</div>
</body>
</html>

