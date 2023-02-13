ALTER TABLE `content`
  CHANGE COLUMN `content_hu` `content_hu` text AFTER `category`,
  CHANGE COLUMN `content_en` `content_en` text AFTER `content_hu`;