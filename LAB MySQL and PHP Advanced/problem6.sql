CREATE TABLE `subscribers` (
	`course_id` INT NOT NULL,
	`students_count` INT NOT NULL,
	CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`)
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
SHOW CREATE TABLE `php_course_1`.`subscribers`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `php_course_1`.`subscribers`;
CREATE TRIGGER `countSubscribers` AFTER INSERT ON `subscribers` FOR EACH ROW BEGIN
UPDATE `subscribers`
SET `student_count` = `student_count` + 1
WHERE `course_id` = NEW.`course_id`;
INSERT INTO `subscribers`
(`course_id`, `count_id`) VALUES (NEW.course_id, 1
WHERE NOT EXISTS (SELECT * FROM `subscribers` WHERE `course_id` = NEW.`course_id`);