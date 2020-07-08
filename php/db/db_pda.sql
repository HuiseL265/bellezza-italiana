-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 06, 2020 at 05:33 PM
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
-- Database: `db_pda`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_restaurante`
--

DROP TABLE IF EXISTS `tb_restaurante`;
CREATE TABLE IF NOT EXISTS `tb_restaurante` (
  `codRes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cep` int(8) NOT NULL,
  `rua` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `num` int(10) NOT NULL,
  `cpfResponsavel` bigint(11) NOT NULL,
  `cnpj` bigint(14) NOT NULL,
  `telefone` bigint(15) NOT NULL,
  `telefone2` bigint(15) NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`codRes`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_restaurante`
--

INSERT INTO `tb_restaurante` (`codRes`, `nome`, `email`, `cep`, `rua`, `num`, `cpfResponsavel`, `cnpj`, `telefone`, `telefone2`, `senha`) VALUES
(14, 'RestExemplo', 'RestEx@email.com', 11111111, 'Rua aleatoria', 1111, 66666666666, 55555555555555, 11777777777, 11888888888, '883fb98c56421224ce07c04318b0eeb7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
