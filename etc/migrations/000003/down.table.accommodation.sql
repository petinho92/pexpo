ALTER TABLE `accommodation`
  ADD COLUMN `hu_services` text AFTER `en_desc`,
  ADD COLUMN `en_services` text AFTER `hu_services`,
  CHANGE COLUMN `telephone` `telephone` varchar(30) DEFAULT NULL AFTER `en_services`,
  CHANGE COLUMN `email` `email` varchar(100) DEFAULT NULL AFTER `telephone`,
  CHANGE COLUMN `website` `website` varchar(100) DEFAULT NULL AFTER `email`,
  CHANGE COLUMN `maps` `maps` varchar(100) DEFAULT NULL AFTER `website`,
  CHANGE COLUMN `active` `active` tinyint(1) DEFAULT NULL AFTER `maps`,
  CHANGE COLUMN `created` `created` timestamp NULL DEFAULT NULL AFTER `active`,
  CHANGE COLUMN `updated` `updated` datetime DEFAULT NULL AFTER `created`;