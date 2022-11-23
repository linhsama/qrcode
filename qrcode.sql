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

-- Dumping structure for table qrcode.cososanxuat
CREATE TABLE IF NOT EXISTS `cososanxuat` (
  `id_cssx` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `chu_co_so` varchar(50) NOT NULL DEFAULT '',
  `ten_cssx` mediumtext NOT NULL,
  `so_dien_thoai` varchar(50) NOT NULL DEFAULT '',
  `dia_chi` mediumtext NOT NULL,
  `mo_ta` text NOT NULL,
  PRIMARY KEY (`id_cssx`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table qrcode.cososanxuat: ~0 rows (approximately)

-- Dumping structure for table qrcode.khuvucnuoitrong
CREATE TABLE IF NOT EXISTS `khuvucnuoitrong` (
  `id_khu_vuc` int(11) NOT NULL AUTO_INCREMENT,
  `ten_khu_vuc` varchar(50) DEFAULT NULL,
  `dien_tich` varchar(50) DEFAULT NULL,
  `dia_chi` mediumtext DEFAULT NULL,
  `id_cssx` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_khu_vuc`),
  KEY `FK_khuvucnuoitrong_cososanxuat` (`id_cssx`),
  CONSTRAINT `FK_khuvucnuoitrong_cososanxuat` FOREIGN KEY (`id_cssx`) REFERENCES `cososanxuat` (`id_cssx`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table qrcode.khuvucnuoitrong: ~0 rows (approximately)

-- Dumping structure for table qrcode.nongthuysan
CREATE TABLE IF NOT EXISTS `nongthuysan` (
  `id_nts` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nts` varchar(50) DEFAULT NULL,
  `phan_loai` int(11) DEFAULT NULL,
  `mo_ta` mediumtext DEFAULT NULL,
  `hinh_anh` mediumtext DEFAULT NULL,
  `id_khu_vuc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nts`) USING BTREE,
  KEY `FK_sanpham_cososanxuat` (`id_khu_vuc`) USING BTREE,
  CONSTRAINT `FK_hanghoa_khuvucnuoitrong` FOREIGN KEY (`id_khu_vuc`) REFERENCES `khuvucnuoitrong` (`id_khu_vuc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table qrcode.nongthuysan: ~0 rows (approximately)

-- Dumping structure for table qrcode.qrcode
CREATE TABLE IF NOT EXISTS `qrcode` (
  `id_qr_code` int(11) NOT NULL AUTO_INCREMENT,
  `qr_image` mediumtext NOT NULL,
  `qr_link` mediumtext NOT NULL,
  `id_nts` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_qr_code`),
  KEY `FK_qr_code_hanghoa` (`id_nts`) USING BTREE,
  CONSTRAINT `FK_qr_code_hanghoa` FOREIGN KEY (`id_nts`) REFERENCES `nongthuysan` (`id_nts`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table qrcode.qrcode: ~0 rows (approximately)

-- Dumping structure for table qrcode.quytrinhnuoitrong
CREATE TABLE IF NOT EXISTS `quytrinhnuoitrong` (
  `id_quy_trinh` int(11) NOT NULL AUTO_INCREMENT,
  `thoi_gian_bat_dau` datetime NOT NULL DEFAULT current_timestamp(),
  `thoi_gian_thu_hoach` datetime NOT NULL DEFAULT current_timestamp(),
  `so_luong_nuoi_trong` varchar(50) NOT NULL,
  `so_luong_thu_hoach` varchar(50) NOT NULL,
  `han_su_dung` varchar(50) DEFAULT NULL,
  `noi_thu_mua` varchar(50) DEFAULT NULL,
  `ghi_chu` mediumtext NOT NULL,
  `id_khu_vuc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_quy_trinh`),
  KEY `FK_quytrinhnuoitrong_khuvucnuoitrong` (`id_khu_vuc`),
  CONSTRAINT `FK_quytrinhnuoitrong_khuvucnuoitrong` FOREIGN KEY (`id_khu_vuc`) REFERENCES `khuvucnuoitrong` (`id_khu_vuc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table qrcode.quytrinhnuoitrong: ~0 rows (approximately)

-- Dumping structure for table qrcode.taikhoan
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id_tai_khoan` int(11) NOT NULL AUTO_INCREMENT,
  `ten_hien_thi` varchar(50) DEFAULT NULL,
  `ten_tai_khoan` varchar(50) DEFAULT NULL,
  `mat_khau` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tai_khoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table qrcode.taikhoan: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
