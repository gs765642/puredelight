<?php
if (!session_id()) {
    session_start();
}
include('./header.php');
?>
<section class="cart-main-wrapper">
    <div class="container">
        <h2 class="heading-color">Cart</h2>
        <?php
        if (!empty($_SESSION['cart_items'])) { ?>
            <div class="cart_item d-flex">
                <?php foreach ($_SESSION['cart_items'] as $item) { ?>
                    <div class="item">
                        <img src="./assets/images/white-sause-pasta-p.jpg" alt="">
                        <div class="item_info">
                            <h3 class="heading-color"><?php echo $item['name'];?></h3>
                            <p class="heading-color">Lorem Ipsum</p>
                        </div>
                        <div class="price">
                            <p class="heading-color"><span>$</span><?php echo $item['price'];?></p>
                        </div>
                        <div class="item_qty">
                            <div class="qty-input">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="product-qty" min="0" max="10" value="<?php echo $item['quantity']?>">
                                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            </div>
                        </div>
                        <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                <?php } ?>
            </div>
            <div class="cart_total">
                <div class="cart-total-inner">
                    <div class="total d-flex">
                        <h3 class="heading-color">Total</h3>
                        <p class="heading-color"><span>$</span>2.3</p>
                    </div>
                    <div class="btn-warp">
                        <a href="./checkout.php">Order Now</a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <h2 style="color: black;">Your Cart Is Empty</h2>
        <?php } ?>

    </div>
</section>
<?php include('./footer.php'); ?>