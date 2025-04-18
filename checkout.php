<?php
include('./config.php');
get_template('./header.php');
if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['cart_items']) && empty($_SESSION['cart_items'])) {
    header('location:./cart');
}

?>

<div class="checkout-sec" style="background-image:url(./assets/images/ban2.png)">
    <div class="container">
        <div class="checkout_form">
            <h2>Fill this form to confirm your order.</h2>

            <div class="cart-checkout">
                <div class="cart_item">
                    <?php
                    if (!empty($_SESSION['cart_items'])) {
                        $tprice = [];
                        foreach ($_SESSION['cart_items'] as $item) {
                            $title = $item['name'];
                            $p_id = $item['product_id'];
                            $quantity = $item['quantity'];
                            $price = $item['price'];
                            $image = $item['image'];
                            $item_price = intval($item['price']);
                            $item_qty = intval($item['quantity']);

                            array_push($tprice, $item_price * $item_qty);

                    ?>
                            <div class="item">
                                <img class="main_item_image" src="admin/uploads/<?php echo $item['image']; ?>" alt="">
                                <div class="item_info">
                                    <h3><?php echo $title; ?></h3>
                                </div>
                                <p class="main_price">
                                    <span>$</span><span class="price"><?php echo  $item_price * $item_qty ?></span>
                                </p>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>

                <div class="cart-form">
                    <h4>Delivery Details</h4>
                    <form id="order_place">
                        <div class="delivery">
                            <div class="delivery_info">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="full_name" id="full_name"  placeholder="E.g. Vijay Thapa">
                            </div>
                            <div class="delivery_info">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" id="phone"  placeholder="E.g. 9843xxxxxx">
                            </div>
                            <div class="delivery_info">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"  placeholder="E.g.">
                            </div>
                            <div class="delivery_info">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10"  placeholder="E.g. Street, City, Country"></textarea>
                            </div>
                            <div class="delivery_info payment_wrapper">
                                <label for="payment">Select Payment Method</label>
                                <div class="payment">
                                    <div class="payment_info">
                                        <input type="radio"  name="payment_method" value="COD">
                                        <label for="payment">Cash on Delivery</label>
                                    </div>
                                    <div class="payment_info">
                                        <input type="radio" name="payment_method" value="CARD">
                                        <label for="payment">CARD Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card_info" style="display: none;">
                                <div class="delivery_info">
                                    <label for="card_number">Card Number</label>
                                    <input type="text" name="card_number" id="card_number" placeholder="E.g. 0123 4567 8910 1112">
                                </div>
                                <div class="delivery_info">
                                    <label for="card_cvv">CVV</label>
                                    <input type="password" name="card_cvv" id="card_cvv" placeholder="E.g. 123">
                                </div>
                                <div class="delivery_info">
                                    <label for="card_expiration">Expiration</label>
                                    <input type="text" name="card_expiration" id="card_expiration" placeholder="E.g. MM/YYYY">
                                </div>
                            </div>
                            <div class="delivery_info">
                                <label for="total">Total</label>
                                <input type="hidden" name="total_price" value="<?php echo array_sum($tprice); ?>">
                                <p>$<?php echo array_sum($tprice); ?></p>
                            </div>
                            <?php
                            if (isset($_SESSION['useremail']) && isset($_SESSION['user_id'])) {
                            ?>
                                <div class="btn-wrap">
                                    <button type="submit" value="Confirm Order" class="btn_confirm">Confirm Order</button>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="btn-wrap">
                                    <a href="/puredelight/login?msg=Login First To Place The Order" class="btn_confirm">Login To Continue</a>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<?php get_template('./footer.php'); ?>