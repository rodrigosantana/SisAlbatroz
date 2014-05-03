-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 11-Mar-2014 às 16:51
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
CREATE DATABASE IF NOT EXISTS `albatroz_sis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `albatroz_sis`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `abiotico`
--

CREATE TABLE IF NOT EXISTS `abiotico` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cruzeiro` int(4) NOT NULL,
  `lance` int(5) NOT NULL,
  `isca` varchar(50) NOT NULL,
  `especie_alvo` varchar(100) NOT NULL,
  `anzois` int(4) NOT NULL,
  `reg.peso` varchar(5) NOT NULL,
  `toriline` varchar(5) NOT NULL,
  `isca.tingida` varchar(5) NOT NULL,
  `obs` text NOT NULL,
  `lat_in_lan` int(20) NOT NULL,
  `lat_fi_lan` int(20) NOT NULL,
  `long_in_lan` int(20) NOT NULL,
  `long_fi_lan` int(20) NOT NULL,
  `data_in_lan` date NOT NULL,
  `data_fi_lan` date NOT NULL,
  `hora_in_lan` time NOT NULL,
  `hora_fi_lan` time NOT NULL,
  `prof_in_lan` int(3) NOT NULL,
  `prof_fi_lan` int(3) NOT NULL,
  `rumo_in_lan` varchar(5) NOT NULL,
  `rumo_fi_lan` varchar(5) NOT NULL,
  `dvento_in_lan` varchar(5) NOT NULL,
  `dvento_fi_lan` varchar(5) NOT NULL,
  `vvento_in_lan` int(3) NOT NULL,
  `vvento_fi_lan` int(3) NOT NULL,
  `mar_in_lan` int(3) NOT NULL,
  `mar_fi_lan` int(3) NOT NULL,
  `tar_in_lan` int(3) NOT NULL,
  `tar_fi_lan` int(3) NOT NULL,
  `tsmar_in_lan` int(3) NOT NULL,
  `tsmar_fi_lan` int(3) NOT NULL,
  `ceu_in_lan` int(3) NOT NULL,
  `ceu_fi_lan` int(3) NOT NULL,
  `atm_in_lan` int(5) NOT NULL,
  `atm_fi_lan` int(5) NOT NULL,
  `lat_in_rec` int(20) NOT NULL,
  `lat_fi_rec` int(20) NOT NULL,
  `long_in_rec` int(20) NOT NULL,
  `long_fi_rec` int(20) NOT NULL,
  `data_in_rec` date NOT NULL,
  `data_fi_rec` date NOT NULL,
  `hora_in_rec` time NOT NULL,
  `hora_fi_rec` time NOT NULL,
  `prof_in_rec` int(3) NOT NULL,
  `prof_fi_rec` int(3) NOT NULL,
  `rumo_in_rec` varchar(5) NOT NULL,
  `rumo_fi_rec` varchar(5) NOT NULL,
  `dvento_in_rec` varchar(5) NOT NULL,
  `dvento_fi_rec` varchar(5) NOT NULL,
  `vvento_in_rec` int(3) NOT NULL,
  `vvento_fi_rec` int(3) NOT NULL,
  `mar_in_rec` int(3) NOT NULL,
  `mar_fi_rec` int(3) NOT NULL,
  `tar_in_rec` int(3) NOT NULL,
  `tar_fi_rec` int(3) NOT NULL,
  `tsmar_in_rec` int(3) NOT NULL,
  `tsmar_fi_rec` int(3) NOT NULL,
  `ceu_in_rec` int(3) NOT NULL,
  `ceu_fi_rec` int(3) NOT NULL,
  `atm_in_rec` int(5) NOT NULL,
  `atm_fi_rec` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `capt_incidental`
--

