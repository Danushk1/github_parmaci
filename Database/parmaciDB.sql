-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
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

-- Dumping structure for table pharmacey.add_order
CREATE TABLE IF NOT EXISTS `add_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `delevery_address` varchar(100) NOT NULL DEFAULT '',
  `time` varchar(50) NOT NULL DEFAULT '',
  `note` varchar(200) NOT NULL DEFAULT '',
  `users_email` varchar(200) NOT NULL DEFAULT '',
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_email` (`users_email`),
  CONSTRAINT `usersemail` FOREIGN KEY (`users_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pharmacey.add_order: ~2 rows (approximately)
INSERT INTO `add_order` (`id`, `delevery_address`, `time`, `note`, `users_email`, `status`) VALUES
	(16, 'ghj', '25', 'rfxhbnfrjnliol;', 'danushksupun22@gmail.com', 2),
	(17, 'baliga', '25', 'fgbfg', 'danushksupun1@gmail.com', 1);

-- Dumping structure for table pharmacey.balense
CREATE TABLE IF NOT EXISTS `balense` (
  `id` int NOT NULL AUTO_INCREMENT,
  `drug` varchar(50) DEFAULT NULL,
  `qty1` int DEFAULT NULL,
  `max` int DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `drugqt` int DEFAULT NULL,
  `qunti` int DEFAULT NULL,
  `add_order_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `add_order_id` (`add_order_id`),
  CONSTRAINT `FK1_add_order_id` FOREIGN KEY (`add_order_id`) REFERENCES `add_order` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pharmacey.balense: ~4 rows (approximately)
INSERT INTO `balense` (`id`, `drug`, `qty1`, `max`, `amount`, `total`, `drugqt`, `qunti`, `add_order_id`, `status`) VALUES
	(60, 'fgh', 10, 5, 50, 100, NULL, NULL, 16, 1),
	(61, 'fgh', 10, 5, 50, 100, NULL, NULL, 16, 1),
	(66, 'bnvb', 5, 777, 270, 4155, NULL, NULL, 17, 2),
	(67, 'bnvb', 5, 777, 3885, 4155, NULL, NULL, 17, 1);

-- Dumping structure for table pharmacey.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(100) NOT NULL,
  `add_order_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `FK2-add_order_id` (`add_order_id`),
  CONSTRAINT `FK2-add_order_id` FOREIGN KEY (`add_order_id`) REFERENCES `add_order` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pharmacey.images: ~10 rows (approximately)
INSERT INTO `images` (`code`, `add_order_id`) VALUES
	('resource//prescriptions_images//0_63a9c8add036f.jpeg', 16),
	('resource//prescriptions_images//1_63a9c8adef9ea.jpeg', 16),
	('resource//prescriptions_images//2_63a9c8ae14bfd.jpeg', 16),
	('resource//prescriptions_images//3_63a9c8ae266dc.jpeg', 16),
	('resource//prescriptions_images//4_63a9c8ae2c3dc.jpeg', 16),
	('resource//prescriptions_images//0_63a9ca9c05ab3.jpeg', 17),
	('resource//prescriptions_images//1_63a9ca9c0baeb.jpeg', 17),
	('resource//prescriptions_images//2_63a9ca9c13d5f.jpeg', 17),
	('resource//prescriptions_images//3_63a9ca9c17f8c.jpeg', 17),
	('resource//prescriptions_images//4_63a9ca9c221d0.jpeg', 17);

-- Dumping structure for table pharmacey.users
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(105) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `verification_code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pharmacey.users: ~3 rows (approximately)
INSERT INTO `users` (`email`, `password`, `name`, `address`, `mobile`, `dob`, `verification_code`) VALUES
	('admin1@gmail.com', '123', NULL, NULL, NULL, NULL, NULL),
	('danushksupun1@gmail.com', '12345678', 'Danushk supun Siri', 'Beligamuwa', '0712512849', '2022-12-09', NULL),
	('danushksupun22@gmail.com', '123456789', 'Danushk supun Siri', 'Beligamuwa', '0712512846', '2022-12-08', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
