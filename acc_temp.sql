/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50712
Source Host           : localhost:3306


Date: 2016-08-03 10:13:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acc_temp
-- ----------------------------
DROP TABLE IF EXISTS `acc_temp`;
CREATE TABLE `acc_temp` (
  `transactionid` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `pin` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `cabang` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `pabx` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `cost` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `status_message` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
