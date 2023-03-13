ALTER TABLE `contact`
  DROP COLUMN `major_hu`,
  DROP COLUMN `major_en`;
ALTER TABLE `contact`
  ADD COLUMN `section_hu` varchar(100) DEFAULT NULL AFTER `email`,
  ADD COLUMN `section_en` varchar(100) DEFAULT NULL AFTER `section_hu`,
  CHANGE COLUMN `telephone` `telephone` varchar(30) DEFAULT NULL AFTER `section_en`,
  CHANGE COLUMN `mobile` `mobile` varchar(30) DEFAULT NULL AFTER `telephone`,
  ADD COLUMN `active` tinyint(1) DEFAULT NULL AFTER `mobile`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `active`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`;