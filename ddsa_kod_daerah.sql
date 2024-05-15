/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pd_ede

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-15 15:10:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ddsa_kod_daerah`
-- ----------------------------
DROP TABLE IF EXISTS `ddsa_kod_daerah`;
CREATE TABLE `ddsa_kod_daerah` (
  `dae_daerah_id` int(6) NOT NULL AUTO_INCREMENT,
  `dae_kod_daerah` char(8) NOT NULL,
  `dae_nama_daerah` varchar(50) NOT NULL,
  `dae_kod_negeri` char(3) NOT NULL,
  `dae_status` int(1) NOT NULL DEFAULT 1,
  `dae_updby` int(6) NOT NULL,
  `dae_crtby` int(6) NOT NULL,
  `dae_upddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dae_log` datetime NOT NULL,
  PRIMARY KEY (`dae_daerah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of ddsa_kod_daerah
-- ----------------------------
INSERT INTO `ddsa_kod_daerah` VALUES ('1', '0101', 'Batu Pahat', '01', '1', '100000', '100000', '2017-03-16 14:08:54', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('2', '0102', 'Johor Bahru', '01', '1', '100000', '100000', '2017-03-16 14:09:02', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('3', '0103', 'Kluang', '01', '1', '100000', '100000', '2017-03-16 14:09:08', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('4', '0104', 'Kota Tinggi', '01', '1', '100000', '100000', '2017-03-16 14:09:15', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('5', '0105', 'Mersing', '01', '1', '100000', '100000', '2017-03-16 14:09:20', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('6', '0106', 'Muar', '01', '1', '100000', '100000', '2017-03-16 14:09:26', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('7', '0107', 'Pontian', '01', '1', '100000', '100000', '2017-03-16 14:09:32', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('8', '0108', 'Segamat', '01', '1', '100000', '100000', '2017-03-16 14:09:37', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('9', '0121', 'Kulai', '01', '1', '100000', '100000', '2017-03-16 14:09:42', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('10', '0122', 'Tangkak', '01', '1', '100000', '100000', '2017-03-16 14:09:48', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('11', '0201', 'Kota Setar', '02', '1', '100000', '100000', '2017-03-16 14:09:55', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('12', '0202', 'Kubang Pasu', '02', '1', '100000', '100000', '2017-03-16 14:10:03', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('13', '0203', 'Padang Terap', '02', '1', '100000', '100000', '2017-03-16 14:10:10', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('14', '0204', 'Langkawi', '02', '1', '100000', '100000', '2017-03-16 14:10:16', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('15', '0205', 'Kuala Muda', '02', '1', '100000', '100000', '2017-03-16 14:10:22', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('16', '0206', 'Yan', '02', '1', '100000', '100000', '2017-03-16 14:10:27', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('17', '0207', 'Sik', '02', '1', '100000', '100000', '2017-03-16 14:10:31', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('18', '0208', 'Baling', '02', '1', '100000', '100000', '2017-03-16 14:10:36', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('19', '0209', 'Kulim', '02', '1', '100000', '100000', '2017-03-16 14:10:45', '2017-01-19 17:44:39');
INSERT INTO `ddsa_kod_daerah` VALUES ('20', '0210', 'Bandar Baharu', '02', '1', '100000', '100000', '2017-03-16 14:10:52', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('21', '0211', 'Pendang', '02', '1', '100000', '100000', '2017-03-16 14:16:38', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('22', '0212', 'Pokok Sena', '02', '1', '100000', '100000', '2017-03-16 14:16:44', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('23', '0301', 'Bachok', '03', '1', '100000', '100000', '2017-03-16 14:16:50', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('24', '0302', 'Kota Bharu', '03', '1', '100000', '100000', '2017-03-16 14:16:56', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('25', '0303', 'Machang', '03', '1', '100000', '100000', '2017-03-16 14:17:04', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('26', '0304', 'Pasir Mas', '03', '1', '100000', '100000', '2017-03-16 14:17:11', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('27', '0305', 'Pasir Puteh', '03', '1', '100000', '100000', '2017-03-16 14:17:17', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('28', '0306', 'Tanah Merah', '03', '1', '100000', '100000', '2017-03-16 14:17:23', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('29', '0307', 'Tumpat', '03', '1', '100000', '100000', '2017-03-16 14:17:29', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('30', '0308', 'Gua Musang', '03', '1', '100000', '100000', '2017-03-16 14:17:36', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('31', '0310', 'Kuala Krai', '03', '1', '100000', '100000', '2017-03-16 14:17:42', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('32', '0311', 'Jeli', '03', '1', '100000', '100000', '2017-03-16 14:17:47', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('33', '0312', 'Kecil Lojing', '03', '1', '100000', '100000', '2017-03-16 14:18:00', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('34', '0401', 'Melaka Tengah', '04', '1', '100000', '100000', '2017-03-16 14:18:07', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('35', '0402', 'Jasin', '04', '1', '100000', '100000', '2017-03-16 14:18:12', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('36', '0403', 'Alor Gajah', '04', '1', '100000', '100000', '2017-03-16 14:18:20', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('37', '0501', 'Jelebu', '05', '1', '100000', '100000', '2017-03-16 14:18:26', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('38', '0502', 'Kuala Pilah', '05', '1', '100000', '100000', '2017-03-16 14:18:33', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('39', '0503', 'Port Dickson', '05', '1', '100000', '100000', '2017-03-16 14:18:44', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('40', '0504', 'Rembau', '05', '1', '100000', '100000', '2017-03-16 14:18:49', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('41', '0505', 'Seremban', '05', '1', '100000', '100000', '2017-03-17 09:09:46', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('42', '0506', 'Tampin', '05', '1', '100000', '100000', '2017-03-17 09:09:53', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('43', '0507', 'Jempol', '05', '1', '100000', '100000', '2017-03-17 09:10:00', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('44', '0601', 'Bentong', '06', '1', '100000', '100000', '2017-03-17 09:10:05', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('45', '0602', 'Cameron Highlands', '06', '1', '100000', '100000', '2017-03-17 09:10:15', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('46', '0603', 'Jerantut', '06', '1', '100000', '100000', '2017-03-17 09:10:20', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('47', '0604', 'Kuantan', '06', '1', '100000', '100000', '2017-03-17 09:10:26', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('48', '0605', 'Lipis', '06', '1', '100000', '100000', '2017-03-17 09:10:32', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('49', '0606', 'Pekan', '06', '1', '100000', '100000', '2017-03-17 09:10:37', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('50', '0607', 'Raub', '06', '1', '100000', '100000', '2017-03-17 09:10:42', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('51', '0608', 'Temerloh', '06', '1', '100000', '100000', '2017-03-17 09:10:51', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('52', '0609', 'Rompin', '06', '1', '100000', '100000', '2017-03-17 09:11:10', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('53', '0610', 'Maran', '06', '1', '100000', '100000', '2017-03-17 09:11:19', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('54', '0611', 'Bera', '06', '1', '100000', '100000', '2017-03-17 09:11:24', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('55', '0801', 'Batang Padang', '08', '1', '100000', '100000', '2017-03-17 09:11:33', '2017-01-19 17:44:40');
INSERT INTO `ddsa_kod_daerah` VALUES ('56', '0802', 'Manjung', '08', '1', '100000', '100000', '2017-03-17 09:11:41', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('57', '0803', 'Kinta', '08', '1', '100000', '100000', '2017-03-17 09:11:47', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('58', '0804', 'Kerian', '08', '1', '100000', '100000', '2017-03-17 09:11:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('59', '0805', 'Kuala Kangsar', '08', '1', '100000', '100000', '2017-03-17 09:12:01', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('60', '0806', 'Larut & Matang', '08', '1', '100000', '100000', '2017-03-17 09:12:09', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('61', '0807', 'Hilir Perak', '08', '1', '100000', '100000', '2017-03-17 09:12:18', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('62', '0808', 'Hulu Perak', '08', '1', '100000', '100000', '2017-03-17 09:12:24', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('63', '0809', 'Selama', '08', '1', '100000', '100000', '2017-03-17 09:12:29', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('64', '0810', 'Perak Tengah', '08', '1', '100000', '100000', '2017-03-17 09:12:35', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('65', '0811', 'Kampar', '08', '1', '100000', '100000', '2017-03-17 09:12:40', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('66', '0701', 'Seberang Perai Tengah', '07', '1', '100000', '100000', '2017-03-17 09:12:48', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('67', '0702', 'Seberang Perai Utara', '07', '1', '100000', '100000', '2017-03-17 09:12:57', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('68', '0703', 'Seberang Perai Selatan', '07', '1', '100000', '100000', '2017-03-17 09:13:07', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('69', '0704', 'Timur Laut', '07', '1', '100000', '100000', '2017-03-29 16:16:22', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('70', '0705', 'Barat Daya', '07', '1', '100000', '100000', '2017-03-17 09:13:21', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('71', '1201', 'Kota Kinabalu', '12', '1', '100000', '100000', '2017-03-17 09:13:28', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('72', '1202', 'Papar', '12', '1', '100000', '100000', '2017-03-17 09:13:33', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('73', '1203', 'Kota Belud', '12', '1', '100000', '100000', '2017-03-17 09:13:39', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('74', '1204', 'Tuaran', '12', '1', '100000', '100000', '2017-03-17 09:13:45', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('75', '1205', 'Kudat', '12', '1', '100000', '100000', '2017-03-17 09:13:51', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('76', '1206', 'Ranau', '12', '1', '100000', '100000', '2017-03-17 09:13:56', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('77', '1207', 'Sandakan', '12', '1', '100000', '100000', '2017-03-17 09:14:02', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('78', '1208', 'Labuk & Sugut', '12', '1', '100000', '100000', '2017-03-17 09:14:12', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('79', '1209', 'Kinabatangan', '12', '1', '100000', '100000', '2017-03-17 09:14:18', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('80', '1210', 'Tawau', '12', '1', '100000', '100000', '2017-03-17 09:14:23', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('81', '1211', 'Lahad Datu', '12', '1', '100000', '100000', '2017-03-17 09:14:33', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('82', '1212', 'Semporna', '12', '1', '100000', '100000', '2017-03-17 09:14:38', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('83', '1213', 'Keningau', '12', '1', '100000', '100000', '2017-03-17 09:14:44', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('84', '1214', 'Tambunan', '12', '1', '100000', '100000', '2017-03-17 09:14:52', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('85', '1215', 'Pensiangan', '12', '1', '100000', '100000', '2017-03-17 09:15:02', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('86', '1216', 'Tenom', '12', '1', '100000', '100000', '2017-03-17 09:15:06', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('87', '1217', 'Beaufort', '12', '1', '100000', '100000', '2017-03-17 09:15:21', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('88', '1218', 'Kuala Penyu', '12', '1', '100000', '100000', '2017-03-17 09:15:29', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('89', '1219', 'Sipitang', '12', '1', '100000', '100000', '2017-03-17 09:15:35', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('90', '1221', 'Penampang', '12', '1', '100000', '100000', '2017-03-17 09:15:40', '2017-01-19 17:44:41');
INSERT INTO `ddsa_kod_daerah` VALUES ('91', '1222', 'Kota Marudu', '12', '1', '100000', '100000', '2017-03-17 09:15:46', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('92', '1223', 'Pitas', '12', '1', '100000', '100000', '2017-03-17 09:15:51', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('93', '1224', 'Kunak', '12', '1', '100000', '100000', '2017-03-17 09:15:56', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('94', '1225', 'Tongod', '12', '1', '100000', '100000', '2017-03-17 09:16:04', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('95', '1226', 'Putatan', '12', '1', '100000', '100000', '2017-03-17 09:16:10', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('96', '1301', 'Kuching', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('97', '1302', 'Sri Aman', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('98', '1303', 'Sibu', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('99', '1304', 'Miri', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('100', '1305', 'Limbang', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('101', '1306', 'Sarikei', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('102', '1307', 'Kapit', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('103', '1308', 'Samarahan', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('104', '1309', 'Bintulu', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('105', '1310', 'Mukah', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('106', '1311', 'Betong', '13', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('107', '1001', 'Klang', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('108', '1002', 'Kuala Langat', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('109', '1004', 'Kuala Selangor', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('110', '1005', 'Sabak Bernam', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('111', '1006', 'Ulu Langat', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('112', '1007', 'Hulu Selangor', '10', '1', '100000', '100000', '2017-04-27 15:39:38', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('113', '1008', 'Petaling', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('114', '1009', 'Gombak', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('115', '1010', 'Sepang', '10', '1', '100000', '100000', '2017-01-19 17:44:42', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('116', '1101', 'Besut', '11', '1', '100000', '100000', '2017-03-16 14:13:02', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('117', '1102', 'Dungun', '11', '1', '100000', '100000', '2017-03-16 14:13:11', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('118', '1103', 'Kemaman', '11', '1', '100000', '100000', '2017-03-16 14:13:38', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('119', '1104', 'Kuala Terengganu', '11', '1', '100000', '100000', '2017-03-16 14:14:12', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('120', '1105', 'Hulu Terengganu', '11', '1', '100000', '100000', '2017-03-16 14:14:20', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('121', '1106', 'Marang', '11', '1', '100000', '100000', '2017-03-16 14:12:33', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('122', '1107', 'Setiu', '11', '1', '100000', '100000', '2017-03-16 14:12:26', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('123', '1108', 'Kuala Nerus', '11', '1', '100000', '100000', '2017-03-16 14:15:25', '2017-01-19 17:44:42');
INSERT INTO `ddsa_kod_daerah` VALUES ('132', '1400', 'Kuala Lumpur', '14', '1', '100000', '100000', '2017-03-16 14:11:13', '2017-01-19 17:44:43');
INSERT INTO `ddsa_kod_daerah` VALUES ('134', '1601', 'Putrajaya', '16', '1', '0', '0', '2017-04-06 15:28:24', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('135', '1501', 'Labuan', '15', '1', '0', '0', '2017-04-06 15:30:08', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('136', '0900', 'Perlis', '09', '1', '0', '0', '2017-05-09 08:53:56', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('139', '0110', 'Ledang', '01', '1', '0', '0', '2017-09-19 12:42:19', '2017-04-06 15:39:57');
INSERT INTO `ddsa_kod_daerah` VALUES ('140', '1401', 'Kuala Lumpur', '22', '1', '0', '0', '2018-03-26 15:32:09', '2017-04-06 15:39:57');
