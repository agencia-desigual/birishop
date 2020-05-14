-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Maio-2020 às 20:28
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `birishop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `arquivo` varchar(150) NOT NULL,
  `link` text,
  `ordem` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id_banner`, `arquivo`, `link`, `ordem`, `status`, `data_cadastro`) VALUES
(2, '2020-05-14-031739.jpg', 'dsadasd', 1, 1, '2020-05-14 18:17:39'),
(3, '2020-05-14-032232.jpg', 'dsadasd', 2, 1, '2020-05-14 18:22:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `email`, `data_cadastro`) VALUES
(1, 'teste@desigual.com.br', '2020-05-12 18:57:01'),
(2, 'apagar@gmail.com', '2020-05-12 18:57:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `id_parceiro` int(11) NOT NULL,
  `arquivo` varchar(150) NOT NULL,
  `link` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parceiro`, `arquivo`, `link`, `status`, `data_cadastro`) VALUES
(2, '2020-05-14-032446.jpg', 'dsadasd', 1, '2020-05-14 18:24:46'),
(3, '2020-05-14-032451.jpg', 'dsadasd', 1, '2020-05-14 18:24:51'),
(4, '2020-05-14-032456.jpg', 'dsadasd', 1, '2020-05-14 18:24:56'),
(5, '2020-05-14-032500.jpg', 'dsadasd', 1, '2020-05-14 18:25:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes`
--

CREATE TABLE `promocoes` (
  `id_promocao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `valor_antigo` double NOT NULL,
  `valor` double NOT NULL,
  `link` text NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `status` enum('ativo','analise','reprovado','cancelado') NOT NULL DEFAULT 'analise',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_validade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `promocoes`
--

INSERT INTO `promocoes` (`id_promocao`, `id_usuario`, `nome`, `valor_antigo`, `valor`, `link`, `imagem`, `descricao`, `status`, `data_cadastro`, `data_validade`) VALUES
(1, 2, 'Produto Teste', 98.9, 50.88, 'https://xvideos.com.br', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'ativo', '2020-05-13 14:04:54', '2020-05-28'),
(2, 2, 'Produto Teste', 98.9, 50.88, 'https://xvideos.com.br', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'analise', '2020-05-13 14:04:54', '2020-05-28'),
(3, 2, 'Produto Teste', 98.9, 50.88, 'https://xvideos.com.br', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'reprovado', '2020-05-13 14:04:54', '2020-05-28'),
(4, 2, 'Produto Teste', 98.9, 50.88, 'https://xvideos.com.br', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'cancelado', '2020-05-13 14:04:54', '2020-05-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token` text NOT NULL,
  `ip` varchar(100) NOT NULL,
  `data_expira` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `token`
--

INSERT INTO `token` (`id_token`, `id_usuario`, `token`, `ip`, `data_expira`, `data`) VALUES
(1, 1, '64666c6b662d666b6c6a736e2d373231333636352d64686a612d312d323032302d30352d31332031303a32393a323535656262663633353265663762302e3932313834323739', '::1', '2020-05-13 18:29:25', '2020-05-13 13:29:25'),
(2, 2, '64666c6b662d666b6c6a736e2d373231333636352d64686a612d322d323032302d30352d31332031313a33373a333935656263303633333333616664302e3533343532373831', '::1', '2020-05-13 19:37:39', '2020-05-13 14:37:39'),
(3, 1, '64666c6b662d666b6c6a736e2d373231333636352d64686a612d312d323032302d30352d31332031353a33303a303335656263336361623934663133322e3936323039343532', '::1', '2020-05-13 23:30:03', '2020-05-13 18:30:03'),
(4, 1, '64666c6b662d666b6c6a736e2d373231333636352d64686a612d312d323032302d30352d31342030383a35343a323135656264333136643331393161372e3237373533363833', '::1', '2020-05-14 16:54:21', '2020-05-14 11:54:21'),
(5, 1, '64666c6b662d666b6c6a736e2d373231333636352d64686a612d312d323032302d30352d31342031353a30343a323635656264383832613866336333362e3533323030343637', '::1', '2020-05-14 23:04:26', '2020-05-14 18:04:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `nome_estabelecimento` varchar(150) DEFAULT NULL,
  `cnpj` varchar(150) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `nivel` varchar(150) NOT NULL DEFAULT 'associado',
  `telefone` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `nome_estabelecimento`, `cnpj`, `email`, `senha`, `nivel`, `telefone`, `status`, `data_cadastro`) VALUES
(1, 'Edilson Pereira Mendonça', NULL, NULL, 'edilson@desigual.com.br', '202cb962ac59075b964b07152d234b70', 'admin', '', 1, '2020-05-13 13:07:55'),
(2, 'Isadora Pinto', 'Isa veterinária', '47.886.565/0001-81', 'cliente1@gmail.com', '202cb962ac59075b964b07152d234b70', 'associado', '(18) 99635-6488', 1, '2020-05-13 14:03:28'),
(3, 'Isadora CArvalho', 'Isa moda e beleza', '47.886.565/0001-81', 'cliente2@gmail.com', '202cb962ac59075b964b07152d234b70', 'associado', '', 0, '2020-05-13 14:03:28'),
(4, 'Isadora Rocha', 'Isa borracharia', '47.886.565/0001-81', 'cliente3@gmail.com', '202cb962ac59075b964b07152d234b70', 'associado', '', 1, '2020-05-13 14:03:28'),
(5, 'Isadora Cebo', 'Isa perfumaria', '47.886.565/0001-81', 'cliente4@gmail.com', '202cb962ac59075b964b07152d234b70', 'associado', '', 0, '2020-05-13 14:03:28');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Índices para tabela `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Índices para tabela `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`id_parceiro`);

--
-- Índices para tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD PRIMARY KEY (`id_promocao`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `promocoes`
--
ALTER TABLE `promocoes`
  MODIFY `id_promocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD CONSTRAINT `promocoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
