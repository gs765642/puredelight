<?php
include('./header.php');

?>

<!-- <section class="cart-main-wrapper">
        <div class="container">
        <div class="cart_item">
            <div class="item">
                <div class="item_img">
                    <img src="./assets/images/white-sause-pasta-p.jpg" alt="">
                </div>
                <div class="item_info">
                    <h1>Food Title</h1>
                    <p>$2.3</p>
                    <div class="item_qty">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" value="1">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item_img">
                    <img src="./assets/images/white-sause-pasta-p.jpg" alt="">
                </div>
                <div class="item_info">
                    <h1>Food Title</h1>
                    <p>$2.3</p>
                    <div class="item_qty">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" value="1">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item_img">
                    <img src="./assets/img/white-sause-pasta-p.jpg" alt="">
                </div>
                <div class="item_info">
                    <h1>Food Title</h1>
                    <p>$2.3</p>
                    <div class="item_qty">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" value="1">
                    </div>
                </div>
            </div>
        </div>
        <div class="cart_total">
            <div class="total">
                <h1>Total</h1>
                <p>$2.3</p>
            </div>
            <div class="btn">
                <a href="./checkout.php">Order Now</a>
            </div>
        </div>
    </div>
</section> -->

<section class="cart-main-wrapper" style="background-color: olivedrab;">
    <?php
    if (!session_id()) {
        session_start();
    }
    ?>
    <div class="container">
        <h1>Your Cart</h1>
        <div class="cart_item">
            <?php
            if (!empty($_SESSION['cart_items'])) {
                foreach ($_SESSION['cart_items'] as $item) {
                    $title = $item['name'];
                    $p_id = $item['product_id'];
                    $quantity = $item['quantity'];
                    $price = $item['price'];
                    $image = $item['image'];

            ?>

                    <div class="item">
                        <img src="./admin/uploads/<?php echo $image; ?>" alt="">
                        <div class="item_info">
                            <h3><?php echo $title; ?></h3>
                        </div>
                        <div class="price">
                            <p><?php echo $price; ?></p>
                        </div>
                        <div class="item_qty">
                            <label for="qty">Qty</label>
                            <input type="number" name="qty" id="qty" value="<?php echo  $quantity ?>">
                        </div>
                        <div class="btn-warp">
                            <input type="hidden" value="<?php echo $p_id ?>">
                            <a href="javascript:;" class="remove_cart_item"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
            <?php


                }
            } else {
                echo 'Your cart is empty.';
            }
            ?>

        </div>
        <div class="cart_total">
            <div class="total">
                <h3>Total</h3>
                <p>$2.3</p>
            </div>
            <div class="btn-warp">
                <a href="./checkout.php">Order Now</a>
            </div>
        </div>
    </div>
</section>


<?php include('./footer.php'); ?>
<?php include('./footer.php'); ?>