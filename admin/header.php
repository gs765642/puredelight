<?php

if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['admin_email']) && !isset($_SESSION['admin_id'])) {
    header('Location:/puredelight/login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Delight Admin<?php // echo TITLE 
                    ?></title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
</head>

<body>
    <div class="top-bar">
        <ul class="d-flex">
            <li><a href="#about">Home</a></li>
            <li><a href="#services">Main Site</a></li>
            <li><a href="#gallery">About</a></li>
        </ul>
        <?php

        if (!isset($_SESSION['adminemail'])) {
        ?>
            <a href="/puredelight/login" class="header-btn">Login</a>
        <?php } else { ?>
            <a href="/puredelight/admin/logout" class="header-btn">Logout</a>
        <?php } ?>
    </div>
    <div class="header2 d-flex">
        <div class="sidebar">
            <a href="/puredelight"><img src="./uploads/site-logo.svg"></a>
            <ul class="sidebar-tabs">
                <li><a href="./index.php">Dashboard</a></li>
                <li><a href="./category">Category</a></li>
                <li><a href="./menu">Add Items</a></li>
                <li><a href="./order">Order</a></li>
        </div>
        <!-- <header>
    <div class="container">
            <div class="header-inner d-flex">
                <a href="http://localhost/puredelight"><img src="./uploads/site-logo.svg"></a>
               
                <ul class="d-flex">
                <li><a href="./menu.php">Add Items</a></li>
                <li><a href="./order.php">Order</a></li>
                </ul>  
            </div>
        </div>
    </header> -->