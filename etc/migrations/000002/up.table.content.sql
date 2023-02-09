CREATE TABLE `content` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `content_hu` text,
  `content_en` text,
  `attachments` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;