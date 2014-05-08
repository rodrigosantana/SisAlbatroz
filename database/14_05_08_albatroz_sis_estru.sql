-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 08-Maio-2014 às 14:09
-- Versão do servidor: 5.5.37-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4

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
-- Estrutura da tabela `abiot_geral`
--

CREATE TABLE IF NOT EXISTS `abiot_geral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cruz` int(5) NOT NULL,
  `lance` int(2) NOT NULL,
  `isca` int(2) NOT NULL,
  `anzol` int(3) NOT NULL,
  `alvo` int(2) NOT NULL,
  `reg_peso` varchar(10) NOT NULL,
  `toriline` varchar(10) NOT NULL,
  `isca_tingida` varchar(10) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `abiot_lanc`
--

CREATE TABLE IF NOT EXISTS `abiot_lanc` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cruz` int(5) NOT NULL,
  `lance` int(5) NOT NULL,
  `lat_in` int(15) NOT NULL,
  `lat_fi` int(15) NOT NULL,
  `lon_in` int(15) NOT NULL,
  `lon_fi` int(15) NOT NULL,
  `data_in` date NOT NULL,
  `data_fi` date NOT NULL,
  `hora_in` time NOT NULL,
  `hora_fi` time NOT NULL,
  `prof_in` int(4) NOT NULL,
  `prof_fi` int(4) NOT NULL,
  `rumo_in` varchar(5) NOT NULL,
  `rumo_fi` int(5) NOT NULL,
  `vento_dire_in` int(5) NOT NULL,
  `vento_dir_fi` int(5) NOT NULL,
  `vento_vel_in` int(3) NOT NULL,
  `vento_vel_fi` int(3) NOT NULL,
  `mar_in` int(3) NOT NULL,
  `mar_fi` int(3) NOT NULL,
  `temp_ar_in` int(2) NOT NULL,
  `temp_ar_fi` int(2) NOT NULL,
  `temp_smar_in` int(2) NOT NULL,
  `temp_smar_fi` int(2) NOT NULL,
  `ceu_in` int(2) NOT NULL,
  `ceu_fi` int(2) NOT NULL,
  `atm_in` int(10) NOT NULL,
  `atm_fi` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `abiot_reco`
--

CREATE TABLE IF NOT EXISTS `abiot_reco` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cruz` int(5) NOT NULL,
  `lance` int(5) NOT NULL,
  `lat_in` int(15) NOT NULL,
  `lat_fi` int(15) NOT NULL,
  `lon_in` int(15) NOT NULL,
  `lon_fi` int(15) NOT NULL,
  `data_in` date NOT NULL,
  `data_fi` date NOT NULL,
  `hora_in` time NOT NULL,
  `hora_fi` time NOT NULL,
  `prof_in` int(4) NOT NULL,
  `prof_fi` int(4) NOT NULL,
  `rumo_in` varchar(5) NOT NULL,
  `rumo_fi` int(5) NOT NULL,
  `vento_dire_in` int(5) NOT NULL,
  `vento_dir_fi` int(5) NOT NULL,
  `vento_vel_in` int(3) NOT NULL,
  `vento_vel_fi` int(3) NOT NULL,
  `mar_in` int(3) NOT NULL,
  `mar_fi` int(3) NOT NULL,
  `temp_ar_in` int(2) NOT NULL,
  `temp_ar_fi` int(2) NOT NULL,
  `temp_smar_in` int(2) NOT NULL,
  `temp_smar_fi` int(2) NOT NULL,
  `ceu_in` int(2) NOT NULL,
  `ceu_fi` int(2) NOT NULL,
  `atm_in` int(10) NOT NULL,
  `atm_fi` int(10) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `isca`
--

CREATE TABLE IF NOT EXISTS `isca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa_bordo_geral`
--

CREATE TABLE IF NOT EXISTS `mapa_bordo_geral` (
  `id_mb` int(5) NOT NULL AUTO_INCREMENT,
  `embarcacao` int(3) NOT NULL,
  `mestre` int(3) NOT NULL,
  `data_saida` date NOT NULL,
  `data_chegada` date NOT NULL,
  `obs` varchar(500) NOT NULL,
  PRIMARY KEY (`id_mb`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa_bordo_lance`
--

CREATE TABLE IF NOT EXISTS `mapa_bordo_lance` (
  `id_mb` int(5) NOT NULL,
  `lance` int(4) NOT NULL,
  `data_lance` date NOT NULL,
  `lat` int(15) NOT NULL,
  `lon` int(15) NOT NULL,
  `anzol` int(4) NOT NULL,
  `isca` int(2) NOT NULL,
  `hora_lan` time NOT NULL,
  `hora_rec` time NOT NULL,
  `ave_capt` varchar(5) NOT NULL,
  `mm_uso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa_bordo_mm`
--

CREATE TABLE IF NOT EXISTS `mapa_bordo_mm` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_mb` int(4) NOT NULL,
  `lance` int(4) NOT NULL,
  `mm` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mestre`
--

CREATE TABLE IF NOT EXISTS `mestre` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod_pesca`
--

CREATE TABLE IF NOT EXISTS `prod_pesca` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `viagem` int(4) NOT NULL,
  `lance` int(3) NOT NULL,
  `data` date NOT NULL,
  `boia` int(4) NOT NULL,
  `especie` int(4) NOT NULL,
  `quantidade` int(4) NOT NULL,
  `predacao` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
