-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 24-Jul-2020 às 14:18
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
  `nome` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `telefone` bigint(15) NOT NULL,
  `telefone2` bigint(15) NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`codCliente`, `nome`, `email`, `cpf`, `telefone`, `telefone2`, `senha`) VALUES
(21, 'Vitor Pereira', 'vitor-per@hotmail.com', 50576009822, 11222222222, 11333333333, 'b17f831f6881a76161a5c06a94473a6b'),
(27, 'Thiago Frederico', 'thiagofrederico3@gmail.com', 45484515135, 40028922554, 36987455454, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pratopedido`
--

DROP TABLE IF EXISTS `tb_pratopedido`;
CREATE TABLE IF NOT EXISTS `tb_pratopedido` (
  `idPedido` int(200) NOT NULL AUTO_INCREMENT,
  `idReserva` int(100) NOT NULL,
  `idComida` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idComida_fk` (`idComida`),
  KEY `idReserva_fk` (`idReserva`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pratos`
--

DROP TABLE IF EXISTS `tb_pratos`;
CREATE TABLE IF NOT EXISTS `tb_pratos` (
  `idComida` int(255) NOT NULL AUTO_INCREMENT,
  `comida` varchar(100) NOT NULL,
  `DescricaoPrato` text NOT NULL,
  PRIMARY KEY (`idComida`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_pratos`
--

INSERT INTO `tb_pratos` (`idComida`, `comida`, `DescricaoPrato`) VALUES
(1, 'Arancini', 'O Arancini é uma especialidade da culinária siciliana. É uma bola de arroz empanado e frito, recheado com molho de carne, ervilhas e queijo ou presunto em cubos e mussarela.'),
(2, 'Bisteca Fiorentina', 'A Bistecca Fiorentina é um prato de carne típico da cozinha italiana muito tradicional na região da Toscana. Consiste em um corte que contém o contra filé e o filé mignon bovino.'),
(3, 'Bruschetta', '​A Bruschetta é um antepasto italiano feito com uma fatia de pão italiano rústico, de farinha escura e grossa, de casca dura, tostada na grelha, esfregada com alho, untada com abundante azeite e polvilhada com sal e eventualmente com pimenta-do-reino.'),
(4, 'Cacio e Pepe', 'Apesar do nome chique, cacio e pepe significa “queijo e pimenta”. Ou seja, esse espaguete é feito com queijo local de pecorino (cacio) e pimenta do reino preta moída (pepe) – é um prato clássico romano.'),
(5, 'Lasanha', 'Lasanha (lasagne em italiano) é tanto um tipo de massa alimentícia formada por fitas largas, como também um prato, por vezes chamado lasanha ao forno, feito com essas fitas colocadas em camadas, e entremeadas com recheio (queijo, carne moída ou outros) e molho.\r\n'),
(6, 'Macarrão à Bolonhesa', 'O Macarrão à Bolonhesa tem como origem a região da Bolonha na Itália, é na verdade mais uma forma de utilizar um dos molhos mais conhecidos da culinária italiana, o molho à Bolonhesa.\r\nEste molho, a base de tomate e carne moída é usado em diversas outras receitas de massas, como por exemplo, a lasanha à Bolonhesa.'),
(7, 'Ossobuco', 'Típico da Lombardia, o Ossobuco é o corte extraído da perna traseira do boi e nada mais é do que o conhecido músculo, só que cortado de modo diferente, em rodelas grossas de carne com um osso ao centro. É nesse osso oco, que está acomodado o tutano, com sabor e textura inigualável.'),
(8, 'Risoto', 'O risoto é um prato típico italiano em que se fritam levemente as cebolas e o arbório, ou o arroz em manteiga, e se vai gradualmente deitando fundo de carne ou legumes e outros ingredientes, até o arroz estar cozido e não poder absorver mais líquido.'),
(9, 'Tiramisù', 'O Tiramisù ( \"levanta-me\" ou \"puxa-me para cima\", assim chamado por ser muito energético) é uma sobremesa tipicamente italiana, possivelmente originária da cidade de Treviso, na região do Vêneto, e que consiste em camadas de biscoitos de champagne embebidas em café entremeadas por um creme à base de queijo mascarpone, creme de leite fresco, ovos, açúcar, vinho do tipo Marsala e polvilhadas com cacau em pó e café.'),
(10, 'Gelato', 'Gelato é o sorvete feito no estilo italiano. Gelato é simplesmente a palavra italiana para sorvete, mas também passou a significar especificamente o sorvete italiano. O gelato é feito com uma base de leite, creme e açúcar, além de ser aromatizado com purê de frutas e nozes e outros aromas.');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Registro das Reservas';

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
