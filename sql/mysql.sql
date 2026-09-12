# SQL Dump for wgholiday module
# PhpMyAdmin Version: 4.0.4
# https://www.phpmyadmin.net
#
# Host: localhost
# Generated on: Mon Jan 06, 2025 to 10:07:14
# Server version: 8.3.0
# PHP Version: 8.1.29

#
# Structure table for `wgholiday_events` 11
#

CREATE TABLE `wgholiday_events` (
  `id`              INT(8)          UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`            VARCHAR(255)    NOT NULL DEFAULT '',
  `header`          VARCHAR(255)    NOT NULL DEFAULT '',
  `header_display`  INT(1)          NOT NULL DEFAULT '0',
  `body`            TEXT            NOT NULL ,
  `body_display`    INT(1)          NOT NULL DEFAULT '0',
  `footer`          VARCHAR(255)    NOT NULL DEFAULT '',
  `footer_display`  INT(1)          NOT NULL DEFAULT '0',
  `image`           VARCHAR(255)    NOT NULL DEFAULT '',
  `image_pos`       INT(1)          NOT NULL DEFAULT '0',
  `image_display`   INT(1)          NOT NULL DEFAULT '0',
  `date_showfrom`   INT(11)         NOT NULL DEFAULT '0',
  `date_showto`     INT(11)         NOT NULL DEFAULT '0',
  `status`          INT(1)          NOT NULL DEFAULT '0',
  `date_created`    INT(11)         NOT NULL DEFAULT '0',
  `submitter`       INT(10)         NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

