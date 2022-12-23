-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Dez-2022 às 00:42
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `artigos`
--
CREATE DATABASE IF NOT EXISTS `artigos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `artigos`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

CREATE TABLE `artigos` (
  `idartigos` int(11) NOT NULL,
  `tituloArt` varchar(250) NOT NULL,
  `imgArt` varchar(150) NOT NULL,
  `txtArt` text NOT NULL,
  `dataCadArt` date NOT NULL,
  `usuarios_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `idcom` int(11) NOT NULL,
  `txtcom` text NOT NULL,
  `dataCom` date NOT NULL,
  `usuarios_fk` int(11) NOT NULL,
  `artigos_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `prod_id` int(11) NOT NULL,
  `prod_nome` varchar(120) NOT NULL,
  `prod_validade` date NOT NULL,
  `prod_marca` varchar(120) NOT NULL,
  `prod_valor` double NOT NULL,
  `prod_img1` varchar(120) DEFAULT NULL,
  `prod_img2` varchar(120) DEFAULT NULL,
  `prod_img3` varchar(120) DEFAULT NULL,
  `prod_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`prod_id`, `prod_nome`, `prod_validade`, `prod_marca`, `prod_valor`, `prod_img1`, `prod_img2`, `prod_img3`, `prod_desc`) VALUES
(29, 'Televisão', '2022-12-23', 'LG', 2999, '63a0fe4f64fbe.jfif', '63a0fe4f65567.jfif', '63a0fe4f65a9a.jfif', 'Arroz marca Tio João'),
(30, 'Agua Sanitaria', '2022-12-03', 'Tubarão', 14.99, '63a0fea94d9ed.jfif', '63a0fea94e002.jfif', '63a0fea94e60d.jfif', 'Agua sanitaria para limpesa'),
(32, 'Celular Xiaomi', '2022-12-04', 'Xiaomi', 1999, '63a1023007b23.jfif', '63a1023008106.jfif', '63a10230086fb.jfif', 'Ceular Xaiomi ultima geração'),
(40, 'Geladeira', '2025-06-21', 'Brastemp', 499.99, '63a3965612dff.jfif', '63a39656135c6.jfif', '63a3965613af7.jfif', 'Geladeira Brastemp duas portas'),
(41, 'Picanha', '2022-12-31', 'Friboi', 19.99, '63a3970a45e30.jfif', '63a3970a46230.jfif', '63a3970a46619.jfif', 'Picanha a vacuo'),
(42, 'Celular Xiaomi', '2022-12-04', 'Xiaomi', 1999, '63a397e09225e.jfif', '63a397e092818.jfif', '63a397e092c4e.jfif', 'Celular Xiaomi ultima geração'),
(43, 'Felijão', '2022-12-31', 'Tio João', 9.99, '63a3986f3ea56.jfif', '63a3986f3f08e.jfif', '63a3986f3f5be.jfif', 'Feijão 1kg.'),
(44, 'Agua sanitaria', '2022-12-31', 'Tubarão', 14.99, '63a398b33d531.jfif', '63a398b33d9d6.jfif', '63a398b33e0f6.jfif', 'Agua sanitaria 1L.'),
(45, 'Oleo', '2022-12-31', 'Soya', 4.99, '63a3994848ca2.jfif', '63a39948490db.jfif', '63a399484945d.jfif', 'Oleo Soya 1L.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `dataCad` date NOT NULL,
  `tipoUser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `email`, `senha`, `dataCad`, `tipoUser`) VALUES
(51, 'ALINO', 'alino@adm.com', '202cb962ac59075b964b07152d234b70', '2022-12-19', 'adm'),
(52, 'Sandro', 'alino@comum.com', '202cb962ac59075b964b07152d234b70', '2022-12-19', 'comum'),
(54, 'Marcão', 'Marquin@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2022-12-20', 'adm'),
(55, 'Felipin', 'Felipin@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-12-20', 'comum'),
(56, 'Alino2', 'ali@adm.com', '202cb962ac59075b964b07152d234b70', '2022-12-20', 'comum');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`idartigos`),
  ADD KEY `fk_artigos_usuarios1_idx` (`usuarios_fk`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcom`),
  ADD KEY `fk_comentarios_usuarios1_idx` (`usuarios_fk`),
  ADD KEY `fk_comentarios_artigos1_idx` (`artigos_fk`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`prod_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `idartigos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `fk_artigos_usuarios1` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_artigos1` FOREIGN KEY (`artigos_fk`) REFERENCES `artigos` (`idartigos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
