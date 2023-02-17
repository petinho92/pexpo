ALTER TABLE `content`
  ADD COLUMN `created` timestamp NULL DEFAULT NULL AFTER `active`,
  ADD COLUMN `updated` datetime DEFAULT NULL AFTER `created`;