-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
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


-- Dumping database structure for qrcode
CREATE DATABASE IF NOT EXISTS `qrcode` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `qrcode`;

-- Dumping structure for table qrcode.qrcode
CREATE TABLE IF NOT EXISTS `qrcode` (
  `qr_id` int(11) NOT NULL AUTO_INCREMENT,
  `qr_text` text NOT NULL,
  `qr_image` text NOT NULL,
  PRIMARY KEY (`qr_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table qrcode.qrcode: ~0 rows (approximately)
INSERT INTO `qrcode` (`qr_id`, `qr_text`, `qr_image`) VALUES
	(1, 'test 1<br/><br/><br/>', '1668847071.png'),
	(2, 'test 2<br/><br/><br/>', '1668847076.png'),
	(3, 'test 3<br/><br/><br/>', '1668847083.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
