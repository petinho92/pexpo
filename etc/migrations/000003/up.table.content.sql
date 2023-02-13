ALTER TABLE `content`
  CHANGE COLUMN `content_hu` `content_hu` longtext AFTER `category`,
  CHANGE COLUMN `content_en` `content_en` longtext AFTER `content_hu`;