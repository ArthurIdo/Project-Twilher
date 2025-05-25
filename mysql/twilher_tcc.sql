-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/05/2025 às 22:06
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
  `data_publicacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `publicacoes`
--

INSERT INTO `publicacoes` (`id`, `titulo`, `conteudo`, `data_publicacao`) VALUES
(8, 'Dica de Receita Simples', 'Hoje testei uma receita de panqueca de aveia e ficou top! Super rápida e saudável 😋', '2025-05-22 00:26:24'),
(10, 'Bom dia!!', 'Ótima semana a todos👍', '2025-05-24 00:31:33');

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
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `nome`, `pais_origem`, `modo_preparo`, `tempo_preparo`, `imagem`, `data_envio`) VALUES
(6, 'Feijoada com Linguiça Toscana', 'Brasil', 'Ingredientes (serve 6 pessoas):\r\n\r\n-    500g de feijão preto\r\n-    400g de linguiça toscana (cortada em rodelas)\r\n-    200g de carne seca (dessalgada e cortada em cubos)\r\n-    150g de costelinha de porco (opcional)\r\n-    1 cebola grande picada\r\n-    4 dentes de alho picados\r\n-    2 folhas de louro\r\n-    1 colher (chá) de cominho (opcional)\r\n-    Sal e pimenta-do-reino a gosto\r\n-    Cheiro-verde picado a gosto\r\n-    Óleo ou azeite para refogar\r\n\r\nModo de preparo:\r\n\r\n1. Preparar o feijão\r\n\r\n    Lave o feijão e deixe de molho por pelo menos 8 horas (ou de um dia para o outro).\r\n    Escorra e descarte a água do molho.\r\n\r\n2. Cozinhar o feijão\r\n\r\n    Coloque o feijão em uma panela de pressão com as folhas de louro e cubra com água (cerca de 3 dedos acima dos grãos).\r\n    Cozinhe por 25–30 minutos após pegar pressão.\r\n    Desligue, espere sair a pressão naturalmente e reserve.\r\n\r\n3. Preparar as carnes\r\n\r\n    Em outra panela grande, aqueça um pouco de óleo e doure as rodelas de linguiça toscana.\r\n    Retire e reserve.\r\n    Na mesma panela, doure a carne seca e a costelinha (se estiver usando), até ficarem bem seladas.\r\n    Acrescente a cebola e o alho, refogando até dourar.\r\n\r\n4. Juntar tudo\r\n\r\n    Acrescente o feijão cozido (com o caldo) às carnes refogadas.\r\n    Junte a linguiça dourada.\r\n    Ajuste o sal e a pimenta, e, se quiser, adicione cominho.\r\n    Cozinhe em fogo baixo por cerca de 1 hora, mexendo de vez em quando. Se secar muito, acrescente mais água quente aos poucos.\r\n\r\n5. Finalização\r\n\r\n    Quando o caldo estiver espesso e os sabores bem incorporados, finalize com cheiro-verde picado.\r\n    Sirva com arroz branco, couve refogada, farofa e laranja em rodelas.', '+20 Min', 'feijoada.jpg', '2025-05-20 23:16:20'),
(7, 'Bolo Veludo Vermelho', 'Mundo', 'Ingredientes:\r\n\r\nPara o bolo:\r\n\r\n-    2 ½ xícaras (chá) de farinha de trigo (300g)\r\n-    1 ½ xícara (chá) de açúcar (300g)\r\n-    1 colher (chá) de fermento químico em pó\r\n-    1 colher (chá) de bicarbonato de sódio\r\n-    1 colher (chá) de cacau em pó\r\n-    ½ colher (chá) de sal\r\n-    2 ovos grandes\r\n-    1 xícara (chá) de óleo vegetal (240ml)\r\n-    1 xícara (chá) de buttermilk (leitelho) ou 1 xícara de leite com 1 colher (sopa) de vinagre ou limão (deixe descansar 10 minutos)\r\n-    1 colher (sopa) de vinagre branco\r\n-    1 colher (chá) de essência de baunilha\r\n-    1 colher (sopa) de corante alimentício vermelho (em gel ou líquido)\r\n\r\nPara o recheio e cobertura (cream cheese frosting):\r\n\r\n    300g de cream cheese (temperatura ambiente)\r\n    100g de manteiga sem sal (temperatura ambiente)\r\n    1 colher (chá) de essência de baunilha\r\n    2 xícaras (chá) de açúcar de confeiteiro peneirado\r\n\r\n👩‍🍳 Modo de Preparo:\r\nBolo:\r\n\r\n-    Preaqueça o forno a 180 °C e unte duas formas redondas de 20 cm (ou uma grande e corte ao meio depois).\r\n-    Em uma tigela grande, peneire e misture a farinha, açúcar, fermento, bicarbonato, cacau e sal.\r\n-    Em outra tigela, bata os ovos, depois adicione o óleo, buttermilk, vinagre, baunilha e o corante vermelho. Misture bem até ficar homogêneo.\r\n-    Incorpore os ingredientes líquidos aos secos e misture até formar uma massa lisa (não bata demais).\r\n-    Divida a massa entre as formas e leve ao forno por 30 a 35 minutos, ou até que um palito saia limpo ao espetar.\r\n-    Deixe os bolos esfriarem por 10 minutos na forma, depois desenforme e deixe esfriar completamente sobre uma grade.\r\n\r\nCobertura (Cream Cheese Frosting):\r\n\r\n-    Bata a manteiga até ficar cremosa.\r\n-    Adicione o cream cheese e bata até ficar homogêneo.\r\n-    Acrescente a essência de baunilha e, aos poucos, o açúcar de confeiteiro, batendo até obter um creme firme e liso.\r\n\r\n🕒 Tempo Total Estimado:\r\n    Preparo da massa: 20 minutos\r\n    Forno: 30–35 minutos\r\n    Recheio/cobertura: 15 minutos\r\n    Montagem e finalização: 15 minutos', '+20 Min', 'bolo veludo vermelho.jpg', '2025-05-21 00:42:35'),
(8, 'Guacamole ', 'México', '2 avocados maduros (ou 1 abacate pequeno)\r\n1 tomate médio sem sementes, picado em cubinhos\r\n1/2 cebola roxa pequena picada finamente\r\n1 dente de alho pequeno amassado (opcional)\r\n1/2 pimenta dedo-de-moça sem sementes, picada (ou a gosto)\r\nSuco de 1 limão\r\n2 colheres de sopa de coentro fresco picado (opcional)\r\nSal a gosto (aproximadamente 1/2 colher de chá)\r\n\r\nCorte os avocados ao meio, retire o caroço e, com uma colher, tire a polpa.\r\nAmasse a polpa com um garfo em uma tigela grande. Deixe com alguns pedacinhos, se quiser uma textura mais rústica.\r\nAdicione o suco de limão logo após amassar, para evitar que o abacate escureça.\r\nMisture a cebola, o tomate, o alho, a pimenta e o coentro.\r\nTempere com sal e mexa bem até ficar homogêneo.\r\nProve e ajuste os temperos, se necessário.\r\nSirva imediatamente com tortilhas, tacos, carnes ou o que preferir!\r\n', '+20 Min', 'Guacamole_1200x800.jpg', '2025-05-21 22:46:04'),
(9, 'Trufas', 'França', 'Ingredientes:\r\n\r\n300g de chocolate meio amargo picado\r\n200g de creme de leite (1 caixinha)\r\n1 colher (sopa) de manteiga sem sal\r\n2 colheres (sopa) de conhaque ou rum (opcional)\r\nChocolate em pó ou cacau em pó para enrolar\r\nConfeitos (granulado, castanhas picadas, etc.) – opcional\r\n\r\nModo de Preparo:\r\n\r\nDerreta o chocolate: Em banho-maria ou no micro-ondas (de 30 em 30 segundos, mexendo a cada pausa), derreta o chocolate até ficar liso.\r\nMisture os ingredientes: Acrescente o creme de leite, a manteiga e o conhaque (se for usar). Misture bem até formar um creme homogêneo e brilhante.\r\nResfrie a massa: Leve à geladeira por cerca de 2 horas, ou até que esteja firme o suficiente para modelar.\r\nModele as trufas: Com uma colher, pegue pequenas porções da massa e faça bolinhas com as mãos.\r\nFinalize: Passe as trufas no chocolate em pó, cacau ou confeitos a gosto.\r\nArmazene: Guarde as trufas em potes bem fechados na geladeira.\r\n\r\nTempo de Preparo:\r\n\r\nPreparo: 20 minutos\r\nGeladeira: 2 horas\r\nTotal: Aproximadamente 2 horas e 20 minutos', '+20 Min', 'trufas.jpg', '2025-05-24 03:00:00'),
(11, 'Brigadeiro Gourmet', 'Brasil', ' Ingredientes:\r\n1 lata de leite condensado (395g)\r\n\r\n100g de chocolate meio amargo (nobre, picado ou em gotas)\r\n\r\n1 colher (sopa) de manteiga sem sal\r\n\r\n100g de creme de leite (opcional, para deixar mais cremoso)\r\n\r\nChocolate granulado belga ou confeitos finos para enrolar\r\n\r\n\r\n Modo de Preparo:\r\nEm uma panela de fundo grosso, adicione o leite condensado, o chocolate picado, a manteiga e o creme de leite (se for usar).\r\n\r\nLeve ao fogo baixo, mexendo sempre com uma espátula de silicone ou colher de pau. Cozinhe até desgrudar do fundo da panela (ponto de brigadeiro de enrolar), cerca de 10 a 15 minutos.\r\n\r\nTransfira para um prato untado e cubra com plástico filme em contato com o doce. Deixe esfriar completamente (pelo menos 1 hora em temperatura ambiente ou leve à geladeira por 30 minutos).\r\n\r\nModele os brigadeiros com as mãos untadas com manteiga. Faça bolinhas e passe nos confeitos gourmet.\r\n\r\nColoque em forminhas e conserve em local fresco ou na geladeira.\r\n\r\n\r\n Tempo de Preparo:\r\nPreparo no fogo: 15 minutos\r\n\r\nTempo de resfriamento: 1 hora\r\n\r\nTotal: Aproximadamente 1 hora e 15 minutos\r\n\r\n', '15 Min', 'brigadeiro.jpg', '2025-05-24 03:00:00');

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
(1, 'Admin', 'admin@admin.com', '$2y$10$u5L.2ZT1Xs5WAVRlsmZcSe2F0A1EcN1KcA9JxlaQbLxMqxcl9cBaK', 'admin', '2025-05-24 19:26:53'),
(7, 'Arthur Ido', 'arthurido@teste.com', '$2y$10$Nd1mqA6KnRRuR6R0fjpUEuSx3JksCthr6InXcatmyGZ3KKvuRLHXm', 'comum', '2025-05-24 19:42:53');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
