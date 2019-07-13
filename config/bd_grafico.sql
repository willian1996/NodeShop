-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 13-Jul-2019 às 16:15
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_grafico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `trafego`
--

DROP TABLE IF EXISTS `trafego`;
CREATE TABLE IF NOT EXISTS `trafego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `pagina` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `regiao` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `navegador` varchar(255) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `plataforma` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `trafego`
--

INSERT INTO `trafego` (`id`, `data`, `pagina`, `ip`, `cidade`, `regiao`, `pais`, `navegador`, `referencia`, `plataforma`) VALUES
(1, '2015-10-11 10:07:25', 'home', '::1', 'Osasco', 'São Paulo', 'Brasil', 'Chrome', 'Acesso direto ou não identificado', 'Windows 10'),
(2, '2015-11-08 13:07:25', 'services', '::1', 'Carapicuiba', 'São Paulo', 'Brasil', 'Chrome', 'Facebook', 'Android'),
(3, '2015-12-08 17:07:25', 'home', '::1', 'Osasco', 'São Paulo', 'Brasil', 'Chrome', 'Google', 'IOS'),
(4, '2016-01-23 14:07:25', 'home', '::1', 'Desconhecida', 'Desconhecida', 'Desconhecido', 'Chrome', 'Acesso direto ou não identificado', 'Windows 7'),
(5, '2016-02-04 13:07:25', 'home', '::1', 'Desconhecida', 'Desconhecida', 'Desconhecido', 'Chrome', 'Acesso direto ou não identificado', 'Windows 10'),
(6, '2016-02-06 02:07:25', 'home', '::1', 'Carapicuiba', 'São Paulo', 'Brasil', 'Chrome', 'Acesso direto ou não identificado', 'Windows 7'),
(7, '2016-02-07 14:07:25', 'home', '::1', 'Barueri', 'São Paulo', 'Brasil', 'Chrome', 'Acesso direto ou não identificado', 'Windows 10'),
(8, '2016-02-08 17:07:25', 'home', '::1', 'Desconhecida', 'Desconhecida', 'Desconhecido', 'Chrome', 'Acesso direto ou não identificado', 'Windows Phone'),
(9, '2016-02-08 14:07:25', 'home', '::1', 'Desconhecida', 'Desconhecida', 'Desconhecido', 'Chrome', 'Acesso direto ou não identificado', 'Windows Phone'),
(10, '2016-02-09 10:47:09', 'home', '::1', 'Desconhecida', 'Desconhecida', 'Desconhecido', 'Chrome', 'Acesso direto ou não identificado', 'Windows 10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
