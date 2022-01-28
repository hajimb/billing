



-- Arshad

ALTER TABLE `customer` ADD `restaurant_id` INT NOT NULL AFTER `address`, ADD `dob` DATE NULL DEFAULT NULL AFTER `restaurant_id`, ADD `doa` DATE NULL DEFAULT NULL AFTER `dob`;

ALTER TABLE `wastage` CHANGE `unit` `unit` INT(3) NOT NULL;

ALTER TABLE `rawmaterial` ADD `modified_date` TIMESTAMP NOT NULL AFTER `created_date`, ADD `restaurant_id` INT NOT NULL AFTER `modified_date`, ADD `created_by` INT NOT NULL AFTER `restaurant_id`, ADD `modify_by` INT NOT NULL AFTER `created_by`;

ALTER TABLE `items` CHANGE `modify_date` `modified_date` DATETIME NOT NULL;

-- Haji 21/01/2022

ALTER TABLE `restaurant` ADD `company_name` VARCHAR(200) NULL DEFAULT NULL AFTER `contact_no`, ADD `email` VARCHAR(200) NULL DEFAULT NULL AFTER `company_name`, ADD `fssai_no` VARCHAR(100) NULL DEFAULT NULL AFTER `email`, ADD `gstin_no` VARCHAR(20) NULL DEFAULT NULL AFTER `fssai_no`, ADD `photo_file` VARCHAR(255) NULL DEFAULT NULL AFTER `gstin_no`;
