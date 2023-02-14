CREATE TABLE `timeline` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` int DEFAULT NULL,
  `hu_title` varchar(100) DEFAULT NULL,
  `en_title` varchar(100) DEFAULT NULL,
  `hu_desc` text,
  `en_desc` text,
  `created` timestamp NULL DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `attachments` json DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;