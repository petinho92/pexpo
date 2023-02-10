CREATE TABLE `eventlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `room` varchar(40) DEFAULT NULL,
  `phase` int DEFAULT NULL,
  `qrcode` int DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;