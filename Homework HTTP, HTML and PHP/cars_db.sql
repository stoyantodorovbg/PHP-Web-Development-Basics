-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия на сървъра:            10.1.26-MariaDB - mariadb.org binary distribution
-- ОС на сървъра:                Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cars
CREATE DATABASE IF NOT EXISTS `cars` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cars`;

-- Дъмп структура за таблица cars.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица cars.cars: ~7 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
REPLACE INTO `cars` (`id`, `make`, `model`, `year`) VALUES
	(7, 'BMW', ' 116', ' 2010'),
	(8, 'Ford', 'Focus', ' 2004'),
	(9, 'Audi', ' A4', ' 2004'),
	(10, 'Audi', ' A4', ' 2004'),
	(42, 'subaru', 'forester', '2010'),
	(43, 'subaru', 'forester', '2010'),
	(44, 'audi', 'A4', '2012');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Дъмп структура за таблица cars.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица cars.customers: ~9 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
REPLACE INTO `customers` (`id`, `first_name`, `last_name`) VALUES
	(3, ' Ilia', ' Petrov'),
	(4, ' Stoyan', ' Lazarov'),
	(5, ' Ivan', ' Ivanov'),
	(6, ' Ivan', ' Ivanov'),
	(8, 'Stoyan', 'Todorov'),
	(9, 'Stoyan', 'Todorov'),
	(34, 'Stoyan', 'Todorov'),
	(35, 'Stoyan', 'Todorov'),
	(36, 'Gosho', 'Peshev');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Дъмп структура за view cars.customer_names
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `customer_names` (
	`last_name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Дъмп структура за view cars.deal
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `deal` (
	`model` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`make` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`year` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`first_name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`last_name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`date_time` DATETIME NOT NULL,
	`amount` FLOAT NULL
) ENGINE=MyISAM;

-- Дъмп структура за view cars.deal_
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `deal_` (
	`model` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`make` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`year` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`car_id` INT(10) UNSIGNED NOT NULL,
	`first_name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`last_name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`customer_id` INT(10) UNSIGNED NOT NULL,
	`date_time` DATETIME NOT NULL,
	`amount` FLOAT NULL
) ENGINE=MyISAM;

-- Дъмп структура за функция cars.get_sales
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_sales`() RETURNS float
BEGIN
   	RETURN (SELECT SUM(`amount`));
    END//
DELIMITER ;

-- Дъмп структура за таблица cars.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица cars.sales: ~7 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
REPLACE INTO `sales` (`id`, `car_id`, `customer_id`, `date_time`, `amount`) VALUES
	(2, 7, 3, '2017-10-24 19:47:57', 24000),
	(3, 8, 4, '2017-10-24 20:14:39', 3800),
	(4, 9, 5, '2017-10-26 08:55:25', 7000),
	(5, 10, 6, '2017-10-28 21:52:33', 7000),
	(6, 42, 34, '2017-10-31 14:40:48', 20000),
	(7, 43, 35, '2017-10-31 17:06:54', 20000),
	(8, 44, 36, '2017-10-31 17:19:11', 25000);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Дъмп структура за таблица cars.total_sales
CREATE TABLE IF NOT EXISTS `total_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица cars.total_sales: ~3 rows (approximately)
/*!40000 ALTER TABLE `total_sales` DISABLE KEYS */;
REPLACE INTO `total_sales` (`id`, `sale_amount`) VALUES
	(1, 20000),
	(2, NULL),
	(3, NULL);
/*!40000 ALTER TABLE `total_sales` ENABLE KEYS */;

-- Дъмп структура за trigger cars.total_sales
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `total_sales` BEFORE INSERT ON `sales` FOR EACH ROW BEGIN
SET @sum := @sum + NEW.`amount`;
INSERT INTO `total_sales`
(`sale_amount`) VALUES (@sum);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Дъмп структура за view cars.customer_names
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `customer_names`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `customer_names` AS SELECT `first_name` `last_name` 
FROM `customers` ;

-- Дъмп структура за view cars.deal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `deal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `deal` AS SELECT 
`cars`.`model`, `cars`.`make`, `cars`.`year`, `customers`.`first_name`, `customers`.`last_name`, `sales`.`date_time`, `sales`.`amount`
FROM `sales`, `cars`, `customers`
WHERE `cars`.`id` = `sales`.`car_id`
AND `customers`.`id` = `sales`.`customer_id` ;

-- Дъмп структура за view cars.deal_
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `deal_`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `deal_` AS SELECT 
`cars`.`model`, `cars`.`make`, `cars`.`year`, `cars`.`id` As `car_id`, `customers`.`first_name`, `customers`.`last_name`, `customers`.`id` As `customer_id`, `sales`.`date_time`, `sales`.`amount`
FROM `sales`, `cars`, `customers`
WHERE `cars`.`id` = `sales`.`car_id`
AND `customers`.`id` = `sales`.`customer_id` ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
