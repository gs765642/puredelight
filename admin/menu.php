<?php
include('./config.php');
include('header.php');
$sql = "SELECT * FROM taxonomy";
$result = $mysqli->query($sql);
$psql = "SELECT  * FROM products";
$products = $mysqli->query($psql);

?>
<div>
    <div>
        <div class="add_item_btn">
            <button class="add_product">add item</button>
        </div>
        <?php if ($products) { ?>
            <div class="table-items">
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Product Description</th>
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
                        ?>
                            <tr>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $image; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $status; ?></td>
                                <td>Item Action</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php $products->free();
        } ?>
        <div class="add_item_btn">
            <button class="add_product">add item</button>
        </div>
        <div class="add_item_form popup_form" style="display: none;">
            <div class="close_btn">
                <a href="javscript:;">Close</a>
            </div>
            <form id="add_item_to_menu" method="post" enctype="multipart/form-data">
                <input type="text" name="item_name" id="item_name" placeholder="Item Name">
                <input type="text" name="item_price" id="item_price" placeholder="Item Price">
                <input type="file" name="item_image" id="item_image">
                <img id="imgPreview" src="" alt="">
                <textarea name="item_description" id="item_description" placeholder="Item Description"></textarea>
                <ul>
                    <?php
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            $term_id = $row['term_id'];
                            $term_name = $row['term_name'];

                    ?>
                            <li id="products_category-<?= $term_id; ?>">
                                <label>
                                    <input value="<?= $term_id; ?>" type="checkbox" name="item_category[]">
                                    <?= $term_name; ?>
                                </label>
                            </li>
                    <?php
                        }
                        $result->free();
                    }
                    ?>

                    <li id="products_category">
                        <label>
                            <input value="" type="checkbox" name="item_category[]">
                            Uncategory
                        </label>
                    </li>
                </ul>
                <select type="text" name="item_status" id="item_status" placeholder="Item Status">
                    <option value="">Item Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <input type="submit" value="Add Item" name="add_item" id="add_item">
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>