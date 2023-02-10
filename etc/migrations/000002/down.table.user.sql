ALTER TABLE `user`
  CHANGE COLUMN `group` `group` enum('admin','visitor') DEFAULT NULL AFTER `email`;