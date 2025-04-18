<?php
function get_template($file)
{
    require_once($file);
}


function get_categories_menu_data()
{
    global $mysqli;
    $query = $mysqli->query("SELECT * FROM  taxonomy");
    while ($data[] = $query->fetch_assoc()) {
    }

    $data = buildNestedArray($data);
    return $data;
}

function buildNestedArray($terms, $parentId = 0)
{
    $nestedArray = array();

    foreach ($terms as $term) {
        if ($term && @$term['parent_term'] == $parentId) {
            $children = buildNestedArray($terms, $term['term_id']);
            if (!empty($children)) {
                $term['children'] = $children;
            }
            $nestedArray[] = $term;
        }
    }

    return $nestedArray;
}

function buildMenu($terms)
{
    $html = '';
    foreach ($terms as $term) {
        $hc = !empty(@$term['children']);
        if (!$term) {
            continue;
        }
        if ($hc) {

            $html .= '
            <li class="menu-has-children">
            <a href="javascript:;">' . $term['term_name'] . ' <i class="fa-solid fa-chevron-down"></i></a>
            ';
        } else {
            $html .= '
            <li>
            <a href="javascript:;">' . $term['term_name'] . '</a>
            ';
        }

        if ($term && $hc) {
            $html .= '<ul class="sub-menu">';
            // echo "<pre>";
            // print_r(@$term['children']);
            $html .= buildMenu(@$term['children'] ?? []);
            $html .= '</ul>';
        } else {
            $html .= '</li>';
        }
    }

    return $html;
}

function showMenu()
{
    $data = get_categories_menu_data();
    $html = buildMenu($data);

    return "<ul class='main-menu'>" . $html . '</ul>';
}

function group_menu_categories($data = [], $result = [])
{

    foreach ($data as $k => $term) {
        $parentTermId = $term['parent_term'];
        $result[$parentTermId]['children'][] = $term;
    }
    return $result;
}

/**
 * ## AJAX CODE START
 */

function runQuery($query)
{
    global $mysqli;
    $result = $mysqli->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }
    if (!empty($resultset))
        return $resultset;
}
function add_to_cart_or_remove_product()
{
    $response = [];
    switch ($_POST['action']) {
        case "add_to_cart":
            if (!empty($_POST['quantity']) && !empty($_POST['product_id'])) {
                $items = runQuery('SELECT * FROM products WHERE item_id=' . $_POST['product_id']);
                if ($items) {
                    $item_id = $items[0]["item_id"];
                    $itemArray = array(
                        'name' => $items[0]["item_name"],
                        'product_id' => $items[0]["item_id"],
                        'quantity' => $_POST["quantity"],
                        'price' => $items[0]["item_price"],
                        'image' => $items[0]["item_image"]
                    );
                    if (isset($_SESSION['cart_items'][$item_id])) {
                        $_SESSION['cart_items'][$item_id]['quantity'] += $_POST['quantity'];
                    } else {
                        $_SESSION['cart_items'][$item_id] = $itemArray;
                    }
                    if (!empty($_SESSION['cart_items'])) {
                        $response['items'] = json_encode($_SESSION['cart_items']);
                        $response['total'] = count($_SESSION['cart_items']);
                    }
                }
            }
            break;
        case "change_item_cart":
            if (!empty($_POST['quantity']) && !empty($_POST['product_id'])) {
                if ($_POST['product_id']) {
                    $items = runQuery('SELECT * FROM products WHERE item_id=' . $_POST['product_id']);
                    $item_id = $items[0]["item_id"];
                    $itemArray = array(
                        'name' => $items[0]["item_name"],
                        'product_id' => $items[0]["item_id"],
                        'quantity' => $_POST["quantity"],
                        'price' => $items[0]["item_price"],
                        'image' => $items[0]["item_image"]
                    );
                    if (isset($_SESSION['cart_items'][$item_id])) {
                        $_SESSION['cart_items'][$item_id]['quantity'] = $_POST['quantity'];
                        $response['items'] = json_encode($_SESSION['cart_items']);
                        $response['total'] = count($_SESSION['cart_items']);
                        $response['total_price'] = $_SESSION['cart_items'][$item_id]['quantity'] * $_SESSION['cart_items'][$item_id]['price'];
                    }
                }
            }
            break;
        case "remove_cart_item":
            if (!empty($_SESSION["cart_items"])) {
                foreach ($_SESSION["cart_items"] as $k => $v) {
                    if ($_POST["product"] == $k) {
                        unset($_SESSION["cart_items"][$k]);
                    }
                    if (empty($_SESSION["cart_items"])) {
                        unset($_SESSION["cart_items"]);
                        $response['total'] = 0;
                    } else {
                        $response['total'] = count($_SESSION['cart_items']);
                        $response['items'] = json_encode($_SESSION['cart_items']);
                    }
                }
            }
            break;
        case "empty_cart":
            if (isset($_SESSION["cart_items"])) {
                unset($_SESSION["cart_items"]);
                $response['total'] = 0;
                $response['status'] = true;
            }
            break;
    }
    echo json_encode($response);
}
if (isset($_POST['action']) && ($_POST['action'] == "add_to_cart" || $_POST['action'] == "remove_cart_item" || $_POST['action'] == "change_item_cart" || $_POST['action'] == "empty_cart")) {
    add_to_cart_or_remove_product();
}



function user_order_placed()
{
    global $mysqli;
    $response = [];
    date_default_timezone_set('Asia/Kolkata');
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : "";
    $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : "";
    $items = serialize($_SESSION['cart_items']);
    $customer_id = $_SESSION['user_id'];
    $created_date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO orders (full_name, phone, email, address, items, payment_method, total_amount, customer_id,created_date) VALUES (?, ?, ?, ?,?,?, ?, ?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssssssss", $full_name, $phone, $email, $address, $items, $payment_method, $total_amount, $customer_id, $created_date);
    if ($stmt->execute()) {
        $response['status'] = true;
        $response['message'] = "Order Placed Succesfully";
        unset($_SESSION['cart_items']);
    } else {
        $stmt->error;
        $response['status'] = true;
        $response['message'] = "Unable to Place The Order";
    }
    echo json_encode($response);
    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == "order_placed") {
    user_order_placed();
}


/**
 * ## AJAX CODE END
 */
