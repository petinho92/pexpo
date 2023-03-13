ALTER TABLE `eventlog`
  CHANGE COLUMN `date` `date` date DEFAULT NULL AFTER `event`,
  CHANGE COLUMN `phase` `phase` int DEFAULT NULL AFTER `room`,
  CHANGE COLUMN `qrcode` `qrcode` int DEFAULT NULL AFTER `phase`;