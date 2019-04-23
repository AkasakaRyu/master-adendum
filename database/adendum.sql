# ************************************************************
# Sequel Pro SQL dump
# Version 5438
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.3.14-MariaDB)
# Database: adendum
# Generation Time: 2019-04-21 14:16:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ak_data_adendum
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_adendum`;

CREATE TABLE `ak_data_adendum` (
  `adendum_id` char(20) NOT NULL DEFAULT '',
  `investasi_id` char(20) DEFAULT NULL,
  `exploitasi_id` char(20) DEFAULT NULL,
  `adendum_pr_number` varchar(128) DEFAULT NULL,
  `adendum_po_number` varchar(128) DEFAULT NULL,
  `adendum_no_kontrak` varchar(128) NOT NULL DEFAULT '',
  `adendum_nilai_pekerjaan` decimal(10,0) NOT NULL DEFAULT 0,
  `adendum_tanggal_jaminan_pelaksanaan` date NOT NULL,
  `adendum_selesai_pekerjaan` date NOT NULL,
  `created_by` varchar(128) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`adendum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table ak_data_bidang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_bidang`;

CREATE TABLE `ak_data_bidang` (
  `bidang_id` char(20) NOT NULL DEFAULT '',
  `bidang_nama` varchar(128) NOT NULL DEFAULT '',
  `created_by` varchar(128) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`bidang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table ak_data_divisi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_divisi`;

CREATE TABLE `ak_data_divisi` (
  `divisi_id` char(20) NOT NULL DEFAULT '',
  `divisi_nama` varchar(128) NOT NULL DEFAULT '',
  `created_by` varchar(128) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table ak_data_exploitasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_exploitasi`;

