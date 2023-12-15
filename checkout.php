<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
    <div>
        <div class="checkout">
            <div class="checkout_form">
                <h1>Fill this form to confirm your order.</h1>
                <form action="">
                    <div>
                        <h4F>Selected Food</h4F>
                        <div class="food_img">
                            <img src="./assets/img/menu-pizza.jpg" alt="">
                        </div>
                        <div class="food_info">
                            <h1>Food Title</h1>
                            <p>$2.3</p>
                            <div class="item_qty">
                                <label for="qty">Qty</label>
                                <input type="number" name="qty" id="qty" value="1">
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>Delivery Details</h4>
                        <div class="delivery">
                            <div class="delivery_info">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="full_name" id="full_name" placeholder="E.g. Vijay Thapa">
                            </div>
                            <div class="delivery_info">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" id="phone" placeholder="E.g. 9843xxxxxx">
                            </div>
                            <div class="delivery_info">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="E.g.">
                            </div>
                            <div class="delivery_info">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10" placeholder="E.g. Street, City, Country"></textarea>
                            </div>
                            <div class="delivery_info">
                                <label for="payment">Select Payment Method</label>
                                <div class="payment">
                                    <div class="payment_info">
                                        <input type="radio" name="payment" id="payment" value="COD">
                                        <label for="payment">Cash on Delivery</label>
                                    </div>
                                    <div class="payment_info">
                                        <input type="radio" name="payment" id="payment" value="CARD">
                                        <label for="payment">CARD Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card_info">
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
                                <p>$2.3</p>
                            </div>
                            <div class="btn">
                                <input type="submit" value="Confirm Order" class="btn_confirm">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>