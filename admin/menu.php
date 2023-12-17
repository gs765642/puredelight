<?php include('header.php'); ?>

<div>
    <div>
        <div class="add_item_btn">
            <button class="add_product">add item</button>
        </div>
        <div class="table-items">
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Item Image</th>
                        <th>Item Description</th>
                        <th>Item Category</th>
                        <th>Item Status</th>
                        <th>Item Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Item Name</td>
                        <td>Item Price</td>
                        <td>Item Image</td>
                        <td>Item Description</td>
                        <td>Item Category</td>
                        <td>Item Status</td>
                        <td>Item Action</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="add_item_btn">
            <button class="add_product">add item</button>
        </div>
        <div class="add_item_form popup_form" style="display: none;">
            <div class="close_btn">
                <a href="javscript:;">Close</a>
            </div>
            <form method="post" id="add_item_to_menu">
                <input type="text" name="item_name" id="item_name" placeholder="Item Name">
                <input type="text" name="item_price" id="item_price" placeholder="Item Price">
                <input type="file" name="item_image" id="item_image" placeholder="Item Image">
                <input type="text" name="item_description" id="item_description" placeholder="Item Description">
                <input type="text" name="item_category" id="item_category" placeholder="Item Category">
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