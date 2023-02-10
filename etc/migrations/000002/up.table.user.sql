ALTER TABLE `user`
  CHANGE COLUMN `group` `group` enum('supersaiyan','admin','webmaster','marketing','scanner','visitor') DEFAULT NULL AFTER `email`;