CREATE TABLE `config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `counter` json DEFAULT NULL,
  `social` json DEFAULT NULL,
  `registration` json DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;