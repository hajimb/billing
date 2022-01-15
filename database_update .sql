ALTER TABLE `groups` ADD `created_date` DATETIME NULL DEFAULT NULL AFTER `permission`, ADD `modified_date` DATETIME NULL DEFAULT NULL AFTER `created_date`, ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' AFTER `modified_date`;

ALTER TABLE `master_modules` ADD `to_show` TINYINT(1) NOT NULL DEFAULT '1' AFTER `classname`;

ALTER TABLE `restaurant` ADD `modified_date` DATETIME NULL DEFAULT NULL AFTER `contact_no`;

-- Arshad

ALTER TABLE `customer` ADD `restaurant_id` INT NOT NULL AFTER `address`, ADD `dob` DATE NULL DEFAULT NULL AFTER `restaurant_id`, ADD `doa` DATE NULL DEFAULT NULL AFTER `dob`;

ALTER TABLE `wastage` CHANGE `unit` `unit` INT(3) NOT NULL;

ALTER TABLE `rawmaterial` ADD `modified_date` TIMESTAMP NOT NULL AFTER `created_date`, ADD `restaurant_id` INT NOT NULL AFTER `modified_date`, ADD `created_by` INT NOT NULL AFTER `restaurant_id`, ADD `modify_by` INT NOT NULL AFTER `created_by`;

ALTER TABLE `items` CHANGE `modify_date` `modified_date` DATETIME NOT NULL;