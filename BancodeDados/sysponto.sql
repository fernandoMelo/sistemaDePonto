-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jan-2016 às 15:23
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bancodehoras`
--

CREATE TABLE `bancodehoras` (
  `bancodehorasid` int(11) NOT NULL,
  `horas` int(11) DEFAULT NULL,
  `pontoid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `funcionarioid` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(16) NOT NULL,
  `salario` double NOT NULL,
  `cargahoraria` int(11) NOT NULL,
  `status` int(1) DEFAULT '0',
  `email` varchar(30) DEFAULT NULL,
  `identidade` varchar(13) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`funcionarioid`, `nome`, `cpf`, `salario`, `cargahoraria`, `status`, `email`, `identidade`, `login`, `senha`) VALUES
(7, 'Fernando Barbosa Melo', '183.781.237-', 1500, 40, 1, 'melo.tads@gmail.com', 'MG-12.123.000', 'melo.tads', '202cb962ac59075b964b07152d234b70'),
(8, 'Murilo Sandiego', '111.111.111-', 800, 40, 0, 'murilo@gmail.com', '12.122.122', 'murilo', '202cb962ac59075b964b07152d234b70'),
(9, 'Walisson Farias', '123-123-123-', 450, 40, 0, 'walisson@email.com', 'MG-12.123.123', 'walisson', '202cb962ac59075b964b07152d234b70'),
(12, 'Administrador', '101.010.101-', 800, 30, 1, 'admin@admin.com', '12121211122', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE `ponto` (
  `pontoid` int(11) NOT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaAlmoco` time DEFAULT NULL,
  `horaAlmocoVolta` time DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `funcionarioid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`pontoid`, `horaEntrada`, `horaAlmoco`, `horaAlmocoVolta`, `horaSaida`, `data`, `funcionarioid`) VALUES
(8, '12:18:04', '16:56:33', '17:27:51', '17:33:44', '2015-06-19 15:18:06', 7),
(10, '13:43:42', '18:11:31', '18:11:33', '18:11:35', '2015-06-19 16:43:43', 6),
(61, '13:55:26', '14:34:47', '14:34:56', '14:35:04', '2015-06-22 16:55:28', 9),
(60, '13:30:18', '13:30:32', NULL, NULL, '2015-06-22 16:30:21', 8),
(58, '00:48:47', '00:48:52', '00:48:53', '00:48:54', '2015-06-22 03:48:49', 6),
(57, '13:19:07', '13:19:10', '13:19:11', '13:19:11', '2015-06-21 16:19:10', 8),
(56, '13:15:50', '13:15:55', '13:15:57', '13:15:58', '2015-06-21 16:15:55', 6),
(55, '23:00:57', '23:01:00', '23:01:05', '23:01:06', '2015-06-21 02:01:00', 10),
(54, '19:03:56', '19:03:56', '19:59:40', '20:06:43', '2015-06-20 22:04:57', 9),
(49, '19:06:56', '19:07:04', '19:07:12', '19:07:19', '2015-06-19 22:07:04', 8),
(62, '17:52:25', '17:52:26', '17:52:30', '17:52:32', '2016-01-19 19:52:26', 7),
(67, '01:18:40', '01:18:43', '01:18:45', '01:18:46', '2016-01-20 03:18:43', 7),
(68, '11:21:20', '11:21:21', '11:21:24', '11:21:28', '2016-01-26 13:21:21', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuarioid` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bancodehoras`
--
ALTER TABLE `bancodehoras`
  ADD PRIMARY KEY (`bancodehorasid`),
  ADD KEY `pontoid` (`pontoid`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`funcionarioid`);

--
-- Indexes for table `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`pontoid`),
  ADD KEY `funcionarioid` (`funcionarioid`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bancodehoras`
--
ALTER TABLE `bancodehoras`
  MODIFY `bancodehorasid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `funcionarioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ponto`
--
ALTER TABLE `ponto`
  MODIFY `pontoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
