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


-- Dumping database structure for perpustakaan
CREATE DATABASE IF NOT EXISTS `perpustakaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `perpustakaan`;

-- Dumping structure for table perpustakaan.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table perpustakaan.anggota: ~5 rows (approximately)
INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `no_hp`, `tanggal_daftar`) VALUES
	(1, 'Andika', 'Kupang', '081234567890', '2025-01-10'),
	(2, 'Azijah', 'Surabaya', '081234567891', '2025-01-15'),
	(3, 'Anita', 'Jakarta', '081234567892', '2025-02-01'),
	(4, 'Asti', 'Bandung', '081234567893', '2025-02-10'),
	(5, 'Umar', 'Yogyakarta', '081234567894', '2025-03-05');

-- Dumping structure for table perpustakaan.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year DEFAULT NULL,
  `stok` int DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table perpustakaan.buku: ~10 rows (approximately)
INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`) VALUES
	(1, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang', '2005', 5),
	(2, 'Bumi', 'Tere Liye', 'Gramedia', '2014', 4),
	(3, 'Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', '2009', 3),
	(4, 'Atomic Habits', 'James Clear', 'Penguin', '2018', 6),
	(5, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 'Warner Books', '1997', 2),
	(6, 'Naruto Vol.1', 'Masashi Kishimoto', 'Shueisha', '1999', 10),
	(7, 'One Piece Vol.1', 'Eiichiro Oda', 'Shueisha', '1997', 8),
	(8, 'Harry Potter', 'J.K. Rowling', 'Bloomsbury', '1997', 5),
	(9, 'Filosofi Teras', 'Henry Manampiring', 'Kompas', '2018', 4),
	(10, 'Sapiens', 'Yuval Noah Harari', 'Harvill Secker', '2011', 3);

-- Dumping structure for table perpustakaan.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int NOT NULL AUTO_INCREMENT,
  `id_anggota` int DEFAULT NULL,
  `id_buku` int DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_buku` (`id_buku`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table perpustakaan.peminjaman: ~5 rows (approximately)
INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
	(1, 1, 2, '2026-06-01', '2026-06-08', 'Dikembalikan'),
	(2, 2, 5, '2026-06-02', '2026-06-09', 'Dikembalikan'),
	(3, 3, 1, '2026-06-03', '2026-06-10', 'Dipinjam'),
	(4, 4, 7, '2026-06-04', '2026-06-11', 'Dipinjam'),
	(5, 5, 9, '2026-06-05', '2026-06-12', 'Dipinjam');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
