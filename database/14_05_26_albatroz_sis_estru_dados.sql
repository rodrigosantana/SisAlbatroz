-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 26-Maio-2014 às 14:54
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

--
-- Extraindo dados da tabela `abiot_geral`
--

INSERT INTO `abiot_geral` (`id`, `cruz`, `lance`, `isca`, `anzol`, `alvo`, `reg_peso`, `toriline`, `isca_tingida`, `obs`) VALUES
(12, 1, 2, 3, 1200, 5, 's', 's', 'n', 'nada a declarar'),
(13, 0, 2, 3, 1200, 5, 's', 's', 'n', 'nada a declarar'),
(14, 1, 1, 2, 1200, 3, 's', 'n', 's', 'dadsad'),
(15, 0, 1, 2, 1200, 3, 's', 'n', 's', 'dadsad'),
(16, 1, 3, 0, 0, 0, '', '', '', 'asdasd'),
(17, 0, 3, 0, 0, 0, '', '', '', 'asdasd'),
(18, 1, 3, 3, 1211, 5, 'n', 'n', 's', 'asdfasdfasd'),
(19, 1, 2, 3, 132, 5, 's', 'n', 'n', 'afsdfsda'),
(20, 0, 2, 3, 132, 5, 's', 'n', 'n', 'afsdfsda'),
(21, 1, 2, 3, 132, 5, 's', 'n', 'n', 'afsdfsda'),
(22, 0, 2, 3, 132, 5, 's', 'n', 'n', 'afsdfsda');

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

INSERT INTO `capt_incidental` (`id`, `cruzeiro`, `lance`, `data`, `especie`, `etiqueta`, `boia_radio`, `quantidade`, `lat`, `lon`) VALUES
(1, '1', '1', '2014-05-02', '2', 23, 2, 2, 12, 32),
(2, '1', '2', '2014-05-15', '1', 4, 4, 3, 34, 32);

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

--
-- Extraindo dados da tabela `embarcacao`
--

INSERT INTO `embarcacao` (`id`, `nome`, `registro`, `fabricacao`, `comprimento`, `material`, `capacidade`, `arque_bruta`, `conservacao`, `tripulacao`) VALUES
(1, 'Floripa SL3', 123456789, 1999, 19, 'madeira', 50, 120, 'gelo', 8),
(2, 'Jamar', 789654123, 2001, 30, 'aco', 100, 150, 'salmoura', 15);

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

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `contato`, `tel`) VALUES
(1, 'Coqueiro', 789654123, 'JoÃ£o da Silva', '47123654789'),
(2, 'GDC', 789965412, 'Julia MagalhÃ£es', '478965632');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_area_pesca`
--

CREATE TABLE IF NOT EXISTS `entrevista_area_pesca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entre` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `prof_inicial` int(5) NOT NULL,
  `prof_final` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `entrevista_area_pesca`
--

INSERT INTO `entrevista_area_pesca` (`id`, `id_entre`, `nome`, `prof_inicial`, `prof_final`) VALUES
(4, 7, 'leste de itajai', 200, 500),
(5, 8, 'leste de itajai', 200, 500),
(6, 9, 'leste de itajai', 200, 500),
(7, 10, 'leste de itajai', 200, 500),
(8, 11, 'leste de itajai', 200, 500),
(9, 11, 'sul de itajai', 100, 300),
(10, 12, '', 0, 0),
(11, 13, 'sul de itajai', 150, 250),
(12, 14, 'sul de itajai', 150, 250),
(13, 15, 'sul de itajai', 150, 250),
(14, 16, 'sul de itajai', 150, 250),
(15, 17, 'sul de itajai', 150, 250);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_arrasto`
--

CREATE TABLE IF NOT EXISTS `entrevista_arrasto` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_entre` int(5) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `arrasto_dia` int(2) NOT NULL,
  `tempo_medio` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `entrevista_arrasto`
--

INSERT INTO `entrevista_arrasto` (`id`, `id_entre`, `tipo`, `arrasto_dia`, `tempo_medio`) VALUES
(1, 10, 'simples', 2, 5),
(2, 11, 'simples', 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_capt_aves`
--

CREATE TABLE IF NOT EXISTS `entrevista_capt_aves` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_entre` int(5) NOT NULL,
  `aves_obser` varchar(5) NOT NULL,
  `aves_capt` varchar(5) NOT NULL,
  `nome_popular` int(5) NOT NULL,
  `nome_cient` int(5) NOT NULL,
  `quantidade` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_cerco`
--

