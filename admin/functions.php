<?php

function add_products()
{
    global $mysqli;
    $item_name = isset($_POST['item_name']) ? $_POST['item_name'] : "";
    $item_price = isset($_POST['item_price']) ? $_POST['item_price'] : "";
    $item_description = isset($_POST['item_description']) ? $_POST['item_description'] : "";
    $item_category = isset($_POST['item_category']) ? $_POST['item_category'] : "";
    $item_status = isset($_POST['item_status']) ? $_POST['item_status'] : "";
    $sql = "INSERT INTO products (item_name, item_price, item_image, item_description, item_category, item_status) VALUES (?, ?, ?, ?, ?, ?)";
    if ($_FILES['item_image']['name'] != '') {
        $filename = $_FILES['item_image']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($extension, $valid_extensions)) {
            $new_name = $filename;
            $path = "uploads/" . $new_name;
            if (move_uploaded_file($_FILES['item_image']['tmp_name'], $path)) {
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ssssss", $item_name, $item_price, $new_name, $item_description, implode(',', $item_category), $item_status);
                if ($stmt->execute()) {
                    echo "Inserted successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            }
        } else {
            echo "ERROR";
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "add_products") {
    add_products();
}

function add_category_term()
{
    global $mysqli;
    $term_name = isset($_POST['term_name']) ? $_POST['term_name'] : "";
    $term_slug = isset($_POST['term_slug']) ? $_POST['term_slug'] : "";
    $term_description = isset($_POST['term_description']) ? $_POST['term_description'] : "";
    $parent_term = isset($_POST['parent_term']) ? $_POST['parent_term'] : "";
    $sql = "INSERT INTO taxonomy (term_name, term_slug, term_description, parent_term) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $term_name, $term_slug, $term_description, $parent_term);
    if ($stmt->execute()) {
        $id = $mysqli->insert_id;
        echo "Inserted successfully id=" . $id;
    } else {
        echo "Error:" . $stmt->error;
    }
    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == "add_term_category") {
    add_category_term();
}
function delete_product()
{
    global $mysqli;
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $sql = "DELETE FROM products WHERE item_id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $result = $stmt->execute();
        if ($result) {
            $response['status'] = true;
            $response['message'] = "Product deleted successfully.";
        } else {
            $response['status'] = false;
            $response['message'] = "Unable to delete the product.";
        }
        $stmt->close();
    } else {
        $response['status'] = false;
        $response['message'] = "Product ID not provided.";
    }
    echo json_encode($response);
}

if (isset($_POST['action']) && $_POST['action'] == "delete_product") {
    delete_product();
}
