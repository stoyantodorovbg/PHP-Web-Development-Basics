
CREATE PROCEDURE `getStudentData`()
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT ''
BEGIN
SELECT
`students`.`student_id`, CONCAT(`students`.`first_name`, ' ', `students`.`last_name`) AS `name`, `students`.`student_number`,
`courses`.`course_id`, `courses`.course_name,
`student_subscriptions`.`course_id`, `student_subscriptions`.`student_id`
FROM `students`, `courses`, `student_subscriptions`
WHERE `students`.`student_id` = `student_subscriptions`.`student_id` AND `student_subscriptions`.`course_id` = `courses`.`course_id`;

END
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='php_course_1';
SHOW TABLE STATUS FROM `php_course_1`;
SHOW FUNCTION STATUS WHERE `Db`='php_course_1';
SHOW PROCEDURE STATUS WHERE `Db`='php_course_1';
SHOW TRIGGERS FROM `php_course_1`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='php_course_1';