CREATE TABLE IF NOT EXISTS `entrevista_cerco` (
  `id` int(5) NOT NULL,
  `id_entre` int(5) NOT NULL,
  `rede_altura` int(3) NOT NULL,
  `cerco_qtd` int(3) NOT NULL,
  `tempo_cerc` int(2) NOT NULL,
  `tempo_reco` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_emalhe`
--

CREATE TABLE IF NOT EXISTS `entrevista_emalhe` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_entre` int(5) NOT NULL,
  `rede_tipo` varchar(50) NOT NULL,
  `pano_comp` int(4) NOT NULL,
  `pano_altura` int(3) NOT NULL,
  `pano_qtd_lance` int(4) NOT NULL,
  `regime_trab` varchar(150) NOT NULL,
  `tempo_lanca` int(2) NOT NULL,
  `tempo_recolh` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_espi_fundo`
--

CREATE TABLE IF NOT EXISTS `entrevista_espi_fundo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_entre` int(5) NOT NULL,
  `espinhel_qtd` int(2) NOT NULL,
  `espinhel_anzois` int(4) NOT NULL,
  `lances_dia` int(2) NOT NULL,
  `lanc_hora_ini` time NOT NULL,
  `lanc_hora_fin` time NOT NULL,
  `reco_hora_ini` time NOT NULL,
  `reco_hora_fin` time NOT NULL,
  `toriline` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_espi_pelag`
--

CREATE TABLE IF NOT EXISTS `entrevista_espi_pelag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entre` int(11) NOT NULL,
  `espinhel_qtd` int(2) NOT NULL,
  `espinhel_anzois` int(5) NOT NULL,
  `lances_dia` int(2) NOT NULL,
  `lanc_hora_ini` time NOT NULL,
  `lanc_hora_fin` time NOT NULL,
  `reco_hora_ini` time NOT NULL,
  `reco_hora_fin` time NOT NULL,
  `toriline` int(11) NOT NULL,
  `light_stick` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_espi_super`
--

CREATE TABLE IF NOT EXISTS `entrevista_espi_super` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_entre` int(5) NOT NULL,
  `espinhel_qtd` int(2) NOT NULL,
  `espinhel_anzois` int(4) NOT NULL,
  `lances_dia` int(2) NOT NULL,
  `lanc_hora_ini` time NOT NULL,
  `lanc_hora_fin` time NOT NULL,
  `reco_hora_ini` time NOT NULL,
  `reco_hora_fin` time NOT NULL,
  `toriline` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_geral`
--

CREATE TABLE IF NOT EXISTS `entrevista_geral` (
  `id_entre` int(5) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `responsavel_campo` varchar(150) NOT NULL,
  `embarcacao` int(5) NOT NULL,
  `empresa` int(5) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `porto_saida` varchar(100) NOT NULL,
  `data_saida` date NOT NULL,
  `hora_saida` time NOT NULL,
  `data_chegada` date NOT NULL,
  `hora_chegada` time NOT NULL,
  `dias_mar` int(3) NOT NULL,
  `dias_pesca` int(3) NOT NULL,
  `petrecho` varchar(300) NOT NULL,
  PRIMARY KEY (`id_entre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `entrevista_geral`
--

INSERT INTO `entrevista_geral` (`id_entre`, `data`, `responsavel_campo`, `embarcacao`, `empresa`, `estado`, `cidade`, `porto_saida`, `data_saida`, `hora_saida`, `data_chegada`, `hora_chegada`, `dias_mar`, `dias_pesca`, `petrecho`) VALUES
(7, '2014-05-29', 'andre', 1, 1, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '02:00:00', 20, 10, '2'),
(8, '2014-05-29', 'andre', 1, 1, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '02:00:00', 20, 10, '1'),
(9, '2014-05-29', 'andre', 1, 1, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '02:00:00', 20, 10, '1'),
(10, '2014-05-29', 'andre', 1, 1, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '02:00:00', 20, 10, '1'),
(11, '2014-05-29', 'andre', 1, 1, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '02:00:00', 20, 10, '1'),
(12, '0000-00-00', '', 0, 0, '', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, '--Selecione--'),
(13, '2014-05-23', 'andre', 1, 2, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '04:00:00', 25, 15, '7'),
(14, '2014-05-23', 'andre', 1, 2, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '04:00:00', 25, 15, '7'),
(15, '2014-05-23', 'andre', 1, 2, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '04:00:00', 25, 15, '7'),
(16, '2014-05-23', 'andre', 1, 2, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '04:00:00', 25, 15, '7'),
(17, '2014-05-23', 'andre', 1, 2, 'SC', 'ItajaÃ­', 'JS', '2014-05-01', '01:00:00', '2014-05-31', '04:00:00', 25, 15, '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_linha_mao`
--

CREATE TABLE IF NOT EXISTS `entrevista_linha_mao` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_entre` int(5) NOT NULL,
  `linha_qtd` int(3) NOT NULL,
  `linha_anzois` int(5) NOT NULL,
  `lances_dia` int(3) NOT NULL,
  `regime_trab` varchar(50) NOT NULL,
  `hora_inic` time NOT NULL,
  `hora_fin` time NOT NULL,
  `petrecho` varchar(50) NOT NULL,
  `outros` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_vara_isca_viva`
--

CREATE TABLE IF NOT EXISTS `entrevista_vara_isca_viva` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_entre` int(5) NOT NULL,
  `dias_capeando` int(2) NOT NULL,
  `lances_qtd` int(3) NOT NULL,
  `pescadores_qtd` int(2) NOT NULL,
  `boia` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Extraindo dados da tabela `especies`
--

INSERT INTO `especies` (`id`, `categoria`, `sub_categoria`, `nome_popular`, `nome_pop_ingles`, `nome_cient`) VALUES
(1, 'Aves', 'NÃ£o existe', 'Albatroz-de-sobrancelha-negra', 'Black-browed Albatross', 'Thalassarche melanophris'),
(2, 'Aves', 'NÃ£o existe', 'Albatroz-de-nariz-amarelo-do-AtlÃ¢ntico', 'Atlantic/Western Yellow-nosed Albatross', 'Thalassarche melanophris'),
(3, 'Peixes', 'Cartilaginoso', 'Raia jamanta', 'Manta ray', 'Manta birostris'),
(4, 'Peixes', 'Cartilaginoso', 'TubarÃ£o anequim', 'Mako shark', 'Isurus oxyrinchus '),
(5, 'Peixes', 'Ã“sseo', 'Albacora-bandolim', 'Bigeye tuna', 'Thunnus obesus');

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

--
-- Extraindo dados da tabela `geral`
--

INSERT INTO `geral` (`viagem`, `cod_obser`, `cod_embar`, `cod_mestr`, `cod_empre`, `data_saida`, `data_chegada`, `financiador`, `obs`) VALUES
(1, 2, 1, 1, 1, '2014-04-01', '2014-04-30', 'ATF - PA', 'problema no motor. atraso na volta.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `isca`
--

CREATE TABLE IF NOT EXISTS `isca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `isca`
--

INSERT INTO `isca` (`id`, `nome`) VALUES
(1, 'sardinha'),
(2, 'lula'),
(3, 'cavalinha');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `mapa_bordo_geral`
--

INSERT INTO `mapa_bordo_geral` (`id_mb`, `embarcacao`, `mestre`, `data_saida`, `data_chegada`, `obs`) VALUES
(3, 0, 0, '0000-00-00', '0000-00-00', ''),
(4, 0, 0, '0000-00-00', '0000-00-00', ''),
(5, 1, 0, '2014-05-01', '2014-05-31', ''),
(6, 1, 0, '2014-05-01', '2014-05-31', ''),
(7, 1, 0, '2014-05-01', '2014-05-31', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa_bordo_lance`
--

CREATE TABLE IF NOT EXISTS `mapa_bordo_lance` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `mapa_bordo_lance`
--

INSERT INTO `mapa_bordo_lance` (`id`, `id_mb`, `lance`, `data_lance`, `lat`, `lon`, `anzol`, `isca`, `hora_lan`, `hora_rec`, `ave_capt`, `mm_uso`) VALUES
(7, 3, 1, '0000-00-00', 0, 0, 0, 0, '00:00:00', '00:00:00', 's', 'total'),
(8, 3, 2, '0000-00-00', 0, 0, 0, 0, '00:00:00', '00:00:00', 'n', 'parcial'),
(9, 4, 1, '0000-00-00', 0, 0, 0, 0, '00:00:00', '00:00:00', 's', 'total'),
(10, 4, 2, '0000-00-00', 0, 0, 0, 0, '00:00:00', '00:00:00', 'n', 'parcial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa_bordo_mm`
--

CREATE TABLE IF NOT EXISTS `mapa_bordo_mm` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_mb` int(4) NOT NULL,
  `lance` int(4) NOT NULL,
  `mm` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `mapa_bordo_mm`
--

INSERT INTO `mapa_bordo_mm` (`id`, `id_mb`, `lance`, `mm`) VALUES
(1, 3, 1, ''),
(2, 3, 2, ''),
(3, 3, 1, ''),
(4, 3, 2, ''),
(5, 4, 1, ''),
(6, 4, 2, ''),
(7, 4, 1, ''),
(8, 4, 2, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mestre`
--

CREATE TABLE IF NOT EXISTS `mestre` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `mestre`
--

INSERT INTO `mestre` (`id`, `nome`) VALUES
(1, 'Dudu'),
(2, 'Paulo Jorge');

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

--
-- Extraindo dados da tabela `observador`
--

INSERT INTO `observador` (`id`, `nome`, `cpf`, `rg`, `tel`, `email`, `skype`, `endereco`, `foto`) VALUES
(1, 'AndrÃ© Santoro', 499405656, 8596314, 2147483647, 'andre.santoro@gmail.com', 'aocean00', 'Rua Jorge Tzachel 114 bloco C apt 304', 'foto.30-04-14_15-53-48.jpg'),
(2, 'Rodrigo SantAna', 123456789, 1234123, 47, 'rsantana@albatroz.org.br', 'sant.ana.rodrigo', 'asfdasfasd', 'foto.30-04-14_16-24-17.jpg');

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
-- Estrutura da tabela `petrecho`
--

CREATE TABLE IF NOT EXISTS `petrecho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `petrecho`
--

INSERT INTO `petrecho` (`id`, `nome`) VALUES
(1, 'Arrasto'),
(2, 'Espinhel de superfície'),
(3, 'Espinhel pelágico'),
(4, 'Espinhel de fundo'),
(5, 'Vara e isca viva'),
(6, 'Rede de emalhe'),
(7, 'Linha de mão'),
(8, 'Cerco');

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