CREATE TABLE IF NOT EXISTS `capt_incidental` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cruzeiro` varchar(150) NOT NULL,
  `observador` int(3) NOT NULL,
  `embarcacao` varchar(150) NOT NULL,
  `lance` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `especie` varchar(150) NOT NULL,
  `etiqueta` int(10) NOT NULL,
  `boia_radio` int(4) NOT NULL,
  `quantidade` int(2) NOT NULL,
  `lat` int(12) NOT NULL,
  `lon` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `capt_incidental`
--

INSERT INTO `capt_incidental` (`id`, `cruzeiro`, `observador`, `embarcacao`, `lance`, `data`, `especie`, `etiqueta`, `boia_radio`, `quantidade`, `lat`, `lon`) VALUES
(1, '', 0, '', '1', '2014-01-08', '1', 1234, 9, 15, 321654, 456123),
(2, '', 0, '', '2', '2014-01-31', '5', 3214, 7, 8, 456, 321);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cont_boia`
--

CREATE TABLE IF NOT EXISTS `cont_boia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `viagem` int(5) NOT NULL,
  `lance` int(3) NOT NULL,
  `boia_radio` int(3) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `temp_agua` int(2) NOT NULL,
  `prof` int(4) NOT NULL,
  `atm` int(8) NOT NULL,
  `lat` int(12) NOT NULL,
  `lon` int(12) NOT NULL,
  `especie` int(4) NOT NULL,
  `quantidade` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cont_boia`
--

INSERT INTO `cont_boia` (`id`, `viagem`, `lance`, `boia_radio`, `data`, `hora`, `temp_agua`, `prof`, `atm`, `lat`, `lon`, `especie`, `quantidade`) VALUES
(1, 0, 1, 4, '2014-12-31', '12:54:00', 21, 150, 1234, 456987, 123654, 6, 7),
(2, 0, 2, 9, '2014-01-01', '12:45:00', 22, 135, 1234, 456321, 456321, 7, 0),
(3, 0, 1, 4, '2014-12-31', '12:54:00', 21, 150, 1234, 456987, 123654, 6, 7),
(4, 0, 3, 7, '2014-01-01', '23:00:00', 221, 142, 1234, 456321, 123654, 8, 0),
(5, 0, 1, 4, '2014-12-31', '12:54:00', 21, 150, 1234, 456987, 123654, 6, 7),
(6, 0, 2, 3, '2014-01-01', '23:59:00', 23, 134, 1234, 456321, 123456, 8, 14);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `embarcacao`
--

INSERT INTO `embarcacao` (`id`, `nome`, `registro`, `fabricacao`, `comprimento`, `material`, `capacidade`, `arque_bruta`, `conservacao`, `tripulacao`) VALUES
(1, 'Akira', 7896541, 1992, 20, 'madeira', 25, 32, 'gelo', 8),
(2, 'Floripa SL3', 987456, 2000, 18, 'madeira', 45, 60, 'gelo', 12),
(3, 'Cordeiro de Deus', 321456, 1994, 35, 'aco', 60, 75, 'camera_fria', 15),
(4, 'Togo', 987456, 2000, 24, 'fibra', 40, 55, 'salmoura', 7),
(5, 'Dominio Azul', 321584, 2002, 22, 'aco', 45, 55, 'circuito_aberto', 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `contato`, `tel`) VALUES
(7, 'GDC', 987456312, 'Daniel Souza', '047-8745-9521'),
(9, 'Coqueiros', 8541362, 'Marcio', '047895132'),
(10, 'Kowalsky', 8755121, 'JosÃ© Carlos', '45632179');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `especies`
--

