ALTER TABLE `programguide`
  DROP COLUMN `year`;
ALTER TABLE `programguide`
  CHANGE COLUMN `date` `date` varchar(50) DEFAULT NULL AFTER `en_type`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `date`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`,
  CHANGE COLUMN `active` `active` tinyint(1) DEFAULT NULL AFTER `updated`;