ALTER TABLE `contact`
  DROP COLUMN `section_hu`,
  DROP COLUMN `section_en`,
  DROP COLUMN `active`;
ALTER TABLE `contact`
  ADD COLUMN `major_hu` varchar(100) DEFAULT NULL AFTER `email`,
  ADD COLUMN `major_en` varchar(100) DEFAULT NULL AFTER `major_hu`,
  CHANGE COLUMN `telephone` `telephone` varchar(30) DEFAULT NULL AFTER `major_en`,
  CHANGE COLUMN `mobile` `mobile` varchar(30) DEFAULT NULL AFTER `telephone`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `mobile`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`;