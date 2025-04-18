<?php
include('./config.php');
include('./header.php');
global $mysqli;
$sql = "SELECT * FROM orders WHERE customer_id=" . $_SESSION['user_id'];
$result = $mysqli->query($sql);
$total = 0;

if (!empty($result)) {
    $total = $result->num_rows;
}
?>

<body>
    <section class="user-wrapper">
        <div class="container">
            <div class="logout_main_cont">
                <div class="logout_btn">
                    <a href="/puredelight/" class="home"> Home </a>
                </div>
                <div class="logout_btn">
                    <a href="/puredelight/user/logout" class="logout"> Logout </a>
                </div>
            </div>
            <div class="user_meta">
                <h2>Hi User</h2>
                <div class="user_image">
                    <img src="./uploads/demo-img.jpg" alt="">
                </div>
                <div class="user_meta_info">
                    <div class="user_meta_info_item">
                        <h1><?php echo $total ?></h1>
                        <p>Total Orders</p>
                    </div>
                    <?php if (!empty($result)) {



                    ?>
                        <div class="view_all_orders">
                            <!-- <a href="javscript:;">View All Orders</a> -->
                            <br>
                            <?php while ($orders = $result->fetch_assoc()) {
                                $date = strtotime($orders['created_date']);
                                $orderDate = date('d-F-Y', $date);
                                $orderItems = unserialize($orders['Items']);



                            ?>
                                <div style="font-size: 20px;font-weight: 600;color: #fff;text-align: center;">Order Date: <?php echo $orderDate; ?></div>
                                <div class="all_orders_record">
                                    <div class="order_record">
                                        <?php
                                        foreach ($orderItems as $orderItem) {

                                            $total = intval($orderItem['price']) * intval($orderItem['quantity']);
                                        ?>
                                            <div class="order_record_item">
                                                <h2><?php echo $orderItem['name']; ?></h2>
                                                <p>Price: $<?php echo $orderItem['price']; ?></p>
                                                <p>Quantity: <?php echo $orderItem['quantity']; ?></p>
                                                <p>Total:<?php echo $total; ?></p>
                                            </div>
                                        <?php
                                        } ?>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php include('./footer.php'); ?>