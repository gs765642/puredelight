CREATE TABLE menu_item (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    item_price VARCHAR(255) NOT NULL,
    item_image VARCHAR(255),
    item_description TEXT,
    item_category VARCHAR(50),
    item_status VARCHAR(20)
);

