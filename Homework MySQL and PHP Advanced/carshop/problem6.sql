CREATE ALGORITHM = UNDEFINED VIEW `deal_` AS SELECT
`cars`.`model`, `cars`.`make`, `cars`.`year`, `customers`.`first_name`, `customers`.`last_name`, `sales`.`date_time`, `sales`.`amount`
FROM `sales`, `cars`, `customers`
WHERE `cars`.`id` = `sales`.`car_id`
AND `customers`.`id` = `sales`.`customer_id`    ;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='cars';
SHOW TABLE STATUS FROM `cars`;
SHOW FUNCTION STATUS WHERE `Db`='cars';
SHOW PROCEDURE STATUS WHERE `Db`='cars';
SHOW TRIGGERS FROM `cars`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='cars';
SHOW CREATE VIEW `cars`.`deal_`;
SELECT LOAD_FILE(CONCAT(IFNULL(@@GLOBAL.datadir, CONCAT(@@GLOBAL.basedir, 'data/')), 'cars/deal_.frm'));
SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE   TABLE_NAME='deal_' AND TABLE_SCHEMA='cars';