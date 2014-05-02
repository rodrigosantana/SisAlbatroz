-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 23-Jan-2014 às 02:43
-- Versão do servidor: 5.6.14
-- versão do PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `albatroz_sis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `capt_incidental`
--

CREATE TABLE IF NOT EXISTS `capt_incidental` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cruzeiro` varchar(150) NOT NULL,
  `embarcacao` varchar(150) NOT NULL,
  `lance` varchar(150) NOT NULL,
  `especie` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `capt_incidental`
--

INSERT INTO `capt_incidental` (`id`, `cruzeiro`, `embarcacao`, `lance`, `especie`) VALUES
(1, '', '1', 'a', 'b'),
(2, '', '3', 'c', 'd'),
(3, '', '1', 'a', 'b'),
(4, '', '3', 'c', 'd'),
(5, '', '6', 'e', 'f'),
(6, '', '5', 'g', 'h'),
(7, '', '', '4', 'adsfdsaf'),
(8, '', '', '1', 'asdfads');

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
  `contato` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `contato`, `tel`) VALUES
(1, 'Gomez da Costa', 123456789, '', ''),
(2, 'Coqueiros', 789456123, '', ''),
(3, 'Kbçudos SA', 0, '', ''),
(4, 'Santoro SA', 2147483647, '', ''),
(5, 'ZÃ© Ruela S.A.', 2147483647, '', ''),
(6, 'enlatados do mar', 1235489625, 'Ze do Mar', '1232168');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `especies`
--

INSERT INTO `especies` (`id`, `categoria`, `sub_categoria`, `nome_popular`, `nome_pop_ingles`, `nome_cient`) VALUES
(1, 'peixes', 'osseo', 'albacora laje', 'yellowfin', 'Thunnus albacares'),
(5, 'Peixes', 'Cartilaginoso', 'dhfgh', 'dhfghdfg', 'dhfghdfghdfghdfghdfgh'),
(6, 'Aves', 'NÃ£o exite', 'Albatroz', 'lsfadsÃ§n', 'alÃ§kdaf'),
(7, 'Aves', 'NÃ£o exite', 'PetrÃ©l', 'dasfads', 'afsdfasdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
(8, 8, 3, 5, 2, '2014-01-24', '2014-01-31', 'dasda', 'asdasfadsfads'),
(9, 0, 0, 0, 0, '2014-01-01', '2014-01-24', 'asdasff', ''),
(10, 8, 1, 0, 0, '2014-01-02', '2014-01-15', 'asfadsf', 'afsdfasd'),
(11, 0, 0, 0, 0, '2014-01-11', '2014-01-30', 'dasfdsaf', 'asfasdf');

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
  `skype` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `foto` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `observador`
--

INSERT INTO `observador` (`id`, `nome`, `cpf`, `rg`, `tel`, `email`, `skype`, `endereco`, `foto`) VALUES
(5, 'rodrigo santana', 0, 0, 0, '', '', '', ''),
(6, 'felipe santoro', 123456, 789456123, 2147483647, 'felipe.santoro@gmail.com', '', 'condomino dos jatobas', ''),
(8, 'AndrÃ© Augusto Ribeiro Santoro', 21563218, 31562135, 354231685, 'santoro@gmail.com', '', 'asdjasfhlkajdsf', ''),
(11, 'Ico', 2564561, 13565, 163584321, 'ico@gmail.com', 'icoademas', 'balneÃ¡rio do inferno ', ''),
(44, 'sadfds', 341233, 1234123, 134234, 'addsf@gmail.com', 'asdfadsf', 'asfds', ''),
(49, 'sadfds', 341233, 1234123, 134234, 'addsf@gmail.com', 'asdfadsf', 'asfds', 'foto.12-01-14_10-43-08.jpg'),
(50, '', 0, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pds_base`
--

CREATE TABLE IF NOT EXISTS `pds_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `embarcacao` int(3) NOT NULL,
  `cruzeiro` int(3) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `lat` int(12) NOT NULL,
  `lon` int(12) NOT NULL,
  `toriline` varchar(1) NOT NULL,
  `tingida` varchar(1) NOT NULL,
  `obs` text NOT NULL,
  `lance` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pds_base`
--

INSERT INTO `pds_base` (`id`, `embarcacao`, `cruzeiro`, `data`, `hora`, `lat`, `lon`, `toriline`, `tingida`, `obs`, `lance`) VALUES
(1, 0, 0, '2014-01-31', '17:21:00', 123654, 123654, 's', 'n', 'teste 23:32', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pds_cont`
--

CREATE TABLE IF NOT EXISTS `pds_cont` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cruzeiro` int(5) NOT NULL,
  `cont_id` int(4) NOT NULL,
  `cont_hora` time NOT NULL,
  `cont_total` int(4) NOT NULL,
  `especie` varchar(150) NOT NULL,
  `cont_esp` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `pds_cont`
--

INSERT INTO `pds_cont` (`id`, `cruzeiro`, `cont_id`, `cont_hora`, `cont_total`, `especie`, `cont_esp`) VALUES
(1, 0, 3, '17:32:00', 35, '6', 15),
(2, 0, 3, '17:32:00', 35, '7', 7),
(3, 0, 3, '17:20:00', 45, '6', 4),
(4, 0, 3, '17:20:00', 45, '7', 8),
(5, 0, 3, '17:20:00', 45, '7', 5),
(6, 0, 3, '17:20:00', 45, '6', 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
