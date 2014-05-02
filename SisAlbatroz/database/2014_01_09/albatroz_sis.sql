-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 09-Jan-2014 às 15:41
-- Versão do servidor: 5.6.11
-- versão do PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `albatroz_sis`
--
CREATE DATABASE IF NOT EXISTS `albatroz_sis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `albatroz_sis`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `embarcacao`
--

CREATE TABLE IF NOT EXISTS `embarcacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `registro` int(20) NOT NULL,
  `fabricacao` int(6) NOT NULL,
  `comprimento` int(5) NOT NULL COMMENT '(metros)',
  `material` varchar(255) NOT NULL,
  `capacidade` int(10) NOT NULL COMMENT '(ton)',
  `arque_bruta` int(10) NOT NULL COMMENT '(ton)',
  `conservacao` varchar(255) NOT NULL,
  `tripulacao` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `embarcacao`
--

INSERT INTO `embarcacao` (`id`, `nome`, `registro`, `fabricacao`, `comprimento`, `material`, `capacidade`, `arque_bruta`, `conservacao`, `tripulacao`) VALUES
(1, 'Anta Marinha', 2147483647, 2005, 35, 'madeira', 200, 320, 'gelo', 8),
(2, 'Dominio Azul', 0, 0, 0, '', 0, 0, '', 0),
(3, 'azul sem fim', 123456, 1983, 20, 'madeira', 0, 130, 'gelo', 8),
(4, 'Togo', 789654, 1980, 30, 'aco', 0, 150, 'gelo', 12),
(5, 'costa faccinosa', 4652315, 1980, 300, 'aco', 0, 800, 'circuito_aberto', 500),
(6, 'cordeiro de deus', 2147483647, 1980, 30, 'madeira', 0, 250, 'camera_fria', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cnpj` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`) VALUES
(1, 'Gomez da Costa', 123456789),
(2, 'Coqueiros', 789456123),
(3, 'Kbçudos SA', 0),
(4, 'Santoro SA', 2147483647),
(5, 'ZÃ© Ruela S.A.', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `especies`
--

CREATE TABLE IF NOT EXISTS `especies` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `sub_categoria` varchar(100) NOT NULL,
  `nome_popular` varchar(100) NOT NULL,
  `nome_pop_ingles` varchar(100) NOT NULL,
  `nome_cient` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `especies`
--

INSERT INTO `especies` (`id`, `categoria`, `sub_categoria`, `nome_popular`, `nome_pop_ingles`, `nome_cient`) VALUES
(1, 'peixes', 'osseo', 'albacora laje', 'yellowfin', 'Thunnus albacares'),
(2, 'aves', '', 'Albatroz', 'sea bird', 'albatroz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `geral`
--

CREATE TABLE IF NOT EXISTS `geral` (
  `viagem` int(11) NOT NULL AUTO_INCREMENT,
  `cod_obser` int(5) NOT NULL,
  `cod_embar` int(5) NOT NULL,
  `cod_mestr` int(5) NOT NULL,
  `cod_empre` int(5) NOT NULL,
  `data_saida` date NOT NULL,
  `data_chegada` date NOT NULL,
  `financiador` varchar(50) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`viagem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `geral`
--

INSERT INTO `geral` (`viagem`, `cod_obser`, `cod_embar`, `cod_mestr`, `cod_empre`, `data_saida`, `data_chegada`, `financiador`, `obs`) VALUES
(1, 4, 2, 4, 3, '2013-12-01', '2013-12-31', 'ATF-PA', 'linha 1 \r\nlinha 2'),
(2, 6, 3, 3, 4, '2013-12-19', '2013-12-28', 'asdasd', 'teste felipe'),
(3, 5, 1, 2, 2, '2013-12-24', '2013-12-26', 'dsafadsf', 'teste rodrigo'),
(4, 4, 3, 4, 1, '2013-12-01', '2013-12-31', 'ATF-PA', 'teste novo'),
(5, 4, 1, 4, 1, '2013-12-13', '2013-12-14', 'asas', 'sadsad'),
(6, 4, 5, 3, 1, '2013-12-05', '2013-12-28', 'ATF-PA', 'teste de linha 1\r\nlinha 2'),
(7, 6, 4, 4, 4, '2013-12-14', '2013-12-28', 'ATF-PA', 'werasda'),
(8, 8, 3, 5, 2, '2014-01-24', '2014-01-31', 'dasda', 'asdasfadsfads');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mestre`
--

CREATE TABLE IF NOT EXISTS `mestre` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `mestre`
--

INSERT INTO `mestre` (`id`, `nome`) VALUES
(1, 'Tom Cruise'),
(2, 'Vin Diesel'),
(3, 'chuck'),
(4, 'Maria Clara'),
(5, 'Barba Negra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `observador`
--

CREATE TABLE IF NOT EXISTS `observador` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` int(20) NOT NULL,
  `rg` int(20) NOT NULL,
  `tel` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `observador`
--

INSERT INTO `observador` (`id`, `nome`, `cpf`, `rg`, `tel`, `email`, `endereco`) VALUES
(4, 'André Santoro', 49940, 8596314, 97444183, 'andre.santoro@gmail.com', 'rua jorge tzachel 114 bloco C apt 304 fazenda itajai/SC'),
(5, 'rodrigo santana', 0, 0, 0, '', ''),
(6, 'felipe santoro', 123456, 789456123, 2147483647, 'felipe.santoro@gmail.com', 'condomino dos jatobas'),
(7, 'JoÃ£o', 12312, 32112, 2123, 'akjhasd@gmail.com', 'edfadsfasd'),
(8, 'AndrÃ© Augusto Ribeiro Santoro', 21563218, 31562135, 354231685, 'santoro@gmail.com', 'asdjasfhlkajdsf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
