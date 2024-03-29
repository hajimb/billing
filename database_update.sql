



-- Arshad

ALTER TABLE `customer` ADD `restaurant_id` INT NOT NULL AFTER `address`, ADD `dob` DATE NULL DEFAULT NULL AFTER `restaurant_id`, ADD `doa` DATE NULL DEFAULT NULL AFTER `dob`;

ALTER TABLE `wastage` CHANGE `unit` `unit` INT(3) NOT NULL;

ALTER TABLE `rawmaterial` ADD `modified_date` TIMESTAMP NOT NULL AFTER `created_date`, ADD `restaurant_id` INT NOT NULL AFTER `modified_date`, ADD `created_by` INT NOT NULL AFTER `restaurant_id`, ADD `modify_by` INT NOT NULL AFTER `created_by`;

ALTER TABLE `items` CHANGE `modify_date` `modified_date` DATETIME NOT NULL;

-- Haji 21/01/2022

ALTER TABLE `restaurant` ADD `company_name` VARCHAR(200) NULL DEFAULT NULL AFTER `contact_no`, ADD `email` VARCHAR(200) NULL DEFAULT NULL AFTER `company_name`, ADD `fssai_no` VARCHAR(100) NULL DEFAULT NULL AFTER `email`, ADD `gstin_no` VARCHAR(20) NULL DEFAULT NULL AFTER `fssai_no`, ADD `photo_file` VARCHAR(255) NULL DEFAULT NULL AFTER `gstin_no`;


-- Haji 31/01/2022
ALTER TABLE `restaurant` ADD `qr_code` VARCHAR(255) NOT NULL AFTER `photo_file`;

ALTER TABLE `bill_head` ADD `sub_total` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `items`, ADD `tax_id` INT(11) NOT NULL DEFAULT '0' AFTER `sub_total`, ADD `vat_percent` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `tax_id`, ADD `sgst_percent` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `vat_percent`, ADD `cgst_percent` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `sgst_percent`, ADD `vat_amt` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `cgst_percent`, ADD `sgst_amt` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `vat_amt`, ADD `cgst_amt` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `sgst_amt`, ADD `total` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `cgst_amt`, ADD `discount_id` INT(11) NOT NULL DEFAULT '0' AFTER `total`, ADD `discount_percent` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `discount_id`, ADD `discount_amt` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `discount_percent`, ADD `grand_total` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `discount_amt`, ADD `tax_amt` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `cgst_amt`;


-- Haji 07/02/2022

ALTER TABLE `restaurant` ADD `last_bill_no` INT(11) NOT NULL DEFAULT '0' AFTER `qr_code`, ADD `bill_reset_type` CHAR(1) NOT NULL DEFAULT 'Y' AFTER `last_bill_no`, ADD `bill_reset_to` INT(11) NOT NULL DEFAULT '0' AFTER `bill_reset_type`, ADD `last_kot_no` INT NOT NULL DEFAULT '0' AFTER `bill_reset_to`, ADD `kot_reset_to` INT NOT NULL DEFAULT '0' AFTER `last_kot_no`;

INSERT INTO `bill_head-old`(`restaurant_id`, `table_id`, `items`, `sub_total`, `tax_id`, `vat_percent`, `sgst_percent`, `cgst_percent`, `vat_amt`, `sgst_amt`, `cgst_amt`, `tax_amt`, `total`, `discount_id`, `discount_percent`, `discount_amt`, `grand_total`, `status`, `invoice_no`, `created_date`, `modified_date`, `created_by`, `modify_by`, `is_deleted`, `bill_type`, `payment_type`, `is_active`) VALUES (select restaurant_id, table_id, items,(total + discount_amt - tax_amt), tax_id, 0, 0, 0, 0, 0, 0, tax_amt, (total + discount_amt), discount_id, 0, discount_amt, total, `status`, invoice_no, created_date, modified_date, created_by, modify_by, is_deleted, bill_type, payment_type, is_active from bill_head)
