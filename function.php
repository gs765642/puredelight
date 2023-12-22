<?php
include('./config.php');

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
            <a href="./category.php/?cats=' . $term['term_slug'] . '">' . $term['term_name'] . ' <i class="fa-solid fa-chevron-down"></i></a>
            ';
        } else {
            $html .= '
            <li>
            <a href="./category.php/?cats=' . $term['term_slug'] . '">' . $term['term_name'] . '</a>
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

        // if(empty($r['parent_term'])){
        //     // parent
        //     $result[$r['term_id']] = $r;
        // }else{
        //     if(isset($result[$k])){
        //         $result[$k]['children'] = $r;
        //     }
        //     // if($k == $r['parent_term']){
        //     //     $result[$k]['children'] = $r;
        //     // }
        //     // // child
        //     // foreach($result as $k2 => $r2){
        //     //     if($r['term_id'] == $k2){
        //     //     }
        //     // }
        // }
    }


    return $result;

    // group_menu_categories($data = []);
}


function sign_up_user()
{
    global $mysqli;

    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
    $pass = isset($_POST['password']) ? md5($_POST['password']) : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $username = str_replace(' ', '_', $full_name) . rand(1, 1000);
    $sql = "INSERT INTO signup (full_name, user_name, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $username, $email, $pass);
    if ($stmt->execute()) {
        echo "Account Has Been Created";
    } else {
    }
    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == "new_sign_up") {
    sign_up_user();
}

function login_user()
{
    global $mysqli;
    $userInput = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM signup WHERE email = ? AND password = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $userInput, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows >= 1) {
        echo "Logged in";
    } else {
        $msg = 1;
    }

    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == "user_login") {
    login_user();
}

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

    if (!session_id()) {
        session_start();
    }
    switch ($_POST['action']) {
        case "add_to_cart":
            if (!empty($_POST['quantity']) && !empty($_POST['product'])) {
                $items = runQuery('SELECT * FROM products WHERE item_id=' . $_POST['product']);
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
                        echo json_encode($_SESSION['cart_items'][$item_id]);
                    }
                }
            }
            break;
        case "remove_cart_item":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_POST["product_id"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty_cart":
            unset($_SESSION["cart_item"]);
            break;
    }
}
if (isset($_POST['action']) && ($_POST['action'] == "add_to_cart" || $_POST['action'] == "remove_cart_item" || $_POST['action'] == "empty_cart")) {
    add_to_cart_or_remove_product();
}
