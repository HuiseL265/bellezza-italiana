-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 13, 2020 at 08:52 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_clientes`
--

INSERT INTO `tb_clientes` (`cod`, `nome`, `email`, `cpf`, `telefone`, `telefone2`, `senha`) VALUES
(1, 'UsuarioExemplo', 'UsuarioExemplo@email.com', 11111111, 1122222222, 1133333333, '321'),
(21, 'Vitor Pereira', 'vitor-per@hotmail.com', 50576009822, 11222222222, 11333333333, 'b17f831f6881a76161a5c06a94473a6b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mesas`
--

DROP TABLE IF EXISTS `tb_mesas`;
CREATE TABLE IF NOT EXISTS `tb_mesas` (
  `IdMesa` int(10) NOT NULL,
  `qtdAcentos` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_mesas`
--

INSERT INTO `tb_mesas` (`IdMesa`, `qtdAcentos`) VALUES
(1, 5),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_reserva`
--

DROP TABLE IF EXISTS `tb_reserva`;
CREATE TABLE IF NOT EXISTS `tb_reserva` (
  `IdMesa` int(10) NOT NULL,
  `clienteID` int(10) NOT NULL,
  `nomeCliente` varchar(40) NOT NULL,
  `hora` time NOT NULL,
  `data` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Registro das Reservas';

--
-- Dumping data for table `tb_reserva`
--

INSERT INTO `tb_reserva` (`IdMesa`, `clienteID`, `nomeCliente`, `hora`, `data`, `status`) VALUES
(1, 11, 'Vitor P', '10:00:00', '2020-07-13', 'Pedente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
