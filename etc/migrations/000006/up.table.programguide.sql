ALTER TABLE `programguide`
  ADD COLUMN `year` int DEFAULT NULL AFTER `en_type`,
  CHANGE COLUMN `date` `date` varchar(50) DEFAULT NULL AFTER `year`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `date`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`,
  CHANGE COLUMN `active` `active` tinyint(1) DEFAULT NULL AFTER `updated`;