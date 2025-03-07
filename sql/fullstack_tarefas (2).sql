-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18-Dez-2024 às 23:30
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fullstack_tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(125) NOT NULL,
  `descricao` text DEFAULT NULL,
  `prioridade` enum('urgente','alta','normal','baixa') NOT NULL DEFAULT 'normal',
  `dataDeInicio` date DEFAULT NULL,
  `dataDeConclusao` date DEFAULT NULL,
  `status` enum('criado','analise','pronto para começar','desenvolvendo','testando','revisao','pronto para entrega','entregue') NOT NULL DEFAULT 'criado',
  `pontos` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `nome`, `descricao`, `prioridade`, `dataDeInicio`, `dataDeConclusao`, `status`, `pontos`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'testando', NULL, 'normal', NULL, NULL, 'criado', NULL, 1, '2024-12-05 22:43:12', NULL, '2024-12-12 00:18:58', 1, '2024-12-12 00:18:58'),
(2, 'dsadasd', 'dasdsada', 'normal', NULL, NULL, 'criado', 10, 1, '2024-12-11 23:07:37', NULL, '2024-12-12 00:20:25', 1, '2024-12-12 00:20:25'),
(3, 'dsadasd', 'dasdsada', 'normal', NULL, NULL, 'criado', 10, 1, '2024-12-11 23:10:15', NULL, '2024-12-12 00:20:30', 1, '2024-12-12 00:20:30'),
(4, 'dsadasd', 'dasdsada', 'normal', NULL, NULL, 'criado', 10, 1, '2024-12-11 23:12:24', NULL, '2024-12-12 00:20:33', 1, '2024-12-12 00:20:33'),
(5, 'dsadasd', 'dasdsada', 'normal', '2000-02-02', '2000-03-03', 'criado', 10, 1, '2024-12-11 23:13:42', NULL, '2024-12-12 00:20:36', 1, '2024-12-12 00:20:36'),
(6, 'dsadasd', 'dasdad', 'normal', '1010-01-01', '2020-02-02', 'criado', 10, 1, '2024-12-11 23:25:17', NULL, '2024-12-12 00:20:39', 1, '2024-12-12 00:20:39'),
(7, 'sdsadas', 'dasdasda', 'normal', '2000-01-01', '2000-01-01', 'criado', 10, 1, '2024-12-11 23:26:07', NULL, '2024-12-12 00:21:02', 1, '2024-12-12 00:21:02'),
(8, 'dasdsa', 'dasdada', 'normal', '2000-01-01', '2000-03-02', 'criado', 10, 1, '2024-12-11 23:26:24', NULL, '2024-12-12 00:21:05', 1, '2024-12-12 00:21:05'),
(9, 'dsadsad', 'dsadsadas', 'normal', '2000-01-01', '2000-02-02', 'criado', 10, 1, '2024-12-11 23:28:28', NULL, '2024-12-12 00:21:08', 1, '2024-12-12 00:21:08'),
(10, 'dsada', '213dasd', 'normal', '2000-01-01', '3000-02-02', 'criado', 10, 1, '2024-12-11 23:29:06', NULL, '2024-12-12 00:21:12', 1, '2024-12-12 00:21:12'),
(11, 'sdadas', 'dasdas', 'normal', '2000-01-01', '3000-02-02', 'criado', 10, 1, '2024-12-11 23:29:59', NULL, '2024-12-12 00:21:15', 1, '2024-12-12 00:21:15'),
(12, 'dsadsad', 'dasda', 'normal', '2000-10-10', '2002-01-01', 'criado', 12, 1, '2024-12-11 23:31:07', NULL, '2024-12-12 00:21:19', 1, '2024-12-12 00:21:19'),
(13, 'sdada', 'dasd', 'normal', '2000-01-01', '2000-03-03', 'criado', 12, 1, '2024-12-11 23:31:37', NULL, '2024-12-12 00:21:27', 1, '2024-12-12 00:21:27'),
(14, 'dsada', 'dsada', 'normal', '2000-01-01', '3000-02-02', 'criado', 10, 1, '2024-12-11 23:32:19', NULL, '2024-12-16 22:20:41', 1, '2024-12-16 22:20:41'),
(15, 'dsadad', 'dasda', 'normal', '2000-01-01', '2000-02-02', 'criado', 10, 1, '2024-12-11 23:33:40', NULL, '2024-12-16 22:20:47', 1, '2024-12-16 22:20:47'),
(16, '10001', '10101', 'urgente', '1999-11-02', '3000-02-02', 'criado', 1, 1, '2024-12-11 23:35:51', 1, '2024-12-16 22:45:49', NULL, NULL),
(17, 'dsada', 'dasda', 'normal', '2000-10-09', '2003-03-03', 'criado', 12, 1, '2024-12-11 23:36:21', NULL, '2024-12-11 23:36:21', NULL, NULL),
(18, 'dsada', 'dasda', 'normal', '2000-01-01', '2000-03-03', 'criado', 10, 1, '2024-12-11 23:38:44', NULL, '2024-12-11 23:38:44', NULL, NULL),
(19, 'Projeto fullstack', 'Este projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStackEste projeto está sendo desenvolvido para os alunos do curso FullStack', 'urgente', '2024-06-01', '2025-06-01', 'criado', 180, 1, '2024-12-12 00:09:47', NULL, '2024-12-11 21:22:05', NULL, NULL),
(20, 'bla bla bla', 'testando a ediçao do fabio', 'normal', '2024-12-16', '2025-05-05', 'criado', 10, 1, '2024-12-16 22:23:07', NULL, '2024-12-16 22:23:07', NULL, NULL),
(21, 'banana', 'baananaanana', 'normal', '2020-01-01', '2025-01-01', 'criado', 10, 1, '2024-12-16 23:15:39', NULL, '2024-12-16 23:15:39', NULL, NULL),
(22, 'Sistema de tarefas', 'Criar um sistema de gestao de tarefas', 'normal', '2000-01-01', '2025-05-05', 'criado', 20, 1, '2024-12-16 23:20:19', NULL, '2024-12-16 23:20:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `nome` varchar(125) NOT NULL,
  `status` enum('criado','analise','pronto para começar','desenvolvendo','testando','revisao','pronto para entrega','entregue') NOT NULL DEFAULT 'criado',
  `prioridade` enum('urgente','alta','normal','baixa') NOT NULL DEFAULT 'normal',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `id_projeto`, `nome`, `status`, `prioridade`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 'Limpar o banco de dados', 'criado', 'baixa', 1, '2024-12-06 00:25:48', 1, '2024-12-06 00:35:26', NULL, NULL),
