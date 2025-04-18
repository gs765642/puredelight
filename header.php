<?php
if (!session_id()) {
    session_start();
}
$count = "0";
if (isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
    $count = count($_SESSION['cart_items']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title> Pure Delight </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />


</head>

<body>
    <header>
        <div class="container">
            <div class="header-inner d-flex">
                <a href="/puredelight"><img src="./assets/images/site-logo.svg"></a>
                <ul class="d-flex">
                    <li><a href="/puredelight/#about">About Us</a></li>
                    <li><a href="/puredelight/#services">Services</a></li>
                    <li><a href="/puredelight/menu">Menu</a></li>
                    <li><a href="/puredelight/#gallery">Gallery</a></li>
                    <li><a href="/puredelight/#contact">Contact Us</a></li>
                </ul>
                <a href="/puredelight/cart"><i class="fa-solid fa-cart-shopping"></i>
                    <p class="cart_count"><span><?php echo  $count; ?></span></p>
                </a>
                <?php
                if (!isset($_SESSION['useremail'])) { ?>
                    <a href="/puredelight/login" class="header-btn">Login</a>
                <?php } else { ?>
                    
                    <a href="/puredelight/logout" class="header-btn">Logout</a>
                <?php } ?>

            </div>
        </div>
    </header>