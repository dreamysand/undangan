-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk undangan_main
CREATE DATABASE IF NOT EXISTS `undangan_main` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `undangan_main`;

-- membuang struktur untuk table undangan_main.t_admin
CREATE TABLE IF NOT EXISTS `t_admin` (
  `f_id` int NOT NULL AUTO_INCREMENT,
  `f_username` varchar(100) NOT NULL,
  `f_email` varchar(100) NOT NULL,
  `f_password` varchar(100) NOT NULL,
  `f_status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Nonaktif',
  PRIMARY KEY (`f_id`),
  UNIQUE KEY `f_email` (`f_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel undangan_main.t_admin: ~3 rows (lebih kurang)
INSERT INTO `t_admin` (`f_id`, `f_username`, `f_email`, `f_password`, `f_status`) VALUES
  (1, 'Dreamysandn', 'dreamysand@gmail.com', '$2y$10$/.uxjDjU.8ETG/u4UrwHye5oeO40TCepl404UcHdPT6i1IFAx4V36', 'Nonaktif'),
  (2, 'Dudung', 'dudung@gmail.com', '$2y$10$1VD.GGTz8hqqmdv4n7nOwOV6xbOdftQvE9ivMV51lz2z81EzCwFba', 'Nonaktif'),
  (3, 'AdminGaul', 'admingaul@gmail.com', '$2y$10$bVr1oDGzqW5SXrab24DA/ucfWRbVDxOwNO/8kA8kca19bz4YMDuJS', 'Nonaktif');

-- membuang struktur untuk table undangan_main.t_invitations
CREATE TABLE IF NOT EXISTS `t_invitations` (
  `f_id` int NOT NULL AUTO_INCREMENT,
  `f_admin_id` int NOT NULL,
  `f_acara` varchar(100) NOT NULL,
  `f_alamat` varchar(100) NOT NULL,
  `f_tanggal_acara` date NOT NULL,
  `f_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `f_file_path` varchar(100) NOT NULL,
  PRIMARY KEY (`f_id`),
  KEY `FK_t_invitations_t_admin` (`f_admin_id`),
  CONSTRAINT `FK_t_invitations_t_admin` FOREIGN KEY (`f_admin_id`) REFERENCES `t_admin` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel undangan_main.t_invitations: ~2 rows (lebih kurang)
INSERT INTO `t_invitations` (`f_id`, `f_admin_id`, `f_acara`, `f_alamat`, `f_tanggal_acara`, `f_image`, `f_file_path`) VALUES
  (1, 2, 'Jobfair SMK Negeri 71 Jakarta 2025', 'https://maps.app.goo.gl/znV78WuXC5jYwQY69', '2025-02-03', '../jobfair-smk-negeri-71-jakarta-2025/asset/nakano-miku-4k-s6-2560x1440%20%281%29.jpg', '../jobfair-smk-negeri-71-jakarta-2025'),
  (2, 2, 'Pernikahan Dean dan Megumin', 'https://maps.app.goo.gl/znV78WuXC5jYwQY69', '2025-02-02', '../pernikahan-dean-dan-megumin/asset/1315441.jpg', '../pernikahan-dean-dan-megumin');

-- membuang struktur untuk table undangan_main.t_invitations_data
CREATE TABLE IF NOT EXISTS `t_invitations_data` (
  `f_id` int NOT NULL AUTO_INCREMENT,
  `f_acara_id` int NOT NULL,
  `f_nama_tamu` varchar(100) NOT NULL,
  `f_kode_unik_tamu` varchar(100) NOT NULL,
  `f_nomor_telepon` varchar(50) NOT NULL,
  `f_email_tamu` varchar(100) NOT NULL,
  `f_alamat` varchar(250) NOT NULL,
  `f_instansi` varchar(100) NOT NULL DEFAULT 'Pribadi',
  `f_kode_qr` varchar(250) NOT NULL,
  PRIMARY KEY (`f_id`),
  UNIQUE KEY `f_kode_unik_tamu` (`f_kode_unik_tamu`),
  UNIQUE KEY `f_kode_qr` (`f_kode_qr`),
  KEY `FK_t_invitations_data_t_invitations` (`f_acara_id`),
  CONSTRAINT `FK_t_invitations_data_t_invitations` FOREIGN KEY (`f_acara_id`) REFERENCES `t_invitations` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel undangan_main.t_invitations_data: ~2 rows (lebih kurang)
INSERT INTO `t_invitations_data` (`f_id`, `f_acara_id`, `f_nama_tamu`, `f_kode_unik_tamu`, `f_nomor_telepon`, `f_email_tamu`, `f_alamat`, `f_instansi`, `f_kode_qr`) VALUES
  (1, 1, 'Dean Satrio', '679871e3e9ba6', '088212066308', 'dean@gmail.com', 'https://maps.app.goo.gl/u8ei8XtkFo78pg1o7', 'Pribadi', '/asset/679871e3e9ba6.png'),
  (2, 1, 'Budiono Siregar', '679dbc6a5669d', '0897777689', 'kapallawd@gmail.com', 'https://maps.app.goo.gl/u8ei8XtkFo78pg1o7', 'OKLI', '/asset/679dbc6a5669d.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
