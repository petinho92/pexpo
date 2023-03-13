ALTER TABLE `eventlog`
  CHANGE COLUMN `date` `date` varchar(30) DEFAULT NULL AFTER `event`,
  CHANGE COLUMN `phase` `phase` varchar(100) DEFAULT NULL AFTER `room`,
  CHANGE COLUMN `qrcode` `qrcode` varchar(100) DEFAULT NULL AFTER `phase`;