CREATE TABLE `total_sales` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`sale_amount` INT NOT NULL,
	PRIMARY KEY (`id`)
)
CREATE DEFINER=`root`@`localhost` TRIGGER `total_sales` BEFORE INSERT ON `sales` FOR EACH ROW BEGIN
SET @sum := @sum + NEW.`amount`;
INSERT INTO `total_sales`
(`sale_amount`) VALUES (@sum);
END