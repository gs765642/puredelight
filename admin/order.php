<?php
include('./config.php');
include('./header.php');

$osql = "SELECT  * FROM orders";
$orders = $mysqli->query($osql);
$allorders = $mysqli->query($osql);


?>
<main class="main">
    <section class="order-page">
        <div class="container">
            <?php if (!empty(mysqli_num_rows($orders))) { ?>
                <div class="today_order">
                    <h2>Today's Order</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Food</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            

                            while ($order = $orders->fetch_assoc()) {
                                $date = strtotime($order['created_date']);
                                $orderDate = date('d-F-Y', $date);
                                $orderItems = unserialize($order['Items']);
                                $items = [];
                                $qty = [];
                                $price = [];
                                foreach ($orderItems as $orderItem) {
                                    array_push($items, $orderItem['name']);
                                    array_push($qty, $orderItem['quantity']);
                                    array_push($price, $orderItem['price']);
                                }
                                if ($orderDate == date('d-F-Y')) {
                            ?>
                                    <tr>
                                        <td><?php echo $order['order_id']; ?></td>
                                        <td><?php echo  implode(',', $items) ?></td>
                                        <td><?php echo  implode(',', $price) ?></td>
                                        <td><?php echo  implode(',', $qty) ?></td>
                                        <td>$<?php echo $order['total_amount']; ?></td>
                                        <td><?php echo $orderDate; ?></td>
                                        <td><?php echo $order['full_name']; ?></td>
                                        <td><?php echo $order['phone']; ?></td>
                                        <td><?php echo $order['email']; ?></td>
                                        <td><?php echo $order['address']; ?></td>
                                        <td><?php echo $order['payment_method']; ?></td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="all_order">
                    <h2>All Order</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Food</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            while ($allorder = $allorders->fetch_assoc()) {

                                $date = strtotime($allorder['created_date']);
                                $orderDate = date('d-F-Y', $date);
                                $orderItems = unserialize($allorder['Items']);
                                $items = [];
                                $qty = [];
                                $price = [];

                                foreach ($orderItems as $orderItem) {
                                    array_push($items, $orderItem['name']);
                                    array_push($qty, $orderItem['quantity']);
                                    array_push($price, $orderItem['price']);
                                }
                                if ($orderDate != date('d-F-Y')) {
                            ?>
                                    <tr>
                                        <td><?php echo $allorder['order_id']; ?></td>
                                        <td><?php echo  implode(',', $items) ?></td>
                                        <td><?php echo  implode(',', $price) ?></td>
                                        <td><?php echo  implode(',', $qty) ?></td>
                                        <td>$<?php echo $allorder['total_amount']; ?></td>
                                        <td><?php echo $orderDate; ?></td>
                                        <td><?php echo $allorder['full_name']; ?></td>
                                        <td><?php echo $allorder['phone']; ?></td>
                                        <td><?php echo $allorder['email']; ?></td>
                                        <td><?php echo $allorder['address']; ?></td>
                                        <td><?php echo $allorder['payment_method']; ?></td>
                                    </tr>
                            <?php }
                            }
                            $orders->free(); ?>
                        </tbody>
                    </table>
                </div>
            <?php } else {
                echo "<h2> No Orders Recieved Yet</h2>";
            } ?>
        </div>
    </section>
</main>


</div>
<?php include('footer.php'); ?>