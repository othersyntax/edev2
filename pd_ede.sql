/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pd_ede

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-21 12:25:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ddsa_kod_bandar`
-- ----------------------------
DROP TABLE IF EXISTS `ddsa_kod_bandar`;
CREATE TABLE `ddsa_kod_bandar` (
  `ban_bandar_id` int(11) NOT NULL AUTO_INCREMENT,
  `ban_kod_bandar` char(8) NOT NULL,
  `ban_nama_bandar` varchar(50) NOT NULL,
  `ban_kod_daerah` varchar(8) NOT NULL DEFAULT '',
  `ban_status` int(1) NOT NULL DEFAULT 1,
  `ban_updby` int(6) NOT NULL,
  `ban_crtby` int(6) NOT NULL,
  `ban_upddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ban_log` datetime NOT NULL,
  PRIMARY KEY (`ban_bandar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101311034 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of ddsa_kod_bandar
-- ----------------------------
INSERT INTO `ddsa_kod_bandar` VALUES ('10010101', '010101', 'Mukim Bagan', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010102', '010102', 'Mukim Cha\'ah Bahru', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010103', '010103', 'Mukim Kampung Bahru', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010104', '010104', 'Mukim Linau', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010105', '010105', 'Mukim Lubok', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010106', '010106', 'Mukim Minyak Beku', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010107', '010107', 'Mukim Perserai', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010108', '010108', 'Mukim Sri Gading', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010109', '010109', 'Mukim Sri Medan', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010110', '010110', 'Mukim Simpang Kanan', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010111', '010111', 'Mukim Simpang Kiri', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010112', '010112', 'Mukim Sungai Kluang', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010113', '010113', 'Mukim Sungai Punggor', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010114', '010114', 'Mukim Tanjung Sembrong', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010140', '010140', 'Bandar Ayer Hitam', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010141', '010141', 'Bandar Penggaram', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010142', '010142', 'Bandar Rengit', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010143', '010143', 'Bandar Senggarang', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010144', '010144', 'Bandar Yong Peng', '10101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010201', '010201', 'Mukim Jelutong', '10102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010202', '010202', 'Mukim Plentong', '10102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010203', '010203', 'Mukim Pulai', '10102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010206', '010206', 'Mukim Sungai Tiram', '10102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010207', '010207', 'Mukim Tanjung Kupang', '10102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010208', '010208', 'Mukim Tebrau', '10102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010240', '010240', 'Bandar Johor Bahru', '10102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010301', '010301', 'Mukim Ulu Benut', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010302', '010302', 'Mukim Kahang', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010303', '010303', 'Mukim Kluang', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010304', '010304', 'Mukim Layang-Layang', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010305', '010305', 'Mukim Machap', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010306', '010306', 'Mukim Niyor', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010307', '010307', 'Mukim Paloh', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010308', '010308', 'Mukim Renggam', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010340', '010340', 'Bandar Kluang', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010341', '010341', 'Bandar Paloh', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010342', '010342', 'Bandar Renggam', '10103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010401', '010401', 'Mukim Ulu Sungai Johor', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010402', '010402', 'Mukim Ulu Sungei Sedili B', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010403', '010403', 'Mukim Johor Lama', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010404', '010404', 'Mukim Kambau', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010405', '010405', 'Mukim Kota Tinggi', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010406', '010406', 'Mukim Pantai Timur', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010407', '010407', 'Mukim Pengerang', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010408', '010408', 'Mukim Sedili Besar', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010409', '010409', 'Mukim Sedili Kechil', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010410', '010410', 'Mukim Tanjung Surat', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010440', '010440', 'Bandar Kota Tinggi', '10104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010501', '010501', 'Mukim Jemaluang', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010502', '010502', 'Mukim Lenggor', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010503', '010503', 'Mukim Mersing', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010504', '010504', 'Mukim Padang Endau', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010505', '010505', 'Mukim Penyabong', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010506', '010506', 'Mukim Pulau Aur', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010507', '010507', 'Mukim Pulau Babi', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010508', '010508', 'Mukim Pulau Pemanggil', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010509', '010509', 'Mukim Pulau Sibu', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010510', '010510', 'Mukim Pulau Tinggi', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010511', '010511', 'Mukim Sembrong', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010512', '010512', 'Mukim Tengaroh', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010513', '010513', 'Mukim Tenglu', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010514', '010514', 'Mukim Triang', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010540', '010540', 'Bandar Jemaluang', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010541', '010541', 'Bandar Mersing', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010542', '010542', 'Bandar Mersing Kanan', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010543', '010543', 'Bandar Padang Endau', '10105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010601', '010601', 'Mukim Ayer Hitam', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010602', '010602', 'Mukim Bandar', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010603', '010603', 'Mukim Bukit Kepong', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010604', '010604', 'Mukim Kesang', '10106', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010605', '010605', 'Bandar Bukit Kangkar', '10106', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010606', '010606', 'Mukim Jalan Bakri', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010607', '010607', 'Mukim Jorak', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010610', '010610', 'Mukim Lenga', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010611', '010611', 'Mukim Parit Bakar', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010612', '010612', 'Mukim Parit Jawa', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010613', '010613', 'Mukim Sri Menanti', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010615', '010615', 'Mukim Sungai Balang', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010616', '010616', 'Mukim Sungai Raya', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010617', '010617', 'Mukim Sungai Terap', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010640', '010640', 'Bandar Maharani', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010642', '010642', 'Bandar Bukit Kepong', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010643', '010643', 'Bandar Panchor', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010645', '010645', 'Bandar Parit Jawa', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010670', '010670', 'Pekan Bukit Pasir', '10106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010671', '010671', 'Pagoh', '10106', '1', '1000000', '1000000', '2024-05-15 15:45:58', '2017-03-27 00:00:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010672', '010672', 'Mukim Bukit Serampang ', '10106', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010673', '010673', 'Mukim Grisek', '10106', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010674', '010674', 'Mukim Kundang', '10106', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010675', '010675', 'Mukim Serom', '10106', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010701', '010701', 'Mukim Ayer Baloi', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010702', '010702', 'Mukim Air Masin', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010703', '010703', 'Mukim Api-Api', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010704', '010704', 'Mukim Benut', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010705', '010705', 'Mukim Jeram Batu', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010706', '010706', 'Mukim Pengkalan Raja', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010707', '010707', 'Mukim Pontian', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010708', '010708', 'Mukim Rimba Terjun', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010709', '010709', 'Mukim Serkat', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010710', '010710', 'Mukim Sungai Karang', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010711', '010711', 'Mukim Sungai Pinggan', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010740', '010740', 'Bandar Benut', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010741', '010741', 'Bandar Pontian Kechil', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010770', '010770', 'Pekan Nenas', '10107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010801', '010801', 'Mukim Bekok', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010802', '010802', 'Mukim Buloh Kasap', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010803', '010803', 'Mukim Cha\'ah', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010804', '010804', 'Mukim Gemas', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010805', '010805', 'Mukim Gemereh', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010806', '010806', 'Mukim Jabi', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010807', '010807', 'Mukim Jementah', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010808', '010808', 'Mukim Labis', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010809', '010809', 'Mukim Pogoh', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010810', '010810', 'Mukim Sermin', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010811', '010811', 'Mukim Sungai Segamat', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010840', '010840', 'Bandar Batu Anam', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010841', '010841', 'Bandar Bekok', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010842', '010842', 'Bandar Buloh Kasap', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010843', '010843', 'Bandar Jementah', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010844', '010844', 'Bandar Labis', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010845', '010845', 'Bandar Segamat', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010870', '010870', 'Pekan Gemas Bahru', '10108', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010901', '010901', 'Mukim Kulai', '10109', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010902', '010902', 'Mukim Senai', '10109', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010903', '010903', 'Mukim Sedenak', '10109', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010904', '010904', 'Mukim Bukit Batu', '10109', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10010940', '010940', 'Bandar Kulai', '10109', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011001', '011001', 'Mukim Tangkak', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011002', '011002', 'Mukim Bukit Serampang', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011003', '011003', 'Mukim Grisek', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011004', '011004', 'Mukim Serom', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011005', '011005', 'Mukim Kundang', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011006', '011006', 'Mukim Kesang', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011040', '011040', 'Bandar Bukit Kangkar', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011041', '011041', 'Bandar Parit Bunga', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011042', '011042', 'Bandar Serom', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011043', '011043', 'Bandar Sungai Mati', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011044', '011044', 'Bandar Tangkak', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011070', '011070', 'Pekan Grisek', '10110', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10011205', '011205', 'Mukim Jabi', '10112', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10012102', '012102', 'Mukim Senai / Kulai', '10121', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10012103', '012103', 'Mukim Sedenak', '10121', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10012201', '012201', 'Bandar Tangkak', '10122', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10012244', '012244', 'Mukim Tangkak', '10122', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020101', '020101', 'Mukim Alor Malai', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020103', '020103', 'Mukim Anak Bukit', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020107', '020107', 'Mukim Derga', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020109', '020109', 'Mukim Gunong', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020112', '020112', 'Mukim Kangkong', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020115', '020115', 'Mukim Kubang Rotan', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020116', '020116', 'Mukim Langgar', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020117', '020117', 'Mukim Lengkuas', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020118', '020118', 'Mukim Lepai', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020120', '020120', 'Mukim Limbong', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020122', '020122', 'Mukim Padang Hang', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020123', '020123', 'Mukim Padang Lalang', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020124', '020124', 'Mukim Pengkalan Kundor', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020126', '020126', 'Mukim Sala Kechik', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020127', '020127', 'Mukim Sungai Baharu', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020128', '020128', 'Mukim Tajar', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020129', '020129', 'Mukim Tebengau', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020130', '020130', 'Mukim Telaga Mas', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020131', '020131', 'Mukim Titi Gajah', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020134', '020134', 'Mukim Hutan Kampung', '10201', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020135', '020135', 'Mukim Pumpong', '10201', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020136', '020136', 'Mukim Mergong', '10201', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020137', '020137', 'Mukim Teluk Kecai', '10201', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020140', '020140', 'Bandar Alor Setar', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020141', '020141', 'Bandar Anak Bukit', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020143', '020143', 'Bandar Kuala Kedah', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020147', '020147', 'Bandar Alor Merah', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020148', '020148', 'Bandar Bukit Pinang', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020149', '020149', 'Bandar Langgar', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020150', '020150', 'Bandar Simpang Empat', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020170', '020170', 'Pekan Alor Janggus', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020172', '020172', 'Pekan Kota Sarang Semut', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020175', '020175', 'Pekan Gunung', '10201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020201', '020201', 'Mukim Ah', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020202', '020202', 'Mukim Binjal', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020203', '020203', 'Mukim Gelong', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020204', '020204', 'Mukim Bukit Tinggi', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020205', '020205', 'Mukim Husba', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020206', '020206', 'Mukim Jeram', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020207', '020207', 'Mukim Jerlun', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020208', '020208', 'Mukim Jitra', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020209', '020209', 'Mukim Kepelu', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020210', '020210', 'Mukim Kubang Pasu', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020211', '020211', 'Mukim Malau', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020212', '020212', 'Mukim Naga', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020213', '020213', 'Mukim Padang Perahu', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020214', '020214', 'Mukim Pelubang', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020215', '020215', 'Mukim Pering', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020216', '020216', 'Mukim Putat', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020217', '020217', 'Mukim Sanglang', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020218', '020218', 'Mukim Sungai Laka', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020219', '020219', 'Mukim Temin', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020220', '020220', 'Mukim Tunjang', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020221', '020221', 'Mukim Wang Tepus', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020240', '020240', 'Bandar Changlun', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020241', '020241', 'Bandar Jitra', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020242', '020242', 'Bandar Kodiang', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020243', '020243', 'Bandar Tunjang', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020244', '020244', 'Bandar Darulaman', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020245', '020245', 'Bandar Padang Sera', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020246', '020246', 'Bandar Kepala Batas', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020247', '020247', 'Bandar Bukit Kayu Hitam', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020270', '020270', 'Pekan Ayer Hitam', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020276', '020276', 'Pekan Kuala Sanglang', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020281', '020281', 'Pekan Sanglang', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020289', '020289', 'Pekan Kerpan', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020290', '020290', 'Pekan Sintok', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020291', '020291', 'Pekan Napoh', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020292', '020292', 'Pekan Sungai Korok', '10202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020301', '020301', 'Mukim Batang Tunggang Kan', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020302', '020302', 'Mukim Batang Tunggang Kir', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020303', '020303', 'Mukim Belimbing Kanan', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020304', '020304', 'Mukim Belimbing Kiri', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020305', '020305', 'Mukim Kurong Hitam', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020306', '020306', 'Mukim Padang Temak', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020307', '020307', 'Mukim Padang Terap Kanan', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020308', '020308', 'Mukim Padang Terap Kiri', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020309', '020309', 'Mukim Pedu', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020310', '020310', 'Mukim Tekai', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020311', '020311', 'Mukim Trolak', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020340', '020340', 'Bandar Kuala Nerang', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020370', '020370', 'Pekan Naka', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020371', '020371', 'Pekan Durian Burung', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020372', '020372', 'Pekan Lubok Merbau', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020373', '020373', 'Pekan Bukit Tembaga', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020374', '020374', 'Pekan Padang Sanai', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020375', '020375', 'Pekan Kampung Tanjung', '10203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020401', '020401', 'Mukim Ayer Hangat', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020402', '020402', 'Mukim Bohor', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020403', '020403', 'Mukim Kedawang', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020405', '020405', 'Mukim Padang Mat Sirat', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020406', '020406', 'Mukim Ulu Melaka', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020440', '020440', 'Bandar Kuah', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020441', '020441', 'Mukim Padang Mat Sirat', '10204', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020442', '020442', 'Bandar Padang Lalang', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020472', '020472', 'Pekan Telok Data', '10204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020501', '020501', 'Mukim Bujang', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020502', '020502', 'Mukim Bukit Meriam', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020503', '020503', 'Mukim Gurun', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020504', '020504', 'Mukim Haji Kudong', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020505', '020505', 'Pekan Kota Kuala Muda', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020506', '020506', 'Mukim Kuala', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020507', '020507', 'Mukim Merbok', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020508', '020508', 'Mukim Pekula', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020509', '020509', 'Mukim Pinang Tunggal', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020511', '020511', 'Mukim Semeling', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020512', '020512', 'Mukim Sidam Kiri', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020513', '020513', 'Mukim Simpor', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020514', '020514', 'Mukim Sungai Pasir', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020515', '020515', 'Bandar Sungai Petani', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020516', '020516', 'Mukim Teloi Kiri', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020540', '020540', 'Bandar Bedong', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020545', '020545', 'Bandar Sungai Lalang', '10205', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020601', '020601', 'Mukim Dulang', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020602', '020602', 'Mukim Salai Besar', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020603', '020603', 'Mukim Singkir', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020604', '020604', 'Mukim Sungai Daun', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020605', '020605', 'Mukim Yan', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020640', '020640', 'Bandar Guar Chempedak', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020641', '020641', 'Bandar Yan', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020671', '020671', 'Pekan Simpang Tiga Sungai', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020672', '020672', 'Pekan Sungai Limau Dalam', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020674', '020674', 'Pekan Teroi', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020675', '020675', 'Pekan Singkir', '10206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:10');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020701', '020701', 'Mukim Jeneri', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020702', '020702', 'Mukim Sik', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020703', '020703', 'Mukim Sok', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020740', '020740', 'Bandar Sik', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020770', '020770', 'Pekan Batu Lima Sik', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020773', '020773', 'Pekan Gulau', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020774', '020774', 'Pekan Gajah Puteh', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020775', '020775', 'Pekan Charok Padang', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020776', '020776', 'KD FELDA Teloi Timor', '10207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-03-27 00:00:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020801', '020801', 'Mukim Bakai', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020802', '020802', 'Mukim Baling', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020803', '020803', 'Mukim Bongor', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020804', '020804', 'Mukim Kupang', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020805', '020805', 'Mukim Pulai', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020806', '020806', 'Mukim Siong', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020807', '020807', 'Mukim Tawar', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020808', '020808', 'Mukim Teloi Kanan', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020840', '020840', 'Bandar Baling', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020841', '020841', 'Bandar Kuala Ketil', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020842', '020842', 'Bandar Kupang', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020872', '020872', 'Pekan Kampung Baru Kejai', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020874', '020874', 'Pekan Pulai', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020875', '020875', 'Pekan Tawar', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020876', '020876', 'Pekan Kuala Pegang', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020878', '020878', 'Pekan Parit Panjang', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020879', '020879', 'Pekan Kampung Lalang', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020880', '020880', 'Pekan Malau', '10208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020901', '020901', 'Mukim Bagan Sena', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020902', '020902', 'Mukim Junjong', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020903', '020903', 'Mukim Karangan', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020905', '020905', 'Mukim Kulim', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020907', '020907', 'Mukim Mahang', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020908', '020908', 'Mukim Naga Lilit', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:11');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020909', '020909', 'Mukim Padang China', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020910', '020910', 'Mukim Padang Meha', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020911', '020911', 'Mukim Sedim', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020912', '020912', 'Mukim Sidam Kanan', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020913', '020913', 'Mukim Sungai Seluang', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020914', '020914', 'Mukim Sungai Ular', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020915', '020915', 'Mukim Terap', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020916', '020916', 'Mukim Keladi', '10209', '1', '100000', '1000000', '2024-05-15 15:45:58', '2017-03-27 00:00:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020940', '020940', 'Bandar Kulim', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020941', '020941', 'Bandar Lunas', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020942', '020942', 'Bandar Padang Serai', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020970', '020970', 'Pekan Junjong', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020971', '020971', 'Pekan Karangan', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020972', '020972', 'Pekan Labu Besar', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020973', '020973', 'Pekan Mahang', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020974', '020974', 'Pekan Merbau Pulas', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020975', '020975', 'Pekan Sungai Karangan', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020976', '020976', 'Pekan Sungai Kob', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10020977', '020977', 'Pekan Padang Meha', '10209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021001', '021001', 'Mukim Bagan Samak', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021002', '021002', 'Mukim Kuala Selama', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021003', '021003', 'Mukim Permatang Pasir', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021004', '021004', 'Mukim Relau', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021005', '021005', 'Mukim Serdang', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021006', '021006', 'Mukim Sungai Batu', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021007', '021007', 'Mukim Sungai Kechil', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021040', '021040', 'Bandar Baharu', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021041', '021041', 'Bandar Serdang', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021070', '021070', 'Pekan Lubuk Buntar', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021071', '021071', 'Pekan Selama', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021072', '021072', 'Pekan Sungai Kecil Illir', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:12');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021073', '021073', 'Pekan Relau', '10210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021101', '021101', 'Mukim Ayer Puteh', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021102', '021102', 'Mukim Bukit Paya', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021103', '021103', 'Mukim Guar Kepayang', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021104', '021104', 'Mukim Padang Kerbau', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021105', '021105', 'Mukim Padang Peliang', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021106', '021106', 'Mukim Padang Pusing', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021108', '021108', 'Mukim Tobiar', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021140', '021140', 'Bandar Pendang', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021170', '021170', 'Pekan Bukit Jenun', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021171', '021171', 'Pekan Kubur Panjang', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021172', '021172', 'Pekan Tanah Merah', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021173', '021173', 'Pekan Tokai', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021174', '021174', 'Pekan Kobah', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021175', '021175', 'Pekan Kampung Baru', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021176', '021176', 'Pekan Sungai Tiang', '10211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021201', '021201', 'Mukim Derang', '10212', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021202', '021202', 'Mukim Lesong', '10212', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021203', '021203', 'Mukim Tualang', '10212', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021204', '021204', 'Mukim Gajah Mati', '10212', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021205', '021205', 'Mukim Jabi', '10212', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021206', '021206', 'Mukim Bukit Lada', '10212', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021240', '021240', 'Bandar Pokok Sena', '10212', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10021270', '021270', 'Pekan Kebun 500', '10212', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030101', '030101', 'Mukim Alor Bakat', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030102', '030102', 'Mukim Bachok', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030103', '030103', 'Mukim Bator', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030104', '030104', 'Mukim Chap', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030105', '030105', 'Mukim Cherang Hangus', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030106', '030106', 'Mukim Gajah Mati', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030107', '030107', 'Mukim Gunung', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030108', '030108', 'Mukim Kuau', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030109', '030109', 'Mukim Kemasin', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:13');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030110', '030110', 'Mukim Kubang Telaga', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030111', '030111', 'Mukim Kuchelong', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030112', '030112', 'Mukim Lubok Tembusu', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030113', '030113', 'Mukim Mak Lipah', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030114', '030114', 'Mukim Melawi', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030115', '030115', 'Mukim Nipah', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030116', '030116', 'Mukim Pak Pura', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030117', '030117', 'Mukim Pauh Sembilan', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030118', '030118', 'Mukim Paya Mengkuang', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030119', '030119', 'Mukim Perupok', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030120', '030120', 'Mukim Repek', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030121', '030121', 'Mukim Rusa', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030122', '030122', 'Mukim Senak', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030123', '030123', 'Mukim Serdang', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030124', '030124', 'Mukim Takang', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030125', '030125', 'Mukim Tanjong', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030126', '030126', 'Mukim Tanjong Jering', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030127', '030127', 'Mukim Tanjong Pauh', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030128', '030128', 'Mukim Telok Mesira', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030129', '030129', 'Mukim Telong', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030130', '030130', 'Mukim Temu Ranggas', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030131', '030131', 'Mukim Tepus', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030132', '030132', 'Mukim Tualang Salak', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030140', '030140', 'Bandar Bachok', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030170', '030170', 'Pekan Jelawat', '10301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030201', '030201', 'Mukim Aur Duri', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030202', '030202', 'Mukim Badak Mati', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030203', '030203', 'Mukim Badak', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030204', '030204', 'Mukim Badang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030205', '030205', 'Mukim Banggu', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:14');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030206', '030206', 'Mukim Banggol', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030207', '030207', 'Mukim Baling', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030208', '030208', 'Mukim Bayang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030209', '030209', 'Mukim Bechah Mulong', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030210', '030210', 'Mukim Beta Hulu', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030211', '030211', 'Mukim Beta Hilir', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030212', '030212', 'Mukim Beting', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030213', '030213', 'Mukim Biah', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030214', '030214', 'Mukim Binjai', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030215', '030215', 'Mukim Buloh Poh', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030216', '030216', 'Mukim Bunut Payong', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030217', '030217', 'Mukim But', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030218', '030218', 'Mukim Chekli', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030219', '030219', 'Mukim Chekok', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030220', '030220', 'Mukim Che Latiff', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030221', '030221', 'Mukim Chicha', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030222', '030222', 'Mukim Dal', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030223', '030223', 'Mukim Demit', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030224', '030224', 'Mukim Duson Rendah', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030225', '030225', 'Mukim Guntong', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030226', '030226', 'Mukim Jelutong', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030227', '030227', 'Mukim Kadok', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030228', '030228', 'Mukim Karang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030229', '030229', 'Mukim Kampong Sireh', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030230', '030230', 'Mukim Kedai Buloh', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030231', '030231', 'Mukim Kijang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030232', '030232', 'Mukim Kemubu', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030233', '030233', 'Mukim Kemumin', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030234', '030234', 'Mukim Kenali', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:15');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030235', '030235', 'Mukim Ketereh Barat', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030236', '030236', 'Mukim Ketereh Timor', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030237', '030237', 'Mukim Koh', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030238', '030238', 'Mukim Kota', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030239', '030239', 'Mukim Langgar', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030240', '030240', 'Mukim Lembu', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030241', '030241', 'Mukim Lubok Jambu', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030242', '030242', 'Mukim Lubok Pukol', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030243', '030243', 'Mukim Lundang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030244', '030244', 'Mukim Lundang Paku', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030245', '030245', 'Mukim Mahang Barat', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030246', '030246', 'Mukim Mahang Timur', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030247', '030247', 'Mukim Mentuan', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030248', '030248', 'Mukim Melor', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030249', '030249', 'Mukim Padang Bongor', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030250', '030250', 'Mukim Padang Enggang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030251', '030251', 'Mukim Padang Garong', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030252', '030252', 'Mukim Padang Leban', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030253', '030253', 'Mukim Padang Raja', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030254', '030254', 'Mukim Padang Sakar', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030255', '030255', 'Mukim Padang Tengah', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030256', '030256', 'Mukim Panchor', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030257', '030257', 'Mukim Pangkal Pisang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030258', '030258', 'Mukim Parit', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030259', '030259', 'Mukim Pasir Ha', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030260', '030260', 'Mukim Pasir Mas', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030261', '030261', 'Mukim Patek', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030262', '030262', 'Mukim Pauh', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030263', '030263', 'Mukim Paya', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030264', '030264', 'Mukim Pendek', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030265', '030265', 'Mukim Pengkalan Chepa', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:16');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030266', '030266', 'Mukim Peringat', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030267', '030267', 'Mukim Perol', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030268', '030268', 'Mukim Pintu Gang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030269', '030269', 'Mukim Pulau', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030270', '030270', 'Mukim Pulau Belanga', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030271', '030271', 'Mukim Pulau Gajah', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030272', '030272', 'Mukim Pulau Kundor', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030273', '030273', 'Mukim Pulau Panjang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030274', '030274', 'Mukim Pulau Pisang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030275', '030275', 'Mukim Sabak', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030276', '030276', 'Mukim Salor', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030277', '030277', 'Mukim Semut Api', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030278', '030278', 'Mukim Sering', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030279', '030279', 'Mukim Seterpa', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030280', '030280', 'Mukim Tanjong Chat', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030281', '030281', 'Mukim Tapang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030282', '030282', 'Mukim Tebing Tinggi', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030283', '030283', 'Mukim Telok', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030284', '030284', 'Mukim Telok Bharu', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030285', '030285', 'Mukim Telok Kitang', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030286', '030286', 'Mukim Tiong', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030287', '030287', 'Mukim Tok Ku', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030288', '030288', 'Mukim Wakaf Stan', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030289', '030289', 'Mukim Wakaf Siku', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030290', '030290', 'Bandar Kota Bharu', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030291', '030291', 'Bandar Baru Kubang Kerian', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030295', '030295', 'Pekan Mulong', '10302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030301', '030301', 'Mukim Bagan', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030302', '030302', 'Mukim Bakar', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030303', '030303', 'Mukim Dewan', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030304', '030304', 'Mukim Gading Galoh', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:17');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030305', '030305', 'Mukim Jakar', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030306', '030306', 'Mukim Joh', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030307', '030307', 'Mukim Kelaweh', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030308', '030308', 'Mukim Kerawang', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030309', '030309', 'Mukim Kerilla', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030310', '030310', 'Mukim Kuala Perak', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030311', '030311', 'Mukim Labok', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030312', '030312', 'Mukim Limau Hantu', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030313', '030313', 'Mukim Machang', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030314', '030314', 'Mukim Padang Kemunchut', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030315', '030315', 'Mukim Pek', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030316', '030316', 'Mukim Pemanok', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030317', '030317', 'Mukim Pulai Chondong', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030318', '030318', 'Mukim Raja', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030319', '030319', 'Mukim Tengah', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030320', '030320', 'Mukim Tok Bok', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030321', '030321', 'Mukim Ulu Sat', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030325', '030325', 'Mukim Temangan', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030340', '030340', 'Bandar Machang', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030371', '030371', 'Pekan Temangan', '10303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030401', '030401', 'Mukim Alor Buloh', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030402', '030402', 'Mukim Alor Pasir', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030403', '030403', 'Mukim Apa-Apa', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030404', '030404', 'Mukim Apam', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030405', '030405', 'Mukim Bakong', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030406', '030406', 'Mukim Bechah Menerong', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030407', '030407', 'Mukim Bechah Palas', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030408', '030408', 'Mukim Bechah Semak', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030409', '030409', 'Mukim Bukit Tuku', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030410', '030410', 'Mukim Chetok', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030411', '030411', 'Mukim Gelam', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:18');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030412', '030412', 'Mukim Gua', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030413', '030413', 'Mukim Gual Nering', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030414', '030414', 'Mukim Gual Periok', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030415', '030415', 'Mukim Jabo', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030416', '030416', 'Mukim Jejawi', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030417', '030417', 'Mukim Kangkong', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030418', '030418', 'Mukim Kala', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030419', '030419', 'Mukim Kasa', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030420', '030420', 'Mukim Kedondong', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030421', '030421', 'Mukim Kenak', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030422', '030422', 'Mukim Kerasak', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030423', '030423', 'Mukim Kiat', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030424', '030424', 'Mukim Kuala Lemal', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030425', '030425', 'Mukim Kubang Sebatang', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030426', '030426', 'Mukim Kubang Bemban', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030427', '030427', 'Mukim Kubang Gatal', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030428', '030428', 'Mukim Kubang Gendang', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030429', '030429', 'Mukim Kubang Ketam', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030430', '030430', 'Mukim Kubang Sepat', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030431', '030431', 'Mukim Kubang Terap', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030432', '030432', 'Mukim Lalang', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030433', '030433', 'Mukim Lubok Anching', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030434', '030434', 'Mukim Lubok Gong', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030435', '030435', 'Mukim Lubok Kawah', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030436', '030436', 'Mukim Lubok Tapah', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030437', '030437', 'Mukim Lubok Setul', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030438', '030438', 'Mukim Meranti', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030439', '030439', 'Mukim Padang Embon', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030440', '030440', 'Mukim Paloh', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030441', '030441', 'Mukim Rantau Panjang', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030442', '030442', 'Mukim Sakar', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:19');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030443', '030443', 'Mukim Tasik Berangan', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030444', '030444', 'Mukim Teliar', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030445', '030445', 'Mukim Tendong', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030446', '030446', 'Mukim Tok Sangkut', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030447', '030447', 'Mukim Tok Uban', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030448', '030448', 'Mukim Kuala Kelar', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030450', '030450', 'Bandar Pasir Mas', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030470', '030470', 'Pekan Rantau Panjang', '10304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030501', '030501', 'Mukim Banggol Setol', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030502', '030502', 'Mukim Batu Sebutir', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030503', '030503', 'Mukim Berangan', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030504', '030504', 'Mukim Bukit Abal Barat', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030505', '030505', 'Mukim Bukit Abal Timor', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030506', '030506', 'Mukim Bukit Merbau', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030507', '030507', 'Mukim Bukit Tanah', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030508', '030508', 'Mukim Cherang Ruku', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030509', '030509', 'Mukim Changgai', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030510', '030510', 'Mukim Gong Datok Barat', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030511', '030511', 'Mukim Gong Datok Timor', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030512', '030512', 'Mukim Gong Chapa', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030513', '030513', 'Mukim Gong Chegal', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030514', '030514', 'Mukim Gong Garu', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030515', '030515', 'Mukim Gong Kulim', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030516', '030516', 'Mukim Gong Nangka', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030517', '030517', 'Mukim Gong Pachat', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030518', '030518', 'Mukim Jeram', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030519', '030519', 'Mukim Jerus', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030520', '030520', 'Mukim Kandis', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030521', '030521', 'Mukim Kampong Wakaf', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030522', '030522', 'Mukim Kolam Tembusu', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030523', '030523', 'Mukim Merbol', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:20');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030524', '030524', 'Mukim Merkang', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030525', '030525', 'Mukim Padang Pak Amat', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030526', '030526', 'Mukim Pasir Puteh', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030527', '030527', 'Mukim Pengkalan', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030528', '030528', 'Mukim Permatang Sungkai', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030529', '030529', 'Mukim Seligi', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030530', '030530', 'Mukim Selinsing', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030531', '030531', 'Mukim Semerak', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030532', '030532', 'Mukim Tasik', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030533', '030533', 'Mukim Telipok', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030540', '030540', 'Bandar Pasir Puteh', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030570', '030570', 'Pekan Selising', '10305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030601', '030601', 'Mukim Batang Merbau', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030603', '030603', 'Mukim Bendang Nyior', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030604', '030604', 'Mukim Bukit Durian', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030605', '030605', 'Mukim Ulu Kusial', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030606', '030606', 'Mukim Jedok', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030609', '030609', 'Mukim Kuala Paku', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030610', '030610', 'Mukim Lawang', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030612', '030612', 'Mukim Maka', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030613', '030613', 'Mukim Nibong', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030614', '030614', 'Mukim Pasir Ganda', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030615', '030615', 'Mukim Rambai', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030616', '030616', 'Mukim Sokor', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030617', '030617', 'Mukim Tanah Merah', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030618', '030618', 'Mukim Tebing Tinggi', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030640', '030640', 'Bandar Tanah Merah', '10306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030701', '030701', 'Mukim Bechah Resak', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030702', '030702', 'Mukim Bunohan', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030703', '030703', 'Mukim Bunut Sarang Burong', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030704', '030704', 'Mukim Chenderong Batu', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:21');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030705', '030705', 'Mukim Cherang Melintang', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030706', '030706', 'Mukim Geting', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030707', '030707', 'Mukim Jal', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030708', '030708', 'Mukim Kampong Laut', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030709', '030709', 'Mukim Kelaboran', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030710', '030710', 'Mukim Ketil', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030711', '030711', 'Mukim Kok Keli', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030712', '030712', 'Mukim Kutang', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030713', '030713', 'Mukim Mak Neralang', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030714', '030714', 'Mukim Morak', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030715', '030715', 'Mukim Pasir Pekan', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030716', '030716', 'Mukim Palekbang', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030717', '030717', 'Mukim Periok', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030718', '030718', 'Mukim Pulau Besar', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030719', '030719', 'Mukim Selehong Selatan', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030720', '030720', 'Mukim Selehong Utara', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030721', '030721', 'Mukim Simpangan', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030722', '030722', 'Mukim Sungai Pinang', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030723', '030723', 'Mukim Tabar', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030724', '030724', 'Mukim Talak', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030725', '030725', 'Mukim Telok Renjuna', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030726', '030726', 'Mukim Tujoh', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030727', '030727', 'Mukim Tumpat', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030728', '030728', 'Mukim Wakaf Bharu', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030729', '030729', 'Mukim Wakaf Delima', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030740', '030740', 'Bandar Tumpat', '10307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030801', '030801', 'Mukim Batu Papan', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030802', '030802', 'Mukim Gua Musang', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030803', '030803', 'Mukim Ulu Nenggiri', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030804', '030804', 'Mukim Ketil', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:22');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030805', '030805', 'Mukim Kuala Sungai', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030806', '030806', 'Mukim Limau Kasturi', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030807', '030807', 'Mukim Pulai', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030808', '030808', 'Mukim Relai', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030809', '030809', 'Mukim Renok', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10030840', '030840', 'Bandar Gua Musang', '10308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031001', '031001', 'Mukim Batu Mengkebang', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031003', '031003', 'Mukim Enggong', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031004', '031004', 'Mukim Gajah', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031005', '031005', 'Mukim Kandek', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031006', '031006', 'Mukim Kenor', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031007', '031007', 'Mukim Kuala Geris', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031008', '031008', 'Mukim Kuala Krai', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031009', '031009', 'Mukim Kuala Nal', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031010', '031010', 'Mukim Kuala Pahi', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031011', '031011', 'Mukim Kuala Pergau', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031012', '031012', 'Mukim Kuala Stong', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031014', '031014', 'Mukim Mambong', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031015', '031015', 'Mukim Manek Urai', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031016', '031016', 'Mukim Manjor', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031017', '031017', 'Mukim Telekong', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031040', '031040', 'Bandar Kuala Krai', '10310', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031101', '031101', 'Mukim Belimbing', '10311', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031102', '031102', 'Mukim Bunga Tanjong', '10311', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031103', '031103', 'Mukim Jeli', '10311', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031104', '031104', 'Mukim Jeli Tepi Sungai', '10311', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031105', '031105', 'Mukim Kalai', '10311', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031106', '031106', 'Mukim Kuala Balah', '10311', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031107', '031107', 'Mukim Lubok Bonggor', '10311', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031201', '031201', 'Mukim Balar', '10312', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031202', '031202', 'Mukim Kuala Betis', '10312', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031203', '031203', 'Mukim Blau', '10312', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:23');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031204', '031204', 'Mukim Hau', '10312', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031205', '031205', 'Mukim Hendrop', '10312', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031206', '031206', 'Mukim Sigar', '10312', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10031207', '031207', 'Mukim Tuel', '10312', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040101', '040101', 'Mukim Alai', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040102', '040102', 'Mukim Ayer Molek', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040103', '040103', 'Mukim Bachang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040104', '040104', 'Mukim Balai Panjang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040105', '040105', 'Mukim Batu Berendam', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040106', '040106', 'Mukim Bertam', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040107', '040107', 'Mukim Bukit Baru', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040108', '040108', 'Mukim Bukit Katil', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040109', '040109', 'Mukim Bukit Lintang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040110', '040110', 'Mukim Bukit Piatu', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040111', '040111', 'Mukim Bukit Rambai', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040112', '040112', 'Mukim Cheng', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040113', '040113', 'Mukim Duyong', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040114', '040114', 'Mukim Ujung Pasir', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040115', '040115', 'Mukim Kandang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040116', '040116', 'Mukim Klebang Besar', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040117', '040117', 'Mukim Klebang Kechil', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040118', '040118', 'Mukim Krubong', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040119', '040119', 'Mukim Padang Semabok', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040120', '040120', 'Mukim Padang Temu', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040121', '040121', 'Mukim Paya Rumput', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040122', '040122', 'Mukim Pringgit', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040123', '040123', 'Mukim Pernu', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040124', '040124', 'Mukim Semabok', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040125', '040125', 'Mukim Sungei Udang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040126', '040126', 'Mukim Tangga Batu', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:24');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040127', '040127', 'Mukim Tanjong Kling', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040128', '040128', 'Mukim Tanjong Minyak', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040129', '040129', 'Mukim Telok Mas', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040140', '040140', 'Bandar Bukit Baru', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040141', '040141', 'Bandar Melaka', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040170', '040170', 'Pekan Ayer Molek', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040171', '040171', 'Pekan Batu Berendam', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040172', '040172', 'Pekan Bukit Rambai', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040173', '040173', 'Pekan Kandang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040174', '040174', 'Pekan Klebang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040175', '040175', 'Pekan Paya Rumput', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040176', '040176', 'Pekan Sungai Udang', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040177', '040177', 'Pekan Tangga Batu', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040178', '040178', 'Pekan Tanjong Kling', '10401', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040201', '040201', 'Mukim Ayer Panas', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040202', '040202', 'Mukim Batang Malaka', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040203', '040203', 'Mukim Bukit Senggeh', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040204', '040204', 'Mukim Chabau', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040205', '040205', 'Mukim Chin Chin', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040206', '040206', 'Mukim Chohong', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040207', '040207', 'Mukim Jasin', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040208', '040208', 'Mukim Jus', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040209', '040209', 'Mukim Kesang', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040210', '040210', 'Mukim Merlimau', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040211', '040211', 'Mukim Nyalas', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040212', '040212', 'Mukim Rim', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040213', '040213', 'Mukim Sebatu', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040214', '040214', 'Mukim Selandar', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040215', '040215', 'Mukim Sempang', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040216', '040216', 'Mukim Semujok', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040217', '040217', 'Mukim Serkam', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:25');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040218', '040218', 'Mukim Sungei Rambai', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040219', '040219', 'Mukim Tedong', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040220', '040220', 'Mukim Umbai', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040240', '040240', 'Bandar Jasin', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040241', '040241', 'Bandar Merlimau', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040270', '040270', 'Pekan Asahan', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040271', '040271', 'Pekan Batang Malaka', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040272', '040272', 'Pekan Bemban', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040273', '040273', 'Pekan Chin Chin', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040274', '040274', 'Pekan Kesang Pajak', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040275', '040275', 'Pekan Nyalas', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040276', '040276', 'Pekan Selandar', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040277', '040277', 'Pekan Sempang Bekoh', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040278', '040278', 'Pekan Sungai Rambai', '10402', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040301', '040301', 'Mukim Ayer Pa\'abas', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040302', '040302', 'Mukim Belimbing', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040303', '040303', 'Mukim Beringin', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040304', '040304', 'Mukim Brisu', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040305', '040305', 'Mukim Durian Tunggal', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040306', '040306', 'Mukim Gadek', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040307', '040307', 'Mukim Kelemak', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040308', '040308', 'Mukim Kemuning', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040309', '040309', 'Mukim Kuala Linggi', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040310', '040310', 'Mukim Kuala Sungai Baru', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040311', '040311', 'Mukim Lendu', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040312', '040312', 'Mukim Machap', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040313', '040313', 'Mukim Masjid Tanah', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040314', '040314', 'Mukim Malaka Pindah', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040315', '040315', 'Mukim Melekek', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040316', '040316', 'Mukim Padang Sebang', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040317', '040317', 'Mukim Parit Melana', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040318', '040318', 'Mukim Pegoh', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:26');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040319', '040319', 'Mukim Pulau Sebang', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040320', '040320', 'Mukim Ramuan China Besar', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040321', '040321', 'Mukim Ramuan China Kechil', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040322', '040322', 'Mukim Rembia', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040323', '040323', 'Mukim Sungei Baru Ilir', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040324', '040324', 'Mukim Sungei Baru Ulu', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040325', '040325', 'Mukim Sungei Baru Tengah', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040326', '040326', 'Mukim Sungei Buloh', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040327', '040327', 'Mukim Sungei Petai', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040328', '040328', 'Mukim Sungei Siput', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040329', '040329', 'Mukim Taboh Naning', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040330', '040330', 'Mukim Tanjung Rimau', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040331', '040331', 'Mukim Tebong', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040340', '040340', 'Bandar Alor Gajah', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040341', '040341', 'Bandar Masjid Tanah', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040342', '040342', 'Bandar Pulau Sebang', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040370', '040370', 'Pekan Durian Tunggal', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040371', '040371', 'Pekan Kuala Sungai Baru', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040372', '040372', 'Pekan Lubok China', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10040373', '040373', 'Pekan Rembia', '10403', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050101', '050101', 'Mukim Glami Lemi', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050102', '050102', 'Mukim Ulu Kelawang', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050103', '050103', 'Mukim Ulu Triang', '10501', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050104', '050104', 'Mukim Kenaboi', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050105', '050105', 'Mukim Kuala Klawang', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050106', '050106', 'Mukim Peradong', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050107', '050107', 'Mukim Pertang', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050108', '050108', 'Mukim Triang Hilir', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050140', '050140', 'Bandar Kuala Klawang', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050170', '050170', 'Pekan Kuala Klawang', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050171', '050171', 'Pekan Pertang', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:27');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050172', '050172', 'Pekan Titi', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050173', '050173', 'Pekan Simpang Durian', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050174', '050174', 'Pekan Simpang Pertang', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050175', '050175', 'Pekan Petaling', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050176', '050176', 'Pekan Sungai Muntoh', '10501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050201', '050201', 'Mukim Ampang Tinggi', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050202', '050202', 'Mukim Ulu Jempol', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050203', '050203', 'Mukim Ulu Muar', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050204', '050204', 'Mukim Johol', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050205', '050205', 'Mukim Juasseh', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050206', '050206', 'Mukim Kepis', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050207', '050207', 'Mukim Langkap', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050208', '050208', 'Mukim Parit Tinggi', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050209', '050209', 'Mukim Pilah', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050210', '050210', 'Mukim Sri Menanti', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050211', '050211', 'Mukim Terachi', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050240', '050240', 'Bandar Kuala Pilah', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050270', '050270', 'Pekan Dangi', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050271', '050271', 'Pekan Gunung Pasir', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050272', '050272', 'Pekan Johol', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050273', '050273', 'Pekan Parit Tinggi', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050274', '050274', 'Pekan Senaling', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050275', '050275', 'Pekan Tanjong Ipoh', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050276', '050276', 'Pekan Juasseh', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050277', '050277', 'Pekan Bukit Gelugor', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050278', '050278', 'Pekan Melang', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050279', '050279', 'Pekan Air Mawang', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050280', '050280', 'Pekan Dangi Baru', '10502', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050301', '050301', 'Mukim Jimah', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050303', '050303', 'Mukim Linggi', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:28');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050304', '050304', 'Mukim Port Dickson', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050305', '050305', 'Mukim Si Rusa', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050340', '050340', 'Bandar Port Dickson', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050341', '050341', 'Bandar Teluk Kemang', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050370', '050370', 'Pekan Lukut', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050371', '050371', 'Pekan Pasir Panjang', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050372', '050372', 'Pekan Pengkalan Kempas', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050373', '050373', 'Pekan Chuah', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050374', '050374', 'Pekan Port Dickson', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050375', '050375', 'Pekan Teluk Kemang', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050376', '050376', 'Pekan Bukit Pelanduk', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050377', '050377', 'Pekan Linggi', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050378', '050378', 'Pekan Air Kuning', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050379', '050379', 'Pekan Sungai Menyala', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050380', '050380', 'Pekan Bagan Pinang', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050381', '050381', 'Pekan Tanah Merah Utara', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050382', '050382', 'Pekan Tanah Merah Selatan', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050383', '050383', 'Pekan Jemima', '10503', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050401', '050401', 'Mukim Batu Hampar', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050402', '050402', 'Mukim Bongek', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050403', '050403', 'Mukim Chembong', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050404', '050404', 'Mukim Chengkau', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050405', '050405', 'Mukim Gadong', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050406', '050406', 'Mukim Kundor', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050407', '050407', 'Mukim Legong Ilir', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050408', '050408', 'Mukim Legong Ulu', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050409', '050409', 'Mukim Miku', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050410', '050410', 'Mukim Nerasau', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050411', '050411', 'Mukim Pedas', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050412', '050412', 'Mukim Pilin', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050413', '050413', 'Mukim Selemak', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050414', '050414', 'Mukim Semerbok', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:29');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050415', '050415', 'Mukim Sepri', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050416', '050416', 'Mukim Tanjong Kling', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050417', '050417', 'Mukim Titian Bintagor', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050440', '050440', 'Bandar Rembau', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050470', '050470', 'Pekan Kampong Batu', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050471', '050471', 'Pekan Kota', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050472', '050472', 'Pekan Lubok China', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050473', '050473', 'Pekan Pedas', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050474', '050474', 'Pekan Chembong', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050475', '050475', 'Pekan Rembau', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050476', '050476', 'Pekan Chengkau', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050477', '050477', 'Pekan Seri Kota', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050478', '050478', 'Pekan Seri Kendong', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050479', '050479', 'Pekan Merbau Sembilan', '10504', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050501', '050501', 'Mukim Ampangan', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050502', '050502', 'Mukim Labu', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050503', '050503', 'Mukim Lenggeng', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050504', '050504', 'Mukim Pantai', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050505', '050505', 'Mukim Rantau', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050506', '050506', 'Mukim Rasah', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050507', '050507', 'Mukim Seremban', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050508', '050508', 'Mukim Setul', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050540', '050540', 'Bandar Seremban', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050541', '050541', 'Bandar Seremban 3', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050542', '050542', 'Bandar Seremban Utama', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050543', '050543', 'Bandar Mantin Utama', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050544', '050544', 'Bandar Baru Enstek', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050545', '050545', 'Bandar Baru Kota Sri Mas', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050546', '050546', 'Bandar Nilai Utama', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:30');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050547', '050547', 'Bandar Sri Sendayan', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050570', '050570', 'Pekan Broga', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050571', '050571', 'Pekan Ulu Bernang', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050572', '050572', 'Pekan Labu', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050573', '050573', 'Pekan Lenggeng', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050574', '050574', 'Pekan Mambau', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050575', '050575', 'Pekan Nilai', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050576', '050576', 'Pekan Mantin', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050577', '050577', 'Pekan Pajam', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050578', '050578', 'Pekan Rantau', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050579', '050579', 'Pekan Tiroi', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050580', '050580', 'Pekan Panchor', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050581', '050581', 'Pekan Taman Seremban', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050582', '050582', 'Pekan Rahang Baru', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050583', '050583', 'Pekan Paroi', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050584', '050584', 'Pekan Bukit Kepayang', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050585', '050585', 'Pekan Dusun Setia', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050586', '050586', 'Pekan Sungai Gadut', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050587', '050587', 'Pekan Bukti', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050588', '050588', 'Pekan Sikamat', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050590', '050590', 'Pekan Sentul', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050591', '050591', 'Pekan Ulu Temiang', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050592', '050592', 'Pekan Paroi Jaya', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050593', '050593', 'Pekan Rasah Jaya', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050594', '050594', 'Pekan Senawang', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050595', '050595', 'Pekan Seremban Jaya', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050599', '050599', 'Pekan Shah Bandar', '10505', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050601', '050601', 'Mukim Air Kuning', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050602', '050602', 'Mukim Gemas', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050603', '050603', 'Mukim Gemenceh', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050604', '050604', 'Mukim Keru', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:31');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050605', '050605', 'Mukim Repah', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050606', '050606', 'Mukim Tampin Tengah', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050607', '050607', 'Mukim Tebong', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050640', '050640', 'Bandar Gemas', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050641', '050641', 'Bandar Tampin', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050670', '050670', 'Pekan Air Kuning Selatan', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050671', '050671', 'Pekan Batang Melaka', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050672', '050672', 'Pekan Gemenceh Bharu', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050673', '050673', 'Pekan Repah', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050674', '050674', 'Pekan Tampin Tengah', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050675', '050675', 'Pekan Air Kuning', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050676', '050676', 'Pekan Pasir Besar', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050677', '050677', 'Pekan Repah Permai', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050678', '050678', 'Pekan Repah Jaya', '10506', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050701', '050701', 'Mukim Jelai', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050702', '050702', 'Mukim Kuala Jempol', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050703', '050703', 'Mukim Rompin', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050704', '050704', 'Mukim Serting Hilir', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050705', '050705', 'Mukim Serting Hulu', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050740', '050740', 'Bandar Serting', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050741', '050741', 'Bandar Bahau', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050742', '050742', 'Bandar Seri Jempol', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050770', '050770', 'Pekan Bahau', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050771', '050771', 'Pekan Batu Kikir', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050772', '050772', 'Pekan Kuala Jelai', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050773', '050773', 'Pekan Rompin', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050774', '050774', 'Pekan Ladang Geddes', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050775', '050775', 'Pekan Mahsan', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10050776', '050776', 'Pekan Serting Tengah', '10507', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060101', '060101', 'Mukim Bentong', '10601', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060102', '060102', 'Mukim Sabai', '10601', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:32');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060103', '060103', 'Mukim Pelangai', '10601', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060140', '060140', 'Bandar Bentong', '10601', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060141', '060141', 'Bandar Karak', '10601', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060171', '060171', 'Pekan Temelong', '10601', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060201', '060201', 'Mukim Hulu Telom', '10602', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060202', '060202', 'Mukim Ringlet', '10602', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060203', '060203', 'Mukim Tanah Rata', '10602', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060240', '060240', 'Bandar Tanah Rata', '10602', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060270', '060270', 'Pekan Brinchang', '10602', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060271', '060271', 'Pekan Lubok Tamang', '10602', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060272', '060272', 'Pekan Ringlet', '10602', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060301', '060301', 'Mukim Burau', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060302', '060302', 'Mukim Hulu Cheka', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060303', '060303', 'Mukim Hulu Tembeling', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060304', '060304', 'Mukim Kelola', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060305', '060305', 'Mukim Kuala Tembeling', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060306', '060306', 'Mukim Pedah', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060307', '060307', 'Mukim Pulau Tawar', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060308', '060308', 'Mukim Tebing Tinggi', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060309', '060309', 'Mukim Teh', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060310', '060310', 'Mukim Tembeling', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060340', '060340', 'Bandar Jerantut', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060370', '060370', 'Pekan Kuala Tembeling', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060371', '060371', 'Pekan Jeransang', '10603', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060401', '060401', 'Mukim Beserah', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060402', '060402', 'Mukim Hulu Kuantan', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060403', '060403', 'Mukim Hulu Lepar', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060404', '060404', 'Mukim Kuala Kuantan', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060405', '060405', 'Mukim Penor', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060406', '060406', 'Mukim Sungai Karang', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060440', '060440', 'Bandar Gambang', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060441', '060441', 'Bandar Kuantan', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:33');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060470', '060470', 'Pekan Beserah', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060471', '060471', 'Pekan Tanjung Lumpur', '10604', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060501', '060501', 'Mukim Batu Yon', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060502', '060502', 'Mukim Budu', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060503', '060503', 'Mukim Cheka', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060504', '060504', 'Mukim Gua', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060505', '060505', 'Mukim Hulu Jelai', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060506', '060506', 'Mukim Kechau', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060507', '060507', 'Mukim Kuala Lipis', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060508', '060508', 'Mukim Penjom', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060509', '060509', 'Mukim Tanjung Besar', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060510', '060510', 'Mukim Telang', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060540', '060540', 'Bandar Kuala Lipis', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060541', '060541', 'Bandar Benta', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060542', '060542', 'Bandar Padang Tengku', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060572', '060572', 'Pekan Padang Tengku', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060573', '060573', 'Pekan Taman Jelai', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060574', '060574', 'Pekan Penjom', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060575', '060575', 'Pekan Mela', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060576', '060576', 'Pekan Kerambit', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060577', '060577', 'Pekan Rpsb Kampung Pagar', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060578', '060578', 'Pekan Merapuh', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060579', '060579', 'Pekan Kechau Tui', '10605', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060601', '060601', 'Mukim Bebar', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060602', '060602', 'Mukim Ghancong', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060603', '060603', 'Mukim Kuala Pahang', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060604', '060604', 'Mukim Langgar', '10606', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060605', '060605', 'Mukim Lepar', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060606', '060606', 'Mukim Pahang Tua', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060607', '060607', 'Mukim Pekan', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:34');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060608', '060608', 'Mukim Penyor', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060609', '060609', 'Mukim Pulau Manis', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060610', '060610', 'Mukim Pulau Rusa', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060611', '060611', 'Mukim Temai', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060640', '060640', 'Bandar Pekan', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060670', '060670', 'Pekan Kuala Pahang', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060671', '060671', 'Pekan Nenasi', '10606', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060701', '060701', 'Mukim Batu Talam', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060702', '060702', 'Mukim Dong', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060703', '060703', 'Mukim Gali', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060704', '060704', 'Mukim Hulu Dong', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060705', '060705', 'Mukim Sega', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060706', '060706', 'Mukim Semantan Hulu', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060707', '060707', 'Mukim Teras', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060740', '060740', 'Bandar Raub', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060741', '060741', 'Bandar Teras', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060770', '060770', 'Pekan Cheroh', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060771', '060771', 'Pekan Dong', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060772', '060772', 'Pekan Tranium', '10607', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060801', '060801', 'Mukim Bangau', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060802', '060802', 'Mukim Jenderak', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060803', '060803', 'Mukim Kerdau', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060804', '060804', 'Mukim Lebak', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060805', '060805', 'Mukim Lipat Kajang', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060806', '060806', 'Mukim Mentakab', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060807', '060807', 'Mukim Perak', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060808', '060808', 'Mukim Sanggang', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060809', '060809', 'Mukim Semantan', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060810', '060810', 'Mukim Sonsang', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060840', '060840', 'Bandar Mentakab', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060841', '060841', 'Bandar Temerloh', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:35');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060871', '060871', 'Pekan Kerdau', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060872', '060872', 'Pekan Kuala Kerau', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060873', '060873', 'Pekan Lanchang', '10608', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060901', '060901', 'Mukim Endau', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060902', '060902', 'Mukim Keratong', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060903', '060903', 'Mukim Pontian', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060904', '060904', 'Mukim Rompin', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060905', '060905', 'Mukim Tioman', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060906', '060906', 'Mukim Bebar', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060941', '060941', 'Bandar Rompin 1', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060942', '060942', 'Bandar Rompin 2', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060943', '060943', 'Bandar Rompin 3', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060944', '060944', 'Bandar Rompin 4', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060945', '060945', 'Bandar Pontian', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060946', '060946', 'Bandar Endau', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060947', '060947', 'Bandar Muadzam Shah 1', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060948', '060948', 'Bandar Muadzam Shah 2', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060949', '060949', 'Bandar Tioman', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060970', '060970', 'Pekan Kuala Rompin', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10060971', '060971', 'Pekan Tioman', '10609', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061001', '061001', 'Mukim Bukit Segumpal', '10610', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061002', '061002', 'Mukim Chenor', '10610', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061003', '061003', 'Mukim Kertau', '10610', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061004', '061004', 'Mukim Luit', '10610', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061040', '061040', 'Bandar Maran', '10610', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061070', '061070', 'Pekan Chenor', '10610', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061072', '061072', 'Pekan Sri Jaya', '10610', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061101', '061101', 'Mukim Bera', '10611', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061102', '061102', 'Mukim Triang', '10611', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061142', '061142', 'Bandar Triang', '10611', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061170', '061170', 'Pekan Durian Tawar', '10611', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:36');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061174', '061174', 'Pekan Mengkarak', '10611', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10061175', '061175', 'Pekan Mengkuang', '10611', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070101', '070101', 'Mukim 1', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070102', '070102', 'Mukim 2', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070103', '070103', 'Mukim 3', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070104', '070104', 'Mukim 4', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070105', '070105', 'Mukim 5', '10701', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070106', '070106', 'Mukim 6', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070107', '070107', 'Mukim 7', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070108', '070108', 'Mukim 8', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070109', '070109', 'Mukim 9', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070110', '070110', 'Mukim 10', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070111', '070111', 'Mukim 11', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070112', '070112', 'Mukim 12', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070113', '070113', 'Mukim 13', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070114', '070114', 'Mukim 14', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070115', '070115', 'Mukim 15', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070116', '070116', 'Mukim 16', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070117', '070117', 'Mukim 17', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070118', '070118', 'Mukim 18', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070119', '070119', 'Mukim 19', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070120', '070120', 'Mukim 20', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070121', '070121', 'Mukim 21', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070140', '070140', 'Bandar Bukit Mertajam', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070141', '070141', 'Bandar Prai', '10701', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070201', '070201', 'Mukim 1', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070202', '070202', 'Mukim 2', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070203', '070203', 'Mukim 3', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070204', '070204', 'Mukim 4', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070205', '070205', 'Mukim 5', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070206', '070206', 'Mukim 6', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070207', '070207', 'Mukim 7', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070208', '070208', 'Mukim 8', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070209', '070209', 'Mukim 9', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070210', '070210', 'Mukim 10', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070211', '070211', 'Mukim 11', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070212', '070212', 'Mukim 12', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070213', '070213', 'Mukim 13', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070214', '070214', 'Mukim 14', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070216', '070216', 'Mukim 16', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070240', '070240', 'Bandar Butterworth', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070241', '070241', 'Bandar Kepala Batas', '10702', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070301', '070301', 'Mukim 1', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070302', '070302', 'Mukim 2', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070303', '070303', 'Mukim 3', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070304', '070304', 'Mukim 4', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:45');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070305', '070305', 'Mukim 5', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070306', '070306', 'Mukim 6', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070307', '070307', 'Mukim 7', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070308', '070308', 'Mukim 8', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070309', '070309', 'Mukim 9', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070310', '070310', 'Mukim 10', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070311', '070311', 'Mukim 11', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070312', '070312', 'Mukim 12', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070313', '070313', 'Mukim 13', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070314', '070314', 'Mukim 14', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070315', '070315', 'Mukim 15', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070316', '070316', 'Mukim 16', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070340', '070340', 'Bandar Nibong Tebal', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070341', '070341', 'Bandar Sungai Bakap', '10703', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070401', '070401', 'Mukim 13', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070402', '070402', 'Mukim 14', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070404', '070404', 'Mukim 16', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070405', '070405', 'Mukim 17', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070406', '070406', 'Mukim 18', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070440', '070440', 'Bandar Ayer Itam', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070441', '070441', 'Bandar Batu Ferringgi', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070442', '070442', 'Bandar Bukit Bendera', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070443', '070443', 'Bandar Glugor', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070444', '070444', 'Bandar George Town', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070445', '070445', 'Bandar Jelutong', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070446', '070446', 'Bandar Tanjong Bungah', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070447', '070447', 'Bandar Tanjong Tokong', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070448', '070448', 'Bandar Tanjong Pinang', '10704', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070501', '070501', 'Mukim 1', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070502', '070502', 'Mukim 2', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070503', '070503', 'Mukim 3', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070504', '070504', 'Mukim 4', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070505', '070505', 'Mukim 5', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:46');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070506', '070506', 'Mukim 6', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070507', '070507', 'Mukim 7', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070508', '070508', 'Mukim 8', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070509', '070509', 'Mukim 9', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070510', '070510', 'Mukim 10', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070511', '070511', 'Mukim 11', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070512', '070512', 'Mukim 12', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070513', '070513', 'Mukim A', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070514', '070514', 'Mukim B', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070515', '070515', 'Mukim C', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070516', '070516', 'Mukim D', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070517', '070517', 'Mukim E', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070518', '070518', 'Mukim F', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070519', '070519', 'Mukim G', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070520', '070520', 'Mukim H', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070521', '070521', 'Mukim I', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070522', '070522', 'Mukim J', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070540', '070540', 'Bandar Balik Pulau', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10070541', '070541', 'Bandar Bayan Lepas', '10705', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080101', '080101', 'Mukim Batang Padang', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080102', '080102', 'Mukim Bidor', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080103', '080103', 'Mukim Chenderiang', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080104', '080104', 'Mukim Hulu Bernam Barat', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080105', '080105', 'Mukim Hulu Bernam Timur', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080106', '080106', 'Mukim Slim', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080107', '080107', 'Mukim Sungkai', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080140', '080140', 'Bandar Bidor', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080141', '080141', 'Bandar Chenderiang', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080142', '080142', 'Bandar Sungkai', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080143', '080143', 'Bandar Tanjong Malim', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080144', '080144', 'Bandar Tapah', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080145', '080145', 'Bandar Temoh', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080170', '080170', 'Pekan Ayer Kuning', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080171', '080171', 'Pekan Banir', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080172', '080172', 'Pekan Bantang', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080173', '080173', 'Pekan Bikam', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080174', '080174', 'Pekan Slim', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080175', '080175', 'Pekan Sungai Lesong', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080176', '080176', 'Pekan Tapah Road', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080177', '080177', 'Pekan Temoh Station', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080178', '080178', 'Pekan Trolak', '10801', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080201', '080201', 'Mukim Beruas', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080202', '080202', 'Mukim Lekir', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080203', '080203', 'Mukim Lumut', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080204', '080204', 'Mukim Pengkalan Baharu', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080205', '080205', 'Mukim Sitiawan', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080240', '080240', 'Bandar Lumut', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:37');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080270', '080270', 'Pekan Ayer Tawar', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080271', '080271', 'Pekan Beruas', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080272', '080272', 'Pekan Changkat Keruing', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080273', '080273', 'Pekan Damar Laut', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080274', '080274', 'Pekan Kampong Baharu', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080275', '080275', 'Pekan Kampong Koh', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080276', '080276', 'Pekan Kampong Sitiawan', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080277', '080277', 'Pekan Pangkor', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080278', '080278', 'Pekan Pantai Remis', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080279', '080279', 'Pekan Pasir Bongak', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080280', '080280', 'Pekan Gurney', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080281', '080281', 'Pekan Pengkalan Baharu', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080282', '080282', 'Pekan Segari', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080283', '080283', 'Pekan Sitiawan', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080284', '080284', 'Pekan Sg Pinang Kechil', '10802', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080301', '080301', 'Mukim Belanja', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080302', '080302', 'Mukim Hulu Kinta', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080304', '080304', 'Mukim Sungai Raya', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080305', '080305', 'Mukim Sungai Terap', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080306', '080306', 'Mukim Tanjong Tualang', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080340', '080340', 'Bandar Batu Gajah', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080341', '080341', 'Bandar Chemor', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080343', '080343', 'Bandar Ipoh (u)', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080344', '080344', 'Bandar Ipoh (s)', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080345', '080345', 'Bandar Jelapang', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:38');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080347', '080347', 'Bandar Lahat', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080348', '080348', 'Bandar Mengelembu', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080349', '080349', 'Bandar Papan', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080351', '080351', 'Bandar Pusing', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080352', '080352', 'Bandar Seputih', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080353', '080353', 'Bandar Sungai Raya', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080354', '080354', 'Bandar Tambun', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080355', '080355', 'Bandar Tanjong Rambutan', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080356', '080356', 'Bandar Teronoh', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080370', '080370', 'Pekan Khantan', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080373', '080373', 'Pekan Simpang Pulai', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080374', '080374', 'Pekan Tanjong Tualang', '10803', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080401', '080401', 'Mukim Bagan Serai', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080402', '080402', 'Mukim Bagan Tiang', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080403', '080403', 'Mukim Beriah', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080404', '080404', 'Mukim Gunung Semanggol', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080405', '080405', 'Mukim Kuala Kurau', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080406', '080406', 'Mukim Parit Buntar', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080407', '080407', 'Mukim Selinsing', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080408', '080408', 'Mukim Tanjong Piandang', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080440', '080440', 'Bandar Bagan Serai', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080441', '080441', 'Bandar Kuala Kurau', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080442', '080442', 'Bandar Parit Buntar', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080470', '080470', 'Pekan Bukit Merah', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080471', '080471', 'Pekan Jalan Baru', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080473', '080473', 'Pekan Simpang Lima', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080474', '080474', 'Pekan Sungai Gedong', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080475', '080475', 'Pekan Tanjong Piandang', '10804', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080501', '080501', 'Mukim Chegar Galah', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080502', '080502', 'Mukim Kampong Buaya', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080503', '080503', 'Mukim Kota Lama Kanan', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:39');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080504', '080504', 'Mukim Kota Lama Kiri', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080505', '080505', 'Mukim Lubok Merbau', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080506', '080506', 'Mukim Pulau Kamiri', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080507', '080507', 'Mukim Sayung', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080508', '080508', 'Mukim Senggang', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080509', '080509', 'Mukim Sungai Siput', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080540', '080540', 'Bandar Kuala Kangsar', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080541', '080541', 'Bandar Sungai Siput', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080570', '080570', 'Pekan Gunong Pondok', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080571', '080571', 'Pekan Jerlun', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080572', '080572', 'Pekan Karai', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080573', '080573', 'Pekan Kati', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080574', '080574', 'Pekan Lubok Merbau', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080575', '080575', 'Pekan Manong', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080576', '080576', 'Pekan Padang Rengas', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080577', '080577', 'Pekan Salak', '10805', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080601', '080601', 'Mukim Asam Kumbang', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080602', '080602', 'Mukim Batu Kurau', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080603', '080603', 'Mukim Bukit Gantang', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080604', '080604', 'Mukim Jebong', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080605', '080605', 'Mukim Kamunting', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080606', '080606', 'Mukim Pengkalan Aor', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080607', '080607', 'Mukim Simpang', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080608', '080608', 'Mukim Sungai Limau', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080609', '080609', 'Mukim Sungai Tinggi', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080610', '080610', 'Mukim Terung', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080611', '080611', 'Mukim Tupai', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080640', '080640', 'Bandar Kamunting', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080641', '080641', 'Bandar Kuala Sepetang', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080642', '080642', 'Bandar Matang', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080643', '080643', 'Bandar Taiping', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:40');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080670', '080670', 'Pekan Batu Kurau', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080671', '080671', 'Pekan Changkat Jering', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080672', '080672', 'Pekan Pondok Tanjung', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080673', '080673', 'Pekan Simpang', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080674', '080674', 'Pekan Terung', '10806', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080701', '080701', 'Mukim Bagan Datoh', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080702', '080702', 'Mukim Changkat Jong', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080703', '080703', 'Mukim Durian Sebatang', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080704', '080704', 'Mukim Hutan Melintang', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080705', '080705', 'Mukim Labu Kubong', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080706', '080706', 'Mukim Rungkup', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080707', '080707', 'Mukim Sungai Durian', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080708', '080708', 'Mukim Sungai Manik', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080709', '080709', 'Mukim Teluk Baru', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080740', '080740', 'Bandar Teluk Intan', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080770', '080770', 'Pekan Bagan Datuk', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080771', '080771', 'Pekan Batak Rabit', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080772', '080772', 'Pekan Batu Dua Puloh', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080773', '080773', 'Pekan Chikus', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080774', '080774', 'Pekan Degong', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080775', '080775', 'Pekan Hutan Melintang', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080776', '080776', 'Pekan Jendarata', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080777', '080777', 'Pekan Kampung Sungai Haji', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080778', '080778', 'Pekan Langkap', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080779', '080779', 'Pekan Selekoh', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080780', '080780', 'Pekan Simpang Empat', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080781', '080781', 'Pekan Simpang Tiga', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080782', '080782', 'Pekai Sungai Sumun', '10807', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080801', '080801', 'Mukim Belukar Semang', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080802', '080802', 'Mukim Belum', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080803', '080803', 'Mukim Durian Pipit', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:41');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080804', '080804', 'Mukim Gerik', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080805', '080805', 'Mukim Kenering', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080806', '080806', 'Mukim Pengkalan Hulu', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080807', '080807', 'Mukim Kerunai', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080808', '080808', 'Mukim Lenggong', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080809', '080809', 'Mukim Temerlong', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080810', '080810', 'Mukim Temenggor', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080840', '080840', 'Bandar Gerik', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080841', '080841', 'Bandar Kelian Intan', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080842', '080842', 'Bandar Pengkalan Hulu', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080843', '080843', 'Bandar Lawin', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080844', '080844', 'Bandar Lenggong', '10808', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080901', '080901', 'Mukim Hulu Ijok', '10809', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080902', '080902', 'Mukim Hulu Selama', '10809', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080903', '080903', 'Mukim Selama', '10809', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080940', '080940', 'Bandar Selama', '10809', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080970', '080970', 'Pekan Rantau Panjang', '10809', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10080971', '080971', 'Pekan Sungai Bayur', '10809', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081001', '081001', 'Mukim Bandar', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081002', '081002', 'Mukim Belanja', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081003', '081003', 'Mukim Bota', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081004', '081004', 'Mukim Jaya Baru', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081005', '081005', 'Mukim Kampong Gajah', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081006', '081006', 'Mukim Kota Setia', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081007', '081007', 'Mukim Lambor Kanan', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081008', '081008', 'Mukim Lambor Kiri', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081009', '081009', 'Mukim Layang-Layang', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081010', '081010', 'Mukim Pasir Panjang Ulu', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081011', '081011', 'Mukim Pasir Salak', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081012', '081012', 'Mukim Pulau Tiga', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081040', '081040', 'Bandar Seri Iskandar', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:42');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081070', '081070', 'Pekan Bota Kanan', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081071', '081071', 'Pekan Kampong Buloh Akar', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081072', '081072', 'Pekan Kota Setia', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081073', '081073', 'Pekan Parit', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081074', '081074', 'Pekan Tanjong Belanja', '10810', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081101', '081101', 'Mukim Kampar', '10811', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081102', '081102', 'Mukim Teja', '10811', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081140', '081140', 'Bandar Gopeng', '10811', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081141', '081141', 'Bandar Kampar', '10811', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081170', '081170', 'Pekan Kota Baharu', '10811', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10081171', '081171', 'Pekan Malim Nawar', '10811', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090001', '090001', 'Mukim Abi', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090002', '090002', 'Mukim Arau', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090003', '090003', 'Mukim Beseri', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090004', '090004', 'Mukim Chuping', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090005', '090005', 'Mukim Utan Aji', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090006', '090006', 'Mukim Jejawi', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090007', '090007', 'Mukim Kayang', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090008', '090008', 'Mukim Kechor', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090009', '090009', 'Mukim Kuala Perlis', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090010', '090010', 'Mukim Kurong Anai', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090011', '090011', 'Mukim Kurong Batang', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090012', '090012', 'Mukim Ngulang', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090013', '090013', 'Mukim Oran', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090014', '090014', 'Mukim Padang Pauh', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090015', '090015', 'Mukim Padang Siding', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090016', '090016', 'Mukim Paya', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090017', '090017', 'Mukim Sanglang', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090018', '090018', 'Mukim Sena', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090019', '090019', 'Mukim Seriab', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:43');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090020', '090020', 'Mukim Sungai Adam', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090021', '090021', 'Mukim Titi Tinggi', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090022', '090022', 'Mukim Wang Bintong', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090040', '090040', 'Bandar Arau', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090041', '090041', 'Bandar Kangar', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090070', '090070', 'Pekan Kuala Perlis', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10090072', '090072', 'Pekan Kaki Bukit', '10900', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:44');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100101', '100101', 'Mukim Kapar', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100102', '100102', 'Mukim Klang', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100140', '100140', 'Bandar Klang', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100141', '100141', 'Bandar Port Swettenham', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100142', '100142', 'Bandar Sultan Sulaiman', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100143', '100143', 'Bandar Shah Alam', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100170', '100170', 'Pekan Bukit Kemuning', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100171', '100171', 'Pekan Kapar', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100172', '100172', 'Pekan Meru', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100173', '100173', 'Pekan Telok Menegun', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100174', '100174', 'Pekan Batu Empat', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100175', '100175', 'Pekan Pandamaran', '11001', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100201', '100201', 'Mukim Bandar', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100202', '100202', 'Mukim Batu', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100203', '100203', 'Mukim Jugra', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100204', '100204', 'Mukim Kelanang', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100205', '100205', 'Mukim Morib', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100206', '100206', 'Mukim Tanjong Duabelas', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100207', '100207', 'Mukim Telok Panglima Gara', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100240', '100240', 'Bandar Banting', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100241', '100241', 'Bandar Jenjarom', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100242', '100242', 'Bandar Sijangkang', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100243', '100243', 'Bandar Tanjong Sepat', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100244', '100244', 'Bandar Telok Panglima Gar', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100270', '100270', 'Pekan Batu', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100271', '100271', 'Pekan Bukit Changgang', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100272', '100272', 'Pekan Chodoi', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100273', '100273', 'Pekan Jenjarom', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100274', '100274', 'Pekan Kanchong', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100275', '100275', 'Pekan Kanchong Darat', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100276', '100276', 'Pekan Kelanang Batu Enam', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100277', '100277', 'Pekan Morib', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100278', '100278', 'Pekan Permatang Pasir', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100279', '100279', 'Pekan Sijangkang', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100280', '100280', 'Pekan Simpang Morib', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100281', '100281', 'Pekan Sungai Manggis', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100282', '100282', 'Pekan Sungai Raba', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100283', '100283', 'Pekan Tanjong Duabelas', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100284', '100284', 'Pekan Telok Datok', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100286', '100286', 'Pekan Tongkah', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100287', '100287', 'Pekan Telok', '11002', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100401', '100401', 'Mukim Api-Api', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100402', '100402', 'Mukim Batang Berjuntai', '11004', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100403', '100403', 'Mukim Ujong Permatang', '11004', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100405', '100405', 'Mukim Ijok', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100406', '100406', 'Mukim Bebar', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100407', '100407', 'Mukim Kuala Selangor', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100408', '100408', 'Mukim Pasangan', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100409', '100409', 'Mukim Tanjong Karang', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100410', '100410', 'Mukim Bestari Jaya', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100415', '100415', 'Mukim Jeram', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100440', '100440', 'Bandar Kuala Selangor', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100441', '100441', 'Bandar Tanjong Karang', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100470', '100470', 'Pekan Asam Jawa', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100472', '100472', 'Pekan Bukit Rotan', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:58');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100473', '100473', 'Pekan Jeram', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100474', '100474', 'Pekan Kampong Kuantan', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100475', '100475', 'Pekan Kuala Sungai Buloh', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100476', '100476', 'Pekan Pasir Penambang', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100477', '100477', 'Pekan Simpang Tiga', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100478', '100478', 'Pekan Tanjong Karang', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100479', '100479', 'Pekan Bukit Belimbing', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100480', '100480', 'Pekan Bukit Talang', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100481', '100481', 'Pekan Kampung Baru Hulu T', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100482', '100482', 'Pekan Parit Mahang', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100483', '100483', 'Pekan Simpang Tiga Ijok', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100484', '100484', 'Pekan Sungai Sembilang', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100485', '100485', 'Pekan Taman Pkns', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100486', '100486', 'Pekan Tambak Jawa', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100491', '100491', 'Pekan Bestari Jaya', '11004', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100501', '100501', 'Mukim Bagan Nakhoda Omar', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100502', '100502', 'Mukim Panchang Bedena', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100503', '100503', 'Mukim Pasir Panjang', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100504', '100504', 'Mukim Sabak', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100505', '100505', 'Mukim Sungai Panjang', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100570', '100570', 'Pekan Bagan Terap', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100571', '100571', 'Pekan Parit Enam', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100572', '100572', 'Pekan Parit Sembilan', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100573', '100573', 'Pekan Sekinchan', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100575', '100575', 'Pekan Sabak', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100576', '100576', 'Pekan Sungai Air Tawar', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100577', '100577', 'Pekan Sungai Sepintas', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100578', '100578', 'Pekan Bagan Nakhoda Omar', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100579', '100579', 'Pekan Parit Baru', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100580', '100580', 'Pekan Pasir Panjang', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100581', '100581', 'Pekan Sekinchan Site A', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:59');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100582', '100582', 'Pekan Sungai Besar', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100583', '100583', 'Pekan Sungai Haji Dorani', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100584', '100584', 'Pekan Sungai Nibong', '11005', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100601', '100601', 'Mukim Beranang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100602', '100602', 'Mukim Cheras', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100603', '100603', 'Mukim Ampang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100604', '100604', 'Mukim Ulu Langat', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100605', '100605', 'Mukim Ulu Semenyih', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100606', '100606', 'Mukim Kajang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100607', '100607', 'Mukim Semenyih', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100640', '100640', 'Bandar Cheras', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100641', '100641', 'Bandar Ulu Langat', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100642', '100642', 'Bandar Kajang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100643', '100643', 'Bandar Semenyih', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100644', '100644', 'Bandar Ampang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100645', '100645', 'Bandar Country Height', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100646', '100646', 'Bandar Balakong', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100647', '100647', 'Bandar Baru Bangi', '11006', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100648', '100648', 'Bandar Batu 9, Cheras', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100649', '100649', 'Bandar Batu 18, Semenyih', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100650', '100650', 'Bandar Batu 26, Beranang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100671', '100671', 'Pekan Beranang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100673', '100673', 'Pekan Kacau', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100675', '100675', 'Pekan Tarun', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100676', '100676', 'Pekan Bangi Lama', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100678', '100678', 'Pekan Batu 23, Sungai Lal', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100679', '100679', 'Pekan Batu 26, Beranang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100680', '100680', 'Pekan Bukit Sungai Raya', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100681', '100681', 'Pekan Cheras', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100682', '100682', 'Pekan Desa Raya', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100683', '100683', 'Pekan Dusun Tua Ulu Langa', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:00');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100684', '100684', 'Pekan Kajang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100685', '100685', 'Pekan Kampong Pasir, Batu', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100686', '100686', 'Pekan Kampong Sungai Tang', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100687', '100687', 'Pekan Rumah Murah Sungai ', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100688', '100688', 'Pekan Semenyih', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100689', '100689', 'Pekan Simpang Balak', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100690', '100690', 'Pekan Sri Nanding', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100691', '100691', 'Pekan Sungai Kembong Bera', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100692', '100692', 'Pekan Sungai Lui', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100693', '100693', 'Pekan Sungai Makau', '11006', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100701', '100701', 'Mukim Batang Kali', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100702', '100702', 'Mukim Buloh Telor', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100703', '100703', 'Mukim Ampang Pechah', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100704', '100704', 'Mukim Ulu Bernam', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100705', '100705', 'Mukim Ulu Yam', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100706', '100706', 'Mukim Kalumpang', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100707', '100707', 'Mukim Kerling', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100708', '100708', 'Mukim Kuala Kalumpang', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100709', '100709', 'Mukim Peretak', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100710', '100710', 'Mukim Rasa', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100711', '100711', 'Mukim Serendah', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100712', '100712', 'Mukim Sungai Gumut', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100713', '100713', 'Mukim Sungai Tinggi', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100740', '100740', 'Bandar Ulu Yam', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100741', '100741', 'Bandar Ulu Yam Baharu', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100742', '100742', 'Bandar Kalumpang', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100743', '100743', 'Bandar Kuala Kubu Baharu', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100744', '100744', 'Bandar Rasa', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100745', '100745', 'Bandar Serendah', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100746', '100746', 'Bandar Batang Kali', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100747', '100747', 'Bandar Ulu Bernam I', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:01');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100748', '100748', 'Bandar Ulu Bernam Ii', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100749', '100749', 'Bandar Sungai Chik', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100770', '100770', 'Pekan Kerling', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100771', '100771', 'Pekan Peretak', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100772', '100772', 'Pekan Simpang Sungai Choh', '11007', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100801', '100801', 'Mukim Bukit Raja', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100802', '100802', 'Mukim Damansara', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100803', '100803', 'Mukim Petaling', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100804', '100804', 'Mukim Sungai Buloh', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100840', '100840', 'Bandar Petaling Jaya', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100841', '100841', 'Bandar Shah Alam', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100842', '100842', 'Bandar Damansara', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100843', '100843', 'Bandar Glenmarie', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100844', '100844', 'Bandar Petaling Jaya Sela', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100845', '100845', 'Bandar Saujana', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100846', '100846', 'Bandar Sri Damansara', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100847', '100847', 'Bandar Subang Jaya', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100848', '100848', 'Bandar Sunway', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100870', '100870', 'Pekan Batu Tiga', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100871', '100871', 'Pekan Merbau Sempak', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100872', '100872', 'Pekan Puchong', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100874', '100874', 'Pekan Serdang', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100875', '100875', 'Pekan Sungai Buloh', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100876', '100876', 'Pekan Sungai Penchala', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100877', '100877', 'Pekan Cempaka', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100878', '100878', 'Pekan Country Height', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100879', '100879', 'Pekan Desa Puchong', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100880', '100880', 'Pekan Hicom', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100881', '100881', 'Pekan Kayu Ara', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100882', '100882', 'Pekan Kinrara', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100884', '100884', 'Pekan Baru Hicom', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:02');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100885', '100885', 'Pekan Baru Subang', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100886', '100886', 'Pekan Baru Sungai Besi', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100887', '100887', 'Pekan Baru Sungai Buloh', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100888', '100888', 'Pekan Penaga', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100889', '100889', 'Pekan Puchong Jaya', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100890', '100890', 'Pekan Puchong Perdana', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100891', '100891', 'Pekan Subang', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100892', '100892', 'Pekan Subang Jaya', '11008', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100901', '100901', 'Mukim Batu', '11009', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100902', '100902', 'Mukim Ulu Kelang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100903', '100903', 'Mukim Rawang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100904', '100904', 'Mukim Setapak', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100940', '100940', 'Bandar Batu Arang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100942', '100942', 'Bandar Rawang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100943', '100943', 'Bandar Gombak Setia', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100944', '100944', 'Bandar Ulu Kelang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100945', '100945', 'Bandar Kepong', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100946', '100946', 'Bandar Kundang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100947', '100947', 'Bandar Selayang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100948', '100948', 'Bandar Sungai Buloh', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100949', '100949', 'Bandar Sungai Pusu', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100972', '100972', 'Pekan Batu 20', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100973', '100973', 'Pekan Kuang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100974', '100974', 'Pekan Mimaland', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100975', '100975', 'Pekan Pengkalan Kundang', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100976', '100976', 'Pekan Sungai Buloh', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10100977', '100977', 'Pekan Templer', '11009', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101001', '101001', 'Mukim Dengkil', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101002', '101002', 'Mukim Labu', '11010', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101003', '101003', 'Mukim Sepang', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101040', '101040', 'Bandar Sepang', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101041', '101041', 'Bandar Baru Bangi', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101042', '101042', 'Bandar Baru Salak Tinggi', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:03');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101043', '101043', 'Bandar Lapangan Terbang A', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101044', '101044', 'Bandar Sungai Merab', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101070', '101070', 'Pekan Dengkil', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101071', '101071', 'Pekan Salak', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101072', '101072', 'Pekan Sungai Pelek', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101074', '101074', 'Pekan Batu 1 Sepang', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101075', '101075', 'Pekan Bukit Bisa', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101076', '101076', 'Pekan Bukit Prang', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101077', '101077', 'Pekan Dato Bakar Baginda', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101078', '101078', 'Pekan Baru Salak Tinggi', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101079', '101079', 'Pekan Sungai Merab', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10101080', '101080', 'Pekan Tanjung Mas', '11010', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110101', '110101', 'Mukim Bukit Kenak', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110102', '110102', 'Mukim Bukit Peteri', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110105', '110105', 'Mukim Hulu Besut', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110107', '110107', 'Mukim Jabi', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110108', '110108', 'Mukim Kampung Raja', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110109', '110109', 'Mukim Keluang', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110110', '110110', 'Mukim Kerandang', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110111', '110111', 'Mukim Kuala Besut', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110112', '110112', 'Mukim Kubang Bemban', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110113', '110113', 'Mukim Lubuk Kawah', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110115', '110115', 'Mukim Pasir Akar', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110116', '110116', 'Mukim Pelagat', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110117', '110117', 'Mukim Pangkalan Nangka', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110118', '110118', 'Mukim Pulau Perhentian', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110120', '110120', 'Mukim Tembila', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110121', '110121', 'Mukim Tenang', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110170', '110170', 'Pekan Jertih', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110171', '110171', 'Pekan Kampung Raja', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:04');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110172', '110172', 'Pekan Kuala Besut', '11101', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110201', '110201', 'Mukim Kuala Abang', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110202', '110202', 'Mukim Besul', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110203', '110203', 'Mukim Hulu Paka', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110204', '110204', 'Mukim Jengai', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110205', '110205', 'Mukim Jerangau', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110206', '110206', 'Mukim Kuala Dungun', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110207', '110207', 'Mukim Kuala Paka', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110208', '110208', 'Mukim Kumpal', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110209', '110209', 'Mukim Pasir Raja', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110210', '110210', 'Mukim Rasau', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110211', '110211', 'Mukim Sura', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110240', '110240', 'Bandar Dungun', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110270', '110270', 'Pekan Kuala Paka', '11102', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110301', '110301', 'Mukim Bandi', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110302', '110302', 'Mukim Banggul', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110303', '110303', 'Mukim Binjai', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110304', '110304', 'Mukim Cukai', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110305', '110305', 'Mukim Hulu Cukai', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110306', '110306', 'Mukim Hulu Jabur', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110307', '110307', 'Mukim Kemasik', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110308', '110308', 'Mukim Kertih', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110309', '110309', 'Mukim Kijal', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110310', '110310', 'Mukim Pasir Semut', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110311', '110311', 'Mukim Tebak', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110312', '110312', 'Mukim Teluk Kalung', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110340', '110340', 'Bandar Cukai', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110370', '110370', 'Pekan Air Jernih', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110371', '110371', 'Pekan Air Putih', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110372', '110372', 'Pekan Kemasik', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:05');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110373', '110373', 'Pekan Kijal', '11103', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110402', '110402', 'Mukim Atas Tol', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110403', '110403', 'Mukim Batu Buruk', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110405', '110405', 'Mukim Belara', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110406', '110406', 'Mukim Bukit Besar', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110408', '110408', 'Mukim Cabang Tiga', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110409', '110409', 'Mukim Cenering', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110410', '110410', 'Mukim Gelugur Kedai', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110411', '110411', 'Mukim Gelugur Raja', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110413', '110413', 'Mukim Kepung', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110414', '110414', 'Mukim Kuala Ibai', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110415', '110415', 'Mukim Kuala Nerus', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110416', '110416', 'Mukim Kubang Parit', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110417', '110417', 'Mukim Losong', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110418', '110418', 'Mukim Manir', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110420', '110420', 'Mukim Paluh', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110421', '110421', 'Mukim Pengadang Buluh', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110422', '110422', 'Mukim Pulau-Pulau', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110423', '110423', 'Mukim Pulau Redang', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110424', '110424', 'Mukim Rengas', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110425', '110425', 'Mukim Serada', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110426', '110426', 'Mukim Tuk Jamal', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110440', '110440', 'Bandar Kuala Terengganu', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110471', '110471', 'Pekan Cabang Tiga', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110501', '110501', 'Mukim Hulu Berang', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110502', '110502', 'Mukim Hulu Telemung', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110503', '110503', 'Mukim Hulu Terengganu', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110504', '110504', 'Mukim Jenagur', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110505', '110505', 'Mukim Kuala Berang', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110506', '110506', 'Mukim Kuala Telemung', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110507', '110507', 'Mukim Penghulu Diman', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110508', '110508', 'Mukim Tanggul', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110509', '110509', 'Mukim Tersat', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110570', '110570', 'Pekan Kuala Berang', '11105', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110601', '110601', 'Mukim Jerung', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110602', '110602', 'Mukim Mercang', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110603', '110603', 'Mukim Pulau Kerengga', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110604', '110604', 'Mukim Rusila', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110605', '110605', 'Mukim Alur Limbat', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110606', '110606', 'Mukim Bukit Payung', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110670', '110670', 'Pekan Marang', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110671', '110671', 'Pekan Bukit Payung', '11106', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110701', '110701', 'Mukim Caluk', '11107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110702', '110702', 'Mukim Guntung', '11107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110703', '110703', 'Mukim Hulu Nerus', '11107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110704', '110704', 'Mukim Hulu Setiu', '11107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110705', '110705', 'Mukim Merang', '11107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110706', '110706', 'Mukim Pantai', '11107', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110707', '110707', 'Mukim Tasik', '11107', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10110801', '110801', 'Mukim Batu Rakit', '11104', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:06');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140001', '140001', 'Mukim Ampang', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140002', '140002', 'Mukim Batu', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140003', '140003', 'Mukim Cheras', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140004', '140004', 'Mukim Ulu Kelang', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140005', '140005', 'Mukim Kuala Lumpur', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140006', '140006', 'Mukim Petaling', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140007', '140007', 'Mukim Setapak', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140044', '140044', 'Bandar Kuala Lumpur', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140055', '140055', 'Bandar Petaling Jaya', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140066', '140066', 'Bandar Bandar Baharu Sung', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140070', '140070', 'Pekan Batu', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140071', '140071', 'Pekan Batu Caves', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140072', '140072', 'Pekan Kepong', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140073', '140073', 'Pekan Kuala Pauh', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140074', '140074', 'Pekan Petaling', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140075', '140075', 'Pekan Salak South', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140076', '140076', 'Pekan Sungai Penchala', '11400', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:09');
INSERT INTO `ddsa_kod_bandar` VALUES ('10140099', '140099', 'Mukim Kuala Lumpur', '11401', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150001', '150001', 'Kampung Batu Manikar', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150002', '150002', 'Kampung Lubok Temiang', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150003', '150003', 'Kampung Pohon Batu', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150004', '150004', 'Kampung Ganggarak Merindi', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150005', '150005', 'Kampung Lajau', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150006', '150006', 'Kampung Tanjung Aru', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150007', '150007', 'Kampung Bukit Kuda', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150008', '150008', 'Kampung Layang-Layangan', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150009', '150009', 'Kampung Bukit Kalam', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150010', '150010', 'Kampung Kilan Pulau Akar', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150011', '150011', 'Kampung Durian Tunjung', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150012', '150012', 'Kampung Nagalang Kerupang', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150013', '150013', 'Kampung Pantai', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:07');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150014', '150014', 'Kampung Sungai Bangat', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150015', '150015', 'Kampung Sungai Keling', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150016', '150016', 'Kampung Batu Arang', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150017', '150017', 'Kampung Gersik', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150018', '150018', 'Kampung Patau-Patau 1', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150019', '150019', 'Kampung Patau-Patau 2', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150020', '150020', 'Kampung Rancha-Rancha', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150021', '150021', 'Kampung Sungai Bedaun', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150022', '150022', 'Kampung Sungai Labu', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150023', '150023', 'Kampung Sungai Lada', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150024', '150024', 'Kampung Sungai Miri Sg Pa', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150025', '150025', 'Kampung Sungai Buton', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150026', '150026', 'Kampung Bebuloh', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150027', '150027', 'Kampung Belukut', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150028', '150028', 'Kiamsam', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150029', '150029', 'Pusat Bandar Labuan', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150030', '150030', 'Pulau Rusukan Besar', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150031', '150031', 'Pulau Rusukan Kecil', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150032', '150032', 'Pulau Kuraman', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150033', '150033', 'Pulau Papan', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150034', '150034', 'Pulau Burong', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10150035', '150035', 'Pulau Daat', '11501', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:56:08');
INSERT INTO `ddsa_kod_bandar` VALUES ('10160140', '160140', 'Putrajaya', '11601', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101201001', '1201001', 'Kota Kinabalu', '11201', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101202001', '1202001', 'Papar', '11202', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101203001', '1203001', 'Kota Belud', '11203', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101204001', '1204001', 'Tuaran', '11204', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101205001', '1205001', 'Kudat', '11205', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101206001', '1206001', 'Ranau', '11206', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101207001', '1207001', 'Sandakan', '11207', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101208001', '1208001', 'Labuk & Sugut', '11208', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101209001', '1209001', 'Kinabatangan', '11209', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101210001', '1210001', 'Tawau', '11210', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101211001', '1211001', 'Lahad Datu', '11211', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101212001', '1212001', 'Semporna', '11212', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101213001', '1213001', 'Keningau', '11213', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101214001', '1214001', 'Tambunan', '11214', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101215001', '1215001', 'Pensiangan', '11215', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101216001', '1216001', 'Tenom', '11216', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101217001', '1217001', 'Beaufort', '11217', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101218001', '1218001', 'Kuala Penyu', '11218', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101219001', '1219001', 'Sipitang', '11219', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101221001', '1221001', 'Penampang', '11221', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101222001', '1222001', 'Kota Marudu', '11222', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101223001', '1223001', 'Pitas', '11223', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101224001', '1224001', 'Kunak', '11224', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101225001', '1225001', 'Tongod', '11225', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101226001', '1226001', 'Putatan', '11226', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301001', '1301001', 'Pueh Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301002', '1301002', 'Gading Lundu Land Distric', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301003', '1301003', 'Stungkor Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:47');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301004', '1301004', 'Sampadi Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301005', '1301005', 'Jagoi  Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301006', '1301006', 'Senggi-Poak Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301007', '1301007', 'Matang Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301008', '1301008', 'Salak District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301009', '1301009', 'Pangkalan Ampat Land Dist', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301010', '1301010', 'Kuching North Land Distri', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301011', '1301011', 'Kuching Central Land Dist', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301012', '1301012', 'Kuching Town Land Distric', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301013', '1301013', 'Sentah-Segu Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301014', '1301014', 'Muara Tebas Land District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301025', '1301025', 'Batu Kawa Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301026', '1301026', '8 Mile (matang Road) Dist', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301027', '1301027', 'Sungai Tengah Town Distri', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301028', '1301028', 'Batu Kitang Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301029', '1301029', '15 Mile (senggang Road) Town', '11301', '1', '1000', '100000', '2024-05-17 23:58:03', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301030', '1301030', '17.5 (senggang Road) Town', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301031', '1301031', '19 Mile (senggang Road)', '11301', '1', '1000', '100000', '2024-05-18 00:13:54', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301032', '1301032', '24 Mile (senggang Road) Town', '11301', '1', '1000', '100000', '2024-05-18 00:14:06', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301033', '1301033', 'Pangkalan Kut Town Distri', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301049', '1301049', 'Beliong Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301050', '1301050', 'Bako Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301051', '1301051', 'Santubong Town District', '11301', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301055', '1301055', 'Sematang Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301056', '1301056', 'Lundu Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301057', '1301057', 'Jangkar Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301058', '1301058', 'Rambungan Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301059', '1301059', 'Stunkor Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301060', '1301060', 'Kranji Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301061', '1301061', 'Siniwan Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301062', '1301062', 'Paku Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301063', '1301063', 'Jambusan Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:48');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301064', '1301064', 'Bau Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301065', '1301065', 'Buso Town Districty', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301066', '1301066', 'Tundong Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301067', '1301067', 'Musi Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301068', '1301068', 'Tai Ton Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301069', '1301069', 'Bidi Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301070', '1301070', 'Krokong Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301071', '1301071', 'Pangkalan Tebang Town Dis', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301072', '1301072', 'Pejiru Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301073', '1301073', 'Tiang Bekap Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301074', '1301074', 'Baratok Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301075', '1301075', 'Tapah Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301076', '1301076', 'Siburan Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301077', '1301077', 'Terbat Town District', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101301078', '1301078', '17th Mile (senggang Road ', '11301', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302001', '1302001', 'Undup Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302002', '1302002', 'Klauh Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302003', '1302003', 'Bijat Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302004', '1302004', 'Skrang Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302005', '1302005', 'Keranggas Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302006', '1302006', 'Marup Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302007', '1302007', 'Lamanak Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302008', '1302008', 'Bukit Besai Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302009', '1302009', 'Ai Engkari Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302010', '1302010', 'Lesong Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302011', '1302011', 'Selanjang Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302012', '1302012', 'Silantek Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:49');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302024', '1302024', 'Sirnanggang District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302025', '1302025', 'Lingga Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302027', '1302027', 'Lubok Antu Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302028', '1302028', 'Engkilili Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302036', '1302036', 'Batu Lintang Town Distric', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302044', '1302044', 'Banting Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302045', '1302045', 'Pantu Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302050', '1302050', 'Bakong Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302052', '1302052', 'Undup Land District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302071', '1302071', 'Skrang Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302072', '1302072', 'Melugu Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101302073', '1302073', 'Sabu Town District', '11302', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303001', '1303001', 'Seduan Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303002', '1303002', 'Engkilo Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303003', '1303003', 'Pasai-Siong Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303004', '1303004', 'Assan Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303005', '1303005', 'Menyan Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303006', '1303006', 'Kabang Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303019', '1303019', 'Lukut Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303020', '1303020', 'Mapai Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303021', '1303021', 'Maroh Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303022', '1303022', 'Spali Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303037', '1303037', 'Qya-Dalat Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303038', '1303038', 'Spapa Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303039', '1303039', 'Paku Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303040', '1303040', 'Lalai Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303041', '1303041', 'Mukah Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:50');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303042', '1303042', 'Gigis Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303043', '1303043', 'Selangau Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303044', '1303044', 'Balingan Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303045', '1303045', 'Arip Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303046', '1303046', 'Pelugau Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303047', '1303047', 'Bawan Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303048', '1303048', 'Buloh Land', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303049', '1303049', 'Sibu Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303050', '1303050', 'Sengei Merah Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303051', '1303051', 'Teku Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303052', '1303052', 'Durin Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303060', '1303060', 'Kanowit Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303063', '1303063', 'Dap Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303065', '1303065', 'Machan Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303066', '1303066', 'Ngemah Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303068', '1303068', 'Sengayan Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101303080', '1303080', 'Sibintek Town', '11303', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304001', '1304001', 'Miri Concession Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304002', '1304002', 'Lutong Town', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304003', '1304003', 'Riam Road Bazaar Town', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304004', '1304004', 'Kuala Baram Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304005', '1304005', 'Kuala Baram Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304006', '1304006', 'Lambir Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304007', '1304007', 'Lambir Town', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304011', '1304011', 'Long Teru Town District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304013', '1304013', 'Puyut Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304015', '1304015', 'Bakong Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304018', '1304018', 'Telang Usang Land Distric', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304020', '1304020', 'Akah Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304021', '1304021', 'Dulit Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304023', '1304023', 'Sibuti Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304024', '1304024', 'Bulut Kisi Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304025', '1304025', 'Niah Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304029', '1304029', 'Suai Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304030', '1304030', 'Sawai Land District', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304044', '1304044', 'Tiada', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304049', '1304049', 'Kuala Nyabor Town', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304050', '1304050', 'Bareo Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304052', '1304052', 'Apoh Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304053', '1304053', 'Lio Matoh Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304056', '1304056', 'Silat Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304057', '1304057', 'Tutoh Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304058', '1304058', 'Patah Land', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:51');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304059', '1304059', 'Lepu Leju Town', '11304', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101304060', '1304060', 'Miri Concession Land Dist', '11304', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305001', '1305001', 'Danau Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305002', '1305002', 'Panaruan Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305003', '1305003', 'Trusan Land Dsitrict', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305004', '1305004', 'Lawas Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305005', '1305005', 'Merapok Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305006', '1305006', 'Limbang Town District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305007', '1305007', 'Danau Town District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305008', '1305008', 'Nanga Medamit Town Distri', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305009', '1305009', 'Trusan Town District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305010', '1305010', 'Lawas Town District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305011', '1305011', 'Merapok Town District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305012', '1305012', 'Ukong Town District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305013', '1305013', 'Sundar Town District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305014', '1305014', 'Sungai Adang Land Distric', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305015', '1305015', 'Long Napir Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305016', '1305016', 'Sungai Addang Land Distri', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305017', '1305017', 'Tengoa-Sukang Land Distri', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305018', '1305018', 'Long Nerarap Land Distric', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305019', '1305019', 'Long Semado Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305020', '1305020', 'Bakalalan Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101305021', '1305021', 'Batu Lawi Land District', '11305', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306005', '1306005', 'Menyan Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306007', '1306007', 'Serendang Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306010', '1306010', 'Maradong Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306011', '1306011', 'Tulai Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306012', '1306012', 'Sarikei Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306014', '1306014', 'Buan Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:52');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306015', '1306015', 'Sare Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306016', '1306016', 'Pedanum Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306017', '1306017', 'Melurun Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306018', '1306018', 'Jikang Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306019', '1306019', 'Lukut Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306020', '1306020', 'Mapai Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306021', '1306021', 'Maroh Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306022', '1306022', 'Spali Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306038', '1306038', 'Spapa Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306042', '1306042', 'Gigis Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306045', '1306045', 'Arip Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306048', '1306048', 'Buluh Land District', '11303', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306054', '1306054', 'Binatang Town District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306061', '1306061', 'Julau Town District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306062', '1306062', 'Pakan Town District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306074', '1306074', 'Selalang Town District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306077', '1306077', 'Gunung Ayer Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101306092', '1306092', 'Binatang Land District', '11306', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307023', '1307023', 'Katibas Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307024', '1307024', 'Ibau Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307025', '1307025', 'Menuan Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307026', '1307026', 'Suau Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307027', '1307027', 'Oyan Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307028', '1307028', 'Baning Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307029', '1307029', 'Majau Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307030', '1307030', 'Menral Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307031', '1307031', 'Metah Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307032', '1307032', 'Rirong Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307033', '1307033', 'Mamu Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307035', '1307035', 'Angkuah Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307036', '1307036', 'Pelagus Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307069', '1307069', 'Kapit Town District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307070', '1307070', 'Song Town District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:53');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307081', '1307081', 'Bangkit Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307082', '1307082', 'Batu Laga Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307083', '1307083', 'Pelanduk Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307084', '1307084', 'Entemu Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307085', '1307085', 'Mengiong Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307086', '1307086', 'Serani Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307087', '1307087', 'Balui Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307088', '1307088', 'Kumbong Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307089', '1307089', 'Murum Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307090', '1307090', 'Punan Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101307091', '1307091', 'Danum Land District', '11307', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308010', '1308010', 'Lesong Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308014', '1308014', 'Menuku Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308015', '1308015', 'Kayan Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308016', '1308016', 'Samarahan Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308017', '1308017', 'Muara Tuang Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308018', '1308018', 'Bukar-Sadong Land Distric', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308019', '1308019', 'Sungai Kedup Land Distric', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308020', '1308020', 'Melikin Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308021', '1308021', 'Sedilu-Gedong Land Distri', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308022', '1308022', 'Sadong Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308023', '1308023', 'Sebangan-Kepayan Land Dis', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308024', '1308024', 'Punda-Sabal Land District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:54');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308026', '1308026', 'Sebuyau Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308035', '1308035', 'Sungai Merah Town Distric', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308036', '1308036', 'Sunagai Merang Town Distr', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308037', '1308037', 'Sungai Palah Town Distric', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308039', '1308039', '29th Mile(simanggang Road)', '11308', '1', '1000', '100000', '2024-05-18 00:13:43', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308040', '1308040', '32nd Mile (Simanggang Road)', '11308', '1', '1000', '100000', '2024-05-18 00:14:21', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308041', '1308041', '34th Mile (Simanggang Road)', '11308', '1', '1000', '100000', '2024-05-18 00:14:41', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308042', '1308042', 'Serian Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308043', '1308043', 'Tebakang Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308044', '1308044', 'Muara Mongkos Town Distri', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308045', '1308045', 'Tedebu Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308046', '1308046', 'Balai Ringin Town Distric', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308047', '1308047', 'Tambirat Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308048', '1308048', 'Muara Tuang Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308052', '1308052', 'Simujan Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308053', '1308053', 'Gedong Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308054', '1308054', 'Sebangan Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:55');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308065', '1308065', 'Tebelu Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101308077', '1308077', 'Terbat Town District', '11308', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309031', '1309031', 'Bintulu Town District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309032', '1309032', 'Kemena Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309033', '1309033', 'Sebauh Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309034', '1309034', 'Lanang Town District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309035', '1309035', 'Pandan Town District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309036', '1309036', 'Tubau Town District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309038', '1309038', 'Selezu Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309039', '1309039', 'Batu Kapal Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309040', '1309040', 'Rasan Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309041', '1309041', 'Pandan Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309042', '1309042', 'Kuala Tatau Town District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309043', '1309043', 'Tatau Town District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309045', '1309045', 'Buan Lan District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309046', '1309046', 'Sangan Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309047', '1309047', 'Anap Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309048', '1309048', 'Kakus Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:56');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309054', '1309054', 'Jelalong Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101309055', '1309055', 'Binia Land District', '11309', '1', '100000', '100000', '2024-05-15 15:45:58', '2017-01-19 17:55:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310003', '1310003', 'Retus Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310006', '1310006', 'Lassa land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310007', '1310007', 'Semah Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310008', '1310008', 'Jemoreng Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310009', '1310009', 'Bruit Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310013', '1310013', 'Kedang Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310037', '1310037', 'Oya-Dalat Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310041', '1310041', 'Mukah Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310042', '1310042', 'Sikat Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310044', '1310044', 'Balingian Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310047', '1310047', 'Bawan Land District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310055', '1310055', 'Daro Town District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310056', '1310056', 'Matu Town District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101310075', '1310075', 'Rajang Town District', '11310', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311004', '1311004', 'Entaban Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311013', '1311013', 'Triso Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311015', '1311015', 'Awik-Krian Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311016', '1311016', 'Budu Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311017', '1311017', 'Seblak Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311018', '1311018', 'Kalaka Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311019', '1311019', 'Batu Api Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311020', '1311020', 'Sadok Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311022', '1311022', 'Sablor Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311029', '1311029', 'Betong Land District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311030', '1311030', 'Spaoh Town District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_bandar` VALUES ('101311031', '1311031', 'Debak Town District', '11311', '1', '0', '0', '2024-05-15 15:45:58', '2017-04-06 15:39:57');

-- ----------------------------
-- Table structure for `ddsa_kod_daerah`
-- ----------------------------
DROP TABLE IF EXISTS `ddsa_kod_daerah`;
CREATE TABLE `ddsa_kod_daerah` (
  `dae_daerah_id` int(6) NOT NULL AUTO_INCREMENT,
  `dae_kod_daerah` char(8) NOT NULL,
  `dae_nama_daerah` varchar(50) NOT NULL,
  `dae_kod_negeri` int(3) NOT NULL,
  `dae_status` int(1) NOT NULL DEFAULT 1,
  `dae_updby` int(6) NOT NULL,
  `dae_crtby` int(6) NOT NULL,
  `dae_upddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dae_log` datetime NOT NULL,
  PRIMARY KEY (`dae_daerah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11608 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of ddsa_kod_daerah