CREATE TABLE `ak_data_exploitasi` (
  `exploitasi_id` char(20) NOT NULL DEFAULT '',
  `divisi_id` char(20) NOT NULL DEFAULT '',
  `bidang_id` char(20) NOT NULL DEFAULT '',
  `exploitasi_pr_number` varchar(128) DEFAULT NULL,
  `exploitasi_po_number` varchar(128) DEFAULT NULL,
  `exploitasi_bidang` varchar(128) NOT NULL DEFAULT '',
  `exploitasi_uraian_pekerjaan` text NOT NULL,
  `exploitasi_no_kontrak` varchar(128) NOT NULL DEFAULT '',
  `exploitasi_nilai_pekerjaan` decimal(10,0) NOT NULL DEFAULT 0,
  `exploitasi_mulai_pelaksanaan` date NOT NULL,
  `exploitasi_selesai_pekerjaan` date NOT NULL,
  `exploitasi_tanggal_jaminan_pelaksanaan` date NOT NULL,
  `created_by` varchar(128) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`exploitasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table ak_data_investasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_investasi`;

CREATE TABLE `ak_data_investasi` (
  `investasi_id` char(20) NOT NULL DEFAULT '',
  `divisi_id` char(20) NOT NULL DEFAULT '',
  `bidang_id` char(20) NOT NULL DEFAULT '',
  `investasi_pr_number` varchar(128) DEFAULT NULL,
  `investasi_po_number` varchar(128) DEFAULT NULL,
  `investasi_uraian_pekerjaan` text NOT NULL,
  `investasi_no_kontrak` varchar(128) NOT NULL DEFAULT '',
  `investasi_nilai_pekerjaan` decimal(10,0) NOT NULL DEFAULT 0,
  `investasi_mulai_pelaksanaan` date NOT NULL,
  `investasi_selesai_pekerjaan` date NOT NULL,
  `investasi_tanggal_jaminan_pelaksanaan` date NOT NULL,
  `created_by` varchar(128) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`investasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table ak_data_sistem_app_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_sistem_app_info`;

CREATE TABLE `ak_data_sistem_app_info` (
  `app_info_id` char(20) NOT NULL DEFAULT '',
  `app_info_name` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`app_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_sistem_app_info` WRITE;
/*!40000 ALTER TABLE `ak_data_sistem_app_info` DISABLE KEYS */;

INSERT INTO `ak_data_sistem_app_info` (`app_info_id`, `app_info_name`)
VALUES
	('APP19011700001','SISTEM MONITORING ADENDUM');

/*!40000 ALTER TABLE `ak_data_sistem_app_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_sistem_instansi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_sistem_instansi`;

CREATE TABLE `ak_data_sistem_instansi` (
  `instansi_id` char(20) NOT NULL DEFAULT '',
  `instansi_nama` varchar(128) NOT NULL DEFAULT '',
  `instansi_alamat` text DEFAULT NULL,
  `instansi_kontak` char(18) NOT NULL DEFAULT '',
  `instansi_logo` varchar(128) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`instansi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_sistem_instansi` WRITE;
/*!40000 ALTER TABLE `ak_data_sistem_instansi` DISABLE KEYS */;

INSERT INTO `ak_data_sistem_instansi` (`instansi_id`, `instansi_nama`, `instansi_alamat`, `instansi_kontak`, `instansi_logo`, `deleted`)
VALUES
	('INS19011700001','Akasaka Dev','Jl. Raya Banjaran No. 112 D','087710545682','',0);

/*!40000 ALTER TABLE `ak_data_sistem_instansi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_sistem_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_sistem_log`;

CREATE TABLE `ak_data_sistem_log` (
  `id` varchar(128) NOT NULL DEFAULT '',
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `timestamp` int(10) unsigned NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_sistem_log` WRITE;
/*!40000 ALTER TABLE `ak_data_sistem_log` DISABLE KEYS */;

INSERT INTO `ak_data_sistem_log` (`id`, `ip_address`, `timestamp`, `data`)
VALUES
	('6mkcmf4sfvhcanjkdd4u3fcq037i1e2b','::1',1555855820,X'5F5F63695F6C6173745F726567656E65726174657C693A313535353835353632303B6B6573656D706174616E7C693A313B69647C733A31343A225553523139303131373030303031223B6C6576656C7C733A363A224D6173746572223B6E616D617C733A363A224D6173746572223B6C6173745F6C6F67696E7C733A31393A22323031392D30342D32302031383A30373A3533223B637265617465645F646174657C733A31393A22323031392D30312D31372030393A34373A3231223B73697374656D5F6E616D657C733A32353A2253495354454D204D4F4E49544F52494E47204144454E44554D223B4C6F67676564496E7C623A313B');

/*!40000 ALTER TABLE `ak_data_sistem_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_user`;

CREATE TABLE `ak_data_user` (
  `user_id` char(20) NOT NULL DEFAULT '',
  `level_id` char(20) NOT NULL DEFAULT '',
  `user_nama` varchar(128) NOT NULL DEFAULT '',
  `user_login` char(20) NOT NULL DEFAULT '',
  `user_pass` varchar(60) NOT NULL DEFAULT '',
  `last_login` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login` (`user_login`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `ak_data_user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `ak_data_user_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_user` WRITE;
/*!40000 ALTER TABLE `ak_data_user` DISABLE KEYS */;

INSERT INTO `ak_data_user` (`user_id`, `level_id`, `user_nama`, `user_login`, `user_pass`, `last_login`, `created_date`, `deleted`)
VALUES
	('USR19011700001','LVL19011700001','Master','master','$2y$10$NHbq0Ggd9szyUcUJe.9OD.b5GcQ0HHU14GPJE6S.aX4SauqQhUo1K','2019-04-21 19:15:09','2019-01-17 09:47:21',0),
	('USR1904020002','LVL19011700004','Gilang Pratama Priadi','akasakaryu','$2y$10$sDxXnc.IRrdcWZDwtCvEHuU/5GJ7IR/Jn/HGqKlbIxjxYX2K5fJkW',NULL,'2019-04-02 12:00:22',1),
	('USR1904020003','LVL19011700004','Gilang Pratama Priadi','41180220','$2y$10$2FHOhJFEGtbXybuqdistmuGUwEOxIBuWiQ3MjsdZG53puhM5kSkcq','2019-04-03 12:15:04','2019-04-02 12:07:10',0),
	('USR1904020004','LVL19011700004','Akasaka Ryuunosuke','41180221','$2y$10$DpSkkHLaDYwhfxJowr309.OjMGi26Jqi9nHo6kNLXmCCfv0JiikBK',NULL,'2019-04-02 13:33:49',0);

/*!40000 ALTER TABLE `ak_data_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_user_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_user_level`;

CREATE TABLE `ak_data_user_level` (
  `level_id` char(20) NOT NULL DEFAULT '',
  `level_nama` varchar(128) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_user_level` WRITE;
/*!40000 ALTER TABLE `ak_data_user_level` DISABLE KEYS */;

INSERT INTO `ak_data_user_level` (`level_id`, `level_nama`, `deleted`)
VALUES
	('LVL19011700001','Master',0),
	('LVL19011700002','Superadmin',0),
	('LVL19011700003','Proktor',0),
	('LVL19011700004','Siswa',0);

/*!40000 ALTER TABLE `ak_data_user_level` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
