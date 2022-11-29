-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2022 às 03:39
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `donutbooks`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `data` varchar(50) NOT NULL,
  `acao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `historico`
--

INSERT INTO `historico` (`id`, `titulo`, `usuario`, `data`, `acao`) VALUES
(14, 'clean code', 'luan marçal', '2022-11-28 23:17:53', '2'),
(15, 'harry potter e a pedra filosofal', 'luan marçal', '2022-11-28 23:18:12', '2'),
(16, 'O labirinto do fauno', 'luan marçal', '2022-11-28 23:18:48', '2'),
(17, 'harry potter e a ordem da fenix', 'luan marçal', '2022-11-28 23:19:01', '2'),
(18, 'o pequeno príncipe', 'luan marçal', '2022-11-28 23:19:14', '2'),
(19, 'A arte da guerra', 'joão silva', '2022-11-28 23:22:55', '2'),
(20, 'A metamorfose ', 'julia gaspar', '2022-11-28 23:23:45', '2'),
(21, 'A metamorfose ', 'joão silva', '2022-11-28 23:25:32', '1'),
(22, 'A arte da guerra', 'julia gaspar', '2022-11-28 23:26:20', '1'),
(23, 'clean code', 'luan marçal', '2022-11-28 23:31:40', '1'),
(24, 'clean code', 'luan marçal', '2022-11-28 23:32:34', '0'),
(25, 'clean code', 'luan marçal', '2022-11-28 23:36:33', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros_cadastrados`
--

CREATE TABLE `livros_cadastrados` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `proprietario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `livros_cadastrados`
--

INSERT INTO `livros_cadastrados` (`id`, `status`, `titulo`, `autor`, `proprietario`) VALUES
(9, 1, 'clean code', 'Robert Cecil Martin', 'luan marçal'),
(10, 0, 'harry potter e a pedra filosofal', 'J. K. Rowling', 'luan marçal'),
(11, 0, 'O labirinto do fauno', 'Guillermo del Toro', 'luan marçal'),
(12, 0, 'harry potter e a ordem da fenix', 'J. K. Rowling', 'luan marçal'),
(13, 0, 'o pequeno príncipe', 'Antoine de Saint-Exupéry', 'luan marçal'),
(14, 1, 'A arte da guerra', 'Sun Tzu', 'joão silva'),
(15, 1, 'A metamorfose ', 'Franz Kafka', 'julia gaspar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros_emprestados`
--

CREATE TABLE `livros_emprestados` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `proprietario` varchar(50) NOT NULL,
  `destinatario` varchar(50) NOT NULL,
  `data_inicial` varchar(50) NOT NULL,
  `data_final` varchar(50) NOT NULL,
  `contato` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `livros_emprestados`
--

INSERT INTO `livros_emprestados` (`id`, `status`, `titulo`, `proprietario`, `destinatario`, `data_inicial`, `data_final`, `contato`) VALUES
(9, 1, 'clean code', 'luan marçal', 'luan marçal', '2022-11-30', '2022-12-23', 'luan.marcal@gmail.com'),
(14, 1, 'A arte da guerra', 'joão silva', 'julia gaspar', '2022-12-05', '2022-12-30', 'julia.gaspar@gmail.com'),
(15, 1, 'A metamorfose ', 'julia gaspar', 'joão silva', '2022-11-30', '2022-12-07', 'joao.silva@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(9, 'luan marçal', 'luan.marcal@gmail.com', 'def121616ec7ebec0722704b678ce37d17b72da7'),
(10, 'julia gaspar', 'julia.gaspar@gmail.com', 'def121616ec7ebec0722704b678ce37d17b72da7'),
(11, 'joão silva', 'joao.silva@gmail.com', 'def121616ec7ebec0722704b678ce37d17b72da7');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livros_cadastrados`
--
ALTER TABLE `livros_cadastrados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livros_emprestados`
--
ALTER TABLE `livros_emprestados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `livros_cadastrados`
--
ALTER TABLE `livros_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
