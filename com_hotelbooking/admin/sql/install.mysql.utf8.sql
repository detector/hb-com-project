DROP TABLE IF EXISTS `#__exhibitions`;
DROP TABLE IF EXISTS `#__hotels`;
DROP TABLE IF EXISTS `#__rooms`;

/* Create Exhibitions table*/
CREATE TABLE `#__exhibitions` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`Name`					VARCHAR(255) NOT NULL,
	`Description`			VARCHAR(1024) NOT NULL DEFAULT '',
	`StartDate`				DATE NOT NULL DEFAULT 0,
	`EndDate`				DATE NOT NULL DEFAULT 0,
	`DetailInfoFilePath`	VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

/* Create hotels table*/
CREATE TABLE `#__hotels` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`Name`					VARCHAR(255) NOT NULL,
	`HotelType`				tinyint(4) NOT NULL DEFAULT 0,
	`HotelLevel`				tinyint(4) NOT NULL DEFAULT 0,
	`HotelFeature`				tinyint(4) NOT NULL DEFAULT 0,
	`Description`			VARCHAR(1024) NOT NULL DEFAULT '',
	`DetailInfoFilePath`	VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
	
/* Create rooms table*/
CREATE TABLE `#__rooms` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`hotel_id`				INT(11)     NOT NULL DEFAULT 0,
	`Name`					VARCHAR(255) NOT NULL,
	`RoomType`				tinyint(4) NOT NULL DEFAULT 0,
	`BedType`				tinyint(4) NOT NULL DEFAULT 0,
	`SellType`				tinyint(4) NOT NULL DEFAULT 0,
	`AvailableNumber`		INT			NOT NULL DEFAULT 0,
	`Breakfast`				tinyint(4) NOT NULL DEFAULT 0,
	`Broadband`				tinyint(4) NOT NULL DEFAULT 0,
	`Policy`				tinyint(4) NOT NULL DEFAULT 0,
	`Price`					DECIMAL(10, 2) NOT NULL DEFAULT 0,
	`Description`			VARCHAR(1024) NOT NULL DEFAULT '',
	`DetailInfoFilePath`	VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
	
/* Create sales rooms obj for exhibitions table*/
CREATE TABLE `#__sale_exhibitions_rooms` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`exhibition_id`			INT(11)     NOT NULL DEFAULT 0,
	`hotel_id`				INT(11)     NOT NULL DEFAULT 0,
	`room_id`				INT(11)     NOT NULL DEFAULT 0,
	`BookingDate`			DATE NOT NULL DEFAULT 0,
	`BookedNumber`			INT			NOT NULL DEFAULT 0,
	`Status`				tinyint(4) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;	
	
/* Create sales rooms obj, for exhibition end to move the data out to this table archives */
CREATE TABLE `#__sale_exhibitions_rooms_archives` (
	`id`					INT(11)     NOT NULL AUTO_INCREMENT,
	`exhibition_id`			INT(11)     NOT NULL DEFAULT 0,
	`hotel_id`				INT(11)     NOT NULL DEFAULT 0,
	`room_id`				INT(11)     NOT NULL DEFAULT 0,
	`BookingDate`			DATE NOT NULL DEFAULT 0,
	`BookedNumber`			INT			NOT NULL DEFAULT 0,
	`Status`				tinyint(4) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;	

/* create view for list all available hotels */	

/* create view for testing */
CREATE VIEW `#__HotelAvailable` AS 
Select hotel_id, Name, max(Price) maxPrice, min(Price) minPrice
from `#__rooms`
GROUP by hotel_id
ORDER BY minPrice ASC;

/* ###Test Data need remove them later### */
/* Insert Init Data in Exhibitions table */
INSERT INTO `#__exhibitions` (`Name` , `Description`, `StartDate`, `EndDate`) VALUES
('乌镇神经元大会', '由上海科学院神经所主办的，世界神经大会在乌镇召开', '2015-09-20', '2015-09-24');

/* Insert Init Data in Hotels table */
INSERT INTO `#__hotels` (`Name` , `HotelType`, `HotelLevel`, `HotelFeature`, `Description`, `DetailInfoFilePath`) VALUES
('乌镇No.0', 1, 0, 0, '乌镇No.0 hotel, 0 star!', '乌镇No.0'),
('乌镇No.1', 0, 1, 1, '乌镇No.1 hotel, 1 star!', '乌镇No.1'),
('乌镇No.2', 0, 2, 2, '乌镇No.2 hotel, 2 star!', '乌镇No.2'),
('乌镇No.3', 0, 3, 3, '乌镇No.3 hotel, 3 star!', '乌镇No.3'),
('乌镇No.4', 0, 4, 4, '乌镇No.4 hotel, 4 star!', '乌镇No.4'),
('乌镇No.5', 0, 5, 5, '乌镇No.5 hotel, 5 star!', '乌镇No.5'),
('乌镇No.6', 0, 6, 6, '乌镇No.6 hotel, 6 star!', '乌镇No.6'),
('乌镇No.7', 0, 7, 7, '乌镇No.7 hotel, 7 star!', '乌镇No.7');

/* Insert Init Data in Rooms table */
INSERT INTO `#__rooms` (`hotel_id`, `Name` , `RoomType`, `BedType`, `Breakfast`, `Broadband`, `Policy`, `Price`, `AvailableNumber`, `Description`, `DetailInfoFilePath`) VALUES
(1, '乌镇No.0-0', 0, 1, 0, 0, 0, 0.01, 10, '乌镇No.0 hotel, 0 star!, 0-0 room', '乌镇No.0_room0'),
(1, '乌镇No.0-1', 0, 1, 0, 0, 0, 0.01, 20, '乌镇No.0 hotel, 0 star!, 0-1 room', '乌镇No.0_room1'),
(1, '乌镇No.0-2', 0, 1, 0, 0, 0, 0.01, 30, '乌镇No.0 hotel, 0 star!, 0-2 room', '乌镇No.0_room2'),
(2, '乌镇No.1-0', 0, 1, 0, 0, 0, 0.02, 2, '乌镇No.1 hotel, 0 star!, 0-0 room', '乌镇No.1_room0'),
(2, '乌镇No.1-1', 0, 1, 0, 0, 0, 0.02, 3, '乌镇No.1 hotel, 0 star!, 0-1 room', '乌镇No.1_room1'),
(2, '乌镇No.1-2', 0, 1, 0, 0, 0, 0.02, 4, '乌镇No.1 hotel, 0 star!, 0-2 room', '乌镇No.1_room2'),
(3, '乌镇No.2-0', 0, 1, 0, 0, 0, 0.03, 3, '乌镇No.2 hotel, 0 star!, 0-0 room', '乌镇No.2_room0'),
(3, '乌镇No.2-1', 0, 1, 0, 0, 0, 0.03, 4, '乌镇No.2 hotel, 0 star!, 0-1 room', '乌镇No.2_room1'),
(3, '乌镇No.2-2', 0, 1, 0, 0, 0, 0.03, 5, '乌镇No.2 hotel, 0 star!, 0-2 room', '乌镇No.2_room2'),
(4, '乌镇No.3-0', 0, 1, 0, 0, 0, 0.04, 4, '乌镇No.3 hotel, 0 star!, 0-0 room', '乌镇No.3_room0'),
(4, '乌镇No.3-1', 0, 1, 0, 0, 0, 0.04, 5, '乌镇No.3 hotel, 0 star!, 0-1 room', '乌镇No.3_room1'),
(4, '乌镇No.3-2', 0, 1, 0, 0, 0, 0.04, 6, '乌镇No.3 hotel, 0 star!, 0-3 room', '乌镇No.3_room2'),
(5, '乌镇No.4-0', 0, 1, 0, 0, 0, 0.13, 5, '乌镇No.4 hotel, 0 star!, 0-0 room', '乌镇No.4_room0'),
(5, '乌镇No.4-1', 0, 1, 0, 0, 0, 0.05, 6, '乌镇No.4 hotel, 0 star!, 0-1 room', '乌镇No.4_room1'),
(5, '乌镇No.4-2', 0, 1, 0, 0, 0, 0.05, 7, '乌镇No.4 hotel, 0 star!, 0-4 room', '乌镇No.4_room2'),
(6, '乌镇No.5-0', 0, 1, 0, 0, 0, 0.11, 60, '乌镇No.5 hotel, 0 star!, 0-0 room', '乌镇No.5_room0'),
(6, '乌镇No.5-1', 0, 1, 0, 0, 0, 0.06, 50, '乌镇No.5 hotel, 0 star!, 0-1 room', '乌镇No.5_room1'),
(6, '乌镇No.5-2', 0, 1, 0, 0, 0, 0.06, 40, '乌镇No.5 hotel, 0 star!, 0-5 room', '乌镇No.5_room2'),
(7, '乌镇No.6-0', 0, 1, 0, 0, 0, 0.07, 7, '乌镇No.6 hotel, 0 star!, 0-0 room', '乌镇No.6_room0'),
(7, '乌镇No.6-1', 0, 1, 0, 0, 0, 0.07, 8, '乌镇No.6 hotel, 0 star!, 0-1 room', '乌镇No.6_room1'),
(7, '乌镇No.6-2', 0, 1, 0, 0, 0, 0.10, 9, '乌镇No.6 hotel, 0 star!, 0-6 room', '乌镇No.6_room2'),
(8, '乌镇No.7-0', 0, 1, 0, 0, 0, 0.08, 8, '乌镇No.7 hotel, 0 star!, 0-0 room', '乌镇No.7_room0'),
(8, '乌镇No.7-1', 0, 1, 0, 0, 0, 0.08, 9, '乌镇No.7 hotel, 0 star!, 0-1 room', '乌镇No.7_room1'),
(8, '乌镇No.7-2', 0, 1, 0, 0, 0, 0.08, 10, '乌镇No.7 hotel, 0 star!, 0-7 room', '乌镇No.7_room2');