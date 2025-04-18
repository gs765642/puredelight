<?php
include('./config.php');
include('header.php');
$sql = "SELECT * FROM taxonomy";
$result = $mysqli->query($sql);
$psql = "SELECT  * FROM products";
$products = $mysqli->query($psql);

?>
<main class="main">
    <section class="add-item-wrapper">
        <div class="container">
            <div class="add_item_btn">
                <button class="add_product" data-fancybox data-src="#add-item-popup">Add item</button>
            </div>
            <?php if ($products) { ?>
                <div class="table-items">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <!-- <th>Product Description</th> -->
                                <th>Product Category</th>
                                <th>Product Status</th>
                                <th>Product Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($product = $products->fetch_assoc()) {
                                // print_r($product);
                                $item_id = $product['item_id'];
                                $name = $product['item_name'];
                                $price = $product['item_price'];
                                $image = $product['item_image'];
                                $description = $product['item_description'];
                                $category = $product['item_category'];
                                $status = $product['item_status'];
                                $cats = [];
                                if (!empty($product['item_category'])) {
                                    $cat = explode(',', $product['item_category']);
                                    $cats = [];
                                    for ($i = 0; $i < count($cat); $i++) {
                                        $sql = "SELECT term_name FROM taxonomy WHERE term_id=" . $cat[$i];
                                        $result = $mysqli->query($sql);
                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            array_push($cats, $row['term_name']);
                                        }
                                    }
                                }
                            ?>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><img src="uploads/<?php echo $image; ?>" style="height: 100px;"></td>
                                    <!-- <td><?php echo $description; ?></td> -->
                                    <td><?php echo !empty($cats) ? implode(', ', $cats) : "Uncategories" ?></td>
                                    <td><?php echo $status == 1 ? "Active" : "Inactive"; ?></td>
                                    <td>
                                        <!-- <button class="btn btn-primary edit-item" data-item_id="<?php echo $product['item_id'] ?>" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button> -->
                                        <button class="btn btn-danger delete-item" data-item_id="<?php echo $product['item_id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php $products->free();
            } ?>
            <div class="add_item_btn">
                <button class="add_product" data-fancybox data-src="#add-item-popup">Add item</button>
            </div>
            <div style="display: none;" id="add-item-popup">
                <div class="add_item_form popup_form">
                    <form id="add_item_to_menu" method="post" enctype="multipart/form-data">
                        <input type="text" name="item_name" id="item_name" placeholder="Item Name">
                        <input type="text" name="item_price" id="item_price" placeholder="Item Price">
                        <input type="file" name="item_image" id="item_image">
                        <img id="imgPreview" src="" alt="">
                        <textarea name="item_description" id="item_description" placeholder="Item Description"></textarea>
                        <ul class="checkbox-item">
                            <?php
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $term_id = $row['term_id'];
                                    $term_name = $row['term_name'];

                            ?>
                                    <li id="products_category-<?= $term_id; ?>">
                                        <input value="<?= $term_id; ?>" type="checkbox" name="item_category[]">
                                        <label><?= $term_name; ?></label>
                                    </li>
                            <?php
                                }
                                $result->free();
                            }
                            ?>

                            <li id="products_category">
                                <input value="" type="checkbox" name="item_category[]">
                                <label>Uncategory</label>
                            </li>
                        </ul>
                        <select type="text" name="item_status" id="item_status" placeholder="Item Status">
                            <option value="">Item Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <input type="submit" value="Submit" name="add_item" id="add_item">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>