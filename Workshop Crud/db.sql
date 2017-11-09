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


-- Dumping database structure for phonebook
CREATE DATABASE IF NOT EXISTS `phonebook` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `phonebook`;

-- Дъмп структура за таблица phonebook.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Дъмп данни за таблица phonebook.contacts: ~0 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
REPLACE INTO `contacts` (`id`, `number`, `first_name`, `last_name`) VALUES
	(1, '0888453627', 'Gosho', 'Peshev'),
	(2, '088465869', 'Stoyan', 'Todorov'),
	(4, '0878784387', 'Pesho', 'Peshev'),
	(5, '0878784387', 'Pesho', 'Peshev'),
	(6, '0875478548', 'Pesho', 'Goshev'),
	(7, '934993443', 'Dragan', ''),
	(8, '54454545', 'Cvetan', 'Geshev'),
	(9, '54454545', 'Cvetan', ''),
	(10, '84587874', 'Minka', ''),
	(14, '54545454', 'Onufrii', ''),
	(17, '074367754', 'Gosho', ''),
	(18, '08547754', 'Pesho', ''),
	(19, '0976543', 'test', ''),
	(20, '09876655', 'test1', ''),
	(21, '098776543', 'test3', ''),
	(22, '234567', 'test1', ''),
	(23, '545445', 'test2', ''),
	(24, '344345', 'test3', ''),
	(25, '434342342432', 'test2', ''),
	(26, '4555', 'test2', ''),
	(27, '434242545452', 'test3', '');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
