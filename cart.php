<?php

include('./header.php');
?>
<section class="cart-main-wrapper">
    <div class="container">

        <h2 class="heading-color">Cart</h2>
        <div class="btn-warp" style="text-align: end;">
            <a href="" class="empty_cart" >Clear Cart</a>
        </div>
        <?php
        if (!empty($_SESSION['cart_items'])) {
            $price = [];
        ?>
            <div class="cart_item d-flex">
                <?php foreach ($_SESSION['cart_items'] as $item) {
                    $item_price = intval($item['price']);
                    $item_qty = intval($item['quantity']);

                    array_push($price, $item_price * $item_qty);
                ?>
                    <div class="item">
                        <img class="main_item_image" src="admin/uploads/<?php echo $item['image']; ?>" alt="">
                        <div class="item_info">
                            <h3 class="heading-color item_name"><?php echo $item['name']; ?></h3>
                            <p class="heading-color">Lorem Ipsum</p>
                        </div>
                        <div class="price">
                            <p class="heading-color"><span>$</span><span class="item_price"><?php echo $item_price; ?></span></p>
                        </div>
                        <div class="item_qty">
                            <div class="qty-input">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="product-qty" min="0" max="10" value="<?php echo $item['quantity'] ?>">
                                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            </div>
                        </div>
                        <div class="remove-btn-cart">
                            <input type="hidden" value="<?php echo $item['product_id']; ?>">
                            <a href="#" class="remove_cart_item"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="cart_total">
                <div class="cart-total-inner">
                    <div class="total d-flex">
                        <h3 class="heading-color">Total</h3>
                        <p class="heading-color"><span>$</span><?php echo   array_sum($price); ?></p>
                    </div>
                    <div class="btn-warp">
                        <a href="./checkout.php">Order Now</a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <h3 class="cart_empty_txt">Your Cart Is Empty</h3>
        <?php } ?>

    </div>
</section>
<?php include('./footer.php'); ?>