-- ----------------------------
INSERT INTO `ddsa_kod_daerah` VALUES ('10101', '0101', 'Batu Pahat', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10102', '0102', 'Johor Bahru', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10103', '0103', 'Kluang', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10104', '0104', 'Kota Tinggi', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10105', '0105', 'Mersing', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10106', '0106', 'Muar', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10107', '0107', 'Pontian', '101', '1', '1000', '100000', '2024-05-16 12:13:35', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10108', '0108', 'Segamat', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10110', '0110', 'Ledang', '101', '1', '0', '0', '2024-05-15 15:14:52', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('10121', '0121', 'Kulai', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10122', '0122', 'Tangkak', '101', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10201', '0201', 'Kota Setar', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10202', '0202', 'Kubang Pasu', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10203', '0203', 'Padang Terap', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10204', '0204', 'Langkawi', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10205', '0205', 'Kuala Muda', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10206', '0206', 'Yan', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10207', '0207', 'Sik', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10208', '0208', 'Baling', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10209', '0209', 'Kulim', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10210', '0210', 'Bandar Baharu', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10211', '0211', 'Pendang', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10212', '0212', 'Pokok Sena', '102', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10301', '0301', 'Bachok', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10302', '0302', 'Kota Bharu', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10303', '0303', 'Machang', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10304', '0304', 'Pasir Mas', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10305', '0305', 'Pasir Puteh', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10306', '0306', 'Tanah Merah', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10307', '0307', 'Tumpat', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10308', '0308', 'Gua Musang', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10310', '0310', 'Kuala Krai', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10311', '0311', 'Jeli', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10312', '0312', 'Kecil Lojing', '103', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10401', '0401', 'Melaka Tengah', '104', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10402', '0402', 'Jasin', '104', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10403', '0403', 'Alor Gajah', '104', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10501', '0501', 'Jelebu', '105', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10502', '0502', 'Kuala Pilah', '105', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10503', '0503', 'Port Dickson', '105', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10504', '0504', 'Rembau', '105', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10505', '0505', 'Seremban', '105', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10506', '0506', 'Tampin', '105', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10507', '0507', 'Jempol', '105', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10601', '0601', 'Bentong', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10602', '0602', 'Cameron Highlands', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10603', '0603', 'Jerantut', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10604', '0604', 'Kuantan', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10605', '0605', 'Lipis', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10606', '0606', 'Pekan', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10607', '0607', 'Raub', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10608', '0608', 'Temerloh', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10609', '0609', 'Rompin', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10610', '0610', 'Maran', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10611', '0611', 'Bera', '106', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10701', '0701', 'Seberang Perai Tengah', '107', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10702', '0702', 'Seberang Perai Utara', '107', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10703', '0703', 'Seberang Perai Selatan', '107', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10704', '0704', 'Timur Laut', '107', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10705', '0705', 'Barat Daya', '107', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10801', '0801', 'Batang Padang', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('10802', '0802', 'Manjung', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10803', '0803', 'Kinta', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10804', '0804', 'Kerian', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10805', '0805', 'Kuala Kangsar', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10806', '0806', 'Larut & Matang', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10807', '0807', 'Hilir Perak', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10808', '0808', 'Hulu Perak', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10809', '0809', 'Selama', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10810', '0810', 'Perak Tengah', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10811', '0811', 'Kampar', '108', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('10900', '0900', 'Perlis', '109', '1', '0', '0', '2024-05-15 15:14:52', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('11001', '1001', 'Klang', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11002', '1002', 'Kuala Langat', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11004', '1004', 'Kuala Selangor', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11005', '1005', 'Sabak Bernam', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11006', '1006', 'Ulu Langat', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11007', '1007', 'Hulu Selangor', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11008', '1008', 'Petaling', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11009', '1009', 'Gombak', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11010', '1010', 'Sepang', '110', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11101', '1101', 'Besut', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11102', '1102', 'Dungun', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11103', '1103', 'Kemaman', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11104', '1104', 'Kuala Terengganu', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11105', '1105', 'Hulu Terengganu', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11106', '1106', 'Marang', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11107', '1107', 'Setiu', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11108', '1108', 'Kuala Nerus', '111', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11201', '1201', 'Kota Kinabalu', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11202', '1202', 'Papar', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11203', '1203', 'Kota Belud', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11204', '1204', 'Tuaran', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11205', '1205', 'Kudat', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11206', '1206', 'Ranau', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11207', '1207', 'Sandakan', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11208', '1208', 'Labuk & Sugut', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11209', '1209', 'Kinabatangan', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11210', '1210', 'Tawau', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11211', '1211', 'Lahad Datu', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11212', '1212', 'Semporna', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11213', '1213', 'Keningau', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11214', '1214', 'Tambunan', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11215', '1215', 'Pensiangan', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11216', '1216', 'Tenom', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11217', '1217', 'Beaufort', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11218', '1218', 'Kuala Penyu', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11219', '1219', 'Sipitang', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11221', '1221', 'Penampang', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('11222', '1222', 'Kota Marudu', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11223', '1223', 'Pitas', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11224', '1224', 'Kunak', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11225', '1225', 'Tongod', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11226', '1226', 'Putatan', '112', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11301', '1301', 'Kuching', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11302', '1302', 'Sri Aman', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11303', '1303', 'Sibu', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11304', '1304', 'Miri', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11305', '1305', 'Limbang', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11306', '1306', 'Sarikei', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11307', '1307', 'Kapit', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11308', '1308', 'Samarahan', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11309', '1309', 'Bintulu', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11310', '1310', 'Mukah', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11311', '1311', 'Betong', '113', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('11400', '1400', 'Kuala Lumpur', '114', '1', '100000', '100000', '2024-05-15 15:14:52', '2017-01-19 17:44:43');
INSERT INTO `ddsa_kod_daerah` VALUES ('11401', '1401', 'Kuala Lumpur', '122', '1', '0', '0', '2024-05-15 15:14:52', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('11501', '1501', 'Labuan', '115', '1', '0', '0', '2024-05-15 15:14:52', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('11601', '1601', 'Putrajaya', '116', '1', '0', '0', '2024-05-15 15:14:52', '2017-04-06 15:39:57');

-- ----------------------------
-- Table structure for `ddsa_kod_negeri`
-- ----------------------------
DROP TABLE IF EXISTS `ddsa_kod_negeri`;
CREATE TABLE `ddsa_kod_negeri` (
  `neg_negeri_id` int(3) NOT NULL AUTO_INCREMENT,
  `neg_kod_negeri` char(2) NOT NULL,
  `neg_nama_negeri` varchar(50) NOT NULL,
  `neg_kod_zone` char(3) DEFAULT NULL,
  `neg_nama_zone` varchar(25) DEFAULT NULL,
  `neg_maps_code` char(5) DEFAULT NULL,
  `neg_status` int(1) NOT NULL DEFAULT 1,
  `neg_updby` int(6) NOT NULL,
  `neg_crtby` int(6) NOT NULL,
  `neg_upddt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `neg_log` datetime NOT NULL,
  PRIMARY KEY (`neg_negeri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of ddsa_kod_negeri
-- ----------------------------
INSERT INTO `ddsa_kod_negeri` VALUES ('101', '01', 'Johor', 'ZN3', 'Selatan', 'MY-01', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('102', '02', 'Kedah', 'ZN5', 'Utara', 'MY-02', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('103', '03', 'Kelantan', 'ZN2', 'Pantai Timur', 'MY-03', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('104', '04', 'Melaka', 'ZN3', 'Selatan', 'MY-04', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('105', '05', 'Negeri Sembilan', 'ZN3', 'Selatan', 'MY-05', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('106', '06', 'Pahang', 'ZN2', 'Pantai Timur', 'MY-06', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('107', '07', 'Pulau Pinang', 'ZN5', 'Utara', 'MY-07', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('108', '08', 'Perak', 'ZN5', 'Utara', 'MY-08', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('109', '09', 'Perlis', 'ZN5', 'Utara', 'MY-09', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('110', '10', 'Selangor', 'ZN4', 'Tengah', 'MY-10', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('111', '11', 'Terengganu', 'ZN2', 'Pantai Timur', 'MY-11', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('112', '12', 'Sabah', 'ZN1', 'Borneo', 'MY-12', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('113', '13', 'Sarawak', 'ZN1', 'Borneo', 'MY-13', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('114', '14', 'W.P. Kuala Lumpur', 'ZN4', 'Tengah', 'MY-14', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('115', '15', 'W.P. Labuan', 'ZN1', 'Borneo', 'MY-15', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('116', '16', 'W.P. Putrajaya', 'ZN4', 'Tengah', 'MY-16', '1', '1000', '1000', '2024-05-15 15:05:52', '2015-11-17 12:00:00');
INSERT INTO `ddsa_kod_negeri` VALUES ('117', '25', 'Test Negeri', null, null, null, '2', '1000', '1000', '2024-05-15 17:12:41', '2024-05-15 09:12:20');

-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_reset_tokens_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2024_05_20_025242_create_permission_tables', '2');

-- ----------------------------
-- Table structure for `model_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `model_has_roles`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('1', 'App\\Models\\User', '1');
INSERT INTO `model_has_roles` VALUES ('2', 'App\\Models\\User', '2');
INSERT INTO `model_has_roles` VALUES ('3', 'App\\Models\\User', '3');

-- ----------------------------
-- Table structure for `password_reset_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'view role', 'web', '2024-05-20 07:16:18', '2024-05-20 09:01:12');
INSERT INTO `permissions` VALUES ('2', 'create role', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('3', 'update role', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('4', 'delete role', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('5', 'view permission', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('6', 'create permission', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('7', 'update permission', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('8', 'delete permission', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('9', 'view user', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('10', 'create user', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('11', 'update user', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('12', 'delete user', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('13', 'view pentadbiran', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('14', 'create pentadbiran', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('15', 'update pentadbiran', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('16', 'delete pentadbiran', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `permissions` VALUES ('23', 'cubaan', 'web', '2024-05-21 04:22:05', '2024-05-21 04:22:05');

-- ----------------------------
-- Table structure for `personal_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super-admin', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `roles` VALUES ('2', 'admin', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `roles` VALUES ('3', 'staff', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');
INSERT INTO `roles` VALUES ('4', 'user', 'web', '2024-05-20 07:16:18', '2024-05-20 07:16:18');

-- ----------------------------
-- Table structure for `role_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('1', '1');
INSERT INTO `role_has_permissions` VALUES ('1', '2');
INSERT INTO `role_has_permissions` VALUES ('2', '1');
INSERT INTO `role_has_permissions` VALUES ('2', '2');
INSERT INTO `role_has_permissions` VALUES ('3', '1');
INSERT INTO `role_has_permissions` VALUES ('3', '2');
INSERT INTO `role_has_permissions` VALUES ('4', '1');
INSERT INTO `role_has_permissions` VALUES ('5', '1');
INSERT INTO `role_has_permissions` VALUES ('5', '2');
INSERT INTO `role_has_permissions` VALUES ('6', '1');
INSERT INTO `role_has_permissions` VALUES ('6', '2');
INSERT INTO `role_has_permissions` VALUES ('7', '1');
INSERT INTO `role_has_permissions` VALUES ('8', '1');
INSERT INTO `role_has_permissions` VALUES ('9', '1');
INSERT INTO `role_has_permissions` VALUES ('9', '2');
INSERT INTO `role_has_permissions` VALUES ('10', '1');
INSERT INTO `role_has_permissions` VALUES ('10', '2');
INSERT INTO `role_has_permissions` VALUES ('11', '1');
INSERT INTO `role_has_permissions` VALUES ('11', '2');
INSERT INTO `role_has_permissions` VALUES ('12', '1');
INSERT INTO `role_has_permissions` VALUES ('13', '1');
INSERT INTO `role_has_permissions` VALUES ('13', '2');
INSERT INTO `role_has_permissions` VALUES ('14', '1');
INSERT INTO `role_has_permissions` VALUES ('14', '2');
INSERT INTO `role_has_permissions` VALUES ('15', '1');
INSERT INTO `role_has_permissions` VALUES ('15', '2');
INSERT INTO `role_has_permissions` VALUES ('16', '1');

-- ----------------------------
-- Table structure for `tblfasiliti`
-- ----------------------------
DROP TABLE IF EXISTS `tblfasiliti`;
CREATE TABLE `tblfasiliti` (
  `fasiliti_id` int(8) NOT NULL AUTO_INCREMENT,
  `fas_ptj_code` varchar(8) DEFAULT NULL,
  `fas_name` varchar(150) NOT NULL,
  `fas_kat_kod` varchar(10) DEFAULT NULL,
  `fas_negeri_id` char(2) DEFAULT NULL,
  `fas_created_by` int(6) DEFAULT NULL,
  `fas_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fas_udated_by` int(6) DEFAULT NULL,
  `fas_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`fasiliti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000461 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of tblfasiliti
-- ----------------------------
INSERT INTO `tblfasiliti` VALUES ('10000000', '42010619', 'Kolej Sains Kesihatan Bersekutu Johor Bahru', 'ILKKM', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000001', '42010622', 'Kolej Jururawat Masyarakat Batu Pahat', 'ILKKM', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000002', '42090101', 'Hospital Sultanah Aminah, Johor Bahru', 'HN', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000003', '42090251', 'Pejabat Kesihatan Pergigian Daerah Johor Bahru', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000004', '42090252', 'Pejabat Kesihatan Pergigian Daerah Muar', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000005', '42090254', 'Pejabat Kesihatan Pergigian Daerah Kluang', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000006', '42090255', 'Pejabat Kesihatan Pergigian Daerah Segamat', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000007', '42090256', 'Pejabat Kesihatan Pergigian Daerah Pontian', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000008', '42090257', 'Pejabat Kesihatan Pergigian Daerah Kota Tinggi', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000009', '42090258', 'Pejabat Kesihatan Pergigian Daerah Mersing', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000010', '42090259', 'Pejabat Kesihatan Pergigian Daerah Ledang', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000011', '42090261', 'Pejabat Kesihatan Pergigian Daerah Batu Pahat', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000012', '42090301', 'Jabatan Kesihatan Negeri Johor (Farmasi)', 'JKN', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000013', '42090401', 'Hospital Pakar Sultanah Fatimah', 'PJ', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000014', '42090501', 'Hospital Batu Pahat', 'PJ', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000015', '42090601', 'Hospital Kluang', 'PN', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000016', '42090701', 'Hospital Segamat', 'PJ', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000017', '42090801', 'Hospital Pontian', 'TP', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000018', '42091101', 'Hospital Tangkak', 'TP', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000019', '42091201', 'Pejabat Kesihatan Daerah Johor Bahru', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000020', '42091301', 'Pejabat Kesihatan Daerah Muar', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000021', '42091501', 'Pejabat Kesihatan Daerah Kluang', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000022', '42091601', 'Pejabat Kesihatan Daerah Segamat', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000023', '42091701', 'Pejabat Kesihatan Daerah Pontian', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000024', '42091801', 'Pejabat kesihatan Daerah Kota Tinggi', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000025', '42091901', 'Pejabat Kesihatan Daerah Mersing', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000026', '42092101', 'Hospital Permai', 'PK', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000027', '42092201', 'Hospital Temenggong Sri Maharaja Tun Ibrahim, Kulai', 'TP', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000028', '42093001', 'Makmal Kesihatan Awam Johor Bahru', 'MKA', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000029', '42093101', 'Hospital Sultan Ismail', 'PJ', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000030', '42093161', 'Hospital Kota Tinggi', 'TP', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000031', '42093162', 'Hospital Mersing', 'TP', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000032', '42093201', 'Pejabat Kesihatan Daerah Tangkak', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000033', '42093301', 'Pejabat Kesihatan Daerah Kulai', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000034', '42093401', 'Pejabat Kesihatan Daerah Batu Pahat', 'PKD', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000035', '42099901', 'Jabatan Kesihatan Negeri Johor (Pengurusan)', 'JKN', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000036', '42090201', 'Pej. Timb. Pengarah Kesihatan Negeri Johor (Pergigian)', 'JKN', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000037', '42010621', 'Kolej Kejururawatan Muar', 'ILKKM', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000038', '42090260', 'Pejabat Kesihatan Pergigian Daerah Kulai Jaya', 'PKDG', '01', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000039', '42010607', 'Kolej Kejururawatan Alor Setar', 'ILKKM', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000040', '42010608', 'Kolej Pembantu Perubatan Alor Setar', 'ILKKM', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000041', '42030101', 'Hospital Sultanah Bahiyah', 'HN', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000042', '42030161', 'Hospital Jitra', 'TP', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000043', '42030162', 'Hospital Kuala Nerang', 'TP', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000044', '42030251', 'Pejabat Kesihatan Pergigian Daerah Kota Star', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000045', '42030252', 'Pejabat Kesihatan Pergigian Daerah Kubang Pasu', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000046', '42030253', 'Pejabat Kesihatan Pergigian Daerah Kulim', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000047', '42030254', 'Pejabat Kesihatan Pergigian Daerah Kuala Muda', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000048', '42030255', 'Pejabat Kesihatan Pergigian Daerah Baling', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000049', '42030256', 'Pejabat Kesihatan Pergigian Daerah Langkawi', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000050', '42030257', 'Pejabat Kesihatan Pergigian Daerah Padang Terap', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000051', '42030258', 'Pejabat Kesihatan Pergigian Daerah Yan', 'PKDG', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000052', '42030401', 'Hospital Sultan Abdul Halim, Sungai Petani', 'PJ', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000053', '42030501', 'Hospital Kulim', 'PJ', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000054', '42030601', 'Hospital Baling', 'TP', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000055', '42030701', 'Hospital Langkawi', 'PN', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000056', '42030801', 'Hospital Sik', 'TP', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000057', '42030901', 'Pejabat Kesihatan Daerah Kota Setar', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000058', '42031001', 'Pejabat Kesihatan Daerah Kuala Muda, Sungai Petani', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000059', '42031101', 'Pejabat Kesihatan Daerah Kubang Pasu, Jitra', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000060', '42031201', 'Pejabat Kesihatan Daerah Padang Terap, Kuala Nerang', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000061', '42031301', 'Pejabat Kesihatan Daerah Langkawi', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000062', '42031401', 'Pejabat Kesihatan Daerah Kulim', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000063', '42031501', 'Pejabat Kesihatan Daerah Baling', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000064', '42031901', 'Hospital Yan', 'TP', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000065', '42032101', 'Pejabat Kesihatan Daerah Pendang', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000066', '42032201', 'Pejabat Kesihatan Daerah Yan', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000067', '42032301', 'Pejabat Kesihatan Daerah Bandar Baru', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000068', '42032401', 'Pejabat Kesihatan Daerah Sik, Kuala Nerang', 'PKD', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000069', '42032901', 'Pejabat Kesihatan Daerah Bukit Kayu Hitam', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000070', '42039901', 'Jabatan Kesihatan Negeri Kedah (Pengurusan)', 'JKN', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000071', '42010606', 'Kolej Kejururawatan Sungai Petani', 'ILKKM', '02', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000072', '42010630', 'Kolej Kejururawatan Kubang Kerian', 'ILKKM', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000073', '42130101', 'Hospital Raja Perempuan Zainab II, Kota Bharu', 'HN', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000074', '42130161', 'Hospital Pasir Mas', 'TP', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000075', '42130162', 'Hospital Tengku Anis', 'TP', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000076', '42130163', 'Hospital Tumpat', 'TP', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000077', '42130201', 'Jabatan Kesihatan Negeri Kelantan (Pergigian)', 'JKN', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000078', '42130250', 'Pejabat Kesihatan Pergigian Daerah Gua Musang', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000079', '42130251', 'Pejabat Kesihatan Pergigian Daerah Kota Bharu', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000080', '42130253', 'Pejabat Kesihatan Pergigian Daerah Pasir Putih', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000081', '42130254', 'Pejabat Kesihatan Pergigian Daerah Machang', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000082', '42130255', 'Pejabat Kesihatan Pergigian Daerah Tanah Merah', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000083', '42130256', 'Pejabat Kesihatan Pergigian Daerah Kuala Krai', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000084', '42130257', 'Pejabat Kesihatan Pergigian Daerah Tumpat', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000085', '42130260', 'Pejabat Kesihatan Pergigian Daerah Pasir Mas', 'PKDG', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000086', '42130261', 'Pejabat Kesihatan Pergigian Daerah Jeli', 'PKDG', '04', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000087', '42130301', 'Jabatan Kesihatan Negeri Kelantan (Farmasi)', 'JKN', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000088', '42130401', 'Hospital Kuala Krai', 'PJ', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000089', '42130501', 'Hospital Machang', 'TP', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000090', '42130701', 'Hospital Tanah Merah', 'PJ', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000091', '42130901', 'Hospital Gua Musang', 'TP', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000092', '42131001', 'Pejabat Kesihatan Daerah Kota Bharu', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000093', '42131201', 'Pejabat Kesihatan Daerah Pasir Puteh', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000094', '42131301', 'Pejabat Kesihatan Daerah Machang', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000095', '42131401', 'Pejabat Kesihatan Daerah Bachok', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000096', '42131501', 'Pejabat Kesihatan Daerah Tanah Merah', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000097', '42131601', 'Pejabat Kesihatan Daerah Kuala Krai', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000098', '42131701', 'Pejabat Kesihatan Daerah Tumpat', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000099', '42131801', 'Pejabat Kesihatan Daerah Gua Musang', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000100', '42132501', 'Hospital Jeli', 'TP', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000101', '42132601', 'Pejabat Kesihatan Daerah Pasir Mas', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000102', '42132701', 'Pejabat Kesihatan Daerah Jeli', 'PKD', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000103', '42139901', 'Jabatan Kesihatan Negeri Kelantan (Pengurusan)', 'JKN', '03', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000104', '42080101', 'Hospital Melaka', 'HN', '04', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000105', '42080161', 'Hospital Jasin ', 'TP', '04', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000106', '42080162', 'Hospital Alor Gajah', 'TP', '04', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000107', '42080201', 'Pej. Timb. Pengarah Kesihatan Negeri Melaka (Pergigian)', 'JKN', '05', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000108', '42080251', 'Pejabat Kesihatan Pergigian Daerah Melaka Tengah', 'PKDG', '04', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000109', '42080252', 'Pejabat Kesihatan Pergigian Daerah Alor Gajah', 'PKDG', '04', null, '2023-08-04 10:13:02', null, '2023-08-04 10:13:02');
INSERT INTO `tblfasiliti` VALUES ('10000110', '42080253', 'Pejabat Kesihatan Pergigian Daerah Jasin', 'PKDG', '04', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000111', '42080301', 'Jabatan Kesihatan Negeri Melaka (Farmasi)', 'JKN', '04', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000112', '42080501', 'Pejabat Kesihatan Daerah Melaka Tengah', 'PKD', '04', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000113', '42080601', 'Pejabat Kesihatan Daerah Alor Gajah', 'PKD', '04', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000114', '42080701', 'Pejabat Kesihatan Daerah Jasin', 'PKD', '04', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000115', '42089901', 'Jabatan Kesihatan Negeri Melaka (Pengurusan)', 'JKN', '04', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000116', '42010618', 'Kolej Kejururawatan Melaka', 'ILKKM', '04', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000117', '42010615', 'Kolej Kejururawatan Kuala Pilah', 'ILKKM', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000118', '42010616', 'Kolej Pembantu Perubatan Seremban', 'ILKKM', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000119', '42070101', 'Hospital Tuanku Jaafar, Seremban', 'HN', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000120', '42070161', 'Hospital Port Dickson', 'PN', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000121', '42070162', 'Hospital Jelebu', 'TP', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000122', '42070163', 'Hospital Rembau', 'TP', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000123', '42070401', 'Hospital Tuanku Ampuan Najihah, Kuala Pilah', 'PJ', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000124', '42070461', 'Hospital Jempol', 'TP', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000125', '42070462', 'Hospital Tampin', 'TP', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000126', '42070801', 'Pejabat Kesihatan  Daerah Seremban', 'PKD', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000127', '42071401', 'Pejabat Kesihatan Daerah Rembau', 'PKD', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000128', '42072101', 'Pejabat Kesihatan Daerah Kuala Pilah', 'PKD', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000129', '42072201', 'Pejabat Kesihatan Daerah Tampin', 'PKD', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000130', '42072301', 'Pejabat Kesihatan Daerah Jempol', 'PKD', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000131', '42072401', 'Pejabat Kesihatan Daerah Port Dickson', 'PKD', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000132', '42072501', 'Pejabat Kesihatan Daerah Jelebu', 'PKD', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000133', '42072601', 'Bahagian Kesihatan Pergigian Negeri Sembilan', 'JKN', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000134', '42072651', 'Pejabat Kesihatan Pergigian Daerah Kuala Pilah', 'PKDG', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000135', '42072652', 'Pejabat Kesihatan Pergigian Daerah Tampin', 'PKDG', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000136', '42072653', 'Pejabat Kesihatan Pergigian Daerah Jempol', 'PKDG', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000137', '42072654', 'Pejabat Kesihatan Pergigian Daerah Port Dickson', 'PKDG', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000138', '42072655', 'Pejabat Kesihatan Pergigian Daerah Jelebu', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000139', '42072656', 'Pejabat Kesihatan Pergigian Daerah Seremban', 'PKDG', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000140', '42072657', 'Pejabat Kesihatan Pergigian Daerah Rembau', 'PKDG', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000141', '42079901', 'Jabatan Kesihatan Negeri N.Sembilan (Pengurusan)', 'JKN', '05', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000142', '42100101', 'Hospital Tengku Ampuan Afzan, Kuantan', 'HN', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000143', '42100201', 'Pej. Timb. Pengarah Kesihatan Negeri Pahang (Pergigian)', 'JKN', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000144', '42100251', 'Pejabat Kesihatan Pergigian Daerah Kuantan', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000145', '42100252', 'Pejabat Kesihatan Pergigian Daerah Pekan', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000146', '42100253', 'Pejabat Kesihatan Pergigian Daerah Temerloh', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000147', '42100254', 'Pejabat Kesihatan Pergigian Daerah Bentong', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000148', '42100255', 'Pejabat Kesihatan Pergigian Daerah Raub', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000149', '42100256', 'Pejabat Kesihatan Pergigian Daerah Kuala Lipis', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000150', '42100257', 'Pejabat Kesihatan Pergigian Daerah Cameron Highlands', 'PKDG', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000151', '42100258', 'Pejabat Kesihatan Pergigian Daerah Maran', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000152', '42100259', 'Pejabat Kesihatan Pergigian Daerah Rompin', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000153', '42100260', 'Pejabat Kesihatan Pergigian Daerah Jerantut', 'PKDG', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000154', '42100301', 'Jabatan Kesihatan Negeri Pahang (Farmasi)', 'JKN', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000155', '42100401', 'Hospital Pekan', 'PN', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000156', '42100501', 'Hospital Sultan Haji Ahmad Shah, Temerloh', 'PJ', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000157', '42100561', 'Hospital Jengka', 'TP', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000158', '42100562', 'Hospital Jerantut', 'TP', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000159', '42100563', 'Hospital Bentong', 'PN', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000160', '42100701', 'Hospital Kuala Lipis', 'PN', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000161', '42100801', 'Hospital Raub', 'TP', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000162', '42101001', 'Pejabat Kesihatan Daerah Maran', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000163', '42101101', 'Pejabat Kesihatan Daerah Kuantan', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000164', '42101201', 'Pejabat Kesihatan Daerah Pekan', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000165', '42101301', 'Pejabat Kesihatan Daerah Jerantut', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000166', '42101401', 'Pejabat Kesihatan Daerah Temerloh', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000167', '42101501', 'Pejabat Kesihatan Daerah Kuala Lipis', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000168', '42101601', 'Pejabat Kesihatan Daerah Raub', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000169', '42101701', 'Pejabat Kesihatan Daerah Bentong', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000170', '42101801', 'Pejabat Kesihatan Daerah Cameron Highlands', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000171', '42102101', 'Pejabat Kesihatan Daerah Rompin', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000172', '42102301', 'Hospital Muadzam Shah', 'TP', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000173', '42102401', 'Pejabat Kesihatan Daerah Bera', 'PKD', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000174', '42102701', 'Hospital Cameron Highlands', 'TP', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000175', '42102801', 'Hospital Rompin', 'TP', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000176', '42109901', 'Jabatan Kesihatan Negeri Pahang (Pengurusan)', 'JKN', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000177', '42010625', 'Kolej Kejururawatan Kuantan', 'ILKKM', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000178', '42100564', 'Hospital Bera', 'TP', '06', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000179', '42010611', 'Kolej Kejururawatan Bukit Mertajam', 'ILKKM', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000180', '42040101', 'Hospital Pulau Pinang', 'HN', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000181', '42040251', 'Pejabat Kesihatan Pergigian Daerah Timur Laut', 'PKDG', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000182', '42040252', 'Pejabat Kesihatan Pergigian Daerah Seberang Perai Utara', 'PKDG', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000183', '42040253', 'Pejabat Kesihatan Pergigian Daerah Seberang Perai Tengah', 'PKDG', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000184', '42040254', 'Pejabat Kesihatan Pergigian Daerah Seberang Perai Selatan', 'PKDG', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000185', '42040255', 'Pejabat Kesihatan Pergigian Daerah Barat Daya', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000186', '42040301', 'Jabatan Kesihatan Negeri P. Pinang (Farmasi)', 'JKN', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000187', '42040701', 'Hospital Balik Pulau', 'TP', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000188', '42040801', 'Pejabat Kesihatan Daerah Seberang Perai Utara, Butterworth', 'PKD', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000189', '42040901', 'Pejabat Kesihatan Daerah Seberang Perai Tengah, Bukit Mertajam', 'PKD', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000190', '42041001', 'Pejabat Kesihatan Daerah Seberang Perai Selatan, Sungai Jawi', 'PKD', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000191', '42041101', 'Pejabat Kesihatan Daerah Timur Laut Pulau Pinang', 'PKD', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000192', '42041201', 'Pejabat Kesihatan Daerah Barat Daya Pulau Pinang', 'PKD', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000193', '42041301', 'Pejabat Kesihatan Daerah Pelabuhan Pulau Pinang', 'PKD', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000194', '42041501', 'Hospital Seberang Jaya', 'PJ', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000195', '42041561', 'Hospital Kepala Batas', 'PN', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000196', '42041562', 'Hospital Bukit Mertajam ', 'PN', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000197', '42041563', 'Hospital Sungai Bakap', 'TP', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000198', '42049901', 'Jabatan Kesihatan Negeri Pulau Pinang (Pengurusan)', 'JKN', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000199', '42040201', 'Pej. Timb. Pengarah Kesihatan Negeri P. Pinang (Pergigian)', 'JKN', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000200', '42180201', 'Pusat Pergigian Kanak-kanak dan Kolej Latihan Pergigian Malaysia', 'ILKKM', '07', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000201', '42010614', 'Kolej Sains Kesihatan Bersekutu Ulu Kinta', 'ILKKM', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000202', '42050101', 'Hospital Raja Permaisuri Bainun, Ipoh', 'HN', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000203', '42050161', 'Hospital Kampar', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000204', '42050162', 'Hospital Batu Gajah', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000205', '42050163', 'Hospital Sungai Siput', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000206', '42050201', 'Jabatan Kesihatan Negeri Perak (Pergigian)', 'JKN', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000207', '42050251', 'Pejabat Kesihatan Pergigian Daerah Hilir Perak', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000208', '42050252', 'Pejabat Kesihatan Pergigian Daerah Larut Matang dan Selama', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000209', '42050253', 'Pejabat Kesihatan Pergigian Daerah Manjung', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000210', '42050254', 'Pejabat Kesihatan Pergigian Daerah Kinta', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000211', '42050256', 'Pejabat Kesihatan Pergigian Daerah Kuala Kangsar', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000212', '42050257', 'Pejabat Kesihatan Pergigian Daerah Batang Padang', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000213', '42050258', 'Pejabat Kesihatan Pergigian Daerah Kerian', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000214', '42050259', 'Pejabat Kesihatan Pergigian Daerah Perak Tengah', 'PKDG', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000215', '42050260', 'Pejabat Kesihatan Pergigian Daerah Hulu Perak', 'PKDG', '09', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000216', '42050262', 'Pejabat Kesihatan Pergigian Daerah Kampar', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000217', '42050301', 'Pej. Timb. Pengarah Kesihatan Negeri Perak (Farmasi)', 'JKN', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000218', '42050401', 'Hospital Teluk Intan', 'PJ', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000219', '42050801', 'Hospital Sri Manjung', 'PN', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000220', '42051001', 'Hospital Taiping', 'PJ', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000221', '42051061', 'Hospital Kuala Kangsar', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000222', '42051062', 'Hospital Gerik ', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000223', '42051063', 'Hospital Selama', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000224', '42051064', 'Hospital Parit Buntar', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000225', '42051201', 'Hospital Tapah', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000226', '42051401', 'Hospital Changkat Melintang', 'TP', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000227', '42051501', 'Pejabat Kesihatan Hilir Perak, Teluk Intan', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000228', '42051601', 'Pejabat Kesihatan Hulu Perak, Grik', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000229', '42051701', 'Pejabat Kesihatan Manjung, Sitiawan', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000230', '42051801', 'Pejabat Kesihatan Krian, Parit Buntar', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000231', '42051901', 'Pejabat Kesihatan Kuala Kangsar', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000232', '42052001', 'Pejabat Kesihatan Batang Padang, Tapah', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000233', '42052101', 'Pejabat Kesihatan Larut Matang dan Selama, Taiping', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000234', '42052201', 'Pejabat Kesihatan Kinta, Ipoh', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000235', '42052301', 'Pejabat Kesihatan Perak Tengah, Parit', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000236', '42052701', 'Hospital Bahagia Ulu Kinta', 'PK', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000237', '42053301', 'Hospital Slim River', 'PN', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000238', '42053401', 'Makmal Kesihatan Awam, Ipoh', 'MKA', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000239', '42053501', 'Pejabat Kesihatan Daerah Kampar', 'PKD', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000240', '42059901', 'Jabatan Kesihatan Negeri Perak (Pengurusan)', 'JKN', '08', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000241', '42010632', 'Kolej Jururawat Masyarakat Kangar ', 'ILKKM', '09', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000242', '42020101', 'Hospital Tuanku Fauziah', 'HN', '09', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000243', '42020201', 'Jabatan Kesihatan Negeri Perlis (Pergigian) ', 'JKN', '09', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000244', '42020301', 'Jabatan Kesihatan Negeri Perlis (Farmasi)', 'JKN', '09', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000245', '42020401', 'Pejabat Kesihatan Kangar', 'PKD', '09', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000246', '42029901', 'Jabatan Kesihatan Negeri Perlis (Pengurusan)', 'JKN', '09', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000247', '42060101', 'Hospital Tengku Ampuan Rahimah, Klang', 'HN', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000248', '42060161', 'Hospital Banting', 'PN', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000249', '42060162', 'Hospital Shah Alam', 'PJ', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000250', '42060201', 'Jabatan Kesihatan Negeri Selangor (Pergigian)', 'JKN', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000251', '42060251', 'Pejabat Kesihatan Pergigian Daerah Klang', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000252', '42060252', 'Pejabat Kesihatan Pergigian Daerah Kuala Selangor', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000253', '42060253', 'Pejabat Kesihatan Pergigian Daerah Hulu Langat', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000254', '42060254', 'Pejabat Kesihatan Pergigian Daerah Petaling', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000255', '42060255', 'Pejabat Kesihatan Pergigian Daerah Gombak', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000256', '42060257', 'Pejabat Kesihatan Pergigian Daerah Sepang', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000257', '42060258', 'Pejabat Kesihatan Pergigian Daerah Hulu Selangor', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000258', '42060259', 'Pejabat Kesihatan Pergigian Daerah Sabak Bernam', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000259', '42060260', 'Pejabat Kesihatan Pergigian Daerah Kuala Langat', 'PKDG', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000260', '42060301', 'Jabatan Kesihatan Negeri Selangor (Farmasi)', 'JKN', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000261', '42060401', 'Hospital Kajang', 'PJ', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000262', '42060601', 'Hospital Tanjung Karang', 'TP', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000263', '42060701', 'Hospital Kuala Kubu Baru', 'TP', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000264', '42060801', 'Pejabat Kesihatan Gombak', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000265', '42060901', 'Pejabat Kesihatan Petaling', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000266', '42061001', 'Pejabat Kesihatan Kuala Selangor', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000267', '42061101', 'Pejabat Kesihatan Hulu Langat', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000268', '42061201', 'Pejabat Kesihatan Sepang', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000269', '42061301', 'Pejabat Kesihatan Sabak Bernam', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000270', '42061401', 'Pejabat Kesihatan Hulu Selangor', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000271', '42061501', 'Pejabat Kesihatan Klang', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000272', '42061701', 'Pejabat Kesihatan Pelabuhan Klang', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000273', '42061801', 'Pejabat Kesihatan Lapangan Terbang Antarabangsa KL', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000274', '42062001', 'Hospital Tengku Ampuan Jemaah, Sabak Bernam', 'TP', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000275', '42062401', 'Hospital Sungai Buloh', 'PJ', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000276', '42062601', 'Hospital Selayang', 'PJ', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000277', '42062701', 'Hospital Ampang', 'PJ', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000278', '42062801', 'Hospital Serdang', 'PJ', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000279', '42062901', 'Hospital Orang Asli Gombak', 'TP', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000280', '42063101', 'Pejabat Kesihatan Kuala Langat', 'PKD', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000281', '42069901', 'Jabatan Kesihatan Negeri Selangor (Pengurusan)', 'JKN', '10', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000282', '42120101', 'Hospital Sultanah Nur Zahirah, Kuala Terengganu', 'HN', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000283', '42120161', 'Hospital Besut', 'TP', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000284', '42120162', 'Hospital Setiu', 'TP', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000285', '42120163', 'Hospital Hulu Terengganu', 'TP', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000286', '42120201', 'Jabatan Kesihatan Negeri Terengganu (Pergigian)', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000287', '42120202', 'Pejabat Kesihatan Pergigian Daerah Kuala Nerus', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000288', '42120251', 'Pejabat Kesihatan Pergigian Daerah Kuala Terengganu', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000289', '42120252', 'Pejabat Kesihatan Pergigian Daerah Dungun', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000290', '42120253', 'Pejabat Kesihatan Pergigian Daerah Hulu Terengganu', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000291', '42120254', 'Pejabat Kesihatan Pergigian Daerah Kemaman', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000292', '42120255', 'Pejabat Kesihatan Pergigian Daerah Besut', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000293', '42120256', 'Pejabat Kesihatan Pergigian Daerah Marang ', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000294', '42120257', 'Pejabat Kesihatan Pergigian Daerah Setiu', 'PKDG', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000295', '42120301', 'Jabatan Kesihatan Negeri Terengganu (Farmasi)', 'JKN', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000296', '42120501', 'Hospital Dungun', 'TP', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000297', '42120601', 'Hospital Kemaman', 'PJ', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000298', '42120701', 'Pejabat Kesihatan Kuala Terengganu', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000299', '42120801', 'Pejabat Kesihatan Hulu Terengganu', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000300', '42120901', 'Pejabat Kesihatan Besut', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000301', '42121001', 'Pejabat Kesihatan Dungun', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000302', '42121101', 'Pejabat Kesihatan Kemaman', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000303', '42121201', 'Pejabat Kesihatan Marang', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000304', '42121401', 'Pejabat Kesihatan Kuala Nerus', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000305', '42121701', 'Pejabat Kesihatan Setiu', 'PKD', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000306', '42129901', 'Jabatan Kesihatan Negeri Terengganu (Pengurusan)', 'JKN', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000307', '42010628', 'Kolej Kejururawatan Kuala Terengganu', 'ILKKM', '11', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000308', '42010633', 'Kolej Sains Kesihatan Bersekutu Kota Kinabalu', 'ILKKM', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000309', '42140101', 'Hospital Queen Elizabeth, Kota Kinabalu', 'HN', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000310', '42140201', 'Jabatan Kesihatan Negeri Sabah (Pergigian)', 'JKN', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000311', '42140252', 'Pejabat Kesihatan Pergigian Kawasan Tawau', 'PKDG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000312', '42140254', 'Pejabat Kesihatan Pergigian Kawasan Kota Kinabalu', 'PKDG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000313', '42140256', 'Pejabat Kesihatan Pergigian Kawasan Beaufort', 'PKDG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000314', '42140257', 'Pejabat Kesihatan Pergigian Kawasan Kudat', 'PKDG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000315', '42140259', 'Pejabat Kesihatan Pergigian Kawasan Penampang', 'PKDG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000316', '42140260', 'Pejabat Kesihatan Pergigian Kawasan Kota Belud', 'PKDG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000317', '42140301', 'Jabatan Kesihatan Negeri Sabah (Farmasi)', 'JKN', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000318', '42140601', 'Hospital Kudat', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000319', '42140701', 'Hospital Kota Belud', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000320', '42140801', 'Hospital Papar', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000321', '42140901', 'Hospital Beaufort', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000322', '42141101', 'Hospital Ranau', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000323', '42141801', 'Hospital Mesra Bukit Padang, Kota Kinabalu', 'PK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000324', '42142001', 'Pejabat Kesihatan Kawasan Kota Kinabalu', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000325', '42142401', 'Pejabat Kesihatan Kawasan Kudat ', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000326', '42142501', 'Pejabat Kesihatan Kawasan Tuaran', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000327', '42142701', 'Pejabat Kesihatan Kawasan Beaufort', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000328', '42143401', 'Makmal Kesihatan Awam Kota Kinabalu (MKAKK)', 'MKA', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000329', '42143501', 'Hospital Sipitang', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000330', '42143601', 'Hospital Kota Marudu', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000331', '42143701', 'Hospital Tuaran', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000332', '42144001', 'Hospital Wanita dan Kanak-Kanak Sabah', 'PK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000333', '42144101', 'Hospital Pitas', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000334', '42144301', 'Hospital Kuala Penyu', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000335', '42144601', 'Pejabat Kesihatan Kawasan Penampang', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000336', '42144701', 'Hospital Queen Elizabeth II', 'PJ', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000337', '42145001', 'Pejabat Kesihatan Daerah Papar', 'PKD', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000338', '42149901', 'Jabatan Kesihatan Negeri Sabah (Pengurusan)', 'JKN', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000339', '42140253', 'Pejabat Kesihatan Pergigian Kawasan Keningau', 'PKKG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000340', '42141201', 'Hospital Tambunan', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000341', '42141301', 'Hospital Keningau', 'PN', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000342', '42142301', 'Pejabat Kesihatan Kawasan Keningau', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000343', '42144401', 'Hospital Tenom', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000344', '42010634', 'Kolej Kejururawatan Sandakan', 'ILKKM', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000345', '42140251', 'Pejabat Kesihatan Pergigian Kawasan Sandakan', 'PKKG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000346', '42140401', 'Hospital Duchess Of Kent, Sandakan', 'PJ', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000347', '42141501', 'Hospital Beluran', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000348', '42142101', 'Pejabat Kesihatan Kawasan Sandakan', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000349', '42142901', 'Pejabat Kesihatan Kawasan Beluran', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000350', '42143801', 'Pejabat Kesihatan Kawasan Kota Kinabatangan', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000351', '42143901', 'Hospital Kota Kinabatangan', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000352', '42010635', 'Kolej Jururawat Masyarakat Tawau', 'ILKKM', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000353', '42140255', 'Pejabat Kesihatan Pergigian Kawasan Lahad Datu', 'PKKG', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000354', '42140501', 'Hospital Tawau', 'PJ', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000355', '42140561', 'Hospital Semporna', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000356', '42140562', 'Hospital Kunak', 'TP', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000357', '42140563', 'Hospital Lahad Datu ', 'PN', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000358', '42142201', 'Pejabat Kesihatan Kawasan Tawau', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000359', '42142801', 'Pejabat Kesihatan Kawasan Lahad Datu', 'PKK', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000360', '42144801', 'Pejabat Kesihatan Daerah Semporna', 'PKD', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000361', '42144901', 'Pejabat Kesihatan Daerah Kunak', 'PKD', '12', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000362', '42280101', 'Hospital Labuan', 'PN', '15', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000363', '42289901', 'Jabatan Kesihatan WP Labuan (Pengurusan)', 'JKN', '15', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000364', '42010636', 'Kolej Sains Kesihatan Bersekutu Kuching', 'ILKKM', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000365', '42010638', 'Kolej Kesihatan Awam Kuching', 'ILKKM', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000366', '42150101', 'Hospital Umum Sarawak, Kuching', 'HN', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000367', '42150401', 'Pejabat Kesihatan Bahagian Serian Sarawak ', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000368', '42150501', 'Hospital Raja Charles Brooke (RCBM)', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000369', '42150601', 'Hospital Sentosa, Kuching', 'PK', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000370', '42150701', 'Pejabat Kesihatan Bahagian Kuching', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000371', '42152001', 'Hospital Lundu', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000372', '42152101', 'Hospital Serian', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000373', '42152201', 'Hospital Simunjan', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000374', '42153401', 'Hospital Bau', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000375', '42153801', 'Pejabat Kesihatan Bahagian Kota Samarahan', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000376', '42154601', 'Cawangan Farmasi Logistik Negeri Sarawak', 'PF', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000377', '42154901', 'Pusat Jantung Sarawak', 'PK', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000378', '42159901', 'Jabatan Kesihatan Negeri Sarawak (Pengurusan)', 'JKN', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000379', '42150801', 'Pejabat Kesihatan Bahagian Sri Aman', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000380', '42151401', 'Hospital Bahagian Sri Aman', 'PN', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000381', '42152301', 'Hospital Saratok', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000382', '42153601', 'Hospital Betong', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000383', '42154001', 'Pejabat Farmasi Bahagian Sri Aman', 'PF', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000384', '42154801', 'Pejabat Kesihatan Bahagian Betong', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000385', '42010639', 'Kolej Kejururawatan Sibu', 'ILKKM', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000386', '42150249', 'Pejabat Kesihatan Pergigian Bahagian Sibu', 'PKBG', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000387', '42150259', 'Pejabat Kesihatan Pergigian Bahagian Kapit', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000388', '42150901', 'Pejabat Kesihatan Bahagian Sibu', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000389', '42151501', 'Hospital Bahagian Sibu', 'PJ', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000390', '42152401', 'Hospital Mukah', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000391', '42152801', 'Hospital Dalat', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000392', '42152901', 'Hospital Daerah Kanowit', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000393', '42154101', 'Pejabat Farmasi Bahagian Sibu', 'PF', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000394', '42154701', 'Pejabat Kesihatan Bahagian Mukah', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000395', '42151001', 'Pejabat Kesihatan Bahagian Miri (Pengurusan)', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000396', '42151004', 'Pejabat Kesihatan Bahagian Miri (Unit Pesakit Luar)', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000397', '42151601', 'Hospital Bahagian Miri', 'PJ', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000398', '42152601', 'Hospital Baram / Marudi', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000399', '42154201', 'Pejabat Farmasi Bahagian Miri', 'PF', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000400', '42151101', 'Pejabat Kesihatan Bahagian Limbang', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000401', '42151701', 'Hospital Bahagian Limbang', 'PN', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000402', '42152701', 'Hospital Lawas', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000403', '42154401', 'Pejabat Farmasi Bahagian Limbang', 'PF', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000404', '42151201', 'Pejabat Kesihatan Bahagian Sarikei', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000405', '42151801', 'Hospital Bahagian Sarikei', 'PN', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000406', '42153501', 'Hospital Daro', 'TP', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000407', '42154301', 'Pejabat Farmasi Bahagian Sarikei', 'PF', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000408', '42151301', 'Pejabat Kesihatan Bahagian Kapit', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000409', '42151901', 'Hospital Bahagian Kapit', 'PN', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000410', '42154501', 'Pejabat Farmasi Bahagian Kapit', 'PF', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000411', '42152501', 'Hospital Bintulu', 'PJ', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000412', '42153901', 'Pejabat Kesihatan Bahagian Bintulu', 'PKB', '13', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000413', '42010103', 'Bahagian Khidmat Pengurusan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000414', '42010115', 'Bahagian Pembangunan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000415', '42010202', 'Bahagian Sumber Manusia', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000416', '42010306', 'Bahagian Kewangan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000417', '42010401', 'Bahagian Perancangan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000418', '42010501', 'Program Perkhidmatan Farmasi', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000419', '42010901', 'Bahagian Perkhidmatan Kejuruteraan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000420', '42011001', 'Bahagian Kesihatan Pergigian', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000421', '42011201', 'Bahagian Pengurusan Maklumat', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000422', '42011301', 'Bahagian Perubatan Tradisional & Komplementari (T/CM)', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000423', '42011401', 'Bahagian Pembangunan Kompentensi', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000424', '42011501', 'Bahagian Kejururawatan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000425', '42011701', 'Program Keslematan & Kualiti Makanan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000426', '42011801', 'Cawangan Audit Dalam', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000427', '42012101', 'Bahagian Perolehan dan Penswastaan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000429', '42010801', 'Pejabat Timbalan Ketua Pengarah Kesihatan (Awam)', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000430', '42010601', 'Bahagian Pengurusan Latihan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000431', '42010605', 'Institut Latihan KKM Kementerian Kesihatan Malaysia (KSKB. S. BULOH)', 'ILKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000432', '42010631', 'Institut Latihan Kementerian Kesihatan Malaysia (Kolej Teknologi Makmal Perubatan)', 'ILKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000433', '42010701', 'Ibu Pejabat Program Perubatan', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000434', '42010806', 'Makmal Kesihatan Awam Kebangsaan Sungai Buloh', 'MKA', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000435', '42011901', 'Bahagian Dasar dan Hubungan Antarabangsa1', 'IPKKM', '14', null, '2023-08-04 10:13:03', '4', '2023-10-23 03:38:17');
INSERT INTO `tblfasiliti` VALUES ('10000436', '42230201', 'Bahagian Regulatori Farmasi Negara (NPRA)', 'IPKKM', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000437', '42240201', 'Hospital Kuala Lumpur', 'HN', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000438', '42240301', 'Institut Perubatan Respiratori', 'PK', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000439', '42240601', 'Jabatan Patologi, HKL', 'HN', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000440', '42240701', 'Jabatan Farmasi, HKL', 'HN', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000441', '42240801', 'Jabatan Perubatan Am, HKL', 'HN', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000442', '42240901', 'Jabatan Dietetik & Sajian, HKL', 'HN', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000443', '42241001', 'Hospital Wanita dan Kanak-Kanak Kuala Lumpur (Hospital Tunku Azizah)', 'PK', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000444', '42250101', 'Pusat Darah Negara', 'INS', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000445', '42270101', 'Hospital Putrajaya', 'PJ', '16', null, '2023-08-04 10:13:03', null, '2023-09-15 12:26:48');
INSERT INTO `tblfasiliti` VALUES ('10000446', '42270201', 'Pejabat Timbalan Pengarah Kesihatan W.P. (Pergigian)', 'JKN', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000447', '42270401', 'Pejabat Kesihatan Putrajaya', 'PKD', '16', null, '2023-08-04 10:13:03', null, '2023-09-15 12:26:54');
INSERT INTO `tblfasiliti` VALUES ('10000448', '42270501', 'Hospital Rehabilitasi Cheras', 'PK', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000449', '42270601', 'Pejabat Kesihatan Lembah Pantai', 'PKD', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000450', '42270701', 'Pejabat Kesihatan Cheras', 'PKD', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000451', '42270801', 'Pejabat Kesihatan Titiwangsa', 'PKD', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000452', '42270901', 'Pejabat Kesihatan Kepong', 'PKD', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000453', '42279901', 'Pejabat Tim. Pengarah Kesihatan W.P. (Pengurusan)', 'PKD', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000454', '42290101', 'Institut Kanser Negara (IKN)', 'PK', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000455', '42300101', 'Institut Kesihatan Negara (NIH)', 'INS', '14', null, '2023-08-04 10:13:03', null, '2023-08-04 10:13:03');
INSERT INTO `tblfasiliti` VALUES ('10000456', '42012201', 'ibu pejabat KKM', 'IPKKM', '16', '4', '2023-10-23 02:44:01', '4', '2023-10-23 02:46:36');
INSERT INTO `tblfasiliti` VALUES ('10000457', '42010303', 'hospital', 'IPKKM', '16', '4', '2023-10-23 02:44:12', '4', '2023-10-23 02:44:12');
INSERT INTO `tblfasiliti` VALUES ('10000458', '4200156', 'HOSPITAL PRESINT 3', 'HN', '16', '4', '2023-10-23 02:44:20', '4', '2023-10-23 02:45:48');
INSERT INTO `tblfasiliti` VALUES ('10000460', '42011001', 'pergigian', 'IPKKM', '16', '4', '2023-10-23 03:37:12', '4', '2023-10-23 03:37:12');

-- ----------------------------
-- Table structure for `tblfasiliti_kategori`
-- ----------------------------
DROP TABLE IF EXISTS `tblfasiliti_kategori`;
CREATE TABLE `tblfasiliti_kategori` (
  `faskat_id` int(3) NOT NULL AUTO_INCREMENT,
  `faskat_kod` varchar(10) NOT NULL,
  `faskat_desc` varchar(150) NOT NULL,
  `faskat_status` tinyint(1) NOT NULL DEFAULT 1,
  `faskat_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`faskat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of tblfasiliti_kategori
-- ----------------------------
INSERT INTO `tblfasiliti_kategori` VALUES ('100', 'ILKKM', 'Institut Latihan KKM', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('101', 'HN', 'Hospital Negeri', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('102', 'PKDG', 'Pejabat Kesihatan Daerah (Pergigian)', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('103', 'JKN', 'Jabatan Kesihatan Negeri (Farmasi)', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('104', 'PJ', 'Hospital Daerah Pakar (Major)', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('105', 'PN', 'Hospital Daerah Pakar (Minor)', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('106', 'TP', 'Hospital Tanpa Pakar', '2', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('107', 'PKD', 'Pejabat Kesihatan Daerah', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('108', 'PK', 'Institusi Perubatan Khas', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('109', 'MKA', 'Makmal Kesihatan Awam', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('110', 'PKK', 'Pejabat Kesihatan Kawasan', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('111', 'PKKG', 'Pejabat Kesihatan Kawasan (Pergigian)', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('112', 'PKB', 'Pejabat Kesihatan Bahagian', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('113', 'PF', 'Pejabat Farmasi', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('114', 'PKBG', 'Pejabat Kesihatan Bahagian (Pergigian)', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('115', 'IPKKM', 'Ibu Pejabat KKM', '1', '2023-08-04 09:56:19');
INSERT INTO `tblfasiliti_kategori` VALUES ('116', 'INS', 'Institusi', '1', '2023-08-04 09:56:19');

-- ----------------------------
-- Table structure for `tblperihal_projek`
-- ----------------------------
DROP TABLE IF EXISTS `tblperihal_projek`;
CREATE TABLE `tblperihal_projek` (
  `perihal_id` int(6) NOT NULL AUTO_INCREMENT,
  `per_projek_id` int(12) NOT NULL,
  `per_perihal` varchar(25) NOT NULL COMMENT 'Surat, Memo, Emel',
  `per_date` date DEFAULT NULL,
  `per_catatan` varchar(255) DEFAULT NULL,
  `per_created_by` int(6) NOT NULL,
  `per_updated_by` int(6) NOT NULL,
  `per_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `per_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`perihal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tblperihal_projek
-- ----------------------------

-- ----------------------------
-- Table structure for `tblprojek`
-- ----------------------------
DROP TABLE IF EXISTS `tblprojek`;
CREATE TABLE `tblprojek` (
  `projek_id` int(12) NOT NULL AUTO_INCREMENT,
  `proj_bulan` varchar(15) NOT NULL,
  `proj_program_id` int(6) DEFAULT NULL,
  `proj_kategori_id` int(4) DEFAULT NULL,
  `projek_fasiliti_id` int(4) DEFAULT NULL,
  `proj_nama` varchar(255) NOT NULL,
  `proj_butiran` text DEFAULT NULL,
  `proj_catatan` text DEFAULT NULL,
  `proj_peruntukan_lulus` decimal(14,2) DEFAULT NULL,
  `proj_waran_diperaku` decimal(14,2) DEFAULT NULL,
  `proj_waran_no` varchar(25) DEFAULT NULL,
  `proj_waran_tarikh` date DEFAULT NULL,
  `proj_kos_sebenar` decimal(14,2) DEFAULT NULL,
  `proj_jimat` decimal(10,2) DEFAULT NULL,
  `proj_pelaksanaan` varchar(255) DEFAULT NULL,
  `proj_status` tinyint(1) DEFAULT 1 COMMENT '1-Aktif, 2-Tidak Aktif',
  `proj_created_by` int(6) NOT NULL,
  `proj_updated_by` int(6) NOT NULL,
  `proj_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `proj_updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`projek_id`),
  KEY `projek_nama` (`proj_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tblprojek
-- ----------------------------

-- ----------------------------
-- Table structure for `tblprojek_kategori`
-- ----------------------------
DROP TABLE IF EXISTS `tblprojek_kategori`;
CREATE TABLE `tblprojek_kategori` (
  `proj_kategori_id` int(4) NOT NULL AUTO_INCREMENT,
  `pro_kat_nama` varchar(50) NOT NULL,
  `pro_kat_status` tinyint(1) NOT NULL DEFAULT 1,
  `pro_kat_created_by` int(6) NOT NULL,
  `pro_kat_updated_by` int(6) NOT NULL,
  `pro_kat_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_kat_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`proj_kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tblprojek_kategori
-- ----------------------------
INSERT INTO `tblprojek_kategori` VALUES ('1', 'PROJEK TIDAK LEPAS BAYAR 2023', '1', '100000', '100000', '2024-05-16 23:39:12', '2024-05-16 23:39:12');
INSERT INTO `tblprojek_kategori` VALUES ('2', 'PROJEK DALAM PERLAKSANAAN (PROJEK SAMBUNGAN / REVO', '1', '100000', '100000', '2024-05-16 23:39:37', '2024-05-16 23:39:37');
INSERT INTO `tblprojek_kategori` VALUES ('3', 'PROJEK PENGURUSAN TERTINGGI ( YBMK, TYBMK 1, TYBMK', '1', '100000', '100000', '2024-05-16 23:40:16', '2024-05-16 23:40:16');
INSERT INTO `tblprojek_kategori` VALUES ('4', ' PROJEK BARU (FASA 1)', '1', '100000', '100000', '2024-05-16 23:40:39', '2024-05-16 23:40:39');
INSERT INTO `tblprojek_kategori` VALUES ('5', ' PROJEK BARU (RUNCIT / BERASINGAN)', '1', '100000', '100000', '2024-05-16 23:41:02', '2024-05-16 23:41:02');
INSERT INTO `tblprojek_kategori` VALUES ('6', 'DARURAT AP173.2 (BANJIR)', '1', '100000', '100000', '2024-05-16 23:41:23', '2024-05-16 23:41:23');
INSERT INTO `tblprojek_kategori` VALUES ('7', 'DARURAT AP173.2 (COVID19 & BANJIR)', '1', '100000', '100000', '2024-05-16 23:42:02', '2024-05-16 23:42:02');

-- ----------------------------
-- Table structure for `tblprojek_program`
-- ----------------------------
DROP TABLE IF EXISTS `tblprojek_program`;
CREATE TABLE `tblprojek_program` (
  `proj_program_id` int(6) NOT NULL AUTO_INCREMENT,
  `pro_prog_nama` varchar(100) NOT NULL,
  `pro_proj_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-Aktif, 2-Tidak Aktif',
  `pro_proj_created_by` int(6) NOT NULL,
  `pro_proj_updated_by` int(6) NOT NULL,
  `pro_proj_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_proj_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`proj_program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tblprojek_program
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Super Admin', 'superadmin@gmail.com', null, '$2y$10$P0.Zb3a2wBPRxdn4.getD.ZOQc/z0pDpi4js.D/Odk0rX1idNm7Ei', null, '2024-05-20 07:16:19', '2024-05-20 07:16:19');
INSERT INTO `users` VALUES ('2', 'Admin', 'admin@gmail.com', null, '$2y$10$Aygdiof4.eGmtgqZyter8e1mJkfGqcQCNVRqebcrTQ99gqlzA08nC', null, '2024-05-20 07:16:19', '2024-05-20 07:16:19');
INSERT INTO `users` VALUES ('3', 'Staff', 'staff@gmail.com', null, '$2y$10$zFhsWVFjzEFNjU/p6tQ/n.C79lrVuv4K0wkIdyxk5YnrhX6PxLiJ.', null, '2024-05-20 07:16:19', '2024-05-20 07:16:19');
