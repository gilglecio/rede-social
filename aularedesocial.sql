/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : aularedesocial

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-01-02 19:22:00
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
  `status` int(1) DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `permissao` int(1) DEFAULT NULL,
  `capa` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of albuns
-- ----------------------------
INSERT INTO `albuns` VALUES ('1', '1', 'meu aniversario', '18 anos', '0', '2012-01-02 09:20:16', '2', '52b567bf890056421edaab0b4ef16b81b761deca.jpg');
INSERT INTO `albuns` VALUES ('2', '1', 'testando pemissao', 'hoje', '0', '2012-01-02 09:04:56', '1', 'default.jpg');
INSERT INTO `albuns` VALUES ('9', '1', 'testando album 02', 'testando novamene', '0', '2012-01-02 09:04:56', '2', 'default.jpg');
INSERT INTO `albuns` VALUES ('10', '1', '', '', '0', '2012-01-02 09:04:57', '2', 'default.jpg');
INSERT INTO `albuns` VALUES ('11', '2', 'roberto', '', '0', '2012-01-02 09:04:58', '2', 'default.jpg');
INSERT INTO `albuns` VALUES ('12', '2', 'testando', '', '0', '2012-01-02 09:02:50', '2', 'e7d185479c.jpg');
INSERT INTO `albuns` VALUES ('13', '2', 'testando este album', '', '0', '2012-01-02 09:04:59', '1', 'default.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of amisade
-- ----------------------------
INSERT INTO `amisade` VALUES ('10', '2', '3', '1');
INSERT INTO `amisade` VALUES ('21', '1', '2', '1');
INSERT INTO `amisade` VALUES ('22', '1', '3', '1');
INSERT INTO `amisade` VALUES ('24', '1', '4', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fotos
-- ----------------------------
INSERT INTO `fotos` VALUES ('37', '2', '00a9f34f1c.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('38', '2', '320c98f64c.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('39', '2', '92989dbda4.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('40', '2', '04eaf0a14f.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('41', '2', 'e7d185479c.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('43', '2', '94b8e8cf4f.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('44', '9', '21ab308203.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('45', '9', 'e7d185479c.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('46', '2', '0ab051f566.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('47', '1', '21ab308203.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('48', '1', '21ab308203.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('49', '1', '050f428796.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('51', '13', 'e7d185479c.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('52', '11', '00a9f34f1c.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('53', '11', '320c98f64c.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('54', '11', '92989dbda4.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('55', '11', '04eaf0a14f.jpg', '1', '0000-00-00 00:00:00', null);
INSERT INTO `fotos` VALUES ('65', '12', 'e7d185479c.jpg', '1', '2012-01-02 09:02:50', null);
INSERT INTO `fotos` VALUES ('66', '1', '2ddbfbe3a1.jpg', '1', '2012-01-02 09:08:29', null);
INSERT INTO `fotos` VALUES ('67', '1', '52b567bf890056421edaab0b4ef16b81b761deca.jpg', '1', '2012-01-02 09:20:17', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recados
-- ----------------------------
INSERT INTO `recados` VALUES ('43', '1', 'amigos', 'recado para amigos', '1', '2011-12-07 23:01:32');
INSERT INTO `recados` VALUES ('44', '1', '3', 'recado para ana...', '1', '2011-12-07 23:02:30');
INSERT INTO `recados` VALUES ('45', '1', 'publico', 'recado para todo mundo', '1', '2011-12-07 23:03:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'gilglecio_765@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'gilglecio', 'santos', '2002-10-10', 'masculino', '126.jpg', '0', '2011-10-26', '0');
INSERT INTO `usuarios` VALUES ('2', 'roberto@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'roberto', 'silva santos', '2011-01-01', 'masculino', '254.jpg', '0', '2011-10-26', '0');
INSERT INTO `usuarios` VALUES ('3', 'anapaula@hotmail.com', 'effd4619301d732cef4a84f6df23d7dd54090620', 'ana paula', 'francisca', '2011-01-01', 'feminino', '331.jpg', '0', '2011-10-26', '0');
INSERT INTO `usuarios` VALUES ('10', 'juli@hotmail.com', '0a834e13ab9c560fd87f370113641924689b883c', 'juliane', 'santos', '2011-01-01', 'masculino', null, '0', '2011-12-07', '0');

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
