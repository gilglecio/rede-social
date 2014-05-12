/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : aularedesocial

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2011-11-11 00:17:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `albuns`
-- ----------------------------
DROP TABLE IF EXISTS `albuns`;
CREATE TABLE `albuns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of albuns
-- ----------------------------

-- ----------------------------
-- Table structure for `amisade`
-- ----------------------------
DROP TABLE IF EXISTS `amisade`;
CREATE TABLE `amisade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of amisade
-- ----------------------------
INSERT INTO `amisade` VALUES ('10', '2', '3', '1');
INSERT INTO `amisade` VALUES ('19', '1', '2', '1');
INSERT INTO `amisade` VALUES ('20', '1', '3', '0');

-- ----------------------------
-- Table structure for `depimentos`
-- ----------------------------
DROP TABLE IF EXISTS `depimentos`;
CREATE TABLE `depimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `depoimento` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of depimentos
-- ----------------------------

-- ----------------------------
-- Table structure for `fotos`
-- ----------------------------
DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `legenda` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fotos
-- ----------------------------

-- ----------------------------
-- Table structure for `recados`
-- ----------------------------
DROP TABLE IF EXISTS `recados`;
CREATE TABLE `recados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` varchar(10) NOT NULL,
  `recado` text NOT NULL,
  `status` int(1) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recados
-- ----------------------------

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `sobrenome` varchar(64) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `imagem` varchar(128) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `cadastro` date NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'gilglecio_765@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'gilglecio', 'santos', '2002-10-10', 'feminino', 'cfb358ac94e951dba59e861f4db527a7c3355f3e-his.jpg', '0', '2011-10-26', '0');
INSERT INTO `usuarios` VALUES ('2', 'roberto@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'roberto', 'silva santos', '2011-01-01', 'masculino', '2.jpg', '0', '2011-10-26', '0');
INSERT INTO `usuarios` VALUES ('3', 'anapaula@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'ana paula', 'francisca', '2011-01-01', 'masculino', '3.jpg', '0', '2011-10-26', '0');

-- ----------------------------
-- Table structure for `videos`
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `embed` varchar(128) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `status` int(1) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of videos
-- ----------------------------