(2, 1, 'Fazer um backup', 'criado', 'urgente', 1, '2024-12-06 00:26:02', NULL, '2024-12-05 21:37:09', NULL, NULL),
(3, 21, 'descascar', 'criado', 'normal', 1, '2024-12-16 23:15:39', NULL, '2024-12-16 23:55:33', 1, '2024-12-16 23:55:33'),
(4, 21, 'Comer', 'criado', 'normal', 1, '2024-12-16 23:15:39', 1, '2024-12-17 00:13:35', NULL, NULL),
(5, 22, 'Desenhar', 'criado', 'normal', 1, '2024-12-16 23:20:19', NULL, '2024-12-16 23:20:19', NULL, NULL),
(6, 22, 'escrever', 'criado', 'normal', 1, '2024-12-16 23:20:19', NULL, '2024-12-16 23:20:19', NULL, NULL),
(7, 22, 'desenvolver', 'criado', 'normal', 1, '2024-12-16 23:20:20', NULL, '2024-12-16 23:20:20', NULL, NULL),
(8, 21, 'Teste', 'criado', 'normal', 1, '2024-12-17 00:18:15', NULL, '2024-12-17 00:18:15', NULL, NULL),
(9, 21, 'Descascar', 'criado', 'normal', 1, '2024-12-17 00:18:29', NULL, '2024-12-17 00:18:29', NULL, NULL),
(10, 21, 'jogar no lixo', 'criado', 'normal', 1, '2024-12-17 00:18:33', NULL, '2024-12-17 00:18:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(1024) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'Matheus Rubens', 'matheus.rubens@bol.com.br', NULL, '$2y$10$Ab2sdGB.V/wJ6uTAcscoQebMdWDWXkUvTahaQ4yMv5i5JDurlzdYK', NULL, 1, '2024-12-02 19:44:06', NULL, '2024-12-02 21:08:16', NULL, NULL),
(2, 'Bananinhas Frutas', 'banana@frutas.com.br', NULL, '$2y$10$PhDsdV0z8aTDnL9FBIdl9.UpUbI/ZjfgI9kfymZt3swIuaz2kkcWG', NULL, 1, '2024-12-02 23:30:16', 1, '2024-12-03 00:27:12', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE `fullstack_tarefas`.`projeto_user` (`user_id` INT NOT NULL , `projeto_id` INT NOT NULL , PRIMARY KEY (`user_id`, `projeto_id`)) ENGINE = InnoDB;

CREATE TABLE `fullstack_tarefas`.`arquivos` (`id` INT NOT NULL AUTO_INCREMENT , `nome_original` VARCHAR(256) NOT NULL , `nome_criptografado` VARCHAR(256) NOT NULL , `caminho` VARCHAR(256) NOT NULL , `created_by` INT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT NULL , `updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , `deleted_by` INT NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;