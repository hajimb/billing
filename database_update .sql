ALTER TABLE `groups` ADD `created_date` DATETIME NULL DEFAULT NULL AFTER `permission`, ADD `modified_date` DATETIME NULL DEFAULT NULL AFTER `created_date`, ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' AFTER `modified_date`;

ALTER TABLE `master_modules` ADD `to_show` TINYINT(1) NOT NULL DEFAULT '1' AFTER `classname`;

ALTER TABLE `restaurant` ADD `modified_date` DATETIME NULL DEFAULT NULL AFTER `contact_no`;

