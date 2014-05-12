-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27-log
-- Versão do PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `aularedesocial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `albuns`
--

CREATE TABLE IF NOT EXISTS `albuns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `permissao` int(1) DEFAULT NULL,
  `capa` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `albuns`
--

INSERT INTO `albuns` (`id`, `usuario`, `titulo`, `descricao`, `status`, `data`, `permissao`, `capa`) VALUES
(14, 1, 'GilglÃ©cio', 'Momentos lol', 0, '2012-11-20 15:07:03', 2, '06a5094df1fbb8763cf23280407ba861b0710c5e.jpg'),
(15, 2, 'Roberto', 'descricao', 0, '2012-11-22 14:16:01', 2, '2e92a0baaa5e08e2114df64c7819c6e30d3df12d.jpg'),
(16, 10, 'Juli', 'fotos', 0, '2012-11-22 14:26:09', 2, '077d57ec22ea1f4dcf9caac46dde8cade7a2179c.jpg'),
(17, 2, 'FÃ©rias', 'passeio', 0, '2012-11-22 14:57:37', 2, '6f6a71d0276c593a0f95e41ad6a92b9ebeacbf2e.jpg'),
(18, 11, 'DÃ©bora', 'teste', 0, '2012-11-23 11:06:16', 2, 'acb111deb634e53228af7dae828ba82ab542c5f9.jpg'),
(19, 11, 'Viagem', 'descricao', 0, '2012-11-23 11:10:30', 2, '16f62296487ba179d2f453bd4402202d1c30aab2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `amisade`
--

CREATE TABLE IF NOT EXISTS `amisade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `amisade`
--

INSERT INTO `amisade` (`id`, `de`, `para`, `status`) VALUES
(10, 2, 3, 1),
(22, 1, 3, 1),
(24, 1, 4, 1),
(25, 11, 1, 1),
(28, 10, 1, 1),
(31, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `depimentos`
--

CREATE TABLE IF NOT EXISTS `depimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `depoimento` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `legenda` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `album`, `foto`, `views`, `data`, `legenda`) VALUES
(68, 14, '6ef139305e1b2f7c5ada05cfe3e3e98fbb6df687.jpg', 1, '2012-11-01 16:02:24', NULL),
(69, 14, '1fa5408156e74b3340f30ea6caf9b68ee6764fc5.jpg', 1, '2012-11-15 16:33:26', NULL),
(70, 14, '334a53979671b680fdd54fb9248bed49669ca120.jpg', 1, '2012-11-15 16:33:29', NULL),
(71, 14, 'cc6605c80eee850eb31019daf338e2f36e748652.jpg', 1, '2012-11-15 16:33:31', NULL),
(72, 14, '23cdc4281db19cbf29a7f5cf66cdb92fdce983ed.jpg', 1, '2012-11-15 16:33:33', NULL),
(73, 14, '52783af3d8435b31c946d228c4d0f7f019e57b9b.jpg', 1, '2012-11-15 16:33:35', NULL),
(74, 14, '735177a65ea5736d7642bed6ad933088db012fb6.jpg', 1, '2012-11-15 16:33:37', NULL),
(75, 14, '9719ae60c0ba8b01804339dbd3eb73e8d149d579.jpg', 1, '2012-11-15 16:33:38', NULL),
(78, 14, '4f562787393a8e00690e269267495468fcaa0f52.jpg', 1, '2012-11-15 16:33:44', NULL),
(79, 14, '1db0c8c68f92c8508c4bf1172ca5478965e409b1.jpg', 1, '2012-11-15 16:33:46', NULL),
(80, 14, 'ff1afedf838e036ad27af7d4326afc4a97179726.jpg', 1, '2012-11-15 16:33:48', NULL),
(81, 14, 'fccd02b48c54fbf363e068074e880665e1aa31a1.jpg', 1, '2012-11-15 16:33:51', NULL),
(83, 14, '071cebf991a2e0eb9087ac0c883a5a444b404faa.jpg', 1, '2012-11-15 16:34:56', NULL),
(84, 14, '3f706f4453461646d5254c7ea26e1c85af136182.jpg', 1, '2012-11-15 16:34:58', NULL),
(85, 14, 'd4b6fb3b2562f0f49e4beed3b3ce1e831f229ecc.jpg', 1, '2012-11-15 16:35:00', NULL),
(87, 14, '06a5094df1fbb8763cf23280407ba861b0710c5e.jpg', 1, '2012-11-20 15:07:45', NULL),
(88, 15, '2e92a0baaa5e08e2114df64c7819c6e30d3df12d.jpg', 1, '2012-11-22 14:16:01', NULL),
(89, 15, 'e5bde243ff16e8d21b1e93ebc3213d042f211c95.jpg', 1, '2012-11-22 14:16:01', NULL),
(90, 15, '5ab8a5734d360e2986b1eb73b6e4dbf3db4d860d.jpg', 1, '2012-11-22 14:16:01', NULL),
(91, 16, '863d798770ca06d01867ab75bac2b96db081198d.jpg', 1, '2012-11-22 14:16:48', NULL),
(92, 16, '077d57ec22ea1f4dcf9caac46dde8cade7a2179c.jpg', 1, '2012-11-22 14:26:09', NULL),
(93, 17, '6f6a71d0276c593a0f95e41ad6a92b9ebeacbf2e.jpg', 1, '2012-11-22 14:57:37', NULL),
(94, 17, '24f52e1678ffaf45c074a4eef93d4cd495ac219d.jpg', 1, '2012-11-22 14:57:37', NULL),
(95, 17, '0f736eaa44b84cb59ae9fc24d7181fe33250e837.jpg', 1, '2012-11-22 14:57:38', NULL),
(96, 17, '83c9fa19ac18168c4fc1c38b43ab5cc4ba8ea025.jpg', 1, '2012-11-22 14:57:39', NULL),
(97, 18, 'acb111deb634e53228af7dae828ba82ab542c5f9.jpg', 1, '2012-11-23 11:06:16', NULL),
(98, 18, '20641c58dec82d1c5468d703029d0c42f48b63b9.jpg', 1, '2012-11-23 11:06:17', NULL),
(99, 18, '0374b3d53001d99269758638a3178768bb0c48b2.jpg', 1, '2012-11-23 11:06:18', NULL),
(100, 18, '93ea6e2628fe905d369f66293b3ce139975c4ced.jpg', 1, '2012-11-23 11:06:18', NULL),
(101, 18, '4dba62a24b95ef14b74d027f9c7865a9003251de.jpg', 1, '2012-11-23 11:06:19', NULL),
(102, 18, '689309929d643889764f15a762e1f5efaa67f104.jpg', 1, '2012-11-23 11:06:19', NULL),
(103, 18, '4714dac16b1410852843df06be6f395068ef7b63.jpg', 1, '2012-11-23 11:06:20', NULL),
(104, 18, '5a1c657403e827de71983b01949efc2683fcaf25.jpg', 1, '2012-11-23 11:06:21', NULL),
(105, 19, '16f62296487ba179d2f453bd4402202d1c30aab2.jpg', 1, '2012-11-23 11:10:30', NULL),
(106, 19, '7955830db63bb78eb2f3128b03c9526d53c2b5b3.jpg', 1, '2012-11-23 11:10:31', NULL),
(107, 19, '94af57aa47acf8b085e07b392a27db6333165dfb.jpg', 1, '2012-11-23 11:10:31', NULL),
(108, 19, '38be9dc07e0481e8b22b93db4e11894b7ed601c3.jpg', 1, '2012-11-23 11:10:32', NULL),
(109, 19, '0285b115a36c98fd440301ce14cf82eb922a309e.jpg', 1, '2012-11-23 11:10:32', NULL),
(110, 19, '4cc3267d3b916e64e45199930a8744b842f43fe0.jpg', 1, '2012-11-23 11:10:33', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE IF NOT EXISTS `notificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(1) NOT NULL,
  `uid` int(11) NOT NULL,
  `result` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `tipo`, `uid`, `result`, `data`) VALUES
(1, 1, 1, '14:06a5094df1fbb8763cf23280407ba861b0710c5e.jpg', '2012-11-22 14:20:25'),
(8, 1, 2, '15:e5bde243ff16e8d21b1e93ebc3213d042f211c95.jpg', '2012-11-22 14:16:01'),
(9, 1, 2, '15:5ab8a5734d360e2986b1eb73b6e4dbf3db4d860d.jpg', '2012-11-22 14:16:02'),
(11, 1, 10, '16:077d57ec22ea1f4dcf9caac46dde8cade7a2179c.jpg', '2012-11-22 14:26:09'),
(12, 1, 2, '17:6f6a71d0276c593a0f95e41ad6a92b9ebeacbf2e.jpg', '2012-11-22 14:57:37'),
(13, 1, 2, '17:24f52e1678ffaf45c074a4eef93d4cd495ac219d.jpg', '2012-11-22 14:57:38'),
(15, 1, 2, '17:83c9fa19ac18168c4fc1c38b43ab5cc4ba8ea025.jpg', '2012-11-22 14:57:39'),
(16, 1, 11, '18:acb111deb634e53228af7dae828ba82ab542c5f9.jpg', '2012-11-23 11:06:17'),
(17, 1, 11, '18:20641c58dec82d1c5468d703029d0c42f48b63b9.jpg', '2012-11-23 11:06:17'),
(18, 1, 11, '18:0374b3d53001d99269758638a3178768bb0c48b2.jpg', '2012-11-23 11:06:18'),
(19, 1, 11, '18:93ea6e2628fe905d369f66293b3ce139975c4ced.jpg', '2012-11-23 11:06:19'),
(20, 1, 11, '18:4dba62a24b95ef14b74d027f9c7865a9003251de.jpg', '2012-11-23 11:06:19'),
(21, 1, 11, '18:689309929d643889764f15a762e1f5efaa67f104.jpg', '2012-11-23 11:06:20'),
(22, 1, 11, '18:4714dac16b1410852843df06be6f395068ef7b63.jpg', '2012-11-23 11:06:20'),
(23, 1, 11, '18:5a1c657403e827de71983b01949efc2683fcaf25.jpg', '2012-11-23 11:06:21'),
(24, 1, 11, '19:16f62296487ba179d2f453bd4402202d1c30aab2.jpg', '2012-11-23 11:10:30'),
(25, 1, 11, '19:7955830db63bb78eb2f3128b03c9526d53c2b5b3.jpg', '2012-11-23 11:10:31'),
(26, 1, 11, '19:94af57aa47acf8b085e07b392a27db6333165dfb.jpg', '2012-11-23 11:10:31'),
(27, 1, 11, '19:38be9dc07e0481e8b22b93db4e11894b7ed601c3.jpg', '2012-11-23 11:10:32'),
(28, 1, 11, '19:0285b115a36c98fd440301ce14cf82eb922a309e.jpg', '2012-11-23 11:10:33'),
(29, 1, 11, '19:4cc3267d3b916e64e45199930a8744b842f43fe0.jpg', '2012-11-23 11:10:33'),
(30, 3, 1, '2', '2012-12-04 10:11:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recados`
--

CREATE TABLE IF NOT EXISTS `recados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` varchar(10) NOT NULL,
  `recado` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `recados`
--

INSERT INTO `recados` (`id`, `de`, `para`, `recado`, `status`, `data`) VALUES
(43, 1, 'amigos', 'recado para amigos', 1, '2011-12-08 02:01:32'),
(44, 1, '3', 'recado para ana...', 1, '2011-12-08 02:02:30'),
(45, 1, 'publico', 'recado para todo mundo', 1, '2011-12-08 02:03:31'),
(46, 1, '11', 'Oi Deborah', 1, '2012-11-15 16:02:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`, `sobrenome`, `nascimento`, `sexo`, `imagem`, `status`, `cadastro`, `nivel`) VALUES
(1, 'gilglecio_765@hotmail.com', '8899fd2ac36a87c253e2df5fab23bd7ece93f0cc', 'gilglecio', 'santos', '2002-10-10', 'masculino', '143.jpg', 0, '2011-10-26', 0),
(2, 'roberto@hotmail.com', '8899fd2ac36a87c253e2df5fab23bd7ece93f0cc', 'roberto', 'silva santos', '2011-01-01', 'masculino', '254.jpg', 0, '2011-10-26', 0),
(3, 'anapaula@hotmail.com', '8899fd2ac36a87c253e2df5fab23bd7ece93f0cc', 'ana paula', 'francisca', '2011-01-01', 'feminino', '331.jpg', 0, '2011-10-26', 0),
(10, 'juli@hotmail.com', '8899fd2ac36a87c253e2df5fab23bd7ece93f0cc', 'juliane', 'santos', '2011-01-01', 'masculino', NULL, 0, '2011-12-07', 0),
(11, 'debora@hotmail.com', '8899fd2ac36a87c253e2df5fab23bd7ece93f0cc', 'DÃ©bora', 'Santos', '2012-11-04', 'feminino', '1142.jpg', 0, '2012-11-15', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `embed` varchar(128) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `status` int(1) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
