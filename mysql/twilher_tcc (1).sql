-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2025 às 00:16
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `twilher tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `data_publicacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `publicacoes`
--

INSERT INTO `publicacoes` (`id`, `titulo`, `conteudo`, `data_publicacao`, `id_usuario`) VALUES
(12, 'a', 'a', '2025-06-01 15:45:26', 0),
(13, 'sfs', 'fsf', '2025-06-01 19:29:40', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `pais_origem` varchar(50) DEFAULT NULL,
  `modo_preparo` text DEFAULT NULL,
  `tempo_preparo` varchar(20) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `nome`, `pais_origem`, `modo_preparo`, `tempo_preparo`, `imagem`, `data_envio`, `id_usuario`) VALUES
(14, 'aaa', 'México', 'aaa', '10 Min', 'Go slay frieren 😛_I_m bored __Anime_ premium demon slayer ___sousounofrieren _frierenbeyondjourneysend _frieren _anime _animeicons(HEIC).heic', '2025-06-01 03:00:00', 0),
(15, 'drgdg', 'Itália', 'dgdg', '6 Min', 'Frieren can cook --‍--_Slide 2 Anya smug __Anime_ The cook___sousounofrieren _frierenbeyondjourneysend _frieren _anime _animeicons_0(HEIC) copiar.jpg', '2025-06-01 03:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` enum('admin','comum') DEFAULT 'comum',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel`, `criado_em`) VALUES
(10, 'Arthur', 'arthurido765@gmail.com', '$2y$10$IKA0dZcPAOaTAwR6Ue7FgOc2k4z4qK/v3OZ6cvO7zqSKaDkFZOWCe', 'comum', '2025-05-31 18:57:42'),
(14, 'andre', 'andre@gmail.com', '$2y$10$xoN4putxFO1bC6aLocLpzeyrWbjbcdJOEFtjGgvrsLi8vR3w4grji', 'comum', '2025-06-01 19:28:39');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
