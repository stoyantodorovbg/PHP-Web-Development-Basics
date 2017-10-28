CREATE DATABASE `cars` /*!40100 COLLATE 'utf8_general_ci' */;
SHOW DATABASES;
/* Entering session "Unnamed" */
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='cars';
SHOW TABLE STATUS FROM `cars`;
SHOW FUNCTION STATUS WHERE `Db`='cars';
SHOW PROCEDURE STATUS WHERE `Db`='cars';
SHOW TRIGGERS FROM `cars`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='cars';
USE `cars`;
SHOW VARIABLES LIKE 'collation_database';
CREATE TABLE `cars` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`make` VARCHAR(50) NOT NULL,
	`model` VARCHAR(50) NOT NULL,
	`year` SMALLINT NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='cars';
SHOW TABLE STATUS FROM `cars`;
SHOW FUNCTION STATUS WHERE `Db`='cars';
SHOW PROCEDURE STATUS WHERE `Db`='cars';
SHOW TRIGGERS FROM `cars`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='cars';
SHOW CREATE TABLE `cars`.`cars`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `cars`.`cars`;
ALTER TABLE `cars`
	ALTER `year` DROP DEFAULT;
ALTER TABLE `cars`
	CHANGE COLUMN `year` `year` VARCHAR(50) NOT NULL AFTER `model`;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='cars';
SHOW TABLE STATUS FROM `cars`;
SHOW FUNCTION STATUS WHERE `Db`='cars';
SHOW PROCEDURE STATUS WHERE `Db`='cars';
SHOW TRIGGERS FROM `cars`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='cars';
SHOW CREATE TABLE `cars`.`cars`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `cars`.`cars`;
SHOW VARIABLES LIKE 'collation_database';
CREATE TABLE `sales` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`car_id` INT UNSIGNED NULL DEFAULT '0',
	`cusomer_id` INT UNSIGNED NULL DEFAULT '0',
	`date_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`amount` FLOAT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='cars';
SHOW TABLE STATUS FROM `cars`;
SHOW FUNCTION STATUS WHERE `Db`='cars';
SHOW PROCEDURE STATUS WHERE `Db`='cars';
SHOW TRIGGERS FROM `cars`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='cars';
SHOW CREATE TABLE `cars`.`sales`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `cars`.`sales`;
SHOW VARIABLES LIKE 'collation_database';
CREATE TABLE `customers` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='cars';
SHOW TABLE STATUS FROM `cars`;
SHOW FUNCTION STATUS WHERE `Db`='cars';
SHOW PROCEDURE STATUS WHERE `Db`='cars';
SHOW TRIGGERS FROM `cars`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='cars';
SHOW CREATE TABLE `cars`.`customers`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `cars`.`customers`;
ALTER TABLE `sales`
	ADD CONSTRAINT `customer_id` FOREIGN KEY (`cusomer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	ADD CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='cars';
SHOW TABLE STATUS FROM `cars`;
SHOW FUNCTION STATUS WHERE `Db`='cars';
SHOW PROCEDURE STATUS WHERE `Db`='cars';
SHOW TRIGGERS FROM `cars`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='cars';
ALTER TABLE `sales`
	ADD CONSTRAINT `customer_id` FOREIGN KEY (`cusomer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	ADD CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
/* SQL Error (1005): Can't create table `cars`.`#sql-149c_1e1` (errno: 121 "Duplicate key on write or update") */
SHOW CREATE TABLE `cars`.`sales`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `cars`.`sales`;