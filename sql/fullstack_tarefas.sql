-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03-Dez-2024 às 01:33
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
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
