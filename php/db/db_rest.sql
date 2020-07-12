-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 12, 2020 at 02:10 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb-mesas`
--

DROP TABLE IF EXISTS `tb-mesas`;
CREATE TABLE IF NOT EXISTS `tb-mesas` (
  `IdMesa` int(10) NOT NULL,
  `qtdAcentos` int(20) NOT NULL,
  `reservado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb-mesas`
--

INSERT INTO `tb-mesas` (`IdMesa`, `qtdAcentos`, `reservado`) VALUES
(1, 5, 0),
(2, 2, 0),
(3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_clientes`
--

DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `telefone` bigint(15) NOT NULL,
  `telefone2` bigint(15) NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
