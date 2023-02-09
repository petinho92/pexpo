ALTER TABLE `gallery`
  ADD COLUMN `active` tinyint(1) DEFAULT NULL AFTER `updated`;