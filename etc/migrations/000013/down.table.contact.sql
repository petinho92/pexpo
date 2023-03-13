ALTER TABLE `contact`
  DROP COLUMN `major_hu`,
  DROP COLUMN `major_en`;
ALTER TABLE `contact`
  ADD COLUMN `major` varchar(100) DEFAULT NULL AFTER `email`,
  CHANGE COLUMN `telephone` `telephone` varchar(30) DEFAULT NULL AFTER `major`,
  CHANGE COLUMN `mobile` `mobile` varchar(30) DEFAULT NULL AFTER `telephone`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `mobile`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`;