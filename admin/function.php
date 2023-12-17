<?php
include('./config.php');

// function create_tables()
// {
//     global $mysqli;

//     $sql = '
//         CREATE TABLE IF NOT EXISTS menu_item (
//             item_id INT AUTO_INCREMENT PRIMARY KEY,
//             item_name VARCHAR(255) NOT NULL,
//             item_price VARCHAR(255) NOT NULL,
//             item_image VARCHAR(255),
//             item_description TEXT,
//             item_category VARCHAR(50),
//             item_status VARCHAR(20)
//         );

//         CREATE TABLE IF NOT EXISTS category (
//             category_id INT AUTO_INCREMENT PRIMARY KEY,
//             category_name VARCHAR(50) NOT NULL
//         );

//         CREATE TABLE IF NOT EXISTS signup (
//             user_id INT AUTO_INCREMENT PRIMARY KEY,
//             full_name VARCHAR(100) NOT NULL,
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
//             payment_status VARCHAR(20) NOT NULL
//         );
//     ';

//     if ($mysqli->multi_query($sql)) {
//         do {
//             // Store the result set
//             if ($result = $mysqli->store_result()) {
//                 $result->free(); // Free the result set
//             }
//         } while ($mysqli->more_results() && $mysqli->next_result());

//         // echo "Tables created or already exist";
//     } else {
//         echo "Error creating tables: " . $mysqli->error;
//     }
// }

// // Call the function to create tables
// create_tables();

function add_menu_item()
{
    global $mysqli;

    $item_name = isset($_POST['item_name']) ? $_POST['item_name'] : "";
    $item_price = isset($_POST['item_price']) ? $_POST['item_price'] : "";
    $item_image = isset($_POST['item_image']) ? $_POST['item_image'] : "";
    $item_description = isset($_POST['item_description']) ? $_POST['item_description'] : "";
    $item_category = isset($_POST['item_category']) ? $_POST['item_category'] : "";
    $item_status = isset($_POST['item_status']) ? $_POST['item_status'] : "";

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO menu_item (item_name, item_price, item_image, item_description, item_category, item_status) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssss", $item_name, $item_price, $item_image, $item_description, $item_category, $item_status);

    if ($stmt->execute()) {
        echo "Inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['action']) && $_POST['action'] == "add_menu_item") {
    add_menu_item();
}
