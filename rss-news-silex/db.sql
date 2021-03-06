# create database

# create table
CREATE TABLE `news` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` tinytext NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE='InnoDB';

# add index
ALTER TABLE `news` ADD UNIQUE `link` (`link`);

# alter table: add column
ALTER TABLE `news` ADD `pub_date` timestamp NOT NULL;

# alter table: change column
ALTER TABLE `news` CHANGE `pub_date` `pub_date` datetime NOT NULL AFTER `source`;

# alter table: change column type
ALTER TABLE `news`
CHANGE `description` `description` mediumtext COLLATE 'utf8_general_ci' NOT NULL AFTER `link`; 

# add sources table
CREATE TABLE `sources` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `source_link` varchar(255) NOT NULL,
  `rss_feed_link` varchar(255) NOT NULL
) ENGINE='InnoDB';

# alter table: add column
ALTER TABLE `sources` ADD `is_active` BOOLEAN NOT NULL DEFAULT true;