INSERT INTO `especies` (`id`, `categoria`, `sub_categoria`, `nome_popular`, `nome_pop_ingles`, `nome_cient`) VALUES
(1, 'Aves', 'NÃ£o existe', 'Albatroz de TristÃ£o', 'Tristan/Gough Albatross', 'Diomedea dabbenena'),
(2, 'Aves', 'NÃ£o existe', 'Albatroz-de-nariz-amarelo-do-AtlÃ¢ntico', 'Atlantic/Western Yellow-nosed Albatross', 'Thalassarche chlororhynchos'),
(3, 'Aves', 'NÃ£o existe', 'Albatroz-de-sobrancelha-negra', 'Black-browed Albatross', 'Thalassarche melanophris'),
(4, 'Aves', 'NÃ£o existe', 'Pardela-da-Trindade', 'Trinidade Petrel', 'Pterodroma arminjoniana'),
(5, 'Aves', 'NÃ£o existe', 'Albatroz-errante', 'Diomedea exulans', 'Wandering Albatross'),
(6, 'Peixes', 'Ã“sseo', 'AgulhÃ£o-vela', 'Atlantic sailfish', 'Istiophorus albicans'),
(7, 'Peixes', 'Cartilaginoso', 'Raia jamanta', 'Manta ray', 'Manta birostris'),
(8, 'Peixes', 'Cartilaginoso', 'CaÃ§Ã£o cabeÃ§a-chata', 'Carcharhinus.obscurus', 'Dusky shark'),
(9, 'Peixes', 'Ã“sseo', 'Bonito-listrado', 'Skipjack tuna', 'Katsuwonus.pelamis'),
(10, 'Peixes', 'Ã“sseo', 'Albacora-bandolim', 'Albacore', 'Thunnus.alalunga'),
(11, 'Peixes', 'Ã“sseo', 'Albacora-lage', 'Yellowfin tuna', 'Thunnus.albacares'),
(12, 'Peixes', 'Ã“sseo', 'Meka', 'Swordfish', 'Xiphias.gladius');

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
  PRIMARY KEY (`viagem`),
  KEY `cod_obser` (`cod_obser`),
  KEY `cod_obser_2` (`cod_obser`),
  KEY `cod_embar` (`cod_embar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `geral`
--

INSERT INTO `geral` (`viagem`, `cod_obser`, `cod_embar`, `cod_mestr`, `cod_empre`, `data_saida`, `data_chegada`, `financiador`, `obs`) VALUES
(1, 4, 1, 1, 9, '2014-03-01', '2014-03-31', 'ATF-PA', 'nenhuma obs'),
(2, 4, 5, 3, 10, '2013-12-04', '2014-01-29', 'ATF-PA', 'nada a declarar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `isca`
--

CREATE TABLE IF NOT EXISTS `isca` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `isca`
--

INSERT INTO `isca` (`id`, `nome`) VALUES
(1, 'lula'),
(2, 'sardinha'),
(3, 'bonito'),
(4, 'cavalinha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mestre`
--

CREATE TABLE IF NOT EXISTS `mestre` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `mestre`
--

INSERT INTO `mestre` (`id`, `nome`) VALUES
(1, 'Dudu'),
(2, 'Paulo Jorge'),
(3, 'FabrÃ­cio Lopes');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `observador`
--

INSERT INTO `observador` (`id`, `nome`, `cpf`, `rg`, `tel`, `email`, `skype`, `endereco`, `foto`) VALUES
(1, 'Andre Santoro', 49940, 1234123, 2147483647, 'andre.santoro@gmail.com', 'aocean00', 'rua jorge tzachel 114 bloco C apt 304', 'foto.11-03-14_11-05-34.JPG'),
(3, 'Rodrigo SantAna', 123456789, 1234123, 47, 'rsantana@albatroz.org.br', 'sant.ana.rodrigo', 'rua uruguai 1300, apt 304', 'foto.11-03-14_11-07-17.JPG');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod_pesca`
--

CREATE TABLE IF NOT EXISTS `prod_pesca` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cruzeiro` int(4) NOT NULL,
  `lance` int(3) NOT NULL,
  `data` date NOT NULL,
  `boia` int(4) NOT NULL,
  `especie` int(4) NOT NULL,
  `quantidade` int(4) NOT NULL,
  `predacao` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `prod_pesca`
--

INSERT INTO `prod_pesca` (`id`, `cruzeiro`, `lance`, `data`, `boia`, `especie`, `quantidade`, `predacao`) VALUES
(1, 0, 2, '2014-01-01', 5, 1, 17, 'orca'),
(2, 0, 2, '2014-01-01', 5, 10, 23, 'asdasd'),
(3, 0, 2, '2014-01-01', 5, 9, 2, 'asdfsdf'),
(4, 8, 0, '0000-00-00', 0, 0, 0, ''),
(5, 14, 14, '2014-12-01', 8, 1, 47, 'dsffsd'),
(6, 14, 14, '2014-12-01', 8, 10, 12, 'sdfdfas'),
(7, 14, 0, '0000-00-00', 0, 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
