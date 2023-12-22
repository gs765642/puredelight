<?php
include('./config.php');
// function create_tables()
// {
//     global $mysqli;

//     $sql = '
//         CREATE TABLE IF NOT EXISTS products (
//             item_id INT AUTO_INCREMENT PRIMARY KEY,

//             item_name VARCHAR(255) NOT NULL,
//             item_price VARCHAR(255) NOT NULL,
//             item_image VARCHAR(255),
//             item_description TEXT,
//             item_category VARCHAR(50),
//             item_status VARCHAR(20)
//         );

// CREATE TABLE IF NOT EXISTS taxonomy (
//     term_id INT AUTO_INCREMENT PRIMARY KEY,
//     term_name VARCHAR(50) NOT NULL,
//     term_slug VARCHAR(255),
//     term_description VARCHAR(255)
// );

//         CREATE TABLE IF NOT EXISTS signup (
//             user_id INT AUTO_INCREMENT PRIMARY KEY,
//             full_name VARCHAR(100) NOT NULL,
//             user_name VARCHAR(255) NOT NULL,
//             email VARCHAR(255) NOT NULL,
//             password VARCHAR(255) NOT NULL
//         );

//         CREATE TABLE IF NOT EXISTS orders (
//             order_id INT AUTO_INCREMENT PRIMARY KEY,
//             full_name VARCHAR(100) NOT NULL,
//             phone VARCHAR(20) NOT NULL,
//             email VARCHAR(255) NOT NULL,
//             address TEXT NOT NULL,
//             payment_method VARCHAR(50) NOT NULL,
//             payment_status VARCHAR(20) NOT NULL,
//             customer_id  VARCHAR(255) NOT NULL
//         );
//     ';

//     if ($mysqli->multi_query($sql)) {
//         do {
//             // Store the result set
//             if ($result = $mysqli->store_result()) {
//                 $result->free(); // Free the result set
//             }
//         } while ($mysqli->more_results() && $mysqli->next_result());

//         echo "Tables created or already exist";
//     } else {
//         echo "Error creating tables: " . $mysqli->error;
//     }
// }

// Call the function to create tables
// create_tables();


function add_products()
{
    global $mysqli;
    $item_name = isset($_POST['item_name']) ? $_POST['item_name'] : "";
    $item_price = isset($_POST['item_price']) ? $_POST['item_price'] : "";
    echo $item_description = isset($_POST['item_description']) ? $_POST['item_description'] : "";
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
