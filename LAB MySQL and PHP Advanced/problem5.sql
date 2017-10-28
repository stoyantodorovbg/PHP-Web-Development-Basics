CREATE TRIGGER `students_number_lenght_after_insert` BEFORE INSERT ON `students` FOR EACH ROW BEGIN
DECLARE `too_small` CONDITION FOR SQLSTATE '45000';
IF LENGTH (NEW.`student_number`) < 5 THEN
SIGNAL `too_small`;
END IF;
END;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';
