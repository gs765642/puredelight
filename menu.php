<?php

include('./header.php');
include('./config.php');

global $mysqli;
$psql = "SELECT  * FROM products WHERE item_status=1";
$products = $mysqli->query($psql);
?>

<section class="hero-sec">
    <div class="container">
        <div class="hero-content" style="background-image:url(./assets/images/opening_hours.jpg);">
            <div class="hero-inner-wrapper">
                <h5>Delicious</h5>
                <h1>The premium experience for you</h1>
                <p>Integer congue malesuada eros congue varius. Sed malesuada dolor eget velit pretium. Etiam porttitor finibus. Nam suscipit vel ligula at dharetra.</p>
            </div>
        </div>
    </div>
</section>

<section class="menu-wrapper">
    <div class="container">
        <div class="main-menu-wrapper d-flex">
            <div class="wrapper">
                <h3>Menu</h3>
                <?php echo showMenu(); ?>
            </div>
            <div class="menu-dishes">
                <div class="search-field">
                    <input type="search" placeholder="Search for recipes..." name="item_search">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <?php if (!empty($products)) { ?>
                    <div class="dishes-wrapper">
                        <?php
                        while ($product = $products->fetch_assoc()) {
                            $item_id = $product['item_id'];
                            $name = $product['item_name'];
                            $price = $product['item_price'];
                            $image = $product['item_image'];
                            // $description = $product['item_description'];
                            // $category = $product['item_category'];
                            // $status = $product['item_status'];

                        ?>
                            <div class="sn-dish">
                                <div class="dish-image">
                                    <img class="item_image" src="admin/uploads/<?php echo $image; ?>" class="item_image">
                                </div>
                                <h4 class="item_name"><?php echo $name; ?></h4>
                                <div class="rating">
                                    <p><i class="fa-solid fa-star"></i>(3.0)</p>
                                    <p class="main_price">
                                        <span>$</span><span class="price"><?php echo $price; ?></span>
                                    </p>
                                </div>
                                <div class="btn-warp">
                                    <input type="hidden" value="<?php echo $item_id; ?>">
                                    <a href="#" class="add_to_cart">Add to cart</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="no_product_found" style="display: none;">
                    Not Found
                </div>
            </div>
        </div>
    </div>
</section>

<section class="menu-carousel-sec" style="background-image:url(./assets/images/ban2.png)">
    <div class="container">
        <h5>Today's Special</h5>
        <h2>Discover our menu</h2>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/sushi-delight.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>Sushi Lovers Delight</h3>
                            <span>$12</span>
                        </div>
                        <div class="item-txt">
                            <p>An assortment of our favorite Sushi combinations.</p>
                            <span class="badge">Starter</span>
                        </div>
                    </div>
                </div>
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/mixed-garden-salad.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>Mixed Garden Salad</h3>
                            <span>$6<span>
                        </div>
                        <div class="item-txt">
                            <p>A healthy, vegan option for those who just want to enjoy a light snack.</p>
                            <span class="badge">Starter</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/grilled-chicken-kebab.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>Grilled Chicken Kebab</h3>
                            <span>$14<span>
                        </div>
                        <div class="item-txt">
                            <p>The classic dish for meat lovers with grilled vegetables. No carbs. All protein and vitamins.</p>
                            <span class="badge">Main course</span>
                        </div>
                    </div>
                </div>
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/chesse-burger-with-fries.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>Cheeseburger With Fries</h3>
                            <span>$18<span>
                        </div>
                        <div class="item-txt">
                            <p>For the hungry ones, this classic American dish is always a perfect option.</p>
                            <span class="badge">Main course</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/chicken-biryani.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>Chicken Briyani</h3>
                            <span>$18</span>
                        </div>
                        <div class="item-txt">
                            <p>The meat and rice are cooked separately before being layered and cooked together with a mixture of spices.</p>
                            <span class="badge">Starter</span>
                        </div>
                    </div>
                </div>
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/brownie-with-blueberries.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>Brownie With Blueberries</h3>
                            <span>$4<span>
                        </div>
                        <div class="item-txt">
                            <p>A juicy and rich desert to fill your sweet tooth.</p>
                            <span class="badge">Dessert</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/the-caramel-apocalypse.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>The Caramel Apocalypse</h3>
                            <span>$13<span>
                        </div>
                        <div class="item-txt">
                            <p>A bold mix of vanilla ice cream, popcorn, strawberries and lots of caramel and chocolate sauce.</p>
                            <span class="badge">Dessert</span>
                        </div>
                    </div>
                </div>
                <div class="sn-item d-flex">
                    <img class="item_image" src="assets/images/soft-drinks.jpg">
                    <div class="content-side">
                        <div class="title d-flex">
                            <h3>Soft Drinks</h3>
                            <span class="badge">$2<span>
                        </div>
                        <div class="item-txt">
                            <p>Select between the most popular soft drinks. Diet versions also available!</p>
                            <span class="badge">Drink</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php include('./footer.php'); ?>