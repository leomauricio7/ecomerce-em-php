-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2019 às 02:46
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja_brutus`
--
CREATE DATABASE IF NOT EXISTS `loja_brutus` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `loja_brutus`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `image`, `created`, `updated`) VALUES
(2, 'Capture001.png', '2019-01-21 22:12:08', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `slug`, `image`, `created`, `updated`) VALUES
(14, 'Alicates', 'alicates', 'cat-alicate.png', '2019-01-22 18:31:08', NULL),
(15, 'Camisas', 'camisas', 'cat-camisa.png', '2019-01-22 18:31:26', NULL),
(16, 'Canivete', 'canivete', 'cat-canivete.png', '2019-01-22 18:31:35', NULL),
(17, 'Pulseira', 'pulseira', 'cat-pulseira.png', '2019-01-22 18:31:49', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id`, `nome`, `cor`, `created`, `updated`) VALUES
(12, 'Blue', '#0000ff', '2019-01-21 23:30:07', NULL),
(13, 'red', '#ff0000', '2019-01-21 23:30:26', NULL),
(14, 'red', '#ff0000', '2019-01-21 23:30:40', NULL),
(15, 'eryrey', '#000000', '2019-01-22 01:18:20', NULL),
(16, 'reyrey', '#ffffff', '2019-01-22 01:18:26', NULL),
(17, 'person', '#000000', '2019-01-22 01:18:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupons`
--

CREATE TABLE `cupons` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desconto` float NOT NULL,
  `validade` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cupons`
--

INSERT INTO `cupons` (`id`, `nome`, `desconto`, `validade`, `created`, `updated`) VALUES
(6, 'BIKDASBFJLDSBGJKLFBJ', 25.99, '2019-02-27', '2019-01-21 23:11:03', '2019-01-21 23:14:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feichos`
--

CREATE TABLE `feichos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `images_produto`
--

CREATE TABLE `images_produto` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_produto` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `images_produto`
--

INSERT INTO `images_produto` (`id`, `image`, `id_produto`, `created`, `updated`) VALUES
(1, 'apple-touch-icon.png', 4, '2019-01-22 19:39:22', NULL),
(2, 'apple-touch-icon.png', 8, '2019-01-22 19:41:49', NULL),
(3, 'apple-touch-icon.png', 9, '2019-01-22 19:42:09', NULL),
(4, 'apple-touch-icon.png', 10, '2019-01-22 19:42:35', NULL),
(5, 'team-5.jpg', 11, '2019-01-22 19:44:54', NULL),
(6, 'team-3.jpg', 12, '2019-01-22 19:47:53', NULL),
(7, 'team-6.jpg', 12, '2019-01-22 19:47:53', NULL),
(8, 'team-7.jpg', 13, '2019-01-23 18:27:45', NULL),
(9, 'team-7.jpg', 14, '2019-01-23 18:29:23', NULL),
(10, 'team-7.jpg', 15, '2019-01-23 18:29:25', NULL),
(11, 'team-7.jpg', 16, '2019-01-23 18:29:27', NULL),
(12, 'team-7.jpg', 17, '2019-01-23 18:29:28', NULL),
(13, 'team-7.jpg', 18, '2019-01-23 18:29:34', NULL),
(14, 'team-7.jpg', 19, '2019-01-23 18:29:36', NULL),
(15, 'team-7.jpg', 20, '2019-01-23 18:29:39', NULL),
(16, 'team-7.jpg', 21, '2019-01-23 18:29:44', NULL),
(17, 'team-7.jpg', 22, '2019-01-23 18:29:49', NULL),
(18, 'team-1.jpg', 22, '2019-01-23 22:37:49', NULL),
(19, 'team-2.jpg', 22, '2019-01-23 22:37:49', NULL),
(20, 'team-3.jpg', 22, '2019-01-23 22:37:49', NULL),
(21, 'team-4.jpg', 22, '2019-01-23 22:37:49', NULL),
(22, 'team-5.jpg', 23, '2019-01-23 23:09:19', NULL),
(23, 'team-6.jpg', 23, '2019-01-23 23:09:19', NULL),
(24, 'team-8.jpg', 23, '2019-01-23 23:09:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `id_categoria` int(11) NOT NULL,
  `id_tamanho` int(11) DEFAULT NULL,
  `id_cor` int(11) DEFAULT NULL,
  `id_feiche` int(11) DEFAULT NULL,
  `peso` float NOT NULL DEFAULT '0',
  `altura` float NOT NULL DEFAULT '0',
  `largura` float NOT NULL DEFAULT '0',
  `comprimento` float NOT NULL DEFAULT '0',
  `quantidade` int(10) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` float NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `id_categoria`, `id_tamanho`, `id_cor`, `id_feiche`, `peso`, `altura`, `largura`, `comprimento`, `quantidade`, `slug`, `valor`, `created`, `updated`) VALUES
(22, 'Teste', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 16, NULL, NULL, NULL, 1, 20, 20, 20, 50, 'teste', 52.3, '2019-01-23 18:29:49', '2019-01-23 22:03:04'),
(23, 'teste 2', 'teste 2', 16, NULL, NULL, NULL, 1, 20, 20, 20, 10, 'teste-2', 35.96, '2019-01-23 23:09:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_pedido`
--

CREATE TABLE `produtos_pedido` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE `status_pedido` (
  `id` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id`, `status`) VALUES
(1, 'Em Análise'),
(2, 'Aprovado'),
(3, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `id` int(11) NOT NULL,
  `tamanho` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`id`, `tamanho`, `created`, `updated`) VALUES
(6, '11', '2019-01-21 23:51:22', NULL),
(7, '13', '2019-01-21 23:51:22', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `senha` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cep` int(12) NOT NULL,
  `uf` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(10) DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_token` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `type`, `senha`, `cep`, `uf`, `cidade`, `bairro`, `rua`, `numero`, `telefone`, `created`, `updated`, `_token`) VALUES
(7, 'Leonardo Mauricio da Silva', 'leomauricio7@gmail.com', '01759890448', 1, '$2y$10$6yAthKUh9crEnJLwmAoYWehq0NpoMTfmjw1J.9OfHd7QghSPQV4Oa', 59570000, 'RN', 'CearÃ¡-Mirim', 'Passe e fica', 'Rua Prisco Rocha', 1163, '84994302191', '2019-01-23 17:59:48', '2019-01-23 18:23:01', NULL),
(10, 'teste cliente', 'teste@gmail.com', '44654654646', 2, '$2y$10$4KnATnXDSFO6rw5PCtZYJebEF/yIjT..niFABj/xGSbO7ahWQWZpm', 59490000, 'RN', 'Ielmo Marinho', 'Teste', 'rua teste', 1212, '84 32670013', '2019-01-23 23:36:42', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feichos`
--
ALTER TABLE `feichos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_produto`
--
ALTER TABLE `images_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_cor` (`id_cor`),
  ADD KEY `id_tamanho` (`id_tamanho`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_feiche` (`id_feiche`);

--
-- Indexes for table `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `status_pedido`
--
ALTER TABLE `status_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feichos`
--
ALTER TABLE `feichos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `images_produto`
--
ALTER TABLE `images_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_pedido`
--
ALTER TABLE `status_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_pedido` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`id_tamanho`) REFERENCES `tamanhos` (`id`),
  ADD CONSTRAINT `produtos_ibfk_3` FOREIGN KEY (`id_cor`) REFERENCES `cores` (`id`),
  ADD CONSTRAINT `produtos_ibfk_4` FOREIGN KEY (`id_feiche`) REFERENCES `feichos` (`id`);

--
-- Limitadores para a tabela `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  ADD CONSTRAINT `produtos_pedido_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `produtos_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`type`) REFERENCES `tipo_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
