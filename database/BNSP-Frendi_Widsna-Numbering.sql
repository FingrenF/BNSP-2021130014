-- 1

-- --------------------------------------------------------
-- Host:             127.0.0.1
-- Server version:        8.0.30 - MySQL Community Server - GPL
-- Server OS:          Win64
-- HeidiSQL Version:       12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for bnsp
CREATE DATABASE IF NOT EXISTS `bnsp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bnsp`;

-- Dumping structure for table bnsp.detil_rep
CREATE TABLE IF NOT EXISTS `detil_rep` (
 `noReparasi` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
 `kdSparepart` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
 `jmlSparepart` int DEFAULT NULL,
 PRIMARY KEY (`noReparasi`,`kdSparepart`),
 KEY `FK_detil_rep_sparepart` (`kdSparepart`),
 CONSTRAINT `FK_detil_rep_reparasi` FOREIGN KEY (`noReparasi`) REFERENCES `reparasi` (`noReparasi`),
 CONSTRAINT `FK_detil_rep_sparepart` FOREIGN KEY (`kdSparepart`) REFERENCES `sparepart` (`kdSparepart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bnsp.detil_rep: ~0 rows (approximately)

-- Dumping structure for table bnsp.jenis_reparasi
CREATE TABLE IF NOT EXISTS `jenis_reparasi` (
 `kdJenisRep` char(50) NOT NULL,
 `reparasi` varchar(50) DEFAULT NULL,
 `tarif` int DEFAULT NULL,
 `keterangan` varchar(50) DEFAULT NULL,
 PRIMARY KEY (`kdJenisRep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bnsp.jenis_reparasi: ~0 rows (approximately)

-- Dumping structure for table bnsp.reparasi
CREATE TABLE IF NOT EXISTS `reparasi` (
 `noReparasi` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
 `tglReparasi` date DEFAULT NULL,
 `namaMontir` varchar(50) DEFAULT NULL,
 `noMobil` varchar(50) DEFAULT NULL,
 `kdJenisRep` char(50) DEFAULT NULL,
 `tglBayar` date DEFAULT NULL,
 `status` varchar(50) DEFAULT NULL,
 PRIMARY KEY (`noReparasi`),
 KEY `FK_reparasi_jenis_reparasi` (`kdJenisRep`),
 CONSTRAINT `FK_reparasi_jenis_reparasi` FOREIGN KEY (`kdJenisRep`) REFERENCES `jenis_reparasi` (`kdJenisRep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bnsp.reparasi: ~0 rows (approximately)

-- Dumping structure for table bnsp.sparepart
CREATE TABLE IF NOT EXISTS `sparepart` (
 `kdSparepart` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
 `namaSparepart` varchar(50) DEFAULT NULL,
 `harga` int DEFAULT NULL,
 `stok` int DEFAULT NULL,
 PRIMARY KEY (`kdSparepart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bnsp.sparepart: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;



-- 2
INSERT INTO `detil_rep` (`noReparasi`, `kdSparepart`, `jmlSparepart`) VALUES
	('R002', 'SP001', 1),
	('R003', 'SP002', 1),
	('R003', 'SP003', 1);

INSERT INTO `jenis_reparasi` (`kdJenisRep`, `reparasi`, `tarif`, `keterangan`) VALUES
	('JR001', 'Servis', 200000, 'Servis Berkala'),
	('JR002', 'Ganti Roda', 500000, 'Ban Kiri Belakang'),
	('JR003', 'Servis AC', 400000, 'Freon');

INSERT INTO `reparasi` (`noReparasi`, `tglReparasi`, `namaMontir`, `noMobil`, `kdJenisRep`, `tglBayar`, `status`) VALUES
	('R001', '2023-12-08', 'Bagas', 'D 1234 ABC', 'JR001', '2023-12-08', 'Selesai'),
	('R002', '2024-01-10', 'Amir', 'B 3003 VA', 'JR002', '2024-01-10', 'Selesai'),
	('R003', '2024-01-28', 'Bagas', 'D 2200 ASD', 'JR003', '2024-01-30', 'Selesai');

INSERT INTO `sparepart` (`kdSparepart`, `namaSparepart`, `harga`, `stok`) VALUES
	('SP001', 'Ban', 450000, 20),
	('SP002', 'Oli', 50000, 10),
	('SP003', 'Freon', 250000, 15);

-- 3
ALTER TABLE sparepart ADD FULLTEXT INDEX idx_namaSparepart (namaSparepart);


-- 4
CREATE VIEW tampilan AS
SELECT r.noReparasi, r.namaMontir, jr.reparasi AS JenisReparasi, s.namaSparepart, s.stok
FROM reparasi r
JOIN jenis_reparasi jr ON r.kdJenisRep = jr.kdJenisRep
JOIN detil_rep dr ON r.noReparasi = dr.noReparasi
JOIN sparepart s ON dr.kdSparepart = s.kdSparepart;

-- 5
ALTER TABLE sparepart ADD COLUMN log_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;


-- 6
CREATE TRIGGER `sparepart_after_update` AFTER UPDATE ON `sparepart` FOR EACH ROW BEGIN
  update sparepart set log_update = CONCAT('Data diupdate pada: ', NOW()) WHERE kdSparepart = OLD.kdSparepart;
END

-- 7
-- Dumping structure for function bnsp.get_tarif
DELIMITER //
CREATE FUNCTION `get_tarif`(
	`kdJenisRep` CHAR(50)
) RETURNS int
    DETERMINISTIC
BEGIN
DECLARE tarif INT;
  SELECT tarif INTO tarif FROM jenis_reparasi WHERE kdJenisRep = kdJenisRep;
  RETURN tarif;
END//
DELIMITER ;

-- 8
DELIMITER //
CREATE PROCEDURE `update_stok`(
	IN `kdSparepart` CHAR(50),
	IN `stokBaru` INT
)
    DETERMINISTIC
BEGIN
	UPDATE sparepart SET stok = stokBaru WHERE kdSparepart = kdsparepart;
END//
DELIMITER ;
