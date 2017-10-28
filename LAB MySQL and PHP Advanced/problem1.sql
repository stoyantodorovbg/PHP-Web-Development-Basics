CREATE DATABASE `php_course_1` /*!40100 COLLATE 'utf8_general_ci' */;
SHOW DATABASES;
/* Entering session "Unnamed" */
USE `php_course_1`;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';
SHOW ENGINES;
SHOW VARIABLES LIKE 'collation_database';
CREATE TABLE `students` (
	`student_id` INT NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`student_number` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`student_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';
SHOW CREATE TABLE `php_course_1`.`students`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `php_course_1`.`students`;
SHOW VARIABLES LIKE 'collation_database';
CREATE TABLE `courses` (
	`course_id` INT NOT NULL AUTO_INCREMENT,
	`course_name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`course_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';
SHOW CREATE TABLE `php_course_1`.`courses`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `php_course_1`.`courses`;
SHOW VARIABLES LIKE 'collation_database';
CREATE TABLE `student_subscriptions` (
	`course_id` INT NULL,
	`student_id` INT NULL
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';
SHOW CREATE TABLE `php_course_1`.`student_subscriptions`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `php_course_1`.`student_subscriptions`;
SELECT 1 FROM `courses` LIMIT 1;
SHOW COLUMNS FROM `courses`;
SHOW CREATE TABLE `php_course_1`.`courses`;
SELECT 1 FROM `students` LIMIT 1;
SHOW COLUMNS FROM `students`;
SELECT 1 FROM `student_subscriptions` LIMIT 1;
SHOW COLUMNS FROM `student_subscriptions`;
SELECT 1 FROM `students` LIMIT 1;
SHOW COLUMNS FROM `students`;
SHOW CREATE TABLE `php_course_1`.`students`;
ALTER TABLE `student_subscriptions`
	ALTER `course_id` DROP DEFAULT,
	ALTER `student_id` DROP DEFAULT;
ALTER TABLE `student_subscriptions`
	CHANGE COLUMN `course_id` `course_id` INT(11) NOT NULL FIRST,
	CHANGE COLUMN `student_id` `student_id` INT(11) NOT NULL AFTER `course_id`,
	ADD CONSTRAINT `course_id_FK1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
	ADD CONSTRAINT `student_id_FK1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';
SHOW CREATE TABLE `php_course_1`.`student_subscriptions`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `php_course_1`.`student_subscriptions`;
INSERT INTO `php_course_1`.`students` (`first_name`, `last_name`, `student_number`) VALUES ('Pesho', 'Peshev', '098765');
SELECT LAST_INSERT_ID();
SELECT `student_id`, `first_name`, `last_name`, `student_number` FROM `php_course_1`.`students` WHERE  `student_id`=1;
INSERT INTO `php_course_1`.`students` (`first_name`, `last_name`, `student_number`) VALUES ('Gosho', 'Goshev', '754775');
SELECT LAST_INSERT_ID();
SELECT `student_id`, `first_name`, `last_name`, `student_number` FROM `php_course_1`.`students` WHERE  `student_id`=2;
SHOW CREATE TABLE `php_course_1`.`courses`;
SELECT * FROM `php_course_1`.`courses` LIMIT 1000;
SHOW CREATE TABLE `php_course_1`.`courses`;
INSERT INTO `php_course_1`.`courses` (`course_name`) VALUES ('PHP');
SELECT LAST_INSERT_ID();
SELECT `course_id`, `course_name` FROM `php_course_1`.`courses` WHERE  `course_id`=1;
INSERT INTO `php_course_1`.`courses` (`course_name`) VALUES ('JS');
SELECT LAST_INSERT_ID();
SELECT `course_id`, `course_name` FROM `php_course_1`.`courses` WHERE  `course_id`=2;
SHOW CREATE TABLE `php_course_1`.`student_subscriptions`;
SELECT * FROM `php_course_1`.`student_subscriptions` LIMIT 1000;
SHOW CREATE TABLE `php_course_1`.`student_subscriptions`;
SHOW CREATE TABLE `courses`;
SELECT `course_id`, LEFT(`course_name`, 256) FROM `courses` GROUP BY `course_id` ORDER BY `course_name` LIMIT 1000;
SHOW CREATE TABLE `students`;
SELECT `student_id`, LEFT(`first_name`, 256) FROM `students` GROUP BY `student_id` ORDER BY `first_name` LIMIT 1000;
INSERT INTO `php_course_1`.`student_subscriptions` (`course_id`, `student_id`) VALUES ('2', '1');
SELECT `course_id`, `student_id` FROM `php_course_1`.`student_subscriptions` WHERE  `course_id`=2 AND `student_id`=1 LIMIT 1;
SHOW CREATE TABLE `courses`;
SELECT `course_id`, LEFT(`course_name`, 256) FROM `courses` GROUP BY `course_id` ORDER BY `course_name` LIMIT 1000;
SHOW CREATE TABLE `students`;
SELECT `student_id`, LEFT(`first_name`, 256) FROM `students` GROUP BY `student_id` ORDER BY `first_name` LIMIT 1000;
INSERT INTO `php_course_1`.`student_subscriptions` (`course_id`, `student_id`) VALUES ('1', '2');
SELECT `course_id`, `student_id` FROM `php_course_1`.`student_subscriptions` WHERE  `course_id`=1 AND `student_id`=2 LIMIT 1;
ALTER TABLE `students`
	ADD UNIQUE INDEX `student_number` (`student_number`);
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';
SHOW CREATE TABLE `php_course_1`.`students`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `php_course_1`.`students`;