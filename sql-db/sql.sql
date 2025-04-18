-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for project_puredelight
CREATE DATABASE IF NOT EXISTS `project_puredelight` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `project_puredelight`;

-- Dumping structure for table project_puredelight.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project_puredelight.admin: ~1 rows (approximately)
INSERT INTO `admin` (`user_id`, `full_name`, `user_name`, `email`, `PASSWORD`) VALUES
	(1, 'Admin Admin', 'admin123', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- Dumping structure for table project_puredelight.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `items` longtext COLLATE utf8mb4_general_ci,
  `payment_method` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_amount` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` int NOT NULL,
  `created_date` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project_puredelight.orders: ~4 rows (approximately)
INSERT INTO `orders` (`order_id`, `full_name`, `phone`, `email`, `address`, `items`, `payment_method`, `total_amount`, `customer_id`, `created_date`) VALUES
	(2, 'Shilpa Kashyap', '1231231231', 'demo@gmail.com', 'Ludhiana', 'a:4:{i:5;a:5:{s:4:"name";s:16:"Avocado Sandwich";s:10:"product_id";s:1:"5";s:8:"quantity";s:1:"1";s:5:"price";s:2:"22";s:5:"image";s:23:"avocado-sandwich-sw.jpg";}i:6;a:5:{s:4:"name";s:17:"White Sause Pasta";s:10:"product_id";s:1:"6";s:8:"quantity";i:2;s:5:"price";s:2:"18";s:5:"image";s:23:"white-sause-pasta-p.jpg";}i:7;a:5:{s:4:"name";s:11:"Penne Pasta";s:10:"product_id";s:1:"7";s:8:"quantity";s:1:"1";s:5:"price";s:2:"18";s:5:"image";s:17:"penne-pasta_p.jpg";}i:9;a:5:{s:4:"name";s:23:"Black Pepper Pork Pasta";s:10:"product_id";s:1:"9";s:8:"quantity";i:3;s:5:"price";s:2:"20";s:5:"image";s:29:"black-pepper-pork-pasta_p.jpg";}}', 'COD', '136', 3, '2024-01-15 19:53:21'),
	(3, 'Rajesh Kumar', '12312391', 'raj12@gmail.com', 'Ludhiana', 'a:3:{i:14;a:5:{s:4:"name";s:15:"Farmhouse Pizza";s:10:"product_id";s:2:"14";s:8:"quantity";s:1:"1";s:5:"price";s:2:"10";s:5:"image";s:13:"farmhouse.jpg";}i:15;a:5:{s:4:"name";s:12:"Aussie Pizza";s:10:"product_id";s:2:"15";s:8:"quantity";s:1:"1";s:5:"price";s:1:"8";s:5:"image";s:16:"Aussie-Pizza.jpg";}i:12;a:5:{s:4:"name";s:15:"Red Velvet Cake";s:10:"product_id";s:2:"12";s:8:"quantity";s:1:"1";s:5:"price";s:2:"20";s:5:"image";s:18:"red-velet-cake.jpg";}}', 'CARD', '38', 3, '14.01.2024'),
	(4, 'Gurmeet Singh', '09876005642', 'igurmeetsinghin@gmail.com', 'CMC Hospital, Ludhiana, Punjab, 141008', 'a:2:{i:1;a:5:{s:4:"name";s:25:"Parmesan Crusted Potatoes";s:10:"product_id";s:1:"1";s:8:"quantity";s:1:"1";s:5:"price";s:2:"15";s:5:"image";s:32:"parmesan-crusted-potatoes-ap.jpg";}i:2;a:5:{s:4:"name";s:14:"Punjabi Samosa";s:10:"product_id";s:1:"2";s:8:"quantity";s:1:"1";s:5:"price";s:2:"14";s:5:"image";s:20:"Samosa-recipe-ap.jpg";}}', 'COD', '29', 14, '2025-01-31 12:45:25'),
	(5, 'Gurmeet Singh', '09876005642', 'igurmeetsinghin@gmail.com', 'CMC Hospital, Ludhiana, Punjab, 141008', 'a:4:{i:6;a:5:{s:4:"name";s:17:"White Sause Pasta";s:10:"product_id";s:1:"6";s:8:"quantity";s:1:"1";s:5:"price";s:2:"18";s:5:"image";s:23:"white-sause-pasta-p.jpg";}i:3;a:5:{s:4:"name";s:23:"Grilled Cheese Sandwich";s:10:"product_id";s:1:"3";s:8:"quantity";s:1:"1";s:5:"price";s:2:"15";s:5:"image";s:30:"grilled-cheese-sandwich-sw.jpg";}i:1;a:5:{s:4:"name";s:25:"Parmesan Crusted Potatoes";s:10:"product_id";s:1:"1";s:8:"quantity";s:1:"1";s:5:"price";s:2:"15";s:5:"image";s:32:"parmesan-crusted-potatoes-ap.jpg";}i:2;a:5:{s:4:"name";s:14:"Punjabi Samosa";s:10:"product_id";s:1:"2";s:8:"quantity";s:1:"1";s:5:"price";s:2:"14";s:5:"image";s:20:"Samosa-recipe-ap.jpg";}}', 'COD', '62', 15, '2025-01-31 12:52:41'),
	(6, 'Gurmeet Singh', '09876005642', 'igurmeetsinghin@gmail.com', 'CMC Hospital, Ludhiana, Punjab, 141008', 'a:1:{i:2;a:5:{s:4:"name";s:14:"Punjabi Samosa";s:10:"product_id";s:1:"2";s:8:"quantity";s:1:"1";s:5:"price";s:2:"14";s:5:"image";s:20:"Samosa-recipe-ap.jpg";}}', 'COD', '14', 16, '2025-01-31 17:06:19');

-- Dumping structure for table project_puredelight.products
CREATE TABLE IF NOT EXISTS `products` (
  `item_id` int NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `item_price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_description` text COLLATE utf8mb4_general_ci,
  `item_category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project_puredelight.products: ~17 rows (approximately)
INSERT INTO `products` (`item_id`, `item_name`, `item_price`, `item_image`, `item_description`, `item_category`, `item_status`) VALUES
	(1, 'Parmesan Crusted Potatoes', '15', 'parmesan-crusted-potatoes-ap.jpg', '<h3>Lorem Description</h3>\r\n<div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit minima vel optio dignissimos laudantium officiis velit! Quidem autem aliquid neque deserunt odio nulla error rem commodi atque, possimus corporis sit.</div>', '2,3', '1'),
	(2, 'Punjabi Samosa', '14', 'Samosa-recipe-ap.jpg', '', '1', '1'),
	(3, 'Grilled Cheese Sandwich', '15', 'grilled-cheese-sandwich-sw.jpg', '', '3', '1'),
	(4, 'Panner Sandwich', '22', 'paneer-sandwich-sw.jpg', '', '3', ''),
	(5, 'Avocado Sandwich', '22', 'avocado-sandwich-sw.jpg', '', '3', '1'),
	(6, 'White Sause Pasta', '18', 'white-sause-pasta-p.jpg', '', '4', '1'),
	(7, 'Penne Pasta', '18', 'penne-pasta_p.jpg', '', '4', '1'),
	(8, 'Apple Pie', '15', 'apple-pie-pi.jpg', '', '5', '1'),
	(9, 'Black Pepper Pork Pasta', '20', 'black-pepper-pork-pasta_p.jpg', '', '4', '1'),
	(10, 'Pumpkin Pie', '14', 'pumpkin-pie-pi.jpg', '', '5', '1'),
	(11, 'Black Forest Cake', '14', 'black-forest-cake.jpg', '', '6', '1'),
	(12, 'Red Velvet Cake', '20', 'red-velet-cake.jpg', '', '6', '1'),
	(13, 'brownie with blueberries', '16', 'brownie-with-blueberries.jpg', '', '6', '1'),
	(14, 'Farmhouse Pizza', '10', 'farmhouse.jpg', '', '1,7', '1'),
	(15, 'Aussie Pizza', '8', 'Aussie-Pizza.jpg', '', '7', '1'),
	(16, 'Cheese N Corn Pizza', '7.5', 'Cheese-N-Corn-Pizza.jpg', '', '7', ''),
	(17, 'Margherita Pizza ', '10', 'pizza-margherita.jpg', '', '7', '1');

-- Dumping structure for table project_puredelight.taxonomy
CREATE TABLE IF NOT EXISTS `taxonomy` (
  `term_id` int NOT NULL AUTO_INCREMENT,
  `term_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `term_slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `term_description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent_term` int NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project_puredelight.taxonomy: ~10 rows (approximately)
INSERT INTO `taxonomy` (`term_id`, `term_name`, `term_slug`, `term_description`, `parent_term`) VALUES
	(1, 'Dish Type', 'dish-type', 'Lorem IPUSM', 0),
	(2, 'Appetizers & Snacks', 'appetizers--snacks', 'Lorem IPUSM', 1),
	(3, 'Sandwiches', 'sandwiches', 'Sandwiches', 1),
	(4, 'Pasta', 'pasta', 'Pasta', 1),
	(5, 'Pie', 'pie', 'pie', 1),
	(6, 'Cake', 'cake', 'Cake', 1),
	(7, 'Meal Type', 'meal-type', 'Meal Type', 0),
	(8, 'Breakfast and Brunch', 'breakfast-and-brunch', 'Breakfast and Brunch\r\n', 7),
	(9, 'Dinners', 'dinners', 'Dinners\r\n', 7),
	(10, 'Lunch', 'lunch', 'Lunch', 7);

-- Dumping structure for table project_puredelight.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project_puredelight.users: ~12 rows (approximately)
INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `user_name`) VALUES
	(0000000001, 'devtest', 'user@mail.co', '21232f297a57a5a743894a0e4a801fc3', 'devtest463'),
	(0000000002, 'lorem dev', 'usera@m.com', 'e10adc3949ba59abbe56e057f20f883e', 'lorem_dev867'),
	(0000000003, 'User', 'user@mail.co', '793f44cce02286cfa2b781a34d6b05fb', 'User982'),
	(0000000005, 'user@mail.com', 'user@mail.com', '6ad193f57f79ac444c3621370da955e9', 'user@mail.com734'),
	(0000000006, 'user me ', 'meet@mail.com', '1e7dcbede1f32ea885373ddcae1958eb', 'user_me_491'),
	(0000000007, 'user me ', 'meet@mail.com', '1e7dcbede1f32ea885373ddcae1958eb', 'user_me_585'),
	(0000000008, 'root', 'root@mail.com', '63a9f0ea7bb98050796b649e85481845', 'root546'),
	(0000000009, 'user me ', 'root@mail.com', '5308dcbbb7dea1b44e3d1d55ea7656f9', 'user_me_227'),
	(0000000010, 'asd12', 'ad@m.com', '647589b16389b28b85239c02f9667d34', 'asd12601'),
	(0000000011, 'asd', 'asd@mail.com', 'fedfb32254ff7ac28713583061477d6e', 'asd810'),
	(0000000012, 'asd', 'asd@ma.com', 'fa65b14a8202b5342ad9cabbbff60d70', 'asd861'),
	(0000000013, 'user me ', 'logincheck@mail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'user_me_974'),
	(0000000014, 'woo', 'woo@mail.com', 'bc0a7fd30b18c2c790d04c28fd8c3c28', 'woo302'),
	(0000000015, 'woo', 'woosh@mail.co', '43777ac65c803bec838e9caa00cde884', 'woo555'),
	(0000000016, 'woo', 'woos@mail.com', '7919de72781bc90dcdf928454398d2b4', 'woo958'),
	(0000000017, 'temp123', 'temp@130.com', '996c7b2c74fe0939e31116f9e2363147', 'temp123314'),
	(0000000018, 'user', 'gs@mail.co', 'cbb1f89ce807fa7115371dad4f193f43', 'user577');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
