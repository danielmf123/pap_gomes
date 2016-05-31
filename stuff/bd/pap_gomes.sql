-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 31-Maio-2016 às 13:43
-- Versão do servidor: 5.5.44-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pap_gomes`
--
CREATE DATABASE IF NOT EXISTS `pap_gomes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pap_gomes`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Carrinho`
--

CREATE TABLE IF NOT EXISTS `Carrinho` (
`ID` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Produto_ID` int(11) NOT NULL,
  `Utilizador_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Categoria`
--

CREATE TABLE IF NOT EXISTS `Categoria` (
`ID` int(11) NOT NULL,
  `Categoria` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Categoria`
--

INSERT INTO `Categoria` (`ID`, `Categoria`) VALUES
(5, 'CPU'),
(6, 'Placas Gráficas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Produto`
--

CREATE TABLE IF NOT EXISTS `Produto` (
`ID` int(11) NOT NULL,
  `Produto` varchar(100) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `Preco` decimal(10,2) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Categoria_ID` int(11) NOT NULL,
  `Imagem` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Produto`
--

INSERT INTO `Produto` (`ID`, `Produto`, `Descricao`, `Preco`, `Quantidade`, `Categoria_ID`, `Imagem`) VALUES
(6, 'Intel K550', 'Ultra Rápido', 222.20, 1, 5, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Intel-logo.svg/200px-Intel-logo.svg.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Utilizador`
--

CREATE TABLE IF NOT EXISTS `Utilizador` (
`ID` int(11) NOT NULL,
  `Utilizador` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Morada` varchar(100) NOT NULL,
  `Telefone` int(11) NOT NULL,
  `Tipo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Utilizador`
--

INSERT INTO `Utilizador` (`ID`, `Utilizador`, `Password`, `Morada`, `Telefone`, `Tipo`) VALUES
(1, 'Gomes', '827ccb0eea8a706c4c34a16891f84e7b', 'Rua das Otilias', 96925012, 'Administrador'),
(2, 'Rui', '827ccb0eea8a706c4c34a16891f84e7b', 'Rua de Baixo', 96222554, 'Utilizador'),
(3, 'Daniel', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Rua do Paulo', 852741963, 'Utilizador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Visitas`
--

CREATE TABLE IF NOT EXISTS `Visitas` (
`ID` int(11) NOT NULL,
  `Localizacao` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Visitas`
--

INSERT INTO `Visitas` (`ID`, `Localizacao`) VALUES
(1, '194.210.216.167'),
(2, '194.210.216.167'),
(3, '194.210.216.167'),
(4, '194.210.216.167'),
(5, '194.210.216.167'),
(6, '194.210.216.167'),
(7, '194.210.216.167'),
(8, '194.210.216.167'),
(9, '194.210.216.167'),
(10, '194.210.216.167'),
(11, '194.210.216.167'),
(12, '194.210.216.167'),
(13, '89.115.153.222'),
(14, '89.115.153.222'),
(15, '89.115.153.222'),
(16, '89.115.153.222'),
(17, '89.115.153.222'),
(18, '89.115.153.222'),
(19, '89.115.153.222'),
(20, '89.115.153.222'),
(21, '89.115.153.222'),
(22, '89.115.153.222'),
(23, '89.115.153.222'),
(24, '89.115.153.222'),
(25, '89.115.153.222'),
(26, '89.115.153.222'),
(27, '89.115.153.222'),
(28, '89.115.153.222'),
(29, '89.115.153.222'),
(30, '89.115.153.222'),
(31, '89.115.153.222'),
(32, '89.115.153.222'),
(33, '89.115.153.222'),
(34, '89.115.153.222'),
(35, '89.115.153.222'),
(36, '89.115.153.222'),
(37, '89.115.153.222'),
(38, '89.115.153.222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Carrinho`
--
ALTER TABLE `Carrinho`
 ADD PRIMARY KEY (`ID`), ADD KEY `Produto_ID` (`Produto_ID`), ADD KEY `Utilizador_ID` (`Utilizador_ID`);

--
-- Indexes for table `Categoria`
--
ALTER TABLE `Categoria`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- Indexes for table `Produto`
--
ALTER TABLE `Produto`
 ADD PRIMARY KEY (`ID`), ADD KEY `Categoria_ID` (`Categoria_ID`), ADD KEY `ID` (`ID`);

--
-- Indexes for table `Utilizador`
--
ALTER TABLE `Utilizador`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Visitas`
--
ALTER TABLE `Visitas`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Carrinho`
--
ALTER TABLE `Carrinho`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Categoria`
--
ALTER TABLE `Categoria`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Produto`
--
ALTER TABLE `Produto`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Utilizador`
--
ALTER TABLE `Utilizador`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Visitas`
--
ALTER TABLE `Visitas`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Carrinho`
--
ALTER TABLE `Carrinho`
ADD CONSTRAINT `Carrinho_ibfk_2` FOREIGN KEY (`Utilizador_ID`) REFERENCES `Utilizador` (`ID`),
ADD CONSTRAINT `Carrinho_ibfk_1` FOREIGN KEY (`Produto_ID`) REFERENCES `Produto` (`ID`);

--
-- Limitadores para a tabela `Produto`
--
ALTER TABLE `Produto`
ADD CONSTRAINT `Produto_ibfk_1` FOREIGN KEY (`Categoria_ID`) REFERENCES `Categoria` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
