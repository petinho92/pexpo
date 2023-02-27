ALTER TABLE `gallery`
  DROP COLUMN `name`;
ALTER TABLE `gallery`
  ADD COLUMN `hu_title` varchar(100) DEFAULT NULL AFTER `id`,
  ADD COLUMN `en_title` varchar(100) DEFAULT NULL AFTER `hu_title`,
  CHANGE COLUMN `year` `year` int DEFAULT NULL AFTER `en_title`,
  CHANGE COLUMN `category` `category` varchar(100) DEFAULT NULL AFTER `year`,
  CHANGE COLUMN `alt` `alt` varchar(200) DEFAULT NULL AFTER `category`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `alt`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`,
  CHANGE COLUMN `active` `active` tinyint(1) DEFAULT NULL AFTER `updated`;