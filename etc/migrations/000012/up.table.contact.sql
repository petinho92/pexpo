CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prefix` varchar(20) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `attachments` json DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;