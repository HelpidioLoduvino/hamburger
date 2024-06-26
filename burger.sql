-- Adminer 4.8.1 MySQL 5.7.44 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `hamburgers`;
CREATE TABLE `hamburgers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `burger_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `burger_descr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `burger_price` decimal(8,2) NOT NULL,
  `burger_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `hamburgers` (`id`, `burger_name`, `burger_descr`, `burger_price`, `burger_img`) VALUES
(1,	'Fortaleza',	'Hambúrguer Com Todos molhos',	2500.00,	'images/uPFThclsya7HN6utIMLsidYplQV71rKso3PJHzXD.png'),
(2,	'Big King',	'Hambúrguer Duplo',	5000.00,	'images/DhWcjHkqC7gPOGrmjcVR8nDlv8eIzPtjg5YSP4yq.png'),
(3,	'Da Casa',	'Hambúrguer Simples',	1500.00,	'images/TxsiTJiMMrrVR6o9qtWfqxt9drldQThvhCUbFc58.png');

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4,	'0001_01_01_000001_create_cache_table',	1),
(5,	'0001_01_01_000002_create_jobs_table',	1),
(6,	'2024_03_31_112915_create_users_table',	1),
(7,	'2024_03_31_114243_create_sessions_table',	1),
(8,	'2024_04_12_121330_create_hamburgers_table',	2),
(14,	'2024_04_20_233007_create_stocks_table',	3),
(16,	'2024_04_21_002941_create_soft_drinks_table',	4);

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('STFG98S8vgMt4qQNDbCvPvDWLH7hY2EvraEaGJDX',	2,	'172.19.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',	'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaFlGclBDbTU4bTRxRFg3bnNJYjNBSllUaEY4c2N5d0hGSFhwWkpuZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyOiJpZCI7aToyO3M6NDoidHlwZSI7czo1OiJhZG1pbiI7fQ==',	1713743122);

DROP TABLE IF EXISTS `soft_drinks`;
CREATE TABLE `soft_drinks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` bigint(20) unsigned NOT NULL,
  `drink_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drink_price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `soft_drinks_stock_id_foreign` (`stock_id`),
  CONSTRAINT `soft_drinks_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `soft_drinks` (`id`, `stock_id`, `drink_name`, `drink_price`) VALUES
(1,	1,	'Sumol de Laranja',	500.00),
(2,	2,	'Sprite em lata',	500.00),
(3,	3,	'Fanta em lata',	500.00);

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE `stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint(20) NOT NULL,
  `available` bigint(20) NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `stocks` (`id`, `item`, `total`, `available`, `item_type`, `date`) VALUES
(1,	'Sumol de Laranja',	48,	48,	'Refrigerante',	'2024-04-21'),
(2,	'Sprite em lata',	48,	48,	'Refrigerante',	'2024-04-21'),
(3,	'Fanta em lata',	48,	48,	'Refrigerante',	'2024-04-21'),
(4,	'Coca-Cola em Lata',	48,	48,	'Refrigerante',	'2024-04-21');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `type`) VALUES
(1,	'Johelsa',	'Mateus',	'johelsa@gmail.com',	'$2y$12$r9cJmKzcjgZNStAJHVUZHOSHIo9TzkhgubURoGbbs9bxiKMwZSHvq',	'cliente'),
(2,	'Helpidio',	'Mateus',	'helpidiolafame@gmail.com',	'$2y$12$thYbtUOhdaaesCQ4zUNdQu0JrDKWkxygvjzD.CFEcmWqutpX/Ayl.',	'admin'),
(3,	'Josefa',	'Zinga',	'josefa@gmail.com',	'$2y$12$UEXJmaU8imefa0fe/QUlUu6rDyuktY/JxAjJapRheOVS3IvlviuLq',	'atendente');

-- 2024-04-21 23:46:11
