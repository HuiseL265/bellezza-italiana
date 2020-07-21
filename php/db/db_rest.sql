-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 21-Jul-2020 às 13:19
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_rest`
--
CREATE DATABASE IF NOT EXISTS `db_rest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_rest`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `codCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `telefone` bigint(15) NOT NULL,
  `telefone2` bigint(15) NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`codCliente`, `nome`, `email`, `cpf`, `telefone`, `telefone2`, `senha`) VALUES
(21, 'Vitor Pereira', 'vitor-per@hotmail.com', 50576009822, 11222222222, 11333333333, 'b17f831f6881a76161a5c06a94473a6b'),
(22, 'Thiago Frederico ', 'thiagofrederico3@gmail.com', 45484515135, 40028922, 3698745, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pratopedido`
--

DROP TABLE IF EXISTS `tb_pratopedido`;
CREATE TABLE IF NOT EXISTS `tb_pratopedido` (
  `idReserva` int(100) NOT NULL,
  `idComida` int(11) NOT NULL,
  KEY `idComida_fk` (`idComida`),
  KEY `idReserva_fk` (`idReserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pratos`
--

DROP TABLE IF EXISTS `tb_pratos`;
CREATE TABLE IF NOT EXISTS `tb_pratos` (
  `idComida` int(50) NOT NULL AUTO_INCREMENT,
  `comida` varchar(100) NOT NULL,
  PRIMARY KEY (`idComida`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_pratos`
--

INSERT INTO `tb_pratos` (`idComida`, `comida`) VALUES
(1, 'taco'),
(2, 'sushi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reserva`
--

DROP TABLE IF EXISTS `tb_reserva`;
CREATE TABLE IF NOT EXISTS `tb_reserva` (
  `idReserva` int(100) NOT NULL AUTO_INCREMENT,
  `IdMesa` int(10) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `nomeCliente` varchar(40) NOT NULL,
  `hora` time NOT NULL,
  `data` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `codCliente` (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Registro das Reservas';

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_pratopedido`
--
ALTER TABLE `tb_pratopedido`
  ADD CONSTRAINT `idComida_fk` FOREIGN KEY (`idComida`) REFERENCES `tb_pratos` (`idComida`),
  ADD CONSTRAINT `idReserva_fk` FOREIGN KEY (`idReserva`) REFERENCES `tb_reserva` (`idReserva`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `codCliente_fk` FOREIGN KEY (`codCliente`) REFERENCES `tb_clientes` (`codCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
