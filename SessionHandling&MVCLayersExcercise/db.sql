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


-- Dumping database structure for session_exercise
CREATE DATABASE IF NOT EXISTS `session_exercise` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `session_exercise`;

-- Дъмп структура за таблица session_exercise.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `born_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица session_exercise.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`user_id`, `username`, `first_name`, `password`, `last_name`, `born_on`) VALUES
	(9, 'user1', 'Stoyan', '$2y$10$PLc9WcnKL8wf4ec86ii4JO7fOR5MMOTwZRLv0wzvWGylpPePZLyrW', 'Stoyanov', '1999-11-11 00:00:00'),
	(10, 'user12', 'Stoyan', '$2y$10$RLe0VDzM5WngPl7ZsP2WAOseT1SVsvBd6XonaMpPYkK5LLSJ/1IAS', 'Todorov1', '1999-12-12 00:00:00'),
	(11, 'username', 'Goshko', '$2y$10$BLXh5ljzI6xOFV7qI.Bx4OtxfAP12yXfUqjCSIIu/sT4OFGv7cfdK', 'Goshev', '1995-12-11 00:00:00'),
	(12, 'user', 'test', '$2y$10$HHm1MB/X90JXQW3z2x88yuW37cqv5RyxEfVEsWHXKyDsQJvSk7teu', 'test', '2000-12-12 00:00:00'),
	(13, 'stoyan111', 'Stoyan1', '$2y$10$deV.8zCihnBbknlQxIKMV.Evaiazt83DjME4z20.K9Bm0pVBykxPm', 'Todorov', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
