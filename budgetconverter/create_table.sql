CREATE TABLE `budget` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `store_number` int(4) DEFAULT NULL,
  `category` int(3) DEFAULT NULL,
  `calendar_day` varchar(255),
  `budget` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;