-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/12/2023 às 18:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cs2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `subtitulo` text NOT NULL,
  `descricao` text NOT NULL,
  `foto` text NOT NULL,
  `relacionados` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `subtitulo`, `descricao`, `foto`, `relacionados`) VALUES
(17, 'IFSertão no LLIGA STEAM', 'ALUNOS DO CURSO TECNICO EM INFORMATICA PARTICIPAM DO LIGA STEAM ', 'Alunos de informatica usam IOT (internet das coisas ) pra o desenlvolvimento de prototipos, aplicados em diversas areas, onde tambem exploraram varias aplicações com eles.', 'uploads/ligasteam.jpg', ''),
(18, 'DECOLAMDO PARA O PARAGUAY ', 'Alunos do 3 ano de informatica, participam do tão renomado MERCOSUL', 'Alunos do 3 ano de informática, participam do MERCOSUL onde em grupos que mesclava os alunos representantes dos 4 países da união desenvolveram um site que captura as informações dos alunos em relação ao o que poderia melhorar no ensino e infraestrutura tudo remotamente.', 'uploads/hackthom-mercosul.jpg', ''),
(19, 'RECEBEMOS VISITA!!!', 'Turmas do 9° ano visitou nosso campos salgueiro', 'Alunos do 9° fazem visita ao campos vendo cada area especializada do medio integrado e descobrindo a imensa oportunidade que é  de estar estudando numa escola com professores totalmente competentes e com doutorado', 'uploads/visita-ao-if.jpg', ''),
(20, 'MEIO AMBIENTE ', 'Projetos do campus Salgueiro são apresentados no I Congresso Internacional de Educação Ambiental Interdisciplinar', 'Campus salgueiro mostra seus cuidados com o meio ambiente nos desenvolvimentos de projetos com os seus alunos.', 'uploads/meio-ambiente-editada.jpg', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'em', 'emanoelferreiralunguinho@gmail.com', '2456', ''),
(2, 'em', 'emanoelferreiralunguinho@gmail.com', '23456', ''),
(3, 'Emanoel', 'emanoel@gmail', '23456', ''),
(4, 'akacio', 'akacio@gmail', '12345', ''),
(5, 'Kaik', 'kaik@gmail', '123456', ''),
(6, 'Emanoel', 'emanoelferreiralunguinho@gmail.com', '54321', ''),
(7, 'Emanoel', 'emanoelferreiralunguinho@gmail.com', '12345', ''),
(8, 'em', 'srfsr@gmail.comgsrd', 'f', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
