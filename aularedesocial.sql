/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : aularedesocial

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2011-11-17 07:32:43
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of amisade
-- ----------------------------
INSERT INTO `amisade` VALUES ('10', '2', '3', '1');
INSERT INTO `amisade` VALUES ('21', '1', '2', '1');
INSERT INTO `amisade` VALUES ('22', '1', '3', '1');

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
  `status` int(1) NOT NULL DEFAULT '1',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recados
-- ----------------------------
INSERT INTO `recados` VALUES ('1', '1', 'amigos', 'recado', '1', '2011-11-15 16:56:18');
INSERT INTO `recados` VALUES ('2', '1', 'amigos', 'recado', '1', '2011-11-15 16:56:19');
INSERT INTO `recados` VALUES ('3', '1', 'amigos', 'recado', '1', '2011-11-15 16:56:20');
INSERT INTO `recados` VALUES ('4', '1', '2', 'recado', '1', '2011-11-15 17:12:52');
INSERT INTO `recados` VALUES ('5', '1', 'publico', 'recado', '1', '2011-11-15 16:56:22');
INSERT INTO `recados` VALUES ('6', '3', 'amigos', 'oi gilglecio', '1', '2011-11-15 17:15:20');
INSERT INTO `recados` VALUES ('7', '1', '3', 'recado para ana paula', '1', '2011-11-15 17:19:04');
INSERT INTO `recados` VALUES ('8', '1', 'publico', 'publico', '1', '2011-11-15 17:19:28');
INSERT INTO `recados` VALUES ('9', '1', 'amigos', 'oi\r\n', '1', '2011-11-15 20:23:30');
INSERT INTO `recados` VALUES ('10', '1', 'publico', 'ana paula francisca', '1', '2011-11-16 08:12:37');
INSERT INTO `recados` VALUES ('11', '1', 'selecionar', '', '1', '2011-11-16 08:43:43');
INSERT INTO `recados` VALUES ('12', '1', 'selecionar', '', '1', '2011-11-16 08:44:14');
INSERT INTO `recados` VALUES ('13', '1', 'selecionar', '', '1', '2011-11-16 08:44:20');
INSERT INTO `recados` VALUES ('14', '1', 'selecionar', '', '1', '2011-11-16 08:44:30');
INSERT INTO `recados` VALUES ('15', '1', 'selecionar', '', '1', '2011-11-16 08:44:36');
INSERT INTO `recados` VALUES ('16', '1', '2', 'oi roberto', '1', '2011-11-16 08:50:08');
INSERT INTO `recados` VALUES ('17', '1', '3', 'recado para ana paula francisca', '1', '2011-11-16 08:52:28');
INSERT INTO `recados` VALUES ('18', '1', '3', 'recado para ana paula francisca', '1', '2011-11-16 09:32:55');
INSERT INTO `recados` VALUES ('19', '1', '3', 'recado para ana', '1', '2011-11-16 09:33:14');
INSERT INTO `recados` VALUES ('20', '1', '2', 'ola roberto', '1', '2011-11-16 09:33:50');

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
INSERT INTO `usuarios` VALUES ('1', 'gilglecio_765@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'gilglecio', 'santos', '2002-10-10', 'feminino', '104.jpg', '0', '2011-10-26', '0');
INSERT INTO `usuarios` VALUES ('2', 'roberto@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'roberto', 'silva santos', '2011-01-01', 'masculino', '254.jpg', '0', '2011-10-26', '0');
INSERT INTO `usuarios` VALUES ('3', 'anapaula@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'ana paula', 'francisca', '2011-01-01', 'masculino', '331.jpg', '0', '2011-10-26', '0');

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
