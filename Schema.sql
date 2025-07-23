-- --------------------------------------------------
-- Schema para Philasean Provider Website
-- --------------------------------------------------

-- 1. Criação da Base de Dados
CREATE DATABASE IF NOT EXISTS `philaded_Philaseanproviderwebsite`
  CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
USE `philaded_Philaseanproviderwebsite`;

-- 2. Tabela de Utilizadores
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Tabela de Pedidos de Serviço
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `service_type` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `status` ENUM('pendente','em progresso','concluido') NOT NULL DEFAULT 'pendente',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_requests_user` (`user_id`),
  CONSTRAINT `fk_requests_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
