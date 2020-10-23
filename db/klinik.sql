/*
Navicat MySQL Data Transfer

Source Server         : LOKAL
Source Server Version : 100134
Source Host           : localhost:3306
Source Database       : klinik

Target Server Type    : MYSQL
Target Server Version : 100134
File Encoding         : 65001

Date: 2020-10-24 00:06:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for berobat
-- ----------------------------
DROP TABLE IF EXISTS `berobat`;
CREATE TABLE `berobat` (
  `id_berobat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(5) DEFAULT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `tgl_berobat` date DEFAULT NULL,
  `keluhan_pasien` varchar(200) DEFAULT NULL,
  `hasil_diagnosa` varchar(200) DEFAULT NULL,
  `penatalaksanaan` enum('Rawat Jalan','Rawat Inap','Rujuk','Lainnya') DEFAULT NULL,
  PRIMARY KEY (`id_berobat`),
  KEY `FK__pasien` (`id_pasien`),
  KEY `FK__dokter` (`id_dokter`),
  CONSTRAINT `FK__dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `FK__pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of berobat
-- ----------------------------
INSERT INTO `berobat` VALUES ('1', '9', '5', '2020-09-29', 'Batuk', 'Flu Biasa', 'Rawat Jalan');
INSERT INTO `berobat` VALUES ('5', '3', '1', '2020-09-29', 'Pusing', 'Vertigo', 'Rawat Inap');
INSERT INTO `berobat` VALUES ('7', '9', '5', '2020-09-29', 'Batuk Lebih Parah, Pusing', 'Flu Berat', 'Rawat Jalan');

-- ----------------------------
-- Table structure for dokter
-- ----------------------------
DROP TABLE IF EXISTS `dokter`;
CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dokter
-- ----------------------------
INSERT INTO `dokter` VALUES ('1', 'Alexander Paijo');
INSERT INTO `dokter` VALUES ('5', 'Martini');
INSERT INTO `dokter` VALUES ('7', 'Debby Sulistyowati');

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES ('1', 'Bodrex');
INSERT INTO `obat` VALUES ('3', 'Paramex');
INSERT INTO `obat` VALUES ('7', 'Konidin');
INSERT INTO `obat` VALUES ('9', 'Paracetamol');

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(40) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `umur` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES ('1', 'Budi Santosa', 'L', '32');
INSERT INTO `pasien` VALUES ('3', 'Ani Mardaleni', 'P', '24');
INSERT INTO `pasien` VALUES ('7', 'Andi Saputra', 'L', '18');
INSERT INTO `pasien` VALUES ('9', 'Ahmad Basuki', 'L', '34');
INSERT INTO `pasien` VALUES ('11', 'Bunga', 'L', '18');

-- ----------------------------
-- Table structure for resep_obat
-- ----------------------------
DROP TABLE IF EXISTS `resep_obat`;
CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_resep`),
  KEY `FK__berobat` (`id_berobat`),
  KEY `FK__obat` (`id_obat`),
  CONSTRAINT `FK__berobat` FOREIGN KEY (`id_berobat`) REFERENCES `berobat` (`id_berobat`) ON UPDATE CASCADE,
  CONSTRAINT `FK__obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resep_obat
-- ----------------------------
INSERT INTO `resep_obat` VALUES ('3', '1', '1');
INSERT INTO `resep_obat` VALUES ('5', '5', '1');
INSERT INTO `resep_obat` VALUES ('7', '5', '3');
INSERT INTO `resep_obat` VALUES ('9', '7', '3');
INSERT INTO `resep_obat` VALUES ('11', '7', '9');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Hari Aspriyono');
INSERT INTO `users` VALUES ('3', 'admin2', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin Satu');
