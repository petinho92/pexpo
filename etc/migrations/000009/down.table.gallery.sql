ALTER TABLE `gallery`
  DROP COLUMN `hu_title`,
  DROP COLUMN `en_title`;
ALTER TABLE `gallery`
  ADD COLUMN `name` varchar(200) DEFAULT NULL AFTER `id`,
  CHANGE COLUMN `year` `year` int DEFAULT NULL AFTER `name`,
  CHANGE COLUMN `category` `category` varchar(100) DEFAULT NULL AFTER `year`,
  CHANGE COLUMN `alt` `alt` varchar(200) DEFAULT NULL AFTER `category`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `alt`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`,
  CHANGE COLUMN `active` `active` tinyint(1) DEFAULT NULL AFTER `updated